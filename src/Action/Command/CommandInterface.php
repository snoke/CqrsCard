<?php
namespace App\Action\Command;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CommandInterface {
    public function execute(Request $request): int;
}