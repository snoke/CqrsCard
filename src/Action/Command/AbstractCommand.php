<?php
namespace App\Action\Command;

use App\Action\AbstractAction;
use App\Entity\Cart;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AbstractCommand
{
    protected $session;

    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->session = $request->getSession();
        $this->session->start();
        $this->entityManager = $entityManager;
    }

}
