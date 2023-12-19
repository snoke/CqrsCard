<?php
namespace App\Action\Query;

use App\Entity\Product as ProductEntity;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

class ProductGetQuery
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    protected function execute(array $parameters = [])
    {
        return array_map(function(ProductEntity $product) {
            return ProductGetQueryResource::get($product);
        }, $this->productRepository->findAll());
    }
}
