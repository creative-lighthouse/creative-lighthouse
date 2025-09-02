<?php

namespace App\Teams;

use Override;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\ManyManyList;
use TractorCow\Fluent\Extension\FluentExtension;
use SilverStripe\Assets\Image;
use App\Teams\PersonSocialLink;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Description
 * @property string $LinkTitle
 * @property int $ImageID
 * @method Image Image()
 * @method DataList|PersonSocialLink[] SocialLinks()
 * @method ManyManyList|Team[] Teams()
 * @mixin FluentExtension
 */
class Person extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
        "LinkTitle" => "Varchar(255)",
    ];

    private static $has_many = [
        "SocialLinks" => PersonSocialLink::class,
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image",
        "SocialLinks",
    ];

    private static $belongs_many_many = [
        "Teams" => Team::class,
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Beschreibung",
        "Image" => "Bild",
        "SocialLinks" => "Soziale Links",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Person";

    private static $singular_name = "Person";
    private static $plural_name = "Personen";

    private static $url_segment = "person";

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
        $fields->removeByName("Teams");
        $category_map = [];
        if ($teams = Team::get()) {
            $category_map = $teams->map();
        }
        $fields->addFieldToTab("Root.Main", new CheckboxSetField("Teams", "Teams", $category_map));
        return $fields;
    }

    public function getLink()
    {
        $holder = PersonOverviewPage::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("people/") . $this->LinkTitle;
        }
    }
}
