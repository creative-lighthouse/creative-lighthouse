<?php

namespace App\Teams;

use Override;
use SilverStripe\Assets\Image;
use App\Teams\PersonSocialLink;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $MainLink
 * @property int $Importance
 * @property int $IconID
 * @method Image Icon()
 */
class SocialPlattform extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "MainLink" => "Varchar(512)",
        "Importance" => "Int",
    ];

    private static $has_one = [
        "Icon" => Image::class,
    ];

    private static $owns = [
        "Icon",
    ];

    private static $belongs_many = [
        "PersonSocialLink" => PersonSocialLink::class,
        "TeamSocialLink" => TeamSocialLink::class,
    ];

    private static $default_sort = "Importance DESC, Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "MainLink" => "Hauptlink",
        "Icon" => "Icon",
        "Importance" => "Wichtigkeit",
    ];

    private static $summary_fields = [
        "Importance" => "Wichtigkeit",
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Title"
    ];

    private static $table_name = "SocialPlattform";

    private static $singular_name = "Soziale Plattform";
    private static $plural_name = "Soziale Plattformen";

    private static $url_segment = "socialplattform";

    #[Override]
    public function canView($member = null)
    {
        return true;
    }

    #[Override]
    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    #[Override]
    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    #[Override]
    public function canCreate($member = null, $context = [])
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    //Needed to use ElementalArea in template
    public function CanArchive($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    #[Override]
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
