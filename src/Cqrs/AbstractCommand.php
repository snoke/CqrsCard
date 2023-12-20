<?php
namespace App\Cqrs\Command;

use App\Cqrs\AbstractAction;
use Doctrine\ORM\EntityManagerInterface;
use DigitalCraftsman\CQRS\Command\Command;

class AbstractCommand implements Command
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

}
