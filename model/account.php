<?php
    class Account {
        private $data = [];
        
        public function __get($key)
        {
            return $this->data[$key];
        }

        public function __set($key, $value)
        {
            $this->data[$key] = $value;
        }

        public function createNewAccount(){
            try{
                $fullName = $this->data["full_name"];
                $phoneNumber = $this->data["phone_number"];
                $email = $this->data["email"];
                $password = $this->data["password"];
                $role = $this->data["id_role"];
                if(empty($fullName) || empty($phoneNumber) || empty($email) || empty($password)){
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Yêu cầu nhập đầy đủ thông tin'));
                }
                $query = "INSERT INTO users (full_name, phone, email, address, password, id_role, status)
                        VALUES ('{$fullName}','{$phoneNumber}','{$email}','','{$password}', '{$role}', '1')";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Email đã tôn tại'));
                }
            }catch (Exception $e) {
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function loginAccount($email, $password){
            try{
                $query = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
                $result = DB::getARecord($query);
                if(isset($result)){
                    $_SESSION['full_name'] = $result->full_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $result->id_role;
                    $_SESSION['user_token'] = md5($email.$_SESSION['role'].$password);
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Email hoặc mật khẩu không chính xác'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function infoAccount($idUser){
            try{
                $query = "SELECT * FROM users WHERE id_user='{$idUser}'";
                $result = DB::getARecord($query);
                if(isset($result)){
                    return json_encode(array(
                        'status' => '200',
                        'data'=> json_encode([
                            'email' => $result->email,
                            'fullName' => $result->full_name,
                            'phone' => $result->phone,
                            'password' => $result->password,
                            'idRole' => $result->id_role,
                            'address' => $result->address,
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

        public function editAccountInfo($idUser){
            try{
                $fullName = $this->data["full_name"];
                $phoneNumber = $this->data["phone_number"];
                $password = $this->data["password"];
                $role = $this->data["id_role"];
                $address = $this->data["address"];
                if(empty($fullName) || empty($phoneNumber) || empty($password)){
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Yêu cầu nhập đầy đủ thông tin'));
                }
                $query = "UPDATE users 
                            SET full_name='{$fullName}',phone='{$phoneNumber}', password='{$password}',id_role='{$role}', address='{$address}'
                            WHERE id_user='{$idUser}'";
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

        public function deleteAccount($idUser){
            try{
                $query = "UPDATE users 
                            SET status='0'
                            WHERE id_user='{$idUser}'";
                $result = DB::execute($query);
                if($result){
                    return json_encode(array('status' => '200', 'data'=> '', 'message'=> ''));
                }else{
                    return json_encode(array('status' => '401', 'data'=> '', 'message'=> 'Xóa tài khoản thành công'));
                }
                echo $result;
            }catch (Exception $e){
                return json_encode(array('status' => '401', 'data'=> '', 'message'=> $e));
            }
        }

        public function listAccountFromDB(){
            try{
                $query = "SELECT * FROM users WHERE status='1'";
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