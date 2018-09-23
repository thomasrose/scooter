<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Streaming extends AbstractModel
{
    /**
     * Restricts streaming search to only stream through documents with document ids having the n=<number> modifier and
     * the userid part matches the supplied value. This can be used for grouping documents on a 64 bit integer.
     *
     * @var int
     */
    protected $userId;

    /**
     * Restricts streaming search to only stream through documents with document ids having the g=<groupname> modifier
     * and the groupname part matches the supplied value. This can be used for grouping documents on a string.
     *
     * @var string
     */
    protected $groupName;

    /**
     * Restricts streaming search using a document selection. This can be used for selecting a subset of documents based
     * on an advanced expression.
     *
     * @var string
     */
    protected $selection;

    /**
     * Priority of the streaming search visitor. Having a high priority visitor helps maintain low latencies even when
     * the system is under load.
     *
     * @var string
     */
    protected $priority;

    /**
     * If set, visit only this many buckets at a time. Combine with ordering to reduce visiting time for large
     * users/groups.
     *
     * @var int
     */
    protected $maxBucketsPerVisitor;

    protected function prepare()
    {
        return [
            'userid' => $this->userId,
            'groupname' => $this->groupName,
            'selection' => $this->selection,
            'priority' => $this->priority,
            'maxbucketspervisitor' => $this->maxBucketsPerVisitor,
        ];
    }
}
