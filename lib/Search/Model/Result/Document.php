<?php

namespace Scooter\Search\Model\Result;

class Document
{
    /**
     * @var Document[]
     */
    protected $children = [];

    /**
     * @var Document\Coverage
     */
    protected $coverage;

    /**
     * @var Document\Error[]
     */
    protected $errors = [];

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var Document\Limits
     */
    protected $limits;

    /**
     * @var float
     */
    protected $relevance;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string[]
     */
    protected $types = [];

    /**
     * @var string
     */
    protected $value;

    public function __construct(array $data = null)
    {
        if ($data === null) {
            return null;
        }

        if (is_array($data['children'] ?? null)) {
            foreach ($data['children'] as $childData) {
                $this->children[] = new Document($childData);
            }
        }

        if ($data['coverage'] ?? null) {
            $this->coverage = new Document\Coverage($data['coverage']);
        }

        if (is_array($data['errors'] ?? null)) {
            foreach ($data['errors'] as $error) {
                $this->errors[] = new Document\Error($error);
            }
        }

        if (is_array($data['fields'] ?? null)) {
            $this->fields = $data['fields'];
        }

        $this->id = $data['id'] ?? null;

        $this->label = $data['label'] ?? null;

        if ($data['limits'] ?? null) {
            $this->limits = new Document\Limits($data['limits']);
        }

        $this->relevance = $data['relevance'] ?? null;

        $this->source = $data['source'] ?? null;

        if (is_array($data['types'] ?? null)) {
            $this->types = $data['types'];
        }

        $this->value = $data['value'] ?? null;
    }

    /**
     * @return Document[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @return Document\Coverage
     */
    public function getCoverage()
    {
        return $this->coverage;
    }

    /**
     * @return Document\Error[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param      $field
     * @param null $default
     * @return mixed
     */
    public function getData($field, $default = null)
    {
        return $this->fields[$field] ?? $default;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return Document\Limits
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * @return float
     */
    public function getRelevance()
    {
        return $this->relevance;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
