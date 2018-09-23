<?php

namespace Scooter\Search\Model\Query\Position;

use Scooter\Search\Model\AbstractModel;

class LatLong extends AbstractModel
{
    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    protected function prepare()
    {
        if (null === $this->latitude && null === $this->longitude) {
            return null;
        }

        if (null !== $this->latitude && null !== $this->longitude) {
            return sprintf('%s;%s', $this->latitude, $this->longitude);
        }

        throw new \LogicException('Both latitude and longitude must be specified');
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return LatLong
     */
    public function setLatitude(string $latitude = null): LatLong
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return LatLong
     */
    public function setLongitude(string $longitude = null): LatLong
    {
        $this->longitude = $longitude;
        return $this;
    }
}
