<?php

session_start();

include "connect.php";
include "model/db_form.php";

$controllerGET = isset($_GET["controller"]) ? $_GET["controller"] : "";
$checkUrlAdmin = "controller/admin/{$controllerGET}_controller.php";
$checkUrlCustomer = "controller/customer/{$controllerGET}_controller.php";
$checkUrlAuth = "controller/auth/{$controllerGET}_controller.php";

// die($checkUrlAdmin);

if(file_exists($checkUrlAuth)){
    include $checkUrlAuth;
} else if (file_exists($checkUrlCustomer)){
    include $checkUrlCustomer;
}else if (file_exists($checkUrlAdmin)) {
    if(empty($_SESSION['role']) || $_SESSION['role'] != "1"){
        include "view/customer/home.php";
    }else{
        include $checkUrlAdmin;
    }
}else{
	include "view/customer/home.php";
}
