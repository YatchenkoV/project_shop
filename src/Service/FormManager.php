<?php

namespace App\Service;

use App\Entity\Product;
use App\Form\CartFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;




class FormManager extends Controller
{
    public function createCartForm(Request $request)
    {
        $product = new Product();

        $session = new Session();
        $cartForm = $this->createForm(CartFormType::class, $product);

        $cartForm->handleRequest($request);

        if ($cartForm->isSubmitted() && $cartForm->isValid())
        {

            $product = $cartForm->getData();
            $product_quantity = $product->getQuantity();
            $product_id = $product->getId();
            $session->set($product_id, $product_quantity);
            dump($session);

            $this->addFlash(
                'notice',
                'The product was added to cart!');

            return $this->redirectToRoute('product');
        }

    }
}