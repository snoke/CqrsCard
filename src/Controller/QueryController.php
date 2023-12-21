<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Cqrs\Query\AppGetCardQuery;
use App\Cqrs\Query\AppGetCardQueryHandler;
use App\Cqrs\Query\AppGetCartResource;
use App\Cqrs\Query\AppGetProductsQuery;
use App\Cqrs\Query\AppGetProductsQueryHandler;
use App\Cqrs\Query\AppGetProductsResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/query", name="cartSave")
 */
class QueryController extends AbstractController
{
    /**
     * @Route("/appGetProducts", name="AppGetProducts")
     */
    public function appGetProducts(RequestStack $requestStack, AppGetProductsQueryHandler $handler,AppGetProductsResource $resource): Response
    {
        return $handler->fetch(new AppGetProductsQuery($requestStack->getSession()),$resource);
    }

    /**
     * @Route("/appGetCard", name="appGetCard")
     */
    public function appGetCard(RequestStack $requestStack, AppGetCardQueryHandler $handler,AppGetCartResource $resource): Response
    {
        return $handler->fetch(new AppGetCardQuery($requestStack->getSession()),$resource);
    }
}
