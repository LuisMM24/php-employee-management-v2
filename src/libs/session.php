<?php
class Session
{
    public function __construct()
    {
    }
    //if try to go Login section being logged
    public function checkSessionLogin()
    {
        session_start();
        if (isset($_SESSION["email"])) {
            header("Location:" . BASE_URL . "dashboard");
        }
    }
    //if try to go dashboard section without log in
    public function checkSessionDashboard()
    {
        session_start();
        if (!isset($_SESSION["email"])) {
            header("Location:" . BASE_URL . "login/notLogged");
        }
    }


    public function destroySession()
    {
        session_start();
        // Unset all session variables
        unset($_SESSION);
        // Destroy session cookie
        $this->destroySessionCookie();
        // Destroy the session
        session_destroy();
    }

    public function destroySessionCookie()
    {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    }
}
