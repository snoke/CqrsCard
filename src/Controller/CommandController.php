<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Cqrs\Command\CartSaveCommand;
use App\Cqrs\Command\CartSaveCommandHandler;
use App\Cqrs\Query\AppGetCardQuery;
use App\Cqrs\Query\AppGetCardQueryHandler;
use App\Cqrs\Query\AppGetProductsQuery;
use App\Cqrs\Query\AppGetProductsQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @Route("/command", name="cartSave")
 */
class CommandController extends AbstractController
{
    /**
     * @Route("/cartSave", name="cartSave")
     */
    public function cartSave(RequestStack $requestStack, CartSaveCommandHandler $handler): JsonResponse
    {
        return new JsonResponse($handler->execute($requestStack,
            new CartSaveCommand(
                $requestStack->getSession()->get('sessionId'),
                json_decode($requestStack->getCurrentRequest()->getContent(), true)['cart']
            )
        ));
    }
}
