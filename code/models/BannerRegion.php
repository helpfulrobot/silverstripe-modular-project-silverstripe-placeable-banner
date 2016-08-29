<?php
/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class BannerRegion extends RegionObject
{
    /**
     * Singular name for CMS
     * @var string
     */
    private static $singular_name = 'Rotating Banner';

    /**
     * Define the default values for all the $db fields
     * @var array
     */
    private static $defaults = array(
        'Title' => 'Rotating Banner'
    );

    /**
     * Many_many relationship
     * @var array
     */
    private static $many_many = array(
        'Banners' => 'PlaceableBanner',
    );

    /**
     * {@inheritdoc }
     * @var array
     */
    private static $many_many_extraFields = array(
        'Banners' => array(
            'Sort' => 'Int'
        )
    );

    /**
     * CMS Page Fields
     * @return FieldList
     */
    public function getCMSPageFields()
    {
        $fields = parent::getCMSPageFields();
        $fields->addFields(
            array(
                GridField::create(
                    'Banners',
                    _t('BannerRegion.BANNERS', 'Banners'),
                    $this->Banners(),
                    GridFieldConfig_RelationEditor::create()
                        ->addComponent(new GridFieldOrderableRows())
                )
            )
        );
        $this->extend('updateCMSPageFields', $fields);
        return $fields;
    }
}
class BannerRegion_Controller extends RegionObject_Controller
{
    public function init() {
        parent::init();
    }
}
class BannerRegion_Preset extends RegionObject_Preset
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'FilePath' => 'Text'
    );

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create(
                'FilePath',
                'FilePath'
            )
        );
        return $fields;
    }
}
