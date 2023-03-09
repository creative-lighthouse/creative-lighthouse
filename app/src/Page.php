<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\DropdownField;

    /**
 * Class \Page
 *
 * @property string $MenuPosition
 * @property int $ElementalAreaID
 * @property int $HeaderImageID
 * @method \DNADesign\Elemental\Models\ElementalArea ElementalArea()
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @mixin \DNADesign\Elemental\Extensions\ElementalPageExtension
 */
    class Page extends SiteTree
    {
        private static $db = [
            "MenuPosition" => "Enum('main1,main2,footer', 'main1')",
        ];

        private static $has_one = [
            "HeaderImage" => Image::class,
        ];

        private static $owns = [
            "HeaderImage",
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab("Root.Main", new DropdownField("MenuPosition", "Menü", [
                "main1" => "Hauptmenü",
                "main2" => "Sekundärmenü",
                "footer" => "Footer",
            ]), "Content");
            $fields->insertAfter("MenuPosition", new UploadField("HeaderImage", "Header Bild"));
            return $fields;
        }
    }
}
