<?php

/**
 * Class Auth
 */
class Auth
{


    /**
     * Salt Key
     * @var string
     */
    private $staticKey;

    /**
     * Auth constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->staticKey = 'IIT3pAbwaDzcmP8sLOY2aG8nOlO7Pg4EGrOb7iaZgN';
    }

    /**
     * Check session user
     * @return bool
     */
    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            if (time() > $_SESSION['user_session_exp']) {
                return false;
            } else {
                return true;
            }

        }
        return false;
    }

    /**
     * Verify login combination
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function verify($userpassword, $password)
    {
        return (password_verify($userpassword, $password) ? true : false);
    }

    /**
     * Value Exp Time
     * @return false|int
     */
    public function getExpTime()
    {
        return strtotime('+1 hour', time());
    }

    /**
     * Generate hash password
     * @param $upass
     * @return bool|string
     */

    public function pwd_salt($upass)
    {
        $options = [
            'cost' => 12,
            //'salt' => $this->staticKey,
        ];

        $salPassword = password_hash($upass, PASSWORD_BCRYPT, $options);
        return $salPassword;
    }

    /**
     * Logout
     * @return bool
     */
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['user_session_exp']);
        return true;
    }

}