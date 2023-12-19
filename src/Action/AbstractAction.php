<?php
namespace App\Action;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractAction
{
    protected $session;

    public function __construct(Request $request) {
        $this->session = $request->getSession();
        $this->session->start();
    }
}
