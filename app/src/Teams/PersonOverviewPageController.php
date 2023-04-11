<?php

namespace App\Teams;

use SilverStripe\CMS\Controllers\ContentController;

/**
 * Class \PageController
 *
 * @property \App\Teams\PersonOverviewPage $dataRecord
 * @method \App\Teams\PersonOverviewPage data()
 * @mixin \App\Teams\PersonOverviewPage
 */
class PersonOverviewPageController extends ContentController
{
    private static $allowed_actions = [
        "people"
    ];

    protected function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
    }

    public function getPersons()
    {
        return Person::get()->sort("Title", "ASC");
    }

    public function people()
    {
        $title = $this->getRequest()->param("ID");
        $article = Person::get()->filter("LinkTitle", $title)->first();
        return array(
            "Person" => $article,
        );
    }
}
