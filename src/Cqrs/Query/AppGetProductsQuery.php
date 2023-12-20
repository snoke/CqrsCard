<?php
/*
 * Author: Stefan Sander <mail@stefan-sander.online>
 */

namespace App\Cqrs\Query;

use App\Cqrs\AbstractQuery;
use App\Cqrs\QueryInterface;

class AppGetProductsQuery extends AbstractQuery implements QueryInterface
{

    public function __construct(string $sessionId)
    {
        parent::__construct($sessionId);
    }

}
