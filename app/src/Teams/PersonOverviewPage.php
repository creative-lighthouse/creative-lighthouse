<?php
namespace App\Teams;

use Page;

/**
 * Class \App\Docs\DocsPage
 *
 */
class PersonOverviewPage extends Page
{
    private static $db = [
    ];

    private static $table_name = "PersonOverviewPage";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
