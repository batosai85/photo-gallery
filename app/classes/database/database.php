<?php
namespace Gallery\Database;

     class Database {

         private $connection;
         private $config;


         function __construct($db_config){
             $this->config = $db_config;
             $this->open_db($this->config );
         }

         private function open_db(){
             try {
                 $this->connection = new \PDO('mysql:host=' . $this->config["host"] . ';dbname=' . $this->config["database"]
                     ,$this->config["user"] , $this->config["password"]);
             } catch (\PDOException $e){
                 die("Connection failed");
             }
         }
         
         public function get_connection(){
             return $this->connection;
         }

         public function database_query($query, $action){
             $statement = $this->connection->prepare($query);
             $statement->execute();
             $result = $statement->$action(\PDO::FETCH_ASSOC);
             return $result;
         }

         public function escape_string($string){
             $string = $this->connection->quote($string);
             return $string;
         }
     }
