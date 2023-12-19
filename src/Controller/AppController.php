<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function test($client="web",$route=null): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'ApptestController',
        ]);
    }

    /**
     * @Route("/", name="index")
     */
    public function index($client="web",$route=null): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'config' => [
                'websocket_url' => $_ENV['WEBSOCKET_URL'],
                'client' => $client,
            ]
        ]);
    }
}
