<?php
 
         class Comment_query extends Db_object {
             
             public static function post_comment($table, $POST, $photo_id, $database){
                 if(!empty($POST["content"])){
                    $id = $photo_id;
                    $user = $_SESSION["username"];
                    $content = $database->escape_string($POST["content"]);
                    $date = date('Y-m-d H:i:s');
                
                    $query = "INSERT INTO comments (comment_photo_id, comment_user, ";
                    $query .= "comment_content, comment_date)";
                    $query .= "VALUES ('$id', '$user', $content, '$date')";
                    $result = $database->database_query($query, "fetchAll");
                 }else{
                     return false;
                 }  
            }
             
             public static function get_comments_by_photo_id($table, $param, $id, $database){
                 $rows = static::get_all_by_id($table, $param, $id, $database);
                 $arr_comments = [];
                 foreach($rows as $row){
                     $new_comment = new Comment();
                     $arr_comments[] = static::assign_values($new_comment, $row);
                 }
                 return $arr_comments;
             } 
             
             public static function get_comments($username, $database){
                 $query = "SELECT comments.id, comments.comment_photo_id, comments.comment_user, "; 
                 $query .= "comments.comment_content, comments.comment_date ";
                 $query .= "FROM comments LEFT OUTER JOIN photos ";
                 $query .= "ON comments.comment_photo_id = photos.id ";
                 $query .= "WHERE photos.user = '$username' ";
                 $rows = $database->database_query($query, "fetchAll");
                 $arr_comments = [];
                 foreach($rows as $row) {
                     $new_comment = new Comment();
                     $arr_comments[] = static::assign_values($new_comment, $row);
                 }
                 return $arr_comments;
             }

             public static function update_comment_by_username($old_username, $new_username, $database){
                 $query = "UPDATE comments SET comment_user = $new_username WHERE comment_user = '$old_username'";
                 $result = $database->database_query($query, "fetchAll");
             }
             
             public static function delete_comments($id, $database){
                 $query = "DELETE FROM comments WHERE comment_photo_id = $id ";
                 $result = $database->database_query($query, "fetchAll");
             }
             
         }


