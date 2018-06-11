<?php
session_start();
class AuthClass {
    private $db;
    public function __construct($db)
    {
        $this->db=$db;
    }
    public function auth($login, $password)
    {
        $querystr="SELECT Password FROM user WHERE Email=? LIMIT 1";
        $query=$this->db->prepare($querystr);
        $query->bind_param('s',$login);
        $query->execute();
        $user_pass="";
        $query->bind_result($user_pass);
        if($query->fetch())
        {
            if(password_verify($password, $user_pass))
            {
                $_SESSION['is_auth']=true;
                $_SESSION['login']=$login;
                return true;
            }
            else
            {
                $_SESSION['is_auth']=false;
            }
        }
        $query->close();
        return false;
    }
    public function isAuth()
    {
        if(isset($_SESSION['is_auth']))
            return $_SESSION['is_auth'];
        return false;
    }
    public function getLogin()
    {
        if($this->isAuth())
        {
            return $_SESSION['login'];
        }
    }
    public function out() {
        $_SESSION=array();
        session_destroy();
    }
}
?>