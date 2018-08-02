<?php
use Phalcon\Mvc\View;



class AuthorizationController extends ControllerBase
{

    public function initialize()
    {
        $this->view->setRenderLevel(
            View::LEVEL_NO_RENDER
        );

    }

    public function indexAction()
    {

    }



    public function loginAction()
    {

        $ip			 = $_SERVER['REMOTE_ADDR'];
        $user_deviсу = $_SERVER['HTTP_USER_AGENT'];
        $email 		 = $this->request->getPost('email');
        $ban 	     = 0;
        $select 	 = $this->modelsManager;
        $google      = 0; //Авторизация через Google


        $output_sql=$select->executeQuery("
SELECT * FROM ChangeAuthorization
WHERE result=0 AND user_ip='$ip' AND user_email='$email' AND date>'".date('Y-m-d H:i:s', strtotime('-'.$this->config->blockedTime.' seconds'))."'
ORDER BY id DESC
LIMIT ".$this->config->countAttempts
        );

        $ban = count($output_sql);

        if ($ban==$this->config->countAttempts) {
            /*
            *Превышен лимит попыток авторизации
            */
            $error[] = ['email', $this->_e('Превышен лимит попыток авторизации')];
        }
        else {

            $session = "INSERT INTO ChangeAuthorization (user_ip, user_email,result,user_devicy)
VALUES (:session_ip:, :user_email:, :session_result:, :session_devicy:)";

            $output_sql=$select->executeQuery("SELECT * FROM Users WHERE user_email='$email'");

            if (count($output_sql)) {

                $user = $output_sql[0];

                if ($google) {
                    $password_verify = 1;
                }
                else {
                    $password_verify = password_verify($this->request->getPost('password'), $user->user_pass);
                }

                if ($password_verify) {

                    if (!$user->user_active) {
                        /*
                        *Пользователь заблокирован
                        */
                        $error[] = ['email',$this->_e('Пользователь заблокирован')];
                    }
                    else {

                        $select->executeQuery( $session,
                            [
                                "session_ip"     => $ip,
                                "user_email"	 => $email,
                                "session_result" => 1,
                                "session_devicy" => $user_deviсу
                            ]
                        );

                        $this->session->set('auth', ['id'=>$user->id, 'email'=>$email,] );

                        $output = ['result'=>1,'page'=>'/'];
                    }

                }
                else {
                    /*
                    * Неправильный пароль
                    */
                    $return = 0;
                    $error[] = ['email',$this->_e('Неверный пароль или логин')];
                }
            }
            else {
                /*
                * Пользователя не существует
                */
                $return = 0;
                $error[] = ['email',$this->_e('Пользователя не существует')];
            }
        }

        if (isset($return)) {
            $select->executeQuery(
                $session,
                [
                    "session_ip"     => $ip,
                    "user_email"	 => $email,
                    "session_result" => 0,
                    "session_devicy" => $user_deviсу
                ]
            );
        }

        if (isset($error)) $output = ['result'=>0, 'error'=>$error,  'placeholder'=>1];

        $this->json($output);
    }

    /**
     *  @brief (Registration of users)
     *  @return array
     */
    public function registrationAction()
    {
        $error = $this->checkingFields ();

        if (!empty($error)) return   $this->json(['result'=>0, 'error'=>$error, 'placeholder'=>1]);

        $output_sql = $this->modelsManager->executeQuery("SELECT * FROM Users WHERE user_email = '{$this->request->getPost('email')}'");

        if (count($output_sql)) 	return  $this->json(['result'=>0, 'error'=>[['email',$this->_e('Такой E-mail уже зарегистрирован')]], 'placeholder'=>1]);

        $newUser = "INSERT INTO Users (user_pass, user_email, user_phone) VALUES (:user_pass:, :user_email:, :user_phone:)";

        $this->modelsManager->executeQuery( $newUser,
            [
                "user_pass"		=> password_hash ($this->request->getPost('password'), PASSWORD_BCRYPT),
                "user_email"	=> $this->request->getPost('email'),
                "user_phone"    => $this->request->getPost('phone')
            ]
        );

        $output_sql = $this->modelsManager->executeQuery("SELECT * FROM Users WHERE user_email = '{$this->request->getPost('email')}'");

        if (count($output_sql))   $this->session->set('auth', ['id'=>$output_sql[0]->id, 'email'=> $this->request->getPost('email')] );

        $this->json(['result'=>1, 'page'=>'/']);
    }


    /**
     *  @brief (Search for errors in the registration form)
     *  @return string
     */
    public function checkingFields ()
    {
        $error = [];

        if ($this->request->getPost('password') != $this->request->getPost('repassword')) {
            $error[] = ['password',$this->_e('Пороли не совпадают')];
            $error[] = ['repassword',$this->_e('Пороли не совпадают')];
        }

        foreach ( $this->request->getPost() as $k=>$input) {
            if ( empty ($input)) $error[] = [$k, $this->_e('Не заполнены все поля')];
        }

        return $error;
    }

    public function logoutAction()
    {
        if ($auth = $this->session->get('auth')) {

            $this->session->remove('auth');
        }

        $this->json(['result'=>1,'page'=>'/']);
    }

}

