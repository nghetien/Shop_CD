<?php
    include_once("model/account.php");

    class HomeController{
        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    include "view/customer/home.php";
                    break;
                case 'POST':
                    break;
                case 'DELETE':
                    break;
                case 'PUT':
                    break;
                default:
                    break;
            }
        }
    }

    new HomeController();
?>