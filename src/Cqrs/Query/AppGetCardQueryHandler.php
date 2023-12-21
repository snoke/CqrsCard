<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Query;

use App\Cqrs\AbstractQueryHandler;
use App\Repository\CartProductRepository;
use App\Repository\CartRepository;
use Symfony\Component\HttpFoundation\Response;

class AppGetCardQueryHandler extends AbstractQueryHandler
{
    private CartRepository $cartRepository;
    private CartProductRepository $cartProductRepository;

    public function __construct(CartProductRepository $cartProductRepository, CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartProductRepository = $cartProductRepository;
    }

    public function fetch(AppGetCardQuery $command,AppGetCartResource $resource): Response
    {
        $sessionId = $command->getSessionId();
        $cart = $this->cartRepository->findOneBy(['sessionId' => $sessionId]);

        $cartProducts = $cart ? $this->cartProductRepository->findBy(['cart' => $cart]) : [];
        return new Response(json_encode($resource->get($cart)));
    }
}
