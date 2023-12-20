<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use App\Entity\Product;
use App\Action\Command\CartSaveCommand;
use App\Action\Query\AppGetCardQuery;
use App\Action\Query\AppGetProductsQuery;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AppController extends AbstractController
{

    /**
     * @Route("/cartSave", name="cartSave")
     */
    public function cartSave(Request $request, CartSaveCommand $command): JsonResponse
    {
        $command->execute($request);
        return new JsonResponse(true);
    }

    /**
     * @Route("/migrate", name="migrate")
     */
    public function migrate(Request $request,EntityManagerInterface $em): JsonResponse
    {
        $product = new Product();
        $product->setName('test');
        $product->setPrice(2.22);
        $em->persist($product);$em->flush();

        $product = new Product();
        $product->setName('test2');
        $product->setPrice(2.23);
        $em->persist($product);$em->flush();

        return true;
    }
    /**
     * @Route("/appGetProducts", name="AppGetProducts")
     */
    public function appGetProducts(Request $request, AppGetProductsQuery $query): Response
    {
         return $query->fetch($request);
    }

    /**
     * @Route("/cartLoad", name="cartLoad")
     */
    public function appGetCard(Request $request, AppGetCardQuery $query): JsonResponse
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
            'config' => [
                'session' => $session->getId(),
            ]
        ] );
    }
}
