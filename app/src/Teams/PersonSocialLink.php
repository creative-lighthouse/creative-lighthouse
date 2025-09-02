<?php

namespace App\Teams;

use Override;
use App\Teams\Person;
use App\Teams\SocialPlattform;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Link
 * @property int $Importance
 * @property int $ParentID
 * @property int $SocialPlattformID
 * @method Person Parent()
 * @method SocialPlattform SocialPlattform()
 */
class PersonSocialLink extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Link" => "Varchar(255)",
        "Importance" => "Int"
    ];

    private static $has_one = [
        "Parent" => Person::class,
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

    private static $table_name = "PersonSocialLink";

    private static $singular_name = "Sozialer Link";
    private static $plural_name = "Soziale Links";

    private static $url_segment = "personsociallink";

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
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("ParentID");
        return $fields;
    }
}
