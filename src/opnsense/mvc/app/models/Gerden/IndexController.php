<?php
namespace OPNsense\GerdenPing;
class IndexController extends \OPNsense\Base\IndexController
{
    public function indexAction()
    {
        // pick the template to serve to our users.
        $this->view->pick('Gerden/index');
    }
}
