<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\DropdownField;

    /**
 * Class \Page
 *
 * @property string $MenuPosition
 * @property int $ElementalAreaID
 * @method \DNADesign\Elemental\Models\ElementalArea ElementalArea()
 * @mixin \DNADesign\Elemental\Extensions\ElementalPageExtension
 */
    class Page extends SiteTree
    {
        private static $db = [
            "MenuPosition" => "Enum('main1,main2,footer', 'main1')",
        ];

        private static $has_one = [];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab("Root.Main", new DropdownField("MenuPosition", "Menü", [
                "main1" => "Hauptmenü",
                "main2" => "Sekundärmenü",
                "footer" => "Footer",
            ]), "Content");
            return $fields;
        }
    }
}
