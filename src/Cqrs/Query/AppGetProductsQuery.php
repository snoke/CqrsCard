<?php
namespace App\Cqrs\Query;

use App\Entity\Query;
use App\Cqrs\QueryInterface;
use App\Repository\ProductRepository;
use App\Resources\AppGetProductsResource;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;

class AppGetProductsQuery extends Query implements QueryInterface
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function fetch(RequestStack $requestStack,array $parameters = []): Response
    {
        return new Response(json_encode(AppGetProductsResource::get($this->productRepository->findAll())));
    }
}
