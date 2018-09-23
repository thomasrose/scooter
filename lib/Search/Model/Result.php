<?php

namespace Scooter\Search\Model;

class Result
{
    /** @var Result\Document */
    protected $rootDocument;

    /** @var Result\Trace */
    protected $trace;

    /**
     * Result constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->rootDocument = new Result\Document($data['root'] ?? null);
        $this->trace = new Result\Trace($data['trace'] ?? null);
    }

    /**
     * @return Result\Trace
     */
    public function getTrace()
    {
        return $this->trace;
    }

    /**
     * @return Result\Document
     */
    public function getRootDocument()
    {
        return $this->rootDocument;
    }
}
