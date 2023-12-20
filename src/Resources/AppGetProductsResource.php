<?php
namespace App\Resources;

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
