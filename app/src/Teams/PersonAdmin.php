<?php
namespace App\Teams;

use App\Teams\Person;
use App\Teams\SocialPlattform;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class PersonAdmin extends ModelAdmin
{

    private static $managed_models = array (
        Person::class,
        SocialPlattform::class,
    );

    private static $url_segment = "persons";

    private static $menu_title = "Personen";

    private static $menu_icon = "app/client/icons/docs.svg";

    public function init()
    {
        parent::init();
    }
}
