<?php

namespace App\Teams;

use Override;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\ManyManyList;
use TractorCow\Fluent\Extension\FluentExtension;
use App\Projects\Project;
use SilverStripe\Assets\Image;
use App\Teams\TeamsOverviewPage;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Description
 * @property string $LinkTitle
 * @property int $Importance
 * @property int $IconID
 * @property int $ImageID
 * @method Image Icon()
 * @method Image Image()
 * @method DataList|TeamSocialLink[] SocialLinks()
 * @method ManyManyList|Project[] Projects()
 * @method ManyManyList|Person[] Teammembers()
 * @mixin FluentExtension
 */
class Team extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
        "LinkTitle" => "Varchar(255)",
        "Importance" => "Int",
    ];

    private static $has_one = [
        "Icon" => Image::class,
        "Image" => Image::class,
    ];

    private static $has_many = [
        "SocialLinks" => TeamSocialLink::class,
    ];

    private static $many_many = [
        "Projects" => Project::class,
        "Teammembers" => Person::class,
    ];

    private static $owns = [
        "Image",
        "Icon",
    ];

    private static $default_sort = "Importance DESC, LinkTitle ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Beschreibung",
        "Image" => "Bild",
        "Icon" => "Icon",
        "Link" => "Link",
        "LinkTitle" => "URL Titel",
        "Importance" => "Wichtigkeit",
        "Projects" => "Projekte",
        "Teammembers" => "Mitglieder",
        "SocialLinks" => "Soziale Links",
    ];

    private static $summary_fields = [
        "Importance" => "Wichtigkeit",
        "Title" => "Titel",
        "Teammembers.Count" => "Mitglieder",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Team";

    private static $singular_name = "Team";
    private static $plural_name = "Teams";

    private static $url_segment = "teams";

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
        if ($this->LinkTitle == "") {
            $filter = URLSegmentFilter::create();
            $filteredTitle = $filter->filter($this->Title);
            $this->LinkTitle = $filteredTitle;
        }
        parent::onBeforeWrite();
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function getLink()
    {
        $holder = TeamsOverviewPage::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->LinkTitle;
        }
    }
}
