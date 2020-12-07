<?php 
 
    class DbOperations{
 
        private $con; 
 
        function __construct(){
 
            require_once dirname(__FILE__).'/DbConnect.php';
 
            $db = new DbConnect();
 
            $this->con = $db->connect();
 
        }
 
        /*CRUD -> C -> CREATE */
 
        public function createFarmer($f_name,$f_address,$f_mobile,$f_email,$f_username,$f_password){
              
                $stmt = $this->con->prepare("INSERT INTO `farmer_reg`(`f_id`, `f_name`, `f_address`, `f_mobile`, `f_email`, `f_username`, `f_password`) VALUES (NULL,?, ?, ?,?,?,?);");
                $stmt->bind_param("ssssss",$f_name,$f_address,$f_mobile,$f_email,$f_username,$f_password);
 
                if($stmt->execute()){
                    return 1; 
                }else{
                    return 2; 
                }
              
            }

             public function createRestUser($name,$address,$mobile,$email,$username,$password){
              
                $stmt = $this->con->prepare("INSERT INTO `restaurant_reg`(`id`, `name`, `address`, `mobile`, `email`, `username`, `password`) VALUES (NULL,?,?,?,?,?,?);");
                $stmt->bind_param("ssssss",$name,$address,$mobile,$email,$username,$password);
 
                if($stmt->execute()){
                    return 3; 
                }else{
                    return 4; 
                }
              
            }

            public function createNGO($ngo_name,$ngo_address,$ngo_contact,$ngo_email,$ngo_password){
              
                $stmt = $this->con->prepare("INSERT INTO `ngo_list`(`id`, `ngo_name`, `ngo_address`, `ngo_contact`, `ngo_email`, `ngo_password`) VALUES (NULL,?,?,?,?,?);");
                $stmt->bind_param("sssss",$ngo_name,$ngo_address,$ngo_contact,$ngo_email,$ngo_password);
 
                if($stmt->execute()){
                    return 5; 
                }else{
                    return 6; 
                }
              
            }

    
            public function farmerLogin($f_username, $f_password){
        
            $stmt = $this->con->prepare("SELECT f_id FROM 
                 farmer_reg WHERE f_username = ? AND f_password = ?");
            $stmt->bind_param("ss",$f_username,$f_password);
            $stmt->execute();
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }

         public function getFarmerByUsername($f_username){
            $stmt = $this->con->prepare("SELECT * FROM 
                farmer_reg  WHERE f_username = ?");
            $stmt->bind_param("s",$f_username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

        public function restaurantLogin($username, $password){
        
            $stmt = $this->con->prepare("SELECT id FROM 
                 restaurant_reg WHERE username = ? AND password = ?");
            $stmt->bind_param("ss",$username,$password);
            $stmt->execute();
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }

         public function getRestaurantByUsername($username){
            $stmt = $this->con->prepare("SELECT * FROM 
                restaurant_reg  WHERE username = ?");
            $stmt->bind_param("s",$username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

         public function NGOLogin($ngo_email,$ngo_password){
        
            $stmt = $this->con->prepare("SELECT id FROM 
                 ngo_list WHERE ngo_email = ? AND ngo_password = ?");
            $stmt->bind_param("ss",$ngo_email,$ngo_password);
            $stmt->execute();
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }

         public function getNGOByUsername($ngo_email){
            $stmt = $this->con->prepare("SELECT * FROM 
                ngo_list  WHERE ngo_email = ?");
            $stmt->bind_param("s",$ngo_email);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }


        }
        
 
    