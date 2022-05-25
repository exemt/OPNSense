<?php
namespace OPNsense\GerdenPing\Api;

use JakubOnderka\PhpParallelLint\Exception;
use OPNsense\Base\ApiMutableServiceControllerBase;
use OPNsense\Core\Backend;
use OPNsense\GerdenPing\GerdenPing;


class ServiceController extends ApiMutableServiceControllerBase
{

    protected static $internalServiceClass = '\OPNsense\GerdenPing\GerdenPing';
    protected static $internalServiceEnabled = 'general.enabled';
    protected static $internalServiceTemplate = 'OPNsense/GerdenPing';

    protected static $internalServiceName = 'ping';

    public function pingAction()
    {
        try {
            if (!$this->request->isPost())
                throw new \Exception('wrong request');

            $mdlGerdenPing = new GerdenPing();
            $requestData = $this->request->getPost("gerdenping");
            $mdlGerdenPing->setNodes($requestData);

            // perform validation
            $valMsgs = $mdlGerdenPing->performValidation();

            $validations = [];
            foreach ($valMsgs as $field => $msg) {
                $validations["gerdenping.".$msg->getField()] = $msg->getMessage();
            }
            if(count($validations) > 0)
                throw new \Exception('validation fault');

            if(!filter_var(print_r($requestData['mainform']['IP'], FILTER_VALIDATE_IP)));
                throw new \Exception('invalid IP');

            $backend = new Backend();
            $result["data"] = trim($backend->configdRun('gerdenping ping '.$requestData['mainform']['IP']));
            $result["result"] = "ok";

        }catch (\Exception $e){
            return [
                'result' => 'fail',
                'message' => $e->getMessage(),
                'validations' => $validations
            ];
        }
        return $result;
    }
}
