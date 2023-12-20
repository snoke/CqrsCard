<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Query;


use App\Cqrs\AbstractResource;
use App\Entity\Cart;
use App\Entity\CartProduct as CartProduct;

class AppGetCartResource extends AbstractResource
{
    public  function get(?Cart $cart,?array $cartProducts)
    {
        return $this->serialize($cart ? array_map(function (CartProduct $cartProduct) {
            $product = $cartProduct->getProduct();
            return $this->serialize($product,'json');
        }, $cartProducts) : []);
    }
}
