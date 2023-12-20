<?php

namespace App\Resources;

use App\Entity\Cart as Cart;
use App\Entity\Product as ProductEntity;
use Doctrine\ORM\EntityManagerInterface;

class AppGetCartResource
{
    public static function get(?Cart $cart)
    {
        return $cart ? array_map(function (ProductEntity $product) {
            return [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
        }, $cart->getProducts()->toArray()) : [];
    }
}
