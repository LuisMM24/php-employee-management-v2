<?php
class Session
{
    public function checkSession()
    {
        $urlFile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

        if ($urlFile == "index.php" || $urlFile == "php-employee-management-v2") {

            if (isset($_SESSION["email"])) {
                header("Location:./src/dashboard.php");
            } else {
                //Check for session error
                if ($alert = checkLoginError()) return $alert;

                // Check for info session variable
                if ($alert = checkLoginInfo()) return $alert;

                // Check for logout
                if ($alert = checkLogout()) return $alert;
            }
        } else {
            if (!isset($_SESSION["email"])) {
                $_SESSION["loginError"] = "You don't have permission to enter the dashboard. Please Login.";
                header("Location:../index.php");
            }
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
        header("Location:../../index.php?logout=true");
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
