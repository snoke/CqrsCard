<?php
namespace App\Cqrs\Command;

use App\Entity\Cart;
use App\Entity\Command;
use DateTime;

class CartSaveCommand extends Command implements CommandInterface
{
    private array $products;

    public function __construct(string $sessionId, $products) {
        parent::__construct($sessionId);
        $this->products = $products;
    }
    public function getProducts(): array
    {
        return $this->products;
    }
}
