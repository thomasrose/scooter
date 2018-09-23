<?php

namespace Scooter\Search\Model\Result\Document;

class Coverage
{
    /**
     * @var int
     */
    protected $coverage;

    /**
     * @var int
     */
    protected $documents;

    /**
     * @var bool
     */
    protected $full;

    /**
     * @var int
     */
    protected $nodes;

    /**
     * @var int
     */
    protected $results;

    /**
     * @var int
     */
    protected $resultsFull;

    public function __construct(array $data)
    {
        $this->coverage = $data['coverage'] ?? null;
        $this->documents = $data['documents'] ?? null;
        $this->full = $data['full'] ?? null;
        $this->nodes = $data['nodes'] ?? null;
        $this->results = $data['results'] ?? null;
        $this->resultsFull = $data['resultsFull'] ?? null;
    }

    /**
     * @return int
     */
    public function getCoverage(): int
    {
        return $this->coverage;
    }

    /**
     * @return int
     */
    public function getDocuments(): int
    {
        return $this->documents;
    }

    /**
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->full;
    }

    /**
     * @return int
     */
    public function getNodes(): int
    {
        return $this->nodes;
    }

    /**
     * @return int
     */
    public function getResults(): int
    {
        return $this->results;
    }

    /**
     * @return int
     */
    public function getResultsFull(): int
    {
        return $this->resultsFull;
    }
}
