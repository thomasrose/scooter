<?php

namespace Scooter\Search\Model\Query\Position;

use Scooter\Search\Model\AbstractModel;

class BoundingBox extends AbstractModel
{
    /**
     * @var string
     */
    protected $north;

    /**
     * @var string
     */
    protected $south;

    /**
     * @var string
     */
    protected $east;

    /**
     * @var string
     */
    protected $west;

    protected function prepare()
    {
        if (null === $this->north && null === $this->south && null === $this->east && null === $this->west) {
            return null;
        }

        if (null !== $this->north && null !== $this->south && null !== $this->east && null !== $this->west) {
            return sprintf('n=%s,s=%s,e=%s,w=%s', $this->north, $this->south, $this->east, $this->west);
        }

        throw new \LogicException('All points of bounding box (N, S, E, W) must be specified');
    }

    /**
     * @return string
     */
    public function getNorth()
    {
        return $this->north;
    }

    /**
     * @param string $north
     * @return BoundingBox
     */
    public function setNorth(string $north = null): BoundingBox
    {
        $this->north = $north;
        return $this;
    }

    /**
     * @return string
     */
    public function getSouth()
    {
        return $this->south;
    }

    /**
     * @param string $south
     * @return BoundingBox
     */
    public function setSouth(string $south = null): BoundingBox
    {
        $this->south = $south;
        return $this;
    }

    /**
     * @return string
     */
    public function getEast()
    {
        return $this->east;
    }

    /**
     * @param string $east
     * @return BoundingBox
     */
    public function setEast(string $east = null): BoundingBox
    {
        $this->east = $east;
        return $this;
    }

    /**
     * @return string
     */
    public function getWest()
    {
        return $this->west;
    }

    /**
     * @param string $west
     * @return BoundingBox
     */
    public function setWest(string $west = null): BoundingBox
    {
        $this->west = $west;
        return $this;
    }
}
