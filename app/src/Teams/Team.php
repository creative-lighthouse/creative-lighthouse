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
 * @property int $IconID
 * @property int $ImageID
 * @property int $LinkID
 * @method \SilverStripe\Assets\Image Icon()
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Link()
 */
class Team extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
        "LinkTitle" => "Varchar(255)",
    ];

    private static $has_one = [
        "Icon" => Image::class,
        "Image" => Image::class,
        "Link" => Link::class,
    ];

    private static $owns = [
        "Image",
        "Icon",
        "Link",
    ];

    private static $belongs_many = [
        Project::class
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Beschreibung",
        "Image" => "Bild",
        "Icon" => "Icon",
        "Link" => "Link",
        "LinkTitle" => "URL Titel",
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
        $fields->removeByName("LinkID");
        $fields->insertAfter('Description', LinkField::create('Link'));
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = TeamAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }

    public function getLink()
    {
        $holder = TeamsOverviewPage::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->LinkTitle;
        }
    }
}
