<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;


class AppController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();
        if (!$session->isStarted()) {
            $session->start();
            $session->set('sessionId',$session->getId());
        }

        return $this->render('app/index.html.twig', [
            'config' => [
                'sessionId' => $session->get('sessionId'),
            ]
        ] );
    }
}
