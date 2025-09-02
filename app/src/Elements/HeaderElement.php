<?php

namespace App\Elements;

use Override;
use SilverStripe\Assets\Image;
use DNADesign\Elemental\Models\BaseElement;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property int $ImageID
 * @property int $Image2ID
 * @property int $Image3ID
 * @property int $PlaceholderImageID
 * @method Image Image()
 * @method Image Image2()
 * @method Image Image3()
 * @method Image PlaceholderImage()
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
        'Image2' => Image::class,
        'Image3' => Image::class,
        'PlaceholderImage' => Image::class,
    ];

    private static $owns = [
        'Image',
        'Image2',
        'Image3',
        'PlaceholderImage',
    ];

    private static $table_name = 'HeaderElement';
    private static $icon = 'font-icon-block-content';

    #[Override]
    public function getType()
    {
        return "Header";
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
