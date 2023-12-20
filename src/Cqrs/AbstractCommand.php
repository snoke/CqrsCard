<?php
namespace App\Cqrs;

use Doctrine\ORM\EntityManagerInterface;

class AbstractCommand
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

}
