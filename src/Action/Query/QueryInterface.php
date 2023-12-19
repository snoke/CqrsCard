<?php
namespace App\Action\Query;

use Symfony\Component\HttpFoundation\JsonResponse;

interface QueryInterface {
    public function fetch(array $parameters = []): JsonResponse;
}