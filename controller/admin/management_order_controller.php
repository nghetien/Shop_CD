<?php
    include_once("model/account.php");
    include_once("model/product.php");
    include_once("model/order.php");
    class ManagementOrderController{
        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    $idOrder = isset($_GET["id"]) ? $_GET["id"] : "";
                    $order = new Order();
                    if(strlen($idOrder) > 0){
                        $result = $order->infoOrder($idOrder);
                        echo $result;
                        break;
                    }
                    $product = new Product();
                    $listProduct = $product->listProductFromDB();
                    $listOrder = $order->listOrderFromDB();
                    include "view/admin/management_order.php";
                    break;
                case 'POST':
                    $order = new Order();
                    $order->date_time = $_POST["date_time"];
                    $order->status = $_POST["status"];
                    $order->total_price = $_POST["total_price"];
                    $order->list_product = $_POST["list_product"];
                    $result = $order->createNewOrder();
                    echo $result;
                    break;
                case 'DELETE':
                    parse_str(file_get_contents("php://input"),$putRequest);
                    $idOrder = $putRequest['id_order'];
                    $order = new Order();
                    $result = $order->deleteOrder($idOrder);
                    echo $result;
                    break;
                case 'PUT':
                    parse_str(file_get_contents("php://input"),$putRequest);
                    $idOrder= $putRequest['id_order'];
                    $order = new Order();
                    $result = $order->transactionOrder($idOrder);
                    echo $result;
                    break;
                default:
                    break;
            }
        }
    }

    $managementOrderController = new ManagementOrderController();
?>