<?php
namespace App\Action\Command;

use App\Action\AbstractAction;
use Doctrine\ORM\EntityManagerInterface;

class AbstractCommand
{

    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

}
