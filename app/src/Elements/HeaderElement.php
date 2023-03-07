<?php

namespace App\Elements;

use SilverStripe\Assets\Image;
use DNADesign\Elemental\Models\BaseElement;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class HeaderElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
    ];

    private static $field_labels = [
        "Text" => "Text"
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $table_name = 'HeaderElement';
    private static $icon = 'font-icon-block-content';

    public function getType()
    {
        return "Header";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
