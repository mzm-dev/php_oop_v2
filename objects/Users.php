<?php

/**
 * Class Users
 */

require 'Auth.php';

class Users extends Auth
{
    protected $db;

    /**
     * Users constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
        $this->table = 'users';
    }

    /**
     * @param $email
     * @return bool
     */
    public function findByEmail($email = null)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE email = :email LIMIT 1");

            $stmt->execute(array(':email' => $email));

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * @param null $id
     * @return bool
     */
    public function findById($id = null)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");

            $stmt->execute(array(':id' => $id));

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function all()
    {
        try {

            $query = "SELECT * FROM $this->table ";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function create($request)
    {

        try {

            $request = (object)$request;//Convert to std

            $name = $request->name;
            $email = $request->email;
            $pwd = $request->password;
            $phone = $request->phone;
            $created = date('Y-m-d H:i:s');
            $modified = date('Y-m-d H:i:s');

            $saltpass = parent::pwd_salt($pwd);//Generate hash pasword


            $stmt = $this->db->prepare("INSERT INTO $this->table(name,email,pwd,phone, created,modified) VALUES(:name, :email, :saltpass, :phone,:created,:modified)");
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':saltpass', $saltpass);
            $stmt->bindparam(':created', $created);
            $stmt->bindparam(':modified', $modified);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function update($request)
    {

        try {

            $request = (object)$request;//Convert to std

            $id = $request->id;
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $modified = date('Y-m-d H:i:s');

            $stmt = $this->db->prepare("UPDATE $this->table SET name=:name, email=:email, phone=:phone, modified=:modified WHERE id=:id");
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':modified', $modified);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function delete()
    {

    }


    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $userpassword)
    {
        try {

            if ($users = $this->findByEmail($email)) {
                if (parent::verify($userpassword, $users['pwd'])) {
                    /** User session */
                    $_SESSION['user_session']['id'] = $users['id'];
                    $_SESSION['user_session']['name'] = $users['name'];
                    $_SESSION['user_session']['email'] = $users['email'];
                    $_SESSION['user_session']['phone'] = $users['phone'];
                    $_SESSION['user_session']['created'] = $users['created'];
                    $_SESSION['user_session']['modified'] = $users['modified'];

                    /** User session expired time */
                    $_SESSION['user_session_exp'] = parent::getExpTime();

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Auth::Logout()
     *
     * @return bool
     */

    function logout()
    {

        if (parent::logout()) {// TODO: Change the autogenerated stub
            redirect('login.php');
        }
    }

    /**
     * Auth::is_loggedin()
     *
     * @param null $page
     * @return bool|void
     */
    function is_loggedin($page = null)
    {
        if (!parent::is_loggedin() && !$page) {// TODO: Change the autogenerated stub
            redirect('login.php');
        } else if (parent::is_loggedin() && $page == 'login') {
            redirect('home.php');
        }
    }


}