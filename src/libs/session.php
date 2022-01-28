<?php
class Session
{
    public function __construct()
    {
        session_start();
    }
    public function checkSessionLogin()
    {
        if (isset($_SESSION["email"])) {
            header("Location:" . BASE_URL . "dashboard");
        }
    }
    public function checkSessionDashboard()
    {
        if (!isset($_SESSION["email"])) {
            header("Location:" . BASE_URL . "login/notLogged");
        }
    }


    public function destroySession()
    {
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
