<?php

namespace Scooter\Search\Model\Result\Document;

class Error
{
    /**
     * @var int
     */
    protected $code;

    /**
     * @var string|null
     */
    protected $message;

    /**
     * @var string|null
     */
    protected $source;

    /**
     * @var string|null
     */
    protected $stackTrace;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var bool|null
     */
    protected $transient;

    public function __construct(array $data)
    {
        $this->code = $data['code'];
        $this->summary = $data['summary'];

        $this->message = $data['message'] ?? null;
        $this->source = $data['source'] ?? null;
        $this->stackTrace = $data['stackTrace'] ?? null;
        $this->transient = $data['transient'] ?? null;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return null|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return null|string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return null|string
     */
    public function getStackTrace()
    {
        return $this->stackTrace;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @return bool|null
     */
    public function getTransient()
    {
        return $this->transient;
    }
}
