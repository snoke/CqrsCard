<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */
namespace App\Cqrs\Query;

use App\Cqrs\AbstractResource;
use App\Entity\Product;

class AppGetProductsResource extends AbstractResource
{
    public  function get(array $products) {
        return array_map(function(Product $product) {
            return $this->serialize($product);
        }, $products);
    }
}
