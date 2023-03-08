<?php
namespace App\Teams;

use App\Teams\Team;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class TeamAdmin extends ModelAdmin
{

    private static $managed_models = array (
        Team::class,
    );

    private static $url_segment = "teams";

    private static $menu_title = "Teams";

    private static $menu_icon = "app/client/icons/docs.svg";

    public function init()
    {
        parent::init();
    }
}
