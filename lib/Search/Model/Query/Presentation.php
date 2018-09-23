<?php

namespace Scooter\Search\Model\Query;

use Scooter\Search\Model\AbstractModel;

class Presentation extends AbstractModel
{
    const FORMAT_DEFAULT = 'default';
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';
    const FORMAT_PAGE = 'page';

    /**
     * Whether or not to bold search terms in search definition fields defined with bolding: on or summary: dynamic.
     * @var bool
     */
    protected $bolding = true;

    /**
     * Format in which to return results. Can be custom result renderer supplied by the application.
     * @var string
     */
    protected $format;

    /**
     * The name of the summary class used to select fields in results
     * @var string
     */
    protected $summary;

    /**
     * The id of the page template to use for this result. This should be used with the page result format.
     * @var string
     */
    protected $template;

    /**
     * Whether a result renderer should try to add optional timing information to the rendered page.
     * @var bool
     */
    protected $timing = false;

    protected function prepare()
    {
        return [
            'bolding' => $this->bolding === true ? null : $this->bolding,
            'format' => $this->format,
            'summary' => $this->summary,
            'template' => $this->template
        ];
    }

    /**
     * @return bool
     */
    public function isBolding(): bool
    {
        return $this->bolding;
    }

    /**
     * @param bool $bolding
     * @return Presentation
     */
    public function setBolding(bool $bolding): Presentation
    {
        $this->bolding = $bolding;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Presentation
     */
    public function setFormat(string $format = null): Presentation
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Presentation
     */
    public function setSummary(string $summary = null): Presentation
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return Presentation
     */
    public function setTemplate(string $template = null): Presentation
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTiming(): bool
    {
        return $this->timing;
    }

    /**
     * @param bool $timing
     */
    public function setTiming(bool $timing)
    {
        $this->timing = $timing;
    }
}
