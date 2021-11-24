<?php
    class Product {
        private $data = [];
        
        public function __get($key)
        {
            return $this->data[$key];
        }

        public function __set($key, $value)
        {
            $this->data[$key] = $value;
        }

        public function infoProduct($idProduct){
            try{
                $query = "SELECT * FROM products WHERE id_product='{$idProduct}'";
                $result = DB::getARecord($query);
                if(isset($result)){
                    return json_encode(array(
                        'status' => '200',
                        'data'=> json_encode([
                            'idProduct' => $result->id_product,
                            'nameProduct' => $result->name_product,
                            'quantityStock' => $result->quantity_stock,
                            'numberOfSongs' => $result->number_of_songs,
                            'idCategory' => $result->id_category,
                            'manufacturer' => $result->manufacturer,
                            'price' => $result->price,
                            'description' => $result->description,
                            'image' => $result->image,
                            'coverImage' => $result->cover_image,
                            'idTopic' => $result->id_topic,
                            'audioDemo' => $result->audio_demo,
                            'dateTime' => $result->date_time,
                            'status' => $result->status,
                            'discount' => $result->discount,
                        ]),
                        'message'=> 'OKE'
                    ));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Lấy dữ liệu thất bại'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function createNewProduct(){
            try{
                $nameProduct = $this->data["name_product"];
                $quantityStock = $this->data["quantity_stock"];
                $numberOfSongs = $this->data["number_of_songs"];
                $idCategory = $this->data["id_category"];
                $manufacturer = $this->data["manufacturer"];
                $price = $this->data["price"];
                $description = $this->data["description"];
                $image = $this->data["image"];
                $coverImage = $this->data["cover_image"];
                $idTopic = $this->data["id_topic"];
                $audioDemo = $this->data["audio_demo"];
                $discount = empty($this->data["discount"]) || $this->data["discount"] < 0 ? 0 : $this->data["discount"];
                $dateTime = $this->data["date_time"];
                $status = $this->data["status"];
                if( empty($nameProduct) || 
                    empty($quantityStock) || 
                    empty($numberOfSongs) || 
                    empty($price)
                ){
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Yêu cầu nhập đầy đủ thông tin'));
                }
                $query = "INSERT INTO products (name_product, quantity_stock, number_of_songs, id_category, manufacturer, price, description, image, cover_image, id_topic, audio_demo, discount, date_time, status)
                        VALUES ('{$nameProduct}','{$quantityStock}','{$numberOfSongs}','{$idCategory}','{$manufacturer}','{$price}','{$description}','{$image}', '{$coverImage}','{$idTopic}','{$audioDemo}','{$discount}','{$dateTime}', '{$status}')";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Thêm mới thất bại'));
                }
            }catch (Exception $e) {
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function editProductInfo($idProduct){
            try{
                $nameProduct = $this->data["name_product"];
                $quantityStock = $this->data["quantity_stock"];
                $numberOfSongs = $this->data["number_of_songs"];
                $idCategory = $this->data["id_category"];
                $manufacturer = $this->data["manufacturer"];
                $price = $this->data["price"];
                $description = $this->data["description"];
                $image = $this->data["image"];
                $coverImage = $this->data["cover_image"];
                $idTopic = $this->data["id_topic"];
                $audioDemo = $this->data["audio_demo"];
                $discount = empty($this->data["discount"])|| $this->data["discount"] < 0 ? 0 : $this->data["discount"];
                $dateTime = $this->data["date_time"];
                if( empty($nameProduct) || 
                    empty($quantityStock) || 
                    empty($numberOfSongs) || 
                    empty($price)
                ){
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Yêu cầu nhập đầy đủ thông tin'));
                }
                $query = "UPDATE products 
                        SET name_product='{$nameProduct}',quantity_stock='{$quantityStock}', number_of_songs='{$numberOfSongs}',id_category='{$idCategory}', manufacturer='{$manufacturer}',price='{$price}', description='{$description}', image='{$image}', cover_image='{$coverImage}', id_topic='{$idTopic}', audio_demo='{$audioDemo}',discount='{$discount}', date_time='{$dateTime}'
                        WHERE id_product='{$idProduct}'";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Thay đổi thông tin thất bại'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function deleteProduct($idProduct){
            try{
                $query = "UPDATE products 
                            SET status='0'
                            WHERE id_product='{$idProduct}'";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Xóa sản phẩm thành công'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function listProductFromDB(){
            try{
                $query = "SELECT * FROM products WHERE status='1'";
                $result = DB::listAll($query);
                if(isset($result)){
                    for($index = 0; $index < count($result); $index++){
                        $queryNameCategory = "SELECT * FROM category WHERE id_category='{$result[$index]->id_category}'";
                        $resultACategory = DB::getARecord($queryNameCategory);
                        $queryNameTopic = "SELECT * FROM topic WHERE id_topic='{$result[$index]->id_topic}'";
                        $resultATopic = DB::getARecord($queryNameTopic);
                        $result[$index]->name_category = $resultACategory->name_category;
                        $result[$index]->name_topic = $resultATopic->name_topic;
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
    }
