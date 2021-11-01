<?php
    include_once("model/account.php");
    class ManagementAccountController{

        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    $idUser = isset($_GET["id"]) ? $_GET["id"] : "";
                    $action = isset($_GET["action"]) ? $_GET["action"] : "";
                    $account = new Account();
                    if(strlen($idUser) > 0){
                        $result = $account->infoAccount($idUser);
                        echo $result;
                        break;
                    }
                    $listAccount = $account->listAccountFromDB();
                    if($action == "reload"){
                        echo json_encode($listAccount);
                        break;
                    }
                    include "view/admin/management_account.php";
                    break;
                case 'POST':
                    if(isset($_POST["full_name"])
                        && isset($_POST["phone_number"])
                        && isset($_POST["email"])
                        && isset($_POST["password"])
                        && isset($_POST["id_role"])){
                            $account = new Account();
                            $account->full_name = $_POST["full_name"];
                            $account->phone_number = $_POST["phone_number"];
                            $account->email = $_POST["email"];
                            $account->password = $_POST["password"];
                            $account->id_role = $_POST["id_role"];
                            $result = $account->createNewAccount();
                            if(json_decode($result)->status){
                                $listAccount = $account->listAccountFromDB();
                            }
                            echo $result;
                        }
                    break;
                case 'DELETE':
                    parse_str(file_get_contents("php://input"),$putRequest);
                    $idUser = $putRequest['id_user'];
                    $account = new Account();
                    $result = $account->deleteAccount($idUser);
                    echo $result;
                    break;
                case 'PUT':
                    parse_str(file_get_contents("php://input"),$putRequest);
                    $idUser = $putRequest['id_user'];
                    $account = new Account();
                    $account->full_name = $putRequest["full_name"];
                    $account->phone_number = $putRequest["phone_number"];
                    $account->password = $putRequest["password"];
                    $account->id_role = $putRequest["id_role"];
                    $account->address = $putRequest["address"];
                    $result = $account->editAccountInfo($idUser);
                    echo $result;
                    break;
                default:
                    break;
            }
        }
    }

    $managementAccountController = new ManagementAccountController();
?>