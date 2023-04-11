<?php

namespace App\Elements;

use App\Projects\Project;
use App\Projects\ProjectOverviewPage;
use SilverStripe\Assets\Image;
use DNADesign\Elemental\Models\BaseElement;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 */
class ProjectsElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
    ];

    private static $field_labels = [
        "Text" => "Text"
    ];

    private static $table_name = 'ProjectsElement';
    private static $icon = 'font-icon-block-content';

    public function getType()
    {
        return "Projects";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function getProjects()
    {
        return Project::get()->limit(6)->sort("StartDate", "DESC");
    }

    public function getProjectsHolderLink()
    {
        return ProjectOverviewPage::get()->first()->Link();
    }
}
