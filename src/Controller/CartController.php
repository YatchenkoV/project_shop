<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Form\FormType;

class CartController extends Controller
{
    public function __construct()
    {
        $session = new Session();
        $session->start();
    }

//    /**
//     * @Route("/cart", name="cart")
//     */
//    public function createCartForm(Request $request)
//    {
//
//                $form = $this->createForm(FormType::class);
//
//    }

    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        return $this->render('cart/index.html.twig');
    }
}
