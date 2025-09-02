<?php
namespace App\Projects;

use Override;
use Page;

/**
 * Class \App\Docs\DocsPage
 *
 */
class ProjectOverviewPage extends Page
{
    private static $db = [
    ];

    private static $table_name = "App_Project_ProjectOverviewPage";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
