<?php
namespace OPNsense\GerdenPing\Api;

use OPNsense\Base\ApiMutableModelControllerBase;


class SettingsController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'GerdenPing';
    protected static $internalModelClass = '\OPNsense\GerdenPing\GerdenPing';
}
