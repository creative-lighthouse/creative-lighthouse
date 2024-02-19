<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @method \SilverStripe\ORM\DataList|\App\Elements\TeaserItem[] Teasers()
 */
class TeaserElement extends BaseElement
{

    private static $db = [
    ];

    private static $has_many = [
        "Teasers" => TeaserItem::class,
    ];

    private static $owns = [
    ];

    private static $field_labels = [
    ];

    private static $inline_editable = false;

    private static $table_name = 'TeaserElement';
    private static $icon = 'font-icon-block-promo-3';

    private static $translate = [
        '',
    ];

    public function getType()
    {
        return "Teasers";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
