<?php

namespace Scooter\Search\Model\Query\Select;

use Scooter\Search\Expr\Func;
use Scooter\Search\Model\AbstractModel;

class Where extends AbstractModel
{
    /** @var Func */
    protected $func;

    public function __construct(Func $func = null)
    {
        $this->func = $func;
    }

    protected function prepare()
    {
        if (null === $this->func) {
            return null;
        }

        return $this->func;
    }
}
