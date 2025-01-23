<?php 

$tableauControleurs=["UserCOntroller"];
$actionParDefaut=array(
    "UserController"=>"connect",
    "UserController"=>"createAccount"
);


require_once(__DIR__."/../config/connexion.php");
Connexion::connect();
$controleur="UserController";
$action="createAccount";



if(isset($_POST["controleur"])&&in_array($_POST["controleur"],$tableauControleurs)){
    $controleur=$_POST["controleur"];
}
require_once(__DIR__."/../controleur/$controleur.php");
if(isset($_POST["action"])&&in_array($_POST["action"],get_class_methods($controleur))){
    $action=$_POST["action"];
}
if(!(isset($_POST["action"])&&in_array($_POST["action"],get_class_methods($controleur)))){
    $action=$actionParDefaut[$controleur];
}

$action::$controleur;