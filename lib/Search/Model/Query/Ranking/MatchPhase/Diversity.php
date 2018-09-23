<?php

namespace Scooter\Search\Model\Query\Ranking\MatchPhase;

use Scooter\Search\Model\AbstractModel;

class Diversity extends AbstractModel
{
    /**
     * The attribute to be used for producing the desired diversity.
     * @var string
     */
    protected $attribute;

    /**
     * The minimum number of groups that should be returned from the match phase grouped by the diversity attribute.
     * @var int
     */
    protected $minGroups;

    protected function prepare()
    {
        return [
            'attribute' => $this->attribute,
            'minGroups' => $this->minGroups,
        ];
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param string $attribute
     * @return Diversity
     */
    public function setAttribute(string $attribute = null): Diversity
    {
        $this->attribute = $attribute;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinGroups()
    {
        return $this->minGroups;
    }

    /**
     * @param int $minGroups
     * @return Diversity
     */
    public function setMinGroups(int $minGroups = null): Diversity
    {
        $this->minGroups = $minGroups;
        return $this;
    }
}
