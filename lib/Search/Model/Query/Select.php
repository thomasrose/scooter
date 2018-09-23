<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Expr\Func;
use Scooter\Search\Model\AbstractModel;

class Select extends AbstractModel
{
    /**
     * @var Func
     */
    protected $where;

    /**
     * @var Select\Grouping
     */
    protected $grouping;

    public function __construct()
    {
        $this->grouping = new Select\Grouping;
    }

    public function prepare()
    {
        return [
            'where' => $this->where,
            'grouping' => $this->grouping,
        ];
    }

    /**
     * @return Func
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @param Func $func
     * @return Select
     */
    public function setWhere(Func $func = null): Select
    {
        $this->where = $func;
        return $this;
    }

    /**
     * @return Select\Grouping
     */
    public function getGrouping(): Select\Grouping
    {
        return $this->grouping;
    }

    /**
     * @param Select\Grouping $grouping
     * @return Select
     */
    public function setGrouping(Select\Grouping $grouping): Select
    {
        $this->grouping = $grouping;
        return $this;
    }
}
