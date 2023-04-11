<?php

namespace App\Teams;

use App\Projects\Project;
use SilverStripe\Assets\Image;
use App\Teams\TeamsOverviewPage;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Description
 * @property string $LinkTitle
 * @property string $Website
 * @property string $Instagram
 * @property string $Facebook
 * @property string $Twitter
 * @property string $Youtube
 * @property string $Linkedin
 * @property string $Xing
 * @property string $Github
 * @property string $Email
 * @property int $IconID
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Icon()
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\ORM\ManyManyList|\App\Projects\Project[] Projects()
 * @method \SilverStripe\ORM\ManyManyList|\App\Teams\Person[] Teammembers()
 * @mixin \TractorCow\Fluent\Extension\FluentExtension
 */
class Team extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
        "LinkTitle" => "Varchar(255)",
        "Website" => "Varchar(255)",
        "Instagram" => "Varchar(255)",
        "Facebook" => "Varchar(255)",
        "Twitter" => "Varchar(255)",
        "Youtube" => "Varchar(255)",
        "Linkedin" => "Varchar(255)",
        "Xing" => "Varchar(255)",
        "Github" => "Varchar(255)",
        "Email" => "Varchar(255)",
    ];

    private static $has_one = [
        "Icon" => Image::class,
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image",
        "Icon",
    ];

    private static $many_many = [
        "Projects" => Project::class,
        "Teammembers" => Person::class,
    ];

    private static $default_sort = "LinkTitle ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Beschreibung",
        "Image" => "Bild",
        "Icon" => "Icon",
        "Link" => "Link",
        "LinkTitle" => "URL Titel",
        "Projects" => "Projekte",
        "Teammembers" => "Mitglieder",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Team";

    private static $singular_name = "Team";
    private static $plural_name = "Teams";

    private static $url_segment = "teams";

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

    public function onBeforeWrite()
    {
        if ($this->LinkTitle == "") {
            $filter = URLSegmentFilter::create();
            $filteredTitle = $filter->filter($this->Title);
            $this->LinkTitle = $filteredTitle;
        }
        parent::onBeforeWrite();
    }

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
