<?php
namespace App\Cqrs;

use Doctrine\ORM\EntityManagerInterface;

class AbstractCommandHandler
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

}
