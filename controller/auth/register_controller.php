<?php
    include_once("model/account.php");

    class RegisterController{
        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    include "view/auth/register.php";
                    break;
                case 'POST':
                    if(isset($_POST["full_name"])
                        && isset($_POST["phone_number"])
                        && isset($_POST["email_register"])
                        && isset($_POST["password_register"])){
                            $account = new Account();
                            $account->full_name = $_POST["full_name"];
                            $account->phone_number = $_POST["phone_number"];
                            $account->email = $_POST["email_register"];
                            $account->password = $_POST["password_register"];
                            $account->id_role = "2";
                            $result = $account->createNewAccount();
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

    new RegisterController();
?>