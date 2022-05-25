<?php
namespace OPNsense\GerdenPing;
use OPNsense\Base\IndexController as BaseController;

class IndexController extends BaseController
{
    public function indexAction()
    {
         $this->view->mainform = $this->getForm("mainform");
         $this->view->pick('OPNsense/GerdenPing/index');
    }
}
