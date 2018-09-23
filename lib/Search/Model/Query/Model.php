<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Model extends AbstractModel
{
    const TYPE_WEB = 'web';
    const TYPE_ALL = 'all';
    const TYPE_ANY = 'any';
    const TYPE_PHRASE = 'phrase';
    const TYPE_YQL = 'yql';

    /** @var string */
    protected $defaultIndex;

    /** @var string */
    protected $encoding;

    /** @var string */
    protected $filter;

    /** @var string */
    protected $language;

    /** @var string */
    protected $queryString;

    /** @var string[] */
    protected $restrict = [];

    /** @var string */
    protected $searchPath;

    /** @var string[] */
    protected $sources = [];

    /** @var string */
    protected $type;

    protected function prepare()
    {
        return [
            'defaultIndex' => $this->defaultIndex,
            'encoding' => $this->encoding,
            'filter' => $this->language,
            'queryString' => $this->queryString,
            'restrict' => $this->restrict ? implode(',', $this->restrict) : null,
            'searchPath' => $this->searchPath,
            'sources' => $this->sources ? implode(',', $this->sources) : null,
            'type' => $this->type,
        ];
    }

    /**
     * @return string
     */
    public function getDefaultIndex()
    {
        return $this->defaultIndex;
    }

    /**
     * @param string $defaultIndex
     * @return Model
     */
    public function setDefaultIndex(string $defaultIndex = null): Model
    {
        $this->defaultIndex = $defaultIndex;
        return $this;
    }

    /**
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     * @return Model
     */
    public function setEncoding(string $encoding = null): Model
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param string $filter
     * @return Model
     */
    public function setFilter(string $filter = null): Model
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Model
     */
    public function setLanguage(string $language = null): Model
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * @param string $queryString
     * @return Model
     */
    public function setQueryString(string $queryString = null): Model
    {
        $this->queryString = $queryString;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getRestrict(): array
    {
        return $this->restrict;
    }

    /**
     * @param string[] $restrict
     * @return Model
     */
    public function setRestrict(array $restrict): Model
    {
        $this->restrict = $restrict;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchPath()
    {
        return $this->searchPath;
    }

    /**
     * @param string $searchPath
     * @return Model
     */
    public function setSearchPath(string $searchPath = null): Model
    {
        $this->searchPath = $searchPath;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @param string[] $sources
     * @return Model
     */
    public function setSources(array $sources): Model
    {
        $this->sources = $sources;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Model
     */
    public function setType(string $type = null): Model
    {
        $this->type = $type;
        return $this;
    }
}
