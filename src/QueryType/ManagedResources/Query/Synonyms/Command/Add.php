<?php


namespace Solarium\QueryType\ManagedResources\Query\Synonyms\Command;


use Solarium\Core\Client\Request;
use Solarium\QueryType\ManagedResources\Query\Synonyms;
use Solarium\QueryType\ManagedResources\Query\Synonyms\Synonyms as SynonymsData;

class Add extends AbstractCommand
{
    /**
     * Synonyms to add.
     *
     * @var SynonymsData
     */
    protected $synonyms;

    /**
     * Returns command type, for use in adapters.
     *
     * @return string
     */
    public function getType()
    {
        return Synonyms::COMMAND_ADD;
    }

    /**
     * Returns request method.
     *
     * @return string
     */
    public function getRequestMethod()
    {
        return Request::METHOD_PUT;
    }

    /**
     * @return SynonymsData
     */
    public function getSynonyms(): SynonymsData
    {
        return $this->synonyms;
    }

    /**
     * Set synonyms.
     *
     * @param SynonymsData $synonyms
     */
    public function setSynonyms(SynonymsData $synonyms)
    {
        $this->synonyms = $synonyms;
    }

    /**
     * Returns the raw data to be sent to Solr.
     */
    public function getRawData(): string
    {
        if($this->getSynonyms() !== null && !empty($this->getSynonyms()->getSynonyms()))
        {
            if(strlen(trim($this->getSynonyms()->getTerm())) != 0) {
                return json_encode(array($this->getSynonyms()->getTerm() => $this->getSynonyms()->getSynonyms()));
            }

            return json_encode($this->getSynonyms()->getSynonyms());
        }

        return '';
    }

    /**
     * Empty.
     *
     * @return string
     */
    public function getTerm(): string
    {
        return '';
    }
}