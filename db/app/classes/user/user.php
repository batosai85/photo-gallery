<?php
 
 namespace Gallery\User;

    class User {
        
        private $id;
        private $photo;
        private $username;
        private $password;
        private $first_name;
        private $last_name;
        
        public function  set_id($id){
            $this->id = $id;
        }
        public function  set_photo($photo){
            $this->photo = $photo;
        }
        public function  set_username($username){
            $this->username = $username;
        }
        public function  set_password($password){
            $this->password = $password;
        }
        public function  set_first_name($first_name){
            $this->first_name = $first_name;
        }
        public function  set_last_name($last_name){
            $this->last_name = $last_name;
        }
        
        public function  get_id(){
           return $this->id;
        }
        public function  get_photo(){
            return $this->photo;
        }
        public function  get_username(){
            return $this->username;
        }
        public function  get_password(){
            return $this->password;
        }
        public function  get_first_name(){
            return $this->first_name;
        }
        public function  get_last_name(){
            return $this->last_name;
        }
    }

?>