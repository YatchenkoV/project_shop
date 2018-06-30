<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\CartManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\CartFormType;


class CartController extends Controller
{

    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        $session = new Session();
        dump($session->get('cart'));
        $cm = $this->get(CartManager::class);

        return $this->render('cart/index.html.twig', ['cart' => $cm->getCart(), ]);
    }
    /**
     * @Route("/add-to-cart/{product}", name="add_to_cart")
     */
    public function add(Product $product, Request $request)
    {
        $cm = $this->get(CartManager::class);
        $cm->add($product, $request->get('quantity'));
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/empty-cart", name="empty_cart")
     */
    public function emptyCart()
    {
        $cm = $this->get(CartManager::class);
        $cm->emptyCart();
        return $this->redirectToRoute('cart');
    }
}
