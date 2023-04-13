<?php

namespace App\Teams;

use App\Teams\Team;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Link
 * @property string $Importance
 * @property int $ParentID
 * @property int $SocialPlattformID
 * @method \App\Teams\Team Parent()
 * @method \App\Teams\SocialPlattform SocialPlattform()
 */
class TeamSocialLink extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Link" => "Varchar(255)",
        "Importance" => "Varchar(255)"
    ];

    private static $has_one = [
        "Parent" => Team::class,
        "SocialPlattform" => SocialPlattform::class,
    ];

    private static $default_sort = "Importance DESC, Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Link" => "Link",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Title"
    ];

    private static $table_name = "TeamSocialLink";

    private static $singular_name = "Sozialer Link";
    private static $plural_name = "Soziale Links";

    private static $url_segment = "teamsociallink";

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

    //Needed to use ElementalArea in template
    public function CanArchive($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("ParentID");
        return $fields;
    }
}
