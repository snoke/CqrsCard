<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Annotations\Annotation;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
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

    public function __construct(string $sessionId,string $parameters = '') {
        $this->sessionId = $sessionId;
        $this->executedAt = new DateTime();
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