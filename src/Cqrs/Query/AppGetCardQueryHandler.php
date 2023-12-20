<?php
namespace App\Cqrs\Query;

use App\Entity\Query;
use App\Cqrs\QueryInterface;
use App\Repository\CartRepository;
use App\Repository\CartProductRepository;
use App\Resources\AppGetCartResource;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

class AppGetCardQueryHandler
{
    private CartRepository $cartRepository;
    private CartProductRepository $cartProductRepository;

    public function __construct(CartProductRepository $cartProductRepository,CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
        $this->cartProductRepository = $cartProductRepository;
    }

    public function fetch(AppGetCardQuery $command): JsonResponse
    {
        $sessionId = $command->getSessionId();
        //$sessionId = $requestStack->getSession()->get('sessionId');
        $cart = $this->cartRepository->findOneBy(['sessionId' => $sessionId]);

        $cartProducts = $cart?$this->cartProductRepository->findBy(['cart' => $cart]):[];
        return new JsonResponse(AppGetCartResource::get($cart,$cartProducts));
    }
}
