<?php
namespace App\Action\Query;

use App\Repository\CartRepository;
use App\Repository\CartProductRepository;
use App\Resources\AppGetCartResource;
use App\Resources\AppGetProductsResource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AppGetCardQuery implements QueryInterface
{
    private CartRepository $cartRepository;
    private CartProductRepository $cartProductRepository;

    public function __construct(CartProductRepository $cartProductRepository,CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;
        $this->cartProductRepository = $cartProductRepository;
    }

    public function fetch(RequestStack $requestStack): JsonResponse
    {
        $sessionId = $requestStack->getSession()->get('sessionId');
        $cart = $this->cartRepository->findOneBy(['sessionId' => $sessionId]);

        $cartProducts = $cart?$this->cartProductRepository->findBy(['cart_id' => $cart->getId()]):[];
        return new JsonResponse(AppGetCartResource::get($cart,$cartProducts));
    }
}
