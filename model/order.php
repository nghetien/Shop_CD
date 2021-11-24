<?php
    class Order {
        private $data = [];
        
        public function __get($key)
        {
            return $this->data[$key];
        }

        public function __set($key, $value)
        {
            $this->data[$key] = $value;
        }

        public function createNewOrder(){
            try{
                $listProduct = json_decode($this->data['list_product']);
                $idUser = $_SESSION['id_user'];
                $dateTime = $this->data["date_time"];
                $status = $this->data["status"];
                $totalPrice = $this->data["total_price"];
                $query = "INSERT INTO orders (id_user, date_time, status, total_price)
                        VALUES ('{$idUser}','{$dateTime}','{$status}','{$totalPrice}')";
                $result = DB::execute($query);
                if($result){
                    $query = "SELECT * FROM orders WHERE date_time='{$dateTime}' AND id_user='{$idUser}' AND total_price='{$totalPrice}'";
                    $getOrder = DB::getARecord($query);
                    $listProduct = json_decode($this->data['list_product']);
                    foreach ($listProduct as $item) {
                        $queryAddDetail = "INSERT INTO order_detail (id_order, id_product, quantity)
                                    VALUES ('{$getOrder->id_order}','{$item->id}','{$item->quantity}')";
                        DB::execute($queryAddDetail);
                    }
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Có sự cố ghi thêm mới'));
                }    
            }catch (Exception $e) {
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function listOrderFromDB(){
            try{
                $query = "SELECT * FROM orders WHERE status!='delete'";
                $result = DB::listAll($query);
                if(isset($result)){
                    for($index = 0; $index < count($result); $index++){
                        $queryUser = "SELECT * FROM users WHERE id_user='{$result[$index]->id_user}'";
                        $resultUser = DB::getARecord($queryUser);
                        $result[$index]->email = $resultUser->email;
                    }
                    return $result;
                }else{
                    return [];
                }
                echo $result;
            }catch (Exception $e){
                echo $e;
                return [];
            }
        }

        public function infoOrder($idOrder){
            try{
                $queryOrder = "SELECT * FROM orders WHERE id_order='{$idOrder}'";
                $queryOrderDetail = "SELECT * FROM order_detail WHERE id_order='{$idOrder}'";
                $resultOrder = DB::getARecord($queryOrder);
                $resultOrderDetail = DB::listAll($queryOrderDetail);
                $listOrderDetail = array();
                for($index = 0; $index < count($resultOrderDetail); $index++){
                    $queryProduct = "SELECT * FROM products WHERE id_product='{$resultOrderDetail[$index]->id_product}'";
                    $resultProduct = DB::getARecord($queryProduct);
                    array_push($listOrderDetail, [
                        'idOrder' => $resultOrderDetail[$index]->id_order,
                        'idProduct' => $resultOrderDetail[$index]->id_product,
                        'quantity' => $resultOrderDetail[$index]->quantity,
                        'idOrderDetail' => $resultOrderDetail[$index]->id_order_detail,
                        'nameProduct' => $resultProduct->name_product,
                        'price'=> $resultProduct->price,
                    ]);
                }
                if(isset($resultOrder) && isset($resultOrderDetail)){
                    return json_encode(array(
                        'status' => '200',
                        'data'=> [
                            'idOrder' => $resultOrder->id_order,
                            'idUser' => $resultOrder->id_user,
                            'dateTime' => $resultOrder->date_time,
                            'status' => $resultOrder->status,
                            'totalPrice' => $resultOrder->total_price,
                            'listProduct' => $listOrderDetail,
                        ],
                        'message'=> 'OKE'
                    ));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Lấy dữ liệu thất bại'));
                }
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function transactionOrder($idOrder){
            try{
                $query = "UPDATE orders 
                        SET status='success'
                        WHERE id_order='{$idOrder}'";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Thanh toán thất bại'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function deleteOrder($idOrder){
            try{
                $query = "UPDATE orders 
                            SET status='delete'
                            WHERE id_order='{$idOrder}'";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Xóa đơn hàng thành công'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }
    }
?>