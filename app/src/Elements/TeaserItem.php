<?php

namespace App\Elements;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Database\Experience
 *
 * @property string $Title
 * @property string $Content
 * @property string $Link
 * @property int $SortOrder
 * @property int $ImageID
 * @property int $ParentID
 * @method \SilverStripe\Assets\Image Image()
 * @method \App\Elements\TeaserElement Parent()
 */
class TeaserItem extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Content" => "HTMLText",
        "Link" => "Varchar(255)",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Image" => Image::class,
        "Parent" => TeaserElement::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $default_sort = "SortOrder ASC, ID";

    private static $table_name = "TeaserItem";

    private static $singular_name = "Teaser";
    private static $plural_name = "Teasers";

    private static $url_segment = "teaser";

    private static $translate = [
        'Title',
        'Content',
        'Link',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canCreate($member = null, $context = [])
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }
}
