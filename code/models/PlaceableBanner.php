<?php
/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class PlaceableBanner extends DataObject
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'Title' => 'Text',
        'Content' => 'Text'
    );

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = array(
        'Background' => 'Image',
        'Button' => 'Link'
    );

    /**
     * Defines summary fields commonly used in table columns
     * as a quick overview of the data for this dataobject
     * @var array
     */
    private static $summary_fields = array(
        'Background.CMSThumbnail' => 'Background',
        'Title' => 'Title'
    );

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            array(
                TextField::create(
                    'Title',
                    _t('PlaceableBanner.TITLE', 'Title')
                ),
                TextareaField::create(
                    'Content',
                    _t('PlaceableBanner.CONTENT', 'Content')
                ),
                UploadField::create(
                    'Background',
                    _t('PlaceableBanner.BACKGROUND', 'Background')
                ),
                LinkField::create(
                    'ButtonID',
                    _t('PlaceableBanner.BUTTON', 'Button')
                )
            )
        );
        $this->extend('updateCMSFields', $fields);
        return $fields;
    }
}
