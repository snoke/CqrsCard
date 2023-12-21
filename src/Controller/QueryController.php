<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Cqrs\DTO\AppGetCartResource;
use App\Cqrs\DTO\AppGetProductsResource;
use App\Cqrs\Query\AppGetCardQuery;
use App\Cqrs\Query\AppGetCardQueryHandler;
use App\Cqrs\Query\AppGetProductsQuery;
use App\Cqrs\Query\AppGetProductsQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;


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
