<?php
namespace App\Action\Command;

use App\Action\AbstractAction;
use App\Entity\Cart;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AbstractCommand extends AbstractAction
{
    protected EntityManagerInterface $entityManager;

    public function __construct(Request $request, EntityManagerInterface $entityManager) {

        parent::__construct($request);

        $this->entityManager = $entityManager;
    }

}
