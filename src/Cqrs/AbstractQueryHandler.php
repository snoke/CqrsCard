<?php
namespace App\Cqrs;

use Doctrine\ORM\EntityManagerInterface;

class AbstractQueryHandler
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

}
