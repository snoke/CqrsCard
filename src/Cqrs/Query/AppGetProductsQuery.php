<?php
namespace App\Cqrs\Query;

use App\Entity\Query;
use App\Cqrs\QueryInterface;
use App\Repository\ProductRepository;
use App\Resources\AppGetProductsResource;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;

class AppGetProductsQuery
{
    private string $sessionId;

    public function __construct(string $sessionId) {
        $this->sessionId = $sessionId;
    }

    public function getSessionId() {
        return $this->sessionId;
    }

}
