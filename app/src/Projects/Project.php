<?php

namespace App\Projects;

use App\Teams\Team;
use App\Projects\ProjectAdmin;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use App\Projects\ProjectOverviewPage;
use App\Teams\Person;
use SilverStripe\Security\Permission;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $StartDate
 * @property string $FinishDate
 * @property string $Status
 * @property string $Description
 * @property string $LinkTitle
 * @method \SilverStripe\ORM\DataList|\PurpleSpider\BasicGalleryExtension\PhotoGalleryImage[] PhotoGalleryImages()
 * @method \SilverStripe\ORM\ManyManyList|\App\Teams\Team[] Teams()
 * @mixin \PurpleSpider\BasicGalleryExtension\PhotoGalleryExtension
 * @mixin \TractorCow\Fluent\Extension\FluentExtension
 */
class Project extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "StartDate" => "Date",
        "FinishDate" => "Date",
        "Status" => "Enum('Finished, InProgress, Planned', 'Finished')",
        "Description" => "HTMLText",
        "LinkTitle" => "Varchar(255)",
    ];

    private static $belongs_many_many = [
        "Teams" => Team::class,
    ];

    private static $default_sort = "StartDate ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Status" => "Status",
        "Description" => "Beschreibung",
        "Image" => "Bild",
        "StartDate" => "Datum",
        "FinishDate" => "Enddatum (optional)",
        "LinkTitle" => "URL Titel",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
        "Status" => "Status",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Project";

    private static $singular_name = "Projekt";
    private static $plural_name = "Projekte";

    private static $url_segment = "projects";

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
        $fields->removeByName("Teams");
        $category_map = [];
        if ($teams = Team::get()) {
            $category_map = $teams->map();
        }
        $fields->addFieldToTab("Root.Main", new CheckboxSetField("Teams", "Teams", $category_map));
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = ProjectAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }

    public function getLink()
    {
        $holder = ProjectOverviewPage::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->LinkTitle;
        }
    }

    public function getFormattedStartDate()
    {
        $date = $this->dbObject('StartDate');
        if ($date) {
            return $date->Format("dd.MM.yy");
        }
    }

    public function getFormattedFinishDate()
    {
        $date = $this->dbObject('FinishDate');
        if ($date) {
            return $date->Format("dd.MM.yy");
        }
    }

    public function getYear()
    {
        $date = $this->dbObject('StartDate');
        if ($date) {
            return $date->Format("Y");
        }
    }
}
