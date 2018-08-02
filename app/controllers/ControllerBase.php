<?php

use Phalcon\Mvc\Controller;
use PHPMailer\PHPMailer\Exception;
use App\Ql;

class ControllerBase extends Controller
{
   public $sql;

    public function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);

        // $this->request->getSet('id');

        return $this->dispatcher->forward(
            [
                'controller' => $uriParts[0],
                'action'     => $uriParts[1],
                'params'     => $params
            ]
        );
    }

    public function initialize()
    {

        $this->view->setTemplateAfter('main');
        $this->pl;
        $this->sql = $this->sql();
    }


    /**
     * @brief (Looks for and connects localization files)
     */
    public function addLang()
    {
        $file= APP_PATH.'/messages/languages/en.ini';

        if (file_exists($file))
        {
            $mes = parse_ini_file($file);
        }
        $this->lang = $mes;
    }

    /**
     * @brief (Return messages)
     * @param [string] $messages
     * @return string
     */
    public function _e($messages)
    {

        if (empty($this->lang)) $this->addLang();

        if (!isset ($this->lang[$messages]))  {
            $messages = 'Not found! '.$messages;
        }
        else{
            $messages = $this->lang[$messages];
        }

        return $messages;
    }

    public static function json($output){
        echo json_encode($output);
    }

    public static function dirsImg($img, $typ = 1){

        $img = (empty($img)) ? 'default.png' : $img;
        switch ($typ){
            case 1:
                $img = '/img/projects/'.$img;
                break;
            case 2:
                $img = '/img/development/'.$img;
                break;
        }

        return $img;
    }

    protected  function sql()
    {
        return new  Ql();
    }
}
