<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Collapse extends AbstractModel
{
    /**
     * Use this summary class to fetch the field used for collapsing.
     * @var string
     */
    protected $summary;

    public function prepare()
    {
        return [
            'summary' => $this->summary,
        ];
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Collapse
     */
    public function setSummary(string $summary = null): Collapse
    {
        $this->summary = $summary;
        return $this;
    }
}
