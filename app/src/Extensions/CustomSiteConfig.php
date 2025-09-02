<?php

namespace App;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class CustomSiteConfig extends Extension
{
    private static $db = [
        "ComingSoonText" => "HTMLText",
        "ComingSoonMode" => "Boolean"
    ];

    private static $has_one = [];

    private static $owns = [];

    private static $defaults = [];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.Login', CheckboxField::create('ComingSoonMode', 'Coming Soon Modus'));
        $fields->addFieldToTab('Root.Login', HTMLEditorField::create('ComingSoonText', 'Coming Soon Text'));
    }
}
