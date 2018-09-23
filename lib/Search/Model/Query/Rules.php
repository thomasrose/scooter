<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Rules extends AbstractModel
{
    /**
     * @var bool
     */
    protected $off = true;

    /**
     * @var string
     */
    protected $ruleBase;

    /**
     * @var int
     */
    protected $traceLevel;

    protected function prepare()
    {
        return [
            'off' => $this->off === true ? null : $this->off,
            'rulebase' => $this->ruleBase,
            'tracelevel' => $this->traceLevel,
        ];
    }

    /**
     * @return bool
     */
    public function isOff(): bool
    {
        return $this->off;
    }

    /**
     * @param bool $off
     * @return Rules
     */
    public function setOff(bool $off): Rules
    {
        $this->off = $off;
        return $this;
    }

    /**
     * @return string
     */
    public function getRuleBase()
    {
        return $this->ruleBase;
    }

    /**
     * @param string $ruleBase
     * @return Rules
     */
    public function setRuleBase(string $ruleBase = null): Rules
    {
        $this->ruleBase = $ruleBase;
        return $this;
    }

    /**
     * @return int
     */
    public function getTraceLevel()
    {
        return $this->traceLevel;
    }

    /**
     * @param int $traceLevel
     * @return Rules
     */
    public function setTraceLevel(int $traceLevel = null): Rules
    {
        $this->traceLevel = $traceLevel;
        return $this;
    }
}
