<?php
namespace App\Action\Command;

use Symfony\Component\HttpFoundation\JsonResponse;

interface CommandInterface {
    public function execute(): int;
}