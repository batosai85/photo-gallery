<?php

        class Comment {
            
            private $id;
            private $comment_photo_id;
            private $comment_user;
            private $comment_content;
            private $comment_date;
            
            
            function set_id($id){
                $this->id = $id;
            }
            function set_comment_photo_id($photo_id){
                $this->comment_photo_id = $photo_id;
            }
            function set_comment_user($user){
                $this->comment_user = $user;
            }
            function set_comment_content($content){
                $this->comment_content = $content;
            }
            function set_comment_date($date){
                $this->comment_date = $date;
            }
            
            function get_id(){
                return $this->id;
            }
            function get_comment_photo_id(){
                return $this->comment_photo_id;
            }
            function get_comment_user(){
                return $this->comment_user;
            }
            function get_comment_email(){
                return $this->comment_email;
            }
            function get_comment_content(){
                return $this->comment_content;
            }
            function get_comment_date(){
                return $this->comment_date;
            }
            
        }

?>