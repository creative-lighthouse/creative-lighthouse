<?php
namespace App\Projects;

use Page;
use SilverStripe\Forms\TextField;

/**
 * Class \App\Docs\DocsPage
 *
 */
class ProjectOverviewPage extends Page
{
    private static $db = [
    ];

    private static $table_name = "App_Project_ProjectOverviewPage";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
