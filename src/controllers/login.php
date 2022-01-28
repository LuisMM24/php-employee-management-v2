<?php
// require_once("./loginManager.php");

// if(isset($_GET["login"])){
//     authUser();
// }

// if(isset($_GET["logout"])){
//     destroySession();
// };

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Start session
        session_start();
    }
    public function render()
    {
        $this->view->render("login/index");
    }
    public function authUser()
    {
        // Get form input values
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $userData = $this->model->getUser($email);
        // Now we should look for this values in a database
        if (!empty($userData)) {
            if (password_verify($pass, $userData["password"])) {
                // we usually save in a session variable user id and other user data like name, surname....
                $_SESSION["email"] = $email;
                header("location:" . BASE_URL . "dashboard");
                // when we check that the email and password is correct, we redirect the user to the dashboard 
            } else {
                echo "incorrect password";
            }
        } else {
            echo "Incorrect email";
            //$_SESSION["loginError"] = "Wrong email or password!";
        }
    }
}
