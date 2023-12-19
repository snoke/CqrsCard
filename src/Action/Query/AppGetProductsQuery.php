<?php
namespace App\Action\Query;

use App\Action\AbstractAction;
use App\Repository\ProductRepository;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AppGetProductsQuery  extends AbstractAction  implements QueryInterface
{
    private ProductRepository $productRepository;

    public function __construct(Request $request, ProductRepository $productRepository) {
        parent::__construct($request);
        $this->productRepository = $productRepository;
    }

    public function fetch(array $parameters = []): JsonResponse
    {
        return new JsonResponse(AppGetProductsResource::get($this->productRepository->findAll()));
    }
}
