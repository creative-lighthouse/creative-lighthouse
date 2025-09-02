<?php

namespace App\Teams;

use Override;
use SilverStripe\CMS\Controllers\ContentController;

/**
 * Class \PageController
 *
 * @property PersonOverviewPage $dataRecord
 * @method PersonOverviewPage data()
 * @mixin PersonOverviewPage
 */
class PersonOverviewPageController extends ContentController
{
    private static $allowed_actions = [
        "people"
    ];

    #[Override]
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
        return [
            "Person" => $article,
        ];
    }
}
