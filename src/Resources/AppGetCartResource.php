<?php

namespace App\Resources;

use App\Entity\Cart;
use App\Entity\CartProduct as CartProduct;
use App\Entity\Product as ProductEntity;
use Doctrine\ORM\EntityManagerInterface;

class AppGetCartResource
{
    public static function get(?Cart $cart,?array $cartProducts)
    {
        return $cart ? array_map(function (CartProduct $cartProduct) {
            $product = $cartProduct->getProduct();
            return [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
        }, $cartProducts) : [];
    }
}
