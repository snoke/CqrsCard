<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Query
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $sessionId = null;

    #[ORM\Column]
    private ?DateTime $executedAt = null;

    #[ORM\Column]
    private ?string $parameters = "";

    public function __construct(string $sessionId,string $parameters) {
        $this->sessionId = $sessionId;
        $this->parameters = $parameters;
    }
    public function getId() {
        return $this->id;
    }
    public function getParameters() {
        return $this->parameters;
    }
    public function getSessionId() {
        return $this->sessionId;
    }
    public function getExecutedAt() {
        return $this->executedAt;
    }
    public function setSessionId(string $value) {
        $this->sessionId = $value;
    }
    public function setExecutedAt(?\DateTime $value) {
        $this->executedAt = $value;
    }
}