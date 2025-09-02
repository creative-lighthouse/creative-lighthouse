<?php

namespace {

    use DNADesign\Elemental\Models\ElementalArea;
    use DNADesign\Elemental\Extensions\ElementalPageExtension;
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
     * @method ElementalArea ElementalArea()
     * @method Image HeaderImage()
     * @mixin ElementalPageExtension
     */
    class Page extends SiteTree
    {
        private static $table_name = 'Page';

        private static $db = [
            "MenuPosition" => "Enum('main1,main2,footer', 'main1')",
        ];

        private static $has_one = [
            "HeaderImage" => Image::class,
        ];

        private static $owns = [
            "HeaderImage",
        ];

        #[Override]
        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            //$fields->addFieldToTab("Root.Main", new DropdownField("MenuPosition", "Menü", [
            //    "main1" => "Hauptmenü",
            //    "main2" => "Sekundärmenü",
            //    "footer" => "Footer",
            //]), "Content");
            //$fields->insertAfter("MenuPosition", new UploadField("HeaderImage", "Header Bild"));
            return $fields;
        }
    }
}
