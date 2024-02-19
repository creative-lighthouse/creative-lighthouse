<?php

namespace App\Waves;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Database\Experience
 *
 * @property string $Title
 * @property int $AssetTypeID
 * @method \App\Waves\WavesAssetType AssetType()
 */
class WavesCategory extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
    ];

    private static $has_one = [
        "AssetType" => WavesAssetType::class,
    ];

    private static $default_sort = "ID DESC";

    private static $table_name = "WavesCategory";

    private static $singular_name = "Waves Kategorie";
    private static $plural_name = "Waves Kategorien";

    private static $url_segment = "wavescategories";

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
