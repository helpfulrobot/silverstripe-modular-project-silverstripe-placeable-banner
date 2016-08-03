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
        'Button' => 'Link',
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
                TextField::create('Title'),
                TextareaField::create('Content'),
                LinkField::create(
                    'ButtonID',
                    'Button'
                )
            )
        );
        $this->extend('updateCMSFields', $fields);
        return $fields;
    }
}
