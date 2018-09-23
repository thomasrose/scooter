<?php

namespace Scooter\Search\Expr;

use Scooter\Search\Model\AbstractModel;

abstract class Func extends AbstractModel
{
    /**
     * @var Func[]
     */
    protected $children = [];

    /**
     * @var string[]
     */
    protected $attributes = [];

    /**
     * @var string
     */
    protected $name;

    public function __construct(...$arguments)
    {
        $this->children = $arguments;
    }

    public function setAttribute(string $attributeName, string $attributeValue)
    {
        $this->attributes[$attributeName] = $attributeValue;
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    protected function prepare()
    {
        if (null === $this->name) {
            throw new \DomainException('No name specified for function');
        }

        $this->children = array_values($this->children);

        if (0 === count($this->children)) {
            return null;
        }

        if (0 === count($this->attributes)) {
            return [$this->name => $this->children];
        }

        return [
            $this->name => [
                'children' => $this->children,
                'attributes' => $this->attributes
            ]
        ];
    }
}
