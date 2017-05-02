<?php     
  
    class Db_object {
        
        public static function get_one($table, $id, $database){
            $query = "SELECT * FROM ". $table ." WHERE id = $id ";
            $result = $database->database_query($query, "fetch");
            return $result;
        }
        
        public static function get_all($table, $database){
            $query = "SELECT * FROM ". $table;
            $result = $database->database_query($query, "fetchAll");
            return $result;
        }
        public static function get_all_by_id($table,$param, $id, $database){
            $query = "SELECT * FROM ". $table . " WHERE " . $param . " = $id";
            $result = $database->database_query($query, "fetchAll");
            return $result;
        }
        public static function get_all_by_username($table,$param, $username,$database){
            $query = "SELECT * FROM ". $table . " WHERE " . $param . " = '$username' ";
            $result = $database->database_query($query, "fetchAll");
            return $result;
        }
        
        public static function delete_one($table,$id, $database){
            $query = "DELETE FROM " .$table. " WHERE  id = $id ";
            $result = $database->database_query($query, "fetch");
        }
        public static function delete_by_param($table,$param, $value, $database){
            $query = "DELETE FROM " .$table. " WHERE " .$param. " = '$value' ";
            $result = $database->database_query($query, "fetch");
        }
        public static function assign_values($obj,$row){
            foreach($row as $prop => $value){
                $set_prop = "set_" .$prop;
                $obj->$set_prop($value);
            }
            return $obj;
        }
        
    }

