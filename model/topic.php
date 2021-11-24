<?php
    class Topic {
        private $data = [];
        
        public function __get($key)
        {
            return $this->data[$key];
        }

        public function __set($key, $value)
        {
            $this->data[$key] = $value;
        }

        public function createNewTopic(){
            try{
                $topic = $this->data["topic"];
                if(empty($topic)){
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Yêu cầu nhập đầy đủ thông tin'));
                }
                $query = "INSERT INTO topic (name_topic)
                        VALUES ('{$topic}')";
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

        public function listTopicFromDB(){
            try{
                $query = "SELECT * FROM topic";
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