<?php
namespace OPNsense\GerdenPing\Api;

use OPNsense\Base\ApiMutableServiceControllerBase;


class ServiceController extends ApiMutableServiceControllerBase
{

    protected static $internalServiceClass = '\OPNsense\GerdenPing\GerdenPing';

    protected static $internalServiceName = 'ping';

    public function pingAction()
    {
        $status = "OK";

        return array("status" => $status);
    }
}
