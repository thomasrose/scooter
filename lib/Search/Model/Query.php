<?php

namespace Scooter\Search\Model;

use Scooter\Search\Expr\Func;

class Query extends AbstractModel
{
    /**
     * The YQL query will be parsed and executed in the backend. Only simple YQL programs are supported.
     * @var string
     */
    protected $yql;

    /**
     * Select query is equivalent with YQL, written in JSON. Contains sub-parameters where and grouping.
     * @var Query\Select
     */
    protected $select;

    /**
     * The maximum number of hits to return from the result set. Must be lower than maxHits, which is either set in a
     * query profile, or default 400.
     *
     * @var int
     */
    protected $hits;

    /**
     * The index of the first hit to return from the result set. Must be lower than maxOffset, which is either set in a
     * query profile, or default 1000.
     *
     * @var int
     */
    protected $offset;

    /**
     * @var string
     */
    protected $queryProfile;

    /**
     * @var bool
     */
    protected $noCache = false;

    /**
     * @var bool
     */
    protected $groupingSessionCache = false;

    /**
     * @var string
     */
    protected $searchChain;

    /**
     * @var string
     */
    protected $timeout;

    /**
     * @var int
     */
    protected $traceLevel;

    /**
     * @var bool
     */
    protected $traceTimestamps = false;

    /**
     * @var Query\Model
     */
    protected $model;

    /**
     * @var Query\Ranking
     */
    protected $ranking;

    /**
     * @var Query\Presentation
     */
    protected $presentation;

    /**
     * Collapse (i.e. aggregate) results using this field. Collapsing is run in the container, not content node level.
     * Define a collapsefield to remove duplicates if the corpus has few duplicates - this is more efficient than using
     * grouping. Otherwise, use grouping.
     *
     * @var string
     */
    protected $collapseField;

    /**
     * The number of hits to keep in each collapsed bucket. Default is 1
     * @var int
     */
    protected $collapseSize;

    /**
     * @var Query\Collapse
     */
    protected $collapse;

    /**
     * @var Query\Position
     */
    protected $position;

    /**
     * @var Query\Streaming
     */
    protected $streaming;

    /**
     * @var Query\Rules
     */
    protected $rules;

    /**
     * @var string
     */
    protected $recall;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var bool
     */
    protected $noCacheWrite = false;

    /**
     * @var bool
     */
    protected $hitCountEstimate = false;

    /**
     * @var bool
     */
    protected $ignoreMetrics = false;

    public function __construct()
    {
        $this->select = new Query\Select();
        $this->ranking = new Query\Ranking();
        $this->model = new Query\Model();
        $this->presentation = new Query\Presentation();
        $this->collapse = new Query\Collapse();
        $this->position = new Query\Position();
        $this->streaming = new Query\Streaming();
        $this->rules = new Query\Rules();
    }

    public function getJson()
    {
        if ('null' === $json = json_encode($this)) {
            return '{}';
        }

        return $json;
    }

    protected function prepare()
    {
        // set some null values in place of defaults
        $traceTimestamps = $this->traceTimestamps === false ? null : ['traceTimestamps' => $this->traceTimestamps];
        $ignoreMetrics = $this->ignoreMetrics === false ? null : ['ignore' => $this->ignoreMetrics];

        return [
            'yql' => $this->yql,
            'select' => $this->select,
            'hits' => $this->hits,
            'offset' => $this->offset,
            'queryprofile' => $this->queryProfile,
            'nocache' => $this->noCache ?: null,
            'groupingSessionCache' => $this->groupingSessionCache ?: null,
            'searchChain' => $this->searchChain,
            'timeout' => $this->timeout,
            'tracelevel' => $this->traceLevel,
            'trace' => $traceTimestamps,
            'model' => $this->model,
            'ranking' => $this->ranking,
            'presentation' => $this->presentation,
            'collapsefield' => $this->collapseField,
            'collapsesize' => $this->collapseSize,
            'collapse' => $this->collapse,
            'pos' => $this->position,
            'streaming' => $this->streaming,
            'rules' => $this->rules,
            'recall' => $this->recall,
            'user' => $this->user,
            'nocachewrite' => $this->noCacheWrite ?: null,
            'hitcountestimate' => $this->hitCountEstimate ?: null,
            'metrics' => $ignoreMetrics,
        ];
    }

    /**
     * @return string
     */
    public function getYql()
    {
        return $this->yql;
    }

    /**
     * @param string $yql
     * @return Query
     */
    public function setYql(string $yql = null): Query
    {
        $this->yql = $yql;
        return $this;
    }

    /**
     * @return Query\Select
     */
    public function getSelect()
    {
        return $this->select;
    }

    /**
     * @param Query\Select $select
     * @return Query
     */
    public function setSelect(Query\Select $select = null): Query
    {
        $this->select = $select;
        return $this;
    }

