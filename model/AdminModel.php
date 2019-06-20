<?php

require_once ('Model.php');

class AdminModel extends Model
{
    public function checkLogin($login,$password)
    {
        $database = $this->dbConnect();

        $request  = $database->prepare('SELECT login, password FROM admin WHERE login = ?');

        $request->execute(array($login));

        $admin = $request->fetch();

        $securePassword= htmlspecialchars($password);

        $hash = sha1($securePassword);

        if ($admin['password'] == $hash) {
            $adminInfo = array(
                'login' => $admin['login']
            );
            return $adminInfo;
        } else {
            return false;
        }
    }


    public function isAdmin()
    {
        if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
            return $_SESSION['admin'] === true;
        } else {
            return false;
        }
    }
}