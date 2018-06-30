<?php

namespace App\Service;


use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class CartManager
{

    const SESSION_CART_ID = 'cart';
    public $cart = [];
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;

    }

    public function add(Product $product, int $quantity)
    {
        $session = new Session();

        if (!($session->has('cart'))) {
            $cart[$product->getId()] = $quantity;
            $session->set('cart', $cart);
            $session->getFlashBag()->add('notice', 'Product was added to Cart');
            return;
        }
        $cart = $session->get('cart');

        if ($session->has('cart')
            AND isset($cart[$product->getId()])) {

            $cart[$product->getId()] += $quantity;
            $session->set('cart', $cart);
            $session->getFlashBag()->add('notice', 'Product was added to Cart');
            return;
        }
        if ($session->has('cart')) {
            $cart[$product->getId()] = $quantity;
            $session->set('cart', $cart);
            $session->getFlashBag()->add('notice', 'Product was added to Cart');
            return;
        }

    }

    public function getCart(): array
    {
        $session = new Session();
        $res = [];

        if (!($session->has('cart')) OR empty($session->get('cart'))) {
            return [];
        }


        foreach ($session->get('cart') as $productId => $quantity) {
            $position['quantity'] = $quantity;
            $position['product'] = $this->repository->find($productId);
            $res[] = $position;
        }

        return $res;
    }

    public function emptyCart()
    {
        $session = new Session();
        if ($session->has('cart')) {
            $session->remove('cart');
        }
    }
}