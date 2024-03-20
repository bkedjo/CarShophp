<?php
session_start();

define("URI", "http://localhost/carshophp/");
define("ROOT", str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
require_once ROOT . "autoload.php";
$params = explode("/", $_GET['p']); //    auths/register/
// print_r($params);
if ($params[0] != "") {

    $nomController = ucfirst($params[0]);//    $params[0] = Auths $params[1] =register
    if (file_exists(ROOT . "controllers/" . $nomController . ".php")) { // carshophp/controllers/Auths.php
        $controller = new $nomController(); //  $oAuths = new Auths();
        $action = isset($params[1]) ? $params[1] : 'index';
        if (method_exists($controller, $action)) {
            // [paniers,modifier,36]
            array_shift($params);
            //[modifier][36]
            array_shift($params);
            //36
            call_user_func_array([$controller, $action], $params);

        }
        header("Location: " . URI . "voitures/index");
    } else {
        header("Location: " . URI . "voitures/index");
    }

} else {
    header("Location: " . URI . "voitures/index");
}




