<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Cqrs\Command\CartSaveCommand;
use App\Cqrs\Command\CartSaveCommandHandler;
use App\Cqrs\Query\AppGetCardQuery;
use App\Cqrs\Query\AppGetProductsQuery;
use App\Repository\CartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;


/**
 * @Route("/api", name="cartSave")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/cartSave", name="cartSave")
     */
    public function cartSave(RequestStack $requestStack, CartSaveCommandHandler $handler, CartRepository $cartRepository): JsonResponse
    {
        $sessionId = $requestStack->getSession()->get('sessionId');
        $command = new CartSaveCommand($sessionId,json_decode($requestStack->getCurrentRequest()->getContent(),true)['cart']);

        return new JsonResponse($handler->execute($requestStack,$command));
    }

    /**
     * @Route("/appGetProducts", name="AppGetProducts")
     */
    public function appGetProducts(RequestStack $requestStack, AppGetProductsQuery $query): Response
    {
         return $query->fetch($requestStack);
    }

    /**
     * @Route("/appGetCard", name="appGetCard")
     */
    public function appGetCard(RequestStack $requestStack, AppGetCardQuery $query): JsonResponse
    {
        return $query->fetch($requestStack);
    }
}
