<?php
namespace App\Action\Command;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CommandInterface {
    public function execute(RequestStack $requestStack): int;
}