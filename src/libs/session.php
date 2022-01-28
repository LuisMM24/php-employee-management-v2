<?php
class Session
{
    public function __construct()
    {
        echo "session class";
    }
    public function checkSession()
    {
        $this->url = isset($_GET["url"]) ? $_GET["url"] : null;
        $this->url = rtrim($this->url, "/");
        $this->url = explode("/", $this->url);

        if ($urlFile == "index.php" || $urlFile == "php-employee-management-v2") {

            if (isset($_SESSION["email"])) {
                header("Location:" . BASE_URL . "dashboard/showEmployees");
            }
        } else {
            if (!isset($_SESSION["email"])) {
                print_r("logico");
                $_SESSION["loginError"] = "You don't have permission to enter the dashboard. Please Login.";
                header("Location:" . BASE_URL);
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
