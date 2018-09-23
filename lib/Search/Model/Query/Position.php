<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Position extends AbstractModel
{
    /**
     * Position given in latitude and longitude
     * @var Position\LatLong
     */
    protected $latLong;

    /**
     * Radius of the circle used for filtering. Valid units of measurement are km, m and mi. E.g. 100m, 42mi
     * @var string
     */
    protected $radius;

    /**
     * Bounding box for positions, given as latitude and longitude boundaries.
     * @var Position\BoundingBox
     */
    protected $boundingBox;

    /**
     * Which attribute to use for the position. Can be both single- or multi-value.
     * @var string
     */
    protected $attribute;

    public function __construct()
    {
        $this->latLong = new Position\LatLong();
        $this->boundingBox = new Position\BoundingBox();
    }

    protected function prepare()
    {
        return [
            'll' => $this->latLong,
            'radius' => $this->radius,
            'bb' => $this->boundingBox,
            'attribute' => $this->attribute,
        ];
    }
}
