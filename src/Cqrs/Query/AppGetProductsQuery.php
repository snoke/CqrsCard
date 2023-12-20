<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Query;

use App\Cqrs\AbstractQuery;
use App\Cqrs\QueryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AppGetProductsQuery extends AbstractQuery implements QueryInterface
{
    public function __construct(SessionInterface $session)
    {
        parent::__construct($session->getId());
    }

}
