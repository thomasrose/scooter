<?php

namespace Scooter\Search\Model\Result;

class Trace
{
    /**
     * @var Trace[]
     */
    protected $children = [];

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $message;

    public function __construct(array $data = null)
    {
        if ($data === null) {
            return null;
        }

        if (is_array($data['children'] ?? null)) {
            foreach ($data['children'] as $childData) {
                $this->children[] = new Trace($childData);
            }
        }

        $this->timestamp = $data['timestamp'] ?? null;
        $this->message = isset($data['message']) ? trim($data['message']) : null;
    }

    /**
     * @return Trace[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param int    $indent
     */
    public function getFullMessage($indent = 0)
    {
        if (empty(trim($this->message))) {
            $message = null;
        } else {
            $message = str_pad(' ', $indent).$this->message.PHP_EOL;
        }

        foreach ($this->children as $child) {
            $message .= $child->getFullMessage($indent + 4);
        }

        return $message;
    }
}
