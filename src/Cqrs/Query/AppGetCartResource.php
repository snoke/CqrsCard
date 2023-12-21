<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Query;


use App\Cqrs\AbstractResource;
use App\Entity\CartProduct;

class AppGetCartResource extends AbstractResource
{
    public  function get(?array $cartProducts)
    {
        return array_map(function (CartProduct $cartProduct) {
            $product = $cartProduct->getProduct();
            return $this->serialize($product);
        }, $cartProducts);
    }
}
