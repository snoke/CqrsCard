<?php
namespace App\Action\Query;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface QueryInterface {
    public function fetch(Request $request): JsonResponse;
}