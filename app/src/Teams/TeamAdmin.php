<?php
namespace App\Teams;

use Override;
use App\Teams\Team;
use App\Teams\SocialPlattform;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class TeamAdmin extends ModelAdmin
{

    private static $managed_models =  [
        Team::class,
        SocialPlattform::class,
    ];

    private static $url_segment = "teams";

    private static $menu_title = "Teams";

    private static $menu_icon = "app/client/icons/docs.svg";

    #[Override]
    public function init()
    {
        parent::init();
    }
}
