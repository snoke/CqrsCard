<?php
namespace App\Cqrs\Command;

use App\Entity\Command;
use App\Cqrs\CommandInterface;

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
