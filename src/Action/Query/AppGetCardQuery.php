<?php
namespace App\Action\Query;

use App\Repository\CartRepository;
use App\Resources\AppGetCartResource;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AppGetCardQuery implements QueryInterface
{
    private CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function fetch(RequestStack $requestStack): JsonResponse
    {
        $sessionId = $requestStack->getSession()->get('sessionId');
        var_dump($sessionId);
        return new JsonResponse(AppGetCartResource::get($this->cartRepository->findBy(['sessionId' => $sessionId])));
    }
}
