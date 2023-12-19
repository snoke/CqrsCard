<?php
namespace App\Action\Query;

use App\Action\AbstractAction;
use App\Repository\CartRepository;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AppLoadCartQuery implements QueryInterface
{
    private CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function fetch(Request $request): JsonResponse
    {
        return new JsonResponse(AppGetProductsResource::get($this->cartRepostiroy->findBy(['sessionId' => $parameters['sessionId']])));
    }
}
