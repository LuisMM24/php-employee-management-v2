<?php
//constants
require_once("config/constants.php");
//database class
require_once(LIBS . "database.php");
//controller class template
require_once(LIBS . "classes/controller.php");
//session class
require_once(LIBS . "session.php");
//view class
require_once(LIBS . "classes/view.php");
//model class template
require_once(LIBS . "classes/model.php");
//My app
require_once(LIBS . "router.php");

$rooter = new Router();
