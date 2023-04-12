<?php

namespace App\Teams;

use App\Teams\Team;
use SilverStripe\CMS\Controllers\ContentController;

/**
 * Class \PageController
 *
 * @property \App\Teams\TeamsOverviewPage $dataRecord
 * @method \App\Teams\TeamsOverviewPage data()
 * @mixin \App\Teams\TeamsOverviewPage
 */
class TeamsOverviewPageController extends ContentController
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

    public function getTeams()
    {
        return Team::get()->sort([
            "Importance" => "DESC",
            "Title" => "ASC",
        ]);
    }

    public function view()
    {
        $title = $this->getRequest()->param("ID");
        $article = Team::get()->filter("LinkTitle", $title)->first();
        return array(
            "Team" => $article,
        );
    }
}
