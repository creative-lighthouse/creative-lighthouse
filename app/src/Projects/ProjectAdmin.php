<?php
namespace App\Projects;

use Override;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class ProjectAdmin extends ModelAdmin
{

    private static $managed_models =  [
        Project::class,
    ];

    private static $url_segment = "projects";

    private static $menu_title = "Projekte";

    private static $menu_icon = "app/client/icons/docs.svg";

    #[Override]
    public function init()
    {
        parent::init();
    }
}
