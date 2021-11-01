<?php
    include_once("model/account.php");
    class LoginController{
        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    include "view/auth/login.php";
                    break;
                case 'POST':
                    if(isset($_POST["email"])
                        && isset($_POST["password"])){
                            $account = new Account();
                            $result = $account->loginAccount($_POST["email"], $_POST["password"]);
                            echo $result;
                        }
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

    new LoginController();
?>

