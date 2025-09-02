<?php

namespace App\Projects;

use Override;
use SilverStripe\Model\List\GroupedList;
use SilverStripe\CMS\Controllers\ContentController;

/**
 * Class \PageController
 *
 * @property ProjectOverviewPage $dataRecord
 * @method ProjectOverviewPage data()
 * @mixin ProjectOverviewPage
 */
class ProjectOverviewPageController extends ContentController
{
    private static $allowed_actions = [
        "view"
    ];

    #[Override]
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

    public function view()
    {
        $title = $this->getRequest()->param("ID");
        $article = Project::get()->filter("LinkTitle", $title)->first();
        return [
            "Project" => $article,
        ];
    }
}
