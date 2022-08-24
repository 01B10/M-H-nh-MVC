<?php 
    if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] = "on"){
        $web_root = "https://".$_SERVER["HTTP_HOST"];
    }else{
        $web_root = "http://".$_SERVER["HTTP_HOST"];
    }

    $docroot = str_replace('/','\\',$_SERVER["DOCUMENT_ROOT"]);
    $root = str_replace('\\','/',str_replace($docroot,'',_DIR_ROOT));

    $web_root = $web_root.$root;

    define("_WEB_ROOT",$web_root);


    require "./configs/routes.php";
    require "./app/App.php";
    require "./core/controllers.php";
?>