<?php

namespace App\Waves;

use SilverStripe\AssetAdmin\Forms\UploadField;
use ZipArchive;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Security\Permission;
use SilverStripe\Forms\CheckboxSetField;

/**
 * Class \App\Database\Experience
 *
 * @property string $Title
 * @property int $AssetTypeID
 * @property int $AmbientOcclusionTextureID
 * @property int $DiffuseTextureID
 * @property int $DisplacementTextureID
 * @property int $NormalTextureID
 * @property int $SpecularTextureID
 * @method \App\Waves\WavesAssetType AssetType()
 * @method \SilverStripe\Assets\Image AmbientOcclusionTexture()
 * @method \SilverStripe\Assets\Image DiffuseTexture()
 * @method \SilverStripe\Assets\Image DisplacementTexture()
 * @method \SilverStripe\Assets\Image NormalTexture()
 * @method \SilverStripe\Assets\Image SpecularTexture()
 * @method \SilverStripe\ORM\ManyManyList|\App\Waves\WavesCategory[] Categories()
 */
class WavesProduct extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
    ];

    private static $has_one = [
        "AssetType" => WavesAssetType::class,
        "AmbientOcclusionTexture" => Image::class,
        "DiffuseTexture" => Image::class,
        "DisplacementTexture" => Image::class,
        "NormalTexture" => Image::class,
        "SpecularTexture" => Image::class,
    ];

    private static $owns = [
        "AmbientOcclusionTexture",
        "DiffuseTexture",
        "DisplacementTexture",
        "NormalTexture",
        "SpecularTexture",
    ];

    private static $many_many = [
        "Categories" => WavesCategory::class,
    ];

    private static $default_sort = "ID DESC";

    private static $table_name = "WavesProduct";

    private static $singular_name = "Waves Produkt";
    private static $plural_name = "Waves Produkte";

    private static $url_segment = "wavesproducts";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Categories");
        $fields->removeByName("Categories");
        $category_map = [];
        if ($categories = WavesCategory::get()->filter(["AssetTypeID" => $this->AssetTypeID])) {
            $category_map = $categories->map();
        }
        $fields->addFieldToTab("Root.Main", new CheckboxSetField("Categories", "Kategorien", $category_map));
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

    public function getDownloadLink()
    {

    }
}
