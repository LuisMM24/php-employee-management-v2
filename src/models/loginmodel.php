<?php
class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUser(string $email)
    {
        $userData = [];
        try {
            $query = $this->db->connect()->prepare(
                "SELECT email,password FROM users WHERE email = :email "
            );
            $query->execute([
                ":email" => $email
            ]);
            while ($item = $query->fetch()) {
                $userData["email"] = $item["email"];
                $userData["password"] = $item["password"];
            }
            return $userData;
        } catch (PDOException $e) {
            return [];
        }
    }
}



// Error messages
function checkLoginError()
{
    if (isset($_SESSION["loginError"])) {
        $errorText = $_SESSION["loginError"];
        unset($_SESSION["loginError"]);
        return ["type" => "danger", "text" => $errorText];
    }
}

function checkLoginInfo()
{
    if (isset($_SESSION["loginInfo"])) {
        $infoText = $_SESSION["loginInfo"];
        unset($_SESSION["loginInfo"]);
        return ["type" => "primary", "text" => $infoText];
    }
}

function checkLogout()
{
    if (isset($_GET["logout"]) && !isset($_SESSION["email"])) return ["type" => "primary", "text" => "Logout succesful"];
}
