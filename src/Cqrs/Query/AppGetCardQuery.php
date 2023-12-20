<?php
namespace App\Cqrs\Query;

class AppGetCardQuery
{
    private string $sessionId;

    public function __construct(string $sessionId) {
        $this->sessionId = $sessionId;
    }

    public function getSessionId() {
        return $this->sessionId;
    }

}
