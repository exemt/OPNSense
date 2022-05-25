<?php
namespace OPNsense\GerdenPing\Api;

use OPNsense\Base\ApiMutableServiceControllerBase;


class ServiceController extends ApiMutableServiceControllerBase
{
    public function reloadAction()
    {
        $status = "OK";

        return array("status" => $status);
    }
}
