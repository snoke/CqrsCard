<?php
namespace App\Cqrs;

use Doctrine\ORM\EntityManagerInterface;

class AbstractCommand
{
    protected string $sessionId;

    public function __construct(string $sessionId) {
        $this->sessionId = $sessionId;
    }
    public function getSessionId() {
        return $this->sessionId;
    }
}
