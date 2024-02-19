<?php

namespace App\Waves;

use Page;
use App\Waves\WavesPageController;

/**
 * Class \App\Docs\DocsHolder
 *
 */
class WavesPage extends Page
{
    private static $table_name = 'WavesPage';

    private static $db = array();

    private static $icon = "app/client/icons/profile.svg";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function getControllerName()
    {
        return WavesPageController::class;
    }
}
