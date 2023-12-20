<?php

namespace App\Cqrs\Query;

use App\Cqrs\AbstractQueryHandler;
use App\Repository\CartRepository;
use App\Repository\CartProductRepository;
use App\Resources\AppGetCartResource;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppGetCardQueryHandler extends AbstractQueryHandler
{
    private CartRepository $cartRepository;
    private CartProductRepository $cartProductRepository;

    public function __construct(CartProductRepository $cartProductRepository, CartRepository $cartRepository)
    {
        parent::__construct();
        $this->cartRepository = $cartRepository;
        $this->cartProductRepository = $cartProductRepository;
    }

    public function fetch(AppGetCardQuery $command): JsonResponse
    {
        $sessionId = $command->getSessionId();
        //$sessionId = $requestStack->getSession()->get('sessionId');
        var_dump("ASDASD");
        $cart = $this->cartRepository->findOneBy(['sessionId' => $sessionId]);

        $cartProducts = $cart ? $this->cartProductRepository->findBy(['cart' => $cart]) : [];
        return new JsonResponse(AppGetCartResource::get($cart, $cartProducts));
    }
}
