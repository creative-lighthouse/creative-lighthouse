<?php
namespace App\Teams;

use Override;
use App\Teams\Person;
use App\Teams\SocialPlattform;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class PersonAdmin extends ModelAdmin
{

    private static $managed_models =  [
        Person::class,
        SocialPlattform::class,
    ];

    private static $url_segment = "persons";

    private static $menu_title = "Personen";

    private static $menu_icon = "app/client/icons/docs.svg";

    #[Override]
    public function init()
    {
        parent::init();
    }
}
