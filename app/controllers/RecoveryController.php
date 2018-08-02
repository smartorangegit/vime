<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Resultset;

class RecoveryController extends ControllerBase
{

    public function initialize()
    {

        $this->tag->setTitle("Востановление пароля");

        parent::initialize();
    }


    public function indexAction()
    {

    }

    public function recoveryAction()
    {
        $this->view->setRenderLevel( View::LEVEL_NO_RENDER );
        $email=$this->request->getPost('email');
        $count=$this->request->getPost('count');

        /*Аналог рекапчи
            */
        if ($count<3)  {
            $return=array('result'=>0,'error'=>[['email',$this->_e('Впишите Ваш email адрес')]],  'placeholder'=>1);
        }
        else
        {
            $result = Users::find(
                [
                    'user_email = :user_email:',
                    'bind'      => ['user_email'=>$email],
                    'hydration' => Resultset::HYDRATE_OBJECTS
                ]
            );
            if ($result->count()==false){
                $return=array('result'=>0,'error'=>[['email',$this->_e('Пользователя не существует')]],  'placeholder'=>1);
            }
            else{


                $temp_id=str_replace('$','',password_hash($email, PASSWORD_BCRYPT));

                $result->rewind();
                $result->valid();

                $recovery = new ForgotPassword;
                $recovery->user_id = $result->current()->id;
                $recovery->data_end = date('Y-m-d H:i:s', strtotime(($this->config->forgotTime*3600).' seconds'));
                $recovery->temp_key = $temp_id;
                $recovery->save();



               $rezult = $this->phpmailer->sendMail([
                    'to'        => $email,
                    'title'     => $this->_e('Восстановление пароля'),
                    'template'		=> 'forgotPassword',
                    'options'	=> [
                        'time_life_tempid' => $this->config->forgotTime,
                        'user_url_form'	   => $this->config->siteProtocol.'://'.$_SERVER['HTTP_HOST'].'/recovery/request/?recovery='.$temp_id
                    ]
                ]);


                $return=array('result'=>1,'reset'=>1,'message'=>$this->_e('На вашу почту было отправлено письмо с инструкцией по востановлению пароля'));
            }

        }

        $this->json($return);
    }

    public function requestAction()
    {
        //  print_r($this->request->get('recovery'));
        $form='';



        if ($this->request->get('recovery'))
        {

            $result = ForgotPassword::find(
                [
                    'temp_key=:temp_key: AND active=1 AND data_end>=:data_end:',
                    'bind'      => ['temp_key'=>$this->request->get('recovery'), 'data_end'=>date('Y-m-d H:i:s')],
                    'hydration' => Resultset::HYDRATE_OBJECTS
                ]
            );

            if ($result->count())
            {
                //   $this->Form('request_form');

                $this->view->setVar('recovery', $this->request->get('recovery'));
            }
            else
            {

                $form= '
					<div>
					<b>Ошибка</b><br><br>
					Код подтверждения не найден или устарел.
					<br>
					<a href="/">На главную</a>
					</div>';
            }

        }
        else
        {
            $form= '
				<div>
				<b>Ошибка</b><br><br>
				Код подтверждения не найден или устарел.
				<br>
				<a href="/">На главную</a>
				</div>';

        }

        $this->view->setVar('form', $form);
    }
    /**ajax выдновлення паролю
     */
    public function request_postAction()
    {
        $this->view->setRenderLevel( View::LEVEL_NO_RENDER );

        /*Аналог рекапчи
        */
        if ($this->request->getPost('count')<3)
        {

            $return=array('error'=>[['password',$this->_e('Ошибка востановление. Пароль слишком короткий')]], 'result'=>0, 'placholder'=>1);
        }
        else
        {

                $result = ForgotPassword::find(
                    [
                        'temp_key=:temp_key: AND active=1 AND data_end>=:data_end:',
                        'bind'      => [ 'temp_key'=>$this->request->getPost('request'), 'data_end'=>date('Y-m-d H:i:s')],
                        'hydration' => Resultset::HYDRATE_OBJECTS
                    ]
                );

                if ($result->count())
                {
                    //    $s=$result->fetch(PDO::FETCH_OBJ);
                    //  $password=password_hash($this->post->password_one,PASSWORD_BCRYPT);


                    $result->rewind();
                    $result->valid();
                    $current = $result->current();
                    $result = Users::findFirstById($current->user_id);

                    $return= $this->validatorPassword($result);

                    if (empty($return)){

                        $result = ForgotPassword::findFirstById($current->id);
                        $result->active = 0;
                        $result->save();

                        $result = Users::findFirstById($current->user_id);
                        $result->user_pass = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
                        $result->save();

                        $return=array('message'=>$this->_e('Новый пароль сохранен').'<a href="/login/">'.$this->_e('Авторизоваться').'</a>', 'result'=>1);
                    }
                }
                else
                {
                    $return=array('message'=>'Код подтверждения не найден или устарел', 'result'=>0);
                }

        }


        if (empty($return)) {
            $return=array('message'=>$pas, 'result'=>0);
         }

        $this->json($return);

    }


    protected function validatorPassword($user)
    {

        $return = '';

        /*Верхній регістр*/
        $pas=$this->request->getPost('password');

        /*> 6 символів*/
        if (mb_strlen($pas, 'utf8')<6){
            $return = array('error'=>[['password',$this->_e('Пароль должен содержать больше 6 символов')]], 'result'=>0,  'placeholder'=>1);
        }

        if ($pas!=$this->request->getPost('repassword')) {
            $return = array('error'=>[['password',$this->_e('Пороли не совпадают')],['repassword',$this->_e('Пороли не совпадают')]], 'result'=>0,  'placeholder'=>1);
        }

        /*> Тільки латиниця*/
        if (mb_detect_encoding($pas, 'auto') =="UTF-8"){
            $return = array('error'=>[['password',$this->_e('Пароль должен содержать только латинские буквы')]], 'result'=>0,  'placeholder'=>1);
        }

        return $return;
    }




}

