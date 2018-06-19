<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProductController extends Controller
{
    /**
     * @Route("/categories/{categorySlug}/{productSlug}", name="product")
     * @ParamConverter("product", options={"mapping": {"productSlug": "slug"}})
     * @ParamConverter("category", options={"mapping": {"categorySlug": "slug"}})
     */
    public function showProduct(Product $product, Category $category)
    {
        return $this->render('main/product.html.twig', [
            'product' => $product,
        ]);
    }
}
