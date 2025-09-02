<?php
namespace App\Teams;

use Override;
use Page;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

/**
 * Class \App\Docs\DocsPage
 *
 * @property string $Text
 */
class TeamsOverviewPage extends Page
{
    private static $db = [
        "Text" => "HTMLText",
    ];

    private static $table_name = "TeamsOverviewPage";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", HTMLEditorField::create("Text", "Text"), "Content");
        return $fields;
    }
}
