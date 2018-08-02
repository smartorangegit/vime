<?php
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Resultset;
use App\Ql;

class IndexController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle("Проекты");
        parent::initialize();
    }


    public function indexAction()
    {

        $output_sql = $this->modelsManager->executeQuery("SELECT p.*, d.* FROM Projects p, Development d WHERE p.development_id = d.id");

        $resultsList = [];

        foreach ($output_sql as $st) {

            $st->p->project_img = $this->dirsImg( $st->p->project_img, 1);
            $st->d->development_img = $this->dirsImg( $st->d->development_img, 2);
            $st->p->url_project="/project{$st->p->project_id}/";


            $resultsList[] =  (object) array_merge (get_object_vars ( $st->p ), get_object_vars ( $st->d ));
        }


        $this->view->setVar("Projects",   $resultsList);
    }

}