    /**
     * @return int
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @param int $hits
     * @return Query
     */
    public function setHits(int $hits = null): Query
    {
        $this->hits = $hits;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return Query
     */
    public function setOffset(int $offset = null): Query
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryProfile()
    {
        return $this->queryProfile;
    }

    /**
     * @param string $queryProfile
     * @return Query
     */
    public function setQueryProfile(string $queryProfile = null): Query
    {
        $this->queryProfile = $queryProfile;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNoCache(): bool
    {
        return $this->noCache;
    }

    /**
     * @param bool $noCache
     * @return Query
     */
    public function setNoCache(bool $noCache): Query
    {
        $this->noCache = $noCache;
        return $this;
    }

    /**
     * @return bool
     */
    public function isGroupingSessionCache(): bool
    {
        return $this->groupingSessionCache;
    }

    /**
     * @param bool $groupingSessionCache
     * @return Query
     */
    public function setGroupingSessionCache(bool $groupingSessionCache): Query
    {
        $this->groupingSessionCache = $groupingSessionCache;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchChain()
    {
        return $this->searchChain;
    }

    /**
     * @param string $searchChain
     * @return Query
     */
    public function setSearchChain(string $searchChain = null): Query
    {
        $this->searchChain = $searchChain;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param string $timeout
     * @return Query
     */
    public function setTimeout(string $timeout = null): Query
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return int
     */
    public function getTraceLevel()
    {
        return $this->traceLevel;
    }

    /**
     * @param int $traceLevel
     * @return Query
     */
    public function setTraceLevel(int $traceLevel = null): Query
    {
        $this->traceLevel = $traceLevel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTraceTimestamps(): bool
    {
        return $this->traceTimestamps;
    }

    /**
     * @param bool $traceTimestamps
     * @return Query
     */
    public function setTraceTimestamps(bool $traceTimestamps): Query
    {
        $this->traceTimestamps = $traceTimestamps;
        return $this;
    }

    /**
     * @return Query\Model
     */
    public function getModel(): Query\Model
    {
        return $this->model;
    }

    /**
     * @param Query\Model $model
     * @return Query
     */
    public function setModel(Query\Model $model): Query
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return Query\Ranking
     */
    public function getRanking(): Query\Ranking
    {
        return $this->ranking;
    }

    /**
     * @param Query\Ranking $ranking
     * @return Query
     */
    public function setRanking(Query\Ranking $ranking): Query
    {
        $this->ranking = $ranking;
        return $this;
    }

    /**
     * @return Query\Presentation
     */
    public function getPresentation(): Query\Presentation
    {
        return $this->presentation;
    }

    /**
     * @param Query\Presentation $presentation
     * @return Query
     */
    public function setPresentation(Query\Presentation $presentation): Query
    {
        $this->presentation = $presentation;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollapseField()
    {
        return $this->collapseField;
    }

    /**
     * @param string $collapseField
     * @return Query
     */
    public function setCollapseField(string $collapseField = null): Query
    {
        $this->collapseField = $collapseField;
        return $this;
    }

    /**
     * @return int
     */
    public function getCollapseSize()
    {
        return $this->collapseSize;
    }

    /**
     * @param int $collapseSize
     * @return Query
     */
    public function setCollapseSize(int $collapseSize = null): Query
    {
        $this->collapseSize = $collapseSize;
        return $this;
    }

    /**
     * @return Query\Collapse
     */
    public function getCollapse(): Query\Collapse
    {
        return $this->collapse;
    }

    /**
     * @param Query\Collapse $collapse
     * @return Query
     */
    public function setCollapse(Query\Collapse $collapse): Query
    {
        $this->collapse = $collapse;
        return $this;
    }

    /**
     * @return Query\Position
     */
    public function getPosition(): Query\Position
    {
        return $this->position;
    }

    /**
     * @param Query\Position $position
     * @return Query
     */
    public function setPosition(Query\Position $position): Query
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return Query\Streaming
     */
    public function getStreaming(): Query\Streaming
    {
        return $this->streaming;
    }

    /**
     * @param Query\Streaming $streaming
     * @return Query
     */
    public function setStreaming(Query\Streaming $streaming): Query
    {
        $this->streaming = $streaming;
        return $this;
    }

    /**
     * @return Query\Rules
     */
    public function getRules(): Query\Rules
    {
        return $this->rules;
    }

    /**
     * @param Query\Rules $rules
     * @return Query
     */
    public function setRules(Query\Rules $rules): Query
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecall()
    {
        return $this->recall;
    }

    /**
     * @param string $recall
     * @return Query
     */
    public function setRecall(string $recall = null): Query
    {
        $this->recall = $recall;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Query
     */
    public function setUser(string $user = null): Query
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNoCacheWrite(): bool
    {
        return $this->noCacheWrite;
    }

    /**
     * @param bool $noCacheWrite
     * @return Query
     */
    public function setNoCacheWrite(bool $noCacheWrite): Query
    {
        $this->noCacheWrite = $noCacheWrite;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHitCountEstimate(): bool
    {
        return $this->hitCountEstimate;
    }

    /**
     * @param bool $hitCountEstimate
     * @return Query
     */
    public function setHitCountEstimate(bool $hitCountEstimate): Query
    {
        $this->hitCountEstimate = $hitCountEstimate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIgnoreMetrics(): bool
    {
        return $this->ignoreMetrics;
    }

    /**
     * @param bool $ignoreMetrics
     * @return Query
     */
    public function setIgnoreMetrics(bool $ignoreMetrics): Query
    {
        $this->ignoreMetrics = $ignoreMetrics;
        return $this;
    }

    public function where(Func $func = null): Query
    {
        $this->getSelect()->setWhere($func);

        return $this;
    }
}
