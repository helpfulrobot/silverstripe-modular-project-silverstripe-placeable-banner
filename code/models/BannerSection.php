<?php
/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class BannerSection extends SectionObject
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
        $fields->push(
            GridField::create(
                'Banners',
                _t('Placeable-Banner.BANNERS', 'Banners'),
                $this->Banners(),
                GridFieldConfig_RelationEditor::create()
                    ->addComponent(new GridFieldOrderableRows())
            )
        );
        $this->extend('updateCMSPageFields', $fields);
        return $fields;
    }
}
class BannerSection_Controller extends SectionObject_Controller
{
    public function init() {
        parent::init();
    }
}
class BannerSection_Preset extends SectionObject_Preset
{
    /**
     * Singular name for CMS
     * @var string
     */
    private static $singular_name = 'Rotating Banner Preset';
}
