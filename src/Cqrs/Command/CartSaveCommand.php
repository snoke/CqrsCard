<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Command;

use App\Cqrs\AbstractCommand;
use App\Cqrs\CommandInterface;

class CartSaveCommand extends AbstractCommand implements CommandInterface
{
    private array $products;

    public function __construct(string $sessionId, $products)
    {
        parent::__construct($sessionId);
        $this->products = $products;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
