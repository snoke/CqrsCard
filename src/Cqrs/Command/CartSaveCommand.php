<?php
namespace App\Cqrs\Command;

use App\Entity\Cart;
use App\Entity\Command;
use App\Repository\CommandRepository;
use DateTime;
use App\Cqrs\CommandInterface;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class CartSaveCommand extends Command implements CommandInterface
{
    private array $products;

    public function __construct(string $sessionId, $products) {
        parent::__construct($sessionId,json_encode($products));
        $this->products = $products;
    }
    public function getProducts(): array
    {
        return $this->products;
    }
}
