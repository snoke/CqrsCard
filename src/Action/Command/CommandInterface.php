<?php
namespace App\Action\Command;

use Symfony\Component\HttpFoundation\RequestStack;

interface CommandInterface {
    public function execute(RequestStack $requestStack): int;
}