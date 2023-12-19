<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Action\Command\CartSaveCommand;
use App\Action\Query\AppGetProductsQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AppController extends AbstractController
{

    /**
     * @Route("/cartLoad", name="cartLoad")
     */
    public function cartLoad(Request $request, CartLoad $command): JsonResponse
    {
        $session = $request->getSession();
        $session->start();
        $sessionId = $session->getId();
        $command->execute($products,$sessionId);
        return new JsonResponse(true);
    }
    /**
     * @Route("/cartSave", name="cartSave")
     */
    public function cartSave(Request $request, CartSaveCommand $command,$products): JsonResponse
    {
        $session = $request->getSession();
        $session->start();
        $sessionId = $session->getId();
        $command->execute($products,$sessionId);
        return new JsonResponse(true);
    }

    /**
     * @Route("/appGetProducts", name="AppGetProducts")
     */
    public function appGetProducts(Request $request, AppGetProductsQuery $query): JsonResponse
    {
         return $query->fetch($request);
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->start();
        return $this->render('app/index.html.twig', [
            'session' => $session->getId(),
        ] );
    }
}
