<?php

namespace App\Projects;

use SilverStripe\ORM\GroupedList;
use SilverStripe\CMS\Controllers\ContentController;

/**
 * Class \PageController
 *
 * @property \App\Projects\ProjectOverviewPage $dataRecord
 * @method \App\Projects\ProjectOverviewPage data()
 * @mixin \App\Projects\ProjectOverviewPage
 */
class ProjectOverviewPageController extends ContentController
{
    private static $allowed_actions = [
        "view"
    ];

    protected function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
    }

    public function getProjects()
    {
        return GroupedList::create(Project::get()->sort("StartDate", "DESC"));
    }
}
