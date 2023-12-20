<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */
namespace App\Cqrs\Query;

use App\Entity\Product as ProductEntity;

class AppGetProductsResource
{
    public static function get(array $products) {
        return array_map(function(ProductEntity $product) {
            return [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
        }, $products);
    }
}
