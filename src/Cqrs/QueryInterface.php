<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */
namespace App\Cqrs;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

interface QueryInterface {
    //public function fetch(RequestStack $request): JsonResponse;
}