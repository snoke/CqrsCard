<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Action\Query\AppGetProductsQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController extends AbstractController
{
    /**
     * @Route("/appGetProducts", name="AppGetProducts")
     */
    public function appGetProducts(AppGetProductsQuery $query): JsonResponse
    {
         return $query->fetch();
    }

    /**
     * @Route("/", name="index")
     */
    public function index($client="web",$route=null): Response
    {
        var_dump($_SESSION);
        die;
        return $this->render('app/index.html.twig', );
    }
}
