<?php
namespace OPNsense\GerdenPing\Api;

use OPNsense\Base\ApiMutableServiceControllerBase;
use OPNsense\GerdenPing\GerdenPing;


class ServiceController extends ApiMutableServiceControllerBase
{

    protected static $internalServiceClass = '\OPNsense\GerdenPing\GerdenPing';
    protected static $internalServiceEnabled = 'general.enabled';
    protected static $internalServiceTemplate = 'OPNsense/GerdenPing';

    protected static $internalServiceName = 'ping';

    public function pingAction()
    {
        $result = array("result"=>"failed");
        if ($this->request->isPost()) {
            // load model and update with provided data
            $mdlGerdenPing = new GerdenPing();
            $mdlGerdenPing->setNodes($this->request->getPost("gerdenping"));

            // perform validation
            $valMsgs = $mdlGerdenPing->performValidation();
            foreach ($valMsgs as $field => $msg) {
                if (!array_key_exists("validations", $result)) {
                    $result["validations"] = array();
                }
                $result["validations"]["general.".$msg->getField()] = $msg->getMessage();
            }

            // serialize model to config and save
            if ($valMsgs->count() == 0) {
                $mdlGerdenPing->serializeToConfig();
                Config::getInstance()->save();
                $result["result"] = "saved";
            }
        }
        return $result;

    }
}
