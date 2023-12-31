<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Entity;

use App\Repository\CommandRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Annotations\Annotation;

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
    private ?string $name = "";

    #[ORM\Column]
    private ?string $parameters = "";
    #[ORM\Column]
    private ?DateTime $executedAt = null;


    public function __construct(string $name,string $sessionId,string $parameters = '') {
        $this->name = $name;
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