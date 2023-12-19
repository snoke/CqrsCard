<?php
namespace App\Action\Query;

use App\Action\AbstractAction;
use App\Repository\ProductRepository;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AppGetProductsQuery
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function fetch(Request $request,array $parameters = []): JsonResponse
    {
        return new JsonResponse(AppGetProductsResource::get($this->productRepository->findAll()));
    }
}
