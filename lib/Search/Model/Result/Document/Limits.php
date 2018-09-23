<?php

namespace Scooter\Search\Model\Result\Document;

class Limits
{
    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $to;

    public function __construct(array $data)
    {
        $this->from = $data['from'] ?? null;
        $this->to = $data['to'] ?? null;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }
}
