<?php
namespace App\Action\Query;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppGetProductsQuery implements QueryInterface
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function fetch(array $parameters = []): JsonResponse
    {
        die("ASD");
        return new JsonResponse(AppGetProductsResource::get($this->productRepository->findAll()));
    }
}
