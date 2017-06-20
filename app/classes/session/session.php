<?php
namespace Gallery\Session;

     class Session {
         
         private $is_login = false;
         private $user_username;
         public $message = '';
         
         function __construct(){
             session_start();
             if(isset($_SESSION["user_login"])){
                 $this->is_login = true;
             }else{
                 $this->is_login = false;
             }
         }
         
         public function get_is_login(){
             return $this->is_login;
         } 
         
         public function login($username,$password, $database){

                 $this->pre_login($username, $password, $database);
         }
         
         private function pre_login($username, $password ,$database){
             if(empty($username) || empty($password)){
                 $this->message = "Empty fields are not allowed";
                 return false;
             }
             $username = trim($database->escape_string($username));
             $password = trim($database->escape_string($password));

             $query = "SELECT * FROM users WHERE username = $username ";
             $result = $database->database_query($query, "fetch");
             if($result) {
                     if (password_verify($password, $result["password"])) {
                         $this->accept_login($result["username"], $result["photo"]);
                         $this->message = '';
                         header("Location: admin/home");
                     }
             }else{
                 $this->message = "Wrong username or password";
             }
         }
         
         private function accept_login($username, $photo){
             $this->is_login = true;
             $_SESSION["user_login"] = "loged";
             $_SESSION["username"] = $username;
             $_SESSION["photo"] = $photo;
         }
         
          public function logout(){
             $this->is_log = false;
             session_unset();
             header("Location: login");
         }
         


}
