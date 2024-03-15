<?php

define("ROOT", str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define("URI", 'http://localhost/CarShophp/');
require_once ROOT . "autoload.php";
$params = explode("/", $_GET['p']); //    auths/register/
// print_r($params);
if ($params[0] != "") {

    $nomController = ucfirst($params[0]);//    $params[0] = Auths $params[1] =register
    if (file_exists(ROOT . "controllers/" . $nomController . ".php")) { // phpbibliotek/controllers/Auths.php
        $controller = new $nomController(); //  $oAuths = new Auths();
        $action = $params[1];
       
        $controller->$action(); // $controller->inscription();
     
    } else {
        echo "Controller don't exist";
    }

} else {
    echo "Add param controller";
}
?>