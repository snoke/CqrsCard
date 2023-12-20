<?php
namespace App\Cqrs\Command;

use Doctrine\ORM\EntityManagerInterface;

class AbstractCommand
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

}
