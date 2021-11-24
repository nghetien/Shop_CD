<?php
    include_once("model/account.php");
    include_once("model/topic.php");
    include_once("model/category.php");
    include_once("model/product.php");
    class ManagementProductController{

        public function __construct(){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'GET':
                    $idProduct = isset($_GET["id"]) ? $_GET["id"] : "";
                    $product = new Product();
                    if(strlen($idProduct) > 0){
                        $result = $product->infoProduct($idProduct);
                        echo $result;
                        break;
                    }
                    $topic = new Topic();
                    $listTopic = $topic->listTopicFromDB();
                    $category = new Category();
                    $listCategory = $category->listCategoryFromDB();
                    $listProduct = $product->listProductFromDB();
                    include "view/admin/management_product.php";
                    break;
                case 'POST':
                    $action = isset($_GET["action"]) ? $_GET["action"] : "";
                    if($action === "topic"){
                        if(isset($_POST["topic"])){
                            $topic = new Topic();
                            $topic->topic = $_POST["topic"];
                            $result = $topic->createNewTopic();
                            if(json_decode($result)->status){
                                $listTopic = $topic->listTopicFromDB();
                            }
                            echo $result;
                        }
                    }else if($action === "category"){
                        if(isset($_POST["category"])){
                            $category = new Category();
                            $category->category = $_POST["category"];
                            $result = $category->createNewCategory();
                            if(json_decode($result)->status){
                                $listCategory = $category->listCategoryFromDB();
                            }
                            echo $result;
                        }
                    }else{
                        if(isset($_POST["name_product"]) || 
                        isset($_POST["quantity_stock"]) || 
                        isset($_POST["number_of_songs"]) || 
                        isset($_POST["price"])){
                            $product = new Product();
                            $product->name_product = $_POST["name_product"];
                            $product->quantity_stock = $_POST["quantity_stock"];
                            $product->number_of_songs = $_POST["number_of_songs"];
                            $product->id_category = $_POST["id_category"];
                            $product->manufacturer = $_POST["manufacturer"];
                            $product->price = $_POST["price"];
                            $product->description = $_POST["description"];
                            $product->image = $_POST["image"];
                            $product->cover_image = $_POST["cover_image"];
                            $product->id_topic = $_POST["id_topic"];
                            $product->discount = $_POST["discount"];
                            $product->date_time = $_POST["date_time"];
                            $product->status = 1;
                            $result = $product->createNewProduct();
                            if(json_decode($result)->status){
                                $listProduct = $product->listProductFromDB();
                            }
                            echo $result;
                        }
                    }
                    break;
                case 'DELETE':
                    parse_str(file_get_contents("php://input"),$putRequest);
                    $idProduct = $putRequest['id_product'];
                    $product = new Product();
                    $result = $product->deleteProduct($idProduct);
                    echo $result;
                    break;
                case 'PUT':
                    parse_str(file_get_contents("php://input"),$putRequest);
                    $idProduct= $putRequest['id_product'];
                    $product = new Product();
                    $product->name_product = $putRequest["name_product"];
                    $product->quantity_stock = $putRequest["quantity_stock"];
                    $product->number_of_songs = $putRequest["number_of_songs"];
                    $product->id_category = $putRequest["id_category"];
                    $product->manufacturer = $putRequest["manufacturer"];
                    $product->price = $putRequest["price"];
                    $product->description = $putRequest["description"];
                    $product->image = $putRequest["image"];
                    $product->cover_image = $putRequest["cover_image"];
                    $product->id_topic = $putRequest["id_topic"];
                    $product->image = $putRequest["image"];
                    $product->discount = $putRequest["discount"];
                    $product->date_time = $putRequest["date_time"];
                    $result = $product->editProductInfo($idProduct);
                    echo $result;
                    break;
                default:
                    break;
            }
        }
    }

    $managementProductController = new ManagementProductController();
?>