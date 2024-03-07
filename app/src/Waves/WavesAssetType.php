<?php

namespace App\Waves;

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Security\Permission;

/**
 * Class \App\Database\Experience
 *
 * @property string $Title
 */
class WavesAssetType extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
    ];

    private static $default_sort = "ID DESC";

    private static $table_name = "WavesAssetType";

    private static $singular_name = "Waves Assetart";
    private static $plural_name = "Waves Assetarten";

    private static $url_segment = "wavesassettypes";

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

    public function getAssets()
    {
        $paginatedList = PaginatedList::create(WavesProduct::get()->filter(["AssetTypeID" => $this->ID]), $this->getRequest());
        return $paginatedList;
    }
}
