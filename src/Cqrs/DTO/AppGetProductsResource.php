<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */
namespace App\Cqrs\DTO;

use App\Cqrs\AbstractResource;
use App\Entity\Product as ProductEntity;

class AppGetProductsResource extends AbstractResource
{
    public  function get(array $products) {
        return array_map(function(ProductEntity $product) {
            return [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
            ];
            //return $this->serialize($product);
        }, $products);
    }
}
