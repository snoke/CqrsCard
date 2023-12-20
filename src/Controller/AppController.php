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
use Symfony\Component\HttpFoundation\RequestStack;


class AppController extends AbstractController
{

    /**
     * @Route("/cartSave", name="cartSave")
     */
    public function cartSave(RequestStack $requestStack, CartSaveCommand $command): JsonResponse
    {
        $command->execute($requestStack);
        return new JsonResponse(true);
    }

    /**
     * @Route("/migrate", name="migrate")
     */
    public function migrate(EntityManagerInterface $em): JsonResponse
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
    /**
     * @Route("/", name="index")
     */
    public function index(RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();
        $session->start();
        var_dump($session->getId());die;

        return $this->render('app/index.html.twig', [
            'config' => [
                'session' => $session->getId(),
            ]
        ] );
    }
}
