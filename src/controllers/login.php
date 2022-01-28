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
    }
    public function render()
    {
        $this->view->render("login/index");
    }
}
