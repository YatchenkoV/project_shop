<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Service\FormManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Form\CartFormType;


class ShopController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {

        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function showCategories(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->getRootCategory();
        return $this->render('main/categories.html.twig', ['categories' => $categories, ]);
    }

    /**
     * @Route("/categories/{categorySlug}", name="category")
     * @ParamConverter("category", options={"mapping":{"categorySlug":"slug"}})
     */
    public function showCategory(Category $category)
    {
        return $this->render('main/category.html.twig', ['category' => $category, ]);
    }

    /**
     * @Route("/categories/{categorySlug}/{productSlug}", name="product")
     * @ParamConverter("product", options={"mapping": {"productSlug": "slug"}})
     * @ParamConverter("category", options={"mapping": {"categorySlug": "slug"}})
     */
    public function showProduct(Product $product)
    {

//        $product_id = $product->getId();
//        $session = new Session();
//        $cartForm = $this->createForm(CartFormType::class, $product);
//
//        $cartForm->handleRequest($request);
//
////        if ($cartForm->isSubmitted() && $cartForm->isValid())
////        {
////
////            $product_quantity = $cartForm->getData()->getQuantity();
////            $session->set($product_id, $product_quantity);
////            dump($session);
////
////            $this->addFlash(
////                'notice',
////                'The product was added to cart!');
////
////            return $this->redirectToRoute('product');
////        }


        return $this->render('main/product.html.twig', [
            'product' => $product]);
    }

}
