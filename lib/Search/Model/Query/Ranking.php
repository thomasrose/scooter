<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Ranking extends AbstractModel
{
    /**
     * @var Position
     */
    protected $location;

    /**
     * @var array
     */
    protected $features = [];

    /**
     * @var bool
     */
    protected $listFeatures = false;

    /**
     * @var string
     */
    protected $profile;

    /**
     * @var array
     */
    protected $properties = [];

    /**
     * @var string
     */
    protected $sorting;

    /**
     * @var \DateTime
     */
    protected $freshness;

    /**
     * @var bool
     */
    protected $queryCache;

    /**
     * @var Ranking\MatchPhase
     */
    protected $matchPhase;

    public function prepare()
    {
        return [
            'location' => $this->location,
            'features' => $this->features ?: null,
            'listFeatures' => $this->listFeatures ?: null,
            'profile' => $this->profile,
            'sorting' => $this->sorting,
            'freshness' => $this->freshness ? $this->freshness->getTimestamp() : null,
            'queryCache' => $this->queryCache,
            'matchPhase' => $this->matchPhase,
        ];
    }

    public function setFeature($featureName, $value): Ranking
    {
        $this->features[$featureName] = $value;

        return $this;
    }

    public function setProperty($propertyName, $value): Ranking
    {
        $this->properties[$propertyName] = $value;

        return $this;
    }

    public function removeFeature($featureName): Ranking
    {
        unset($this->features[$featureName]);
    }

    public function removeProperty($propertyName): Ranking
    {
        unset($this->properties[$propertyName]);
    }

    /**
     * @return Position
     */
    public function getLocation(): Position
    {
        return $this->location;
    }

    /**
     * @param Position $location
     * @return Ranking
     */
    public function setLocation(Position $location): Ranking
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return array
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param array $features
     * @return Ranking
     */
    public function setFeatures(array $features): Ranking
    {
        $this->features = $features;
        return $this;
    }

    /**
     * @return bool
     */
    public function isListFeatures(): bool
    {
        return $this->listFeatures;
    }

    /**
     * @param bool $listFeatures
     * @return Ranking
     */
    public function setListFeatures(bool $listFeatures): Ranking
    {
        $this->listFeatures = $listFeatures;
        return $this;
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     * @return Ranking
     */
    public function setProfile(string $profile = null): Ranking
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     * @return Ranking
     */
    public function setProperties(array $properties): Ranking
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @return string
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param string $sorting
     * @return Ranking
     */
    public function setSorting(string $sorting = null): Ranking
    {
        $this->sorting = $sorting;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFreshness()
    {
        return $this->freshness;
    }

    /**
     * @param \DateTime $freshness
     * @return Ranking
     */
    public function setFreshness(\DateTime $freshness = null): Ranking
    {
        $this->freshness = $freshness;
        return $this;
    }

    /**
     * @return bool
     */
    public function isQueryCache(): bool
    {
        return $this->queryCache;
    }

    /**
     * @param bool $queryCache
     * @return Ranking
     */
    public function setQueryCache(bool $queryCache): Ranking
    {
        $this->queryCache = $queryCache;
        return $this;
    }

    /**
     * @return Ranking\MatchPhase
     */
    public function getMatchPhase()
    {
        return $this->matchPhase;
    }

    /**
     * @param Ranking\MatchPhase $matchPhase
     * @return Ranking
     */
    public function setMatchPhase(Ranking\MatchPhase $matchPhase = null): Ranking
    {
        $this->matchPhase = $matchPhase;
        return $this;
    }
}
