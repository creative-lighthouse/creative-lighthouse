<?php
namespace App\Teams;

use Page;
use SilverStripe\Forms\TextField;

/**
 * Class \App\Docs\DocsPage
 *
 */
class TeamsOverviewPage extends Page
{
    private static $db = [
    ];

    private static $table_name = "App_Teams_TeamsOverviewPage";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
