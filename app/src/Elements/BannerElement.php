<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class BannerElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Text" => "Text",
        "Image" => "Bild",
    ];

    private static $table_name = 'BannerElement';
    private static $icon = 'font-icon-block-promo-3';

    private static $translate = [
        'Text',
    ];

    public function getType()
    {
        return "Banner";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
