<?php

namespace App\Waves;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
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
 * @property string $Description
 * @property int $AssetTypeID
 * @property int $AmbientOcclusionTextureID
 * @property int $AmbientOcclusionPNGTextureID
 * @property int $DiffuseTextureID
 * @property int $DisplacementTextureID
 * @property int $DisplacementPNGTextureID
 * @property int $NormalTextureID
 * @property int $SpecularTextureID
 * @method \App\Waves\WavesAssetType AssetType()
 * @method \SilverStripe\Assets\File AmbientOcclusionTexture()
 * @method \SilverStripe\Assets\File AmbientOcclusionPNGTexture()
 * @method \SilverStripe\Assets\File DiffuseTexture()
 * @method \SilverStripe\Assets\File DisplacementTexture()
 * @method \SilverStripe\Assets\File DisplacementPNGTexture()
 * @method \SilverStripe\Assets\File NormalTexture()
 * @method \SilverStripe\Assets\File SpecularTexture()
 * @method \SilverStripe\ORM\ManyManyList|\App\Waves\WavesCategory[] Categories()
 */
class WavesProduct extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
    ];

    private static $has_one = [
        "AssetType" => WavesAssetType::class,
        "AmbientOcclusionTexture" => File::class,
        "AmbientOcclusionPNGTexture" => File::class,
        "DiffuseTexture" => File::class,
        "DisplacementTexture" => File::class,
        "DisplacementPNGTexture" => File::class,
        "NormalTexture" => File::class,
        "SpecularTexture" => File::class,
    ];

    private static $owns = [
        "AmbientOcclusionTexture",
        "AmbientOcclusionPNGTexture",
        "DiffuseTexture",
        "DisplacementTexture",
        "DisplacementPNGTexture",
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
