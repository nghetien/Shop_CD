<?php
    class Category {
        private $data = [];
        
        public function __get($key)
        {
            return $this->data[$key];
        }

        public function __set($key, $value)
        {
            $this->data[$key] = $value;
        }

        public function createNewCategory(){
            try{
                $category = $this->data["category"];
                if(empty($category)){
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Yêu cầu nhập đầy đủ thông tin'));
                }
                $query = "INSERT INTO category (name_category)
                        VALUES ('{$category}')";
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

        public function listCategoryFromDB(){
            try{
                $query = "SELECT * FROM category";
                $result = DB::listAll($query);
                if(isset($result)){
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
?>