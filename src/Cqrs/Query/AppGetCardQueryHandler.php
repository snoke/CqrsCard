<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Query;

use App\Cqrs\AbstractQueryHandler;
use App\Repository\CartProductRepository;
use App\Repository\CartRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppGetCardQueryHandler extends AbstractQueryHandler
{
    private CartRepository $cartRepository;
    private CartProductRepository $cartProductRepository;

    public function __construct(CartProductRepository $cartProductRepository, CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartProductRepository = $cartProductRepository;
    }

    public function fetch(AppGetCardQuery $command,AppGetCartResource $resource): JsonResponse
    {
        $sessionId = $command->getSessionId();
        $cart = $this->cartRepository->findOneBy(['sessionId' => $sessionId]);

        $cartProducts = $cart ? $this->cartProductRepository->findBy(['cart' => $cart]) : [];
        return new JsonResponse(json_decode($resource->get($cart, $cartProducts)));
    }
}
