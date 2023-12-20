<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */
namespace App\Cqrs\Query;

use App\Cqrs\AbstractResource;
use App\Entity\Product as ProductEntity;

class AppGetProductsResource extends AbstractResource
{
    public  function get(array $products) {
        return array_map(function(ProductEntity $product) {
            return $this->serialize($product);
        }, $products);
    }
}
