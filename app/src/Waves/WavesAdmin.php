<?php
namespace App\Waves;

use App\Waves\WavesProduct;
use App\Waves\WavesCategory;
use App\Waves\WavesAssetType;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class WavesAdmin extends ModelAdmin
{

    private static $managed_models = array (
        WavesProduct::class,
        WavesCategory::class,
        WavesAssetType::class,
    );

    private static $url_segment = "waves";

    private static $menu_title = "Waves";

    private static $menu_icon = "app/client/icons/docs.svg";

    public function init()
    {
        parent::init();
    }
}
