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
        //we set in empty string to don't pass isset in index view
        $this->view->setAlert("", "");
    }
    public function render()
    {
        $this->session->checkSessionLogin();
        $this->view->render("login/index");
    }
    public function authUser()
    {
        // Get form input values
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $userData = $this->model->getUser($email);
        // Now we should look for this values in a database
        //if email is not incorrect
        if (!empty($userData)) {
            if (password_verify($pass, $userData["password"])) {
                session_start();
                // we usually save in a session variable user id and other user data like name, surname....
                $_SESSION["email"] = $email;
                header("location:" . BASE_URL . "dashboard");
                // when we check that the email and password is correct, we redirect the user to the dashboard 
            } else {
                $this->view->setAlert("danger", "Incorrect password");
                $this->render();
            }
        } else {
            $this->view->setAlert("danger", "Incorrect email");
            $this->render();
        }
    }
    public function logOut()
    {
        $this->session->destroySession();
        $this->view->setAlert("info", "You logged out correctly");
        $this->render();
    }
    public function notLogged()
    {
        $this->view->setAlert("warning", "You need to log in!");
        $this->render();
    }
}
