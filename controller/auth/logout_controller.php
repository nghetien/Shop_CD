<?php
    include_once("model/account.php");
    class LogoutController{
        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    unset($_SESSION['email']);
                    unset($_SESSION['role']);
                    unset($_SESSION['user_token']);
                    unset($_SESSION['full_name']);
                    include "view/auth/login.php";
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

    new LogoutController();
?>

