<?php
namespace App\Action\Query;

use App\Entity\Product as ProductEntity;
use Doctrine\ORM\EntityManagerInterface;

class ProductGetQueryResource
{
    public static function get(ProductEntity $product) {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];
    }
}
