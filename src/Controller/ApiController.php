<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Action\Command\CartSaveCommand;
use App\Action\Query\AppGetCardQuery;
use App\Action\Query\AppGetProductsQuery;
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
    public function cartSave(RequestStack $requestStack, CartSaveCommand $command): JsonResponse
    {
        return new JsonResponse($command->execute($requestStack));
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
