<?php

namespace Scooter\Search\Model\Query\Ranking;

use Scooter\Search\Model\AbstractModel;

class MatchPhase extends AbstractModel
{
    /**
     * The max hits the engine should attempt to produce in the match phase on each partition. If it is determined
     * during matching that many more hits than this will be generated, the matching will fall back to take the best
     * (highest or lowest) values of the attribute given by ranking.matchPhase.attribute.
     *
     * By default, this will be turned on only when sorting is used and grouping is not. If sorting is used, the primary
     * sort attribute will be used as the match phase attribute if it has fast-search set. In that case the default can
     * be overridden by setting this value explicitly.
     *
     * @var int
     */
    protected $maxHits;

    /**
     * The attribute to decide which documents are a match if the match phase estimates that there will be more than
     * maxHits matches. This attribute should have fast-search set and should correlate with the order which would be
     * produced by a full evaluation.
     *
     * @var string
     */
    protected $attribute = false;

    /**
     * Whether the attribute should be sorted in ascending or descending (default) order to determine which documents to keep as matches.
     *
     * @var bool
     */
    protected $ascending;

    /** @var MatchPhase\Diversity */
    protected $diversity;

    public function __construct()
    {
        $this->diversity = new MatchPhase\Diversity();
    }

    protected function prepare()
    {
        if (null === $this->maxHits && false === $this->attribute && null === $this->ascending && null === $this->diversity->jsonSerialize()) {
            return null;
        }

        return [
            'maxHits' => $this->maxHits,
            'attribute' => $this->attribute,
            'ascending' => $this->ascending,
            'diversity' => $this->diversity,
        ];
    }

    /**
     * @return int
     */
    public function getMaxHits()
    {
        return $this->maxHits;
    }

    /**
     * @param int $maxHits
     */
    public function setMaxHits(int $maxHits = null)
    {
        $this->maxHits = $maxHits;
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
     */
    public function setAttribute(string $attribute = null)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return bool
     */
    public function isAscending(): bool
    {
        return $this->ascending;
    }

    /**
     * @param bool $ascending
     */
    public function setAscending(bool $ascending)
    {
        $this->ascending = $ascending;
    }

    /**
     * @return MatchPhase\Diversity
     */
    public function getDiversity(): MatchPhase\Diversity
    {
        return $this->diversity;
    }

    /**
     * @param MatchPhase\Diversity $diversity
     */
    public function setDiversity(MatchPhase\Diversity $diversity)
    {
        $this->diversity = $diversity;
    }
}
