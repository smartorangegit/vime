<?php
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Resultset;


class ProjectController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle("Проекты");

        parent::initialize();
    }


    public function indexAction()
    {

        print_r($this->router->getParams());
    }

}

