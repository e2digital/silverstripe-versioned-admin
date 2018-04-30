<?php

namespace SilverStripe\VersionedAdmin\Forms;

use SilverStripe\Forms\FormField;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\Requirements;

class HistoryViewerField extends FormField
{
    /**
     * Default to using the SiteTree component
     *
     * @var string
     */
    protected $schemaComponent = 'PageHistoryViewer';

    public function __construct($name, $title = null, $value = null)
    {
        Requirements::javascript('silverstripe/versioned-admin:client/dist/js/bundle.js');
        Requirements::css('silverstripe/versioned-admin:client/dist/styles/bundle.css');

        parent::__construct($name, $title, $value);
    }

    /**
     * Get the source record to view history for
     *
     * @return DataObject|null
     */
    public function getSourceRecord()
    {
        return $this->getForm() ? $this->getForm()->getRecord() : null;
    }
}