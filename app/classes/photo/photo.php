<?php
    

namespace Gallery\Photo;

      class Photo {
        
          private $id;
          private $user;
          private $photo_title;
          private $photo_description;
          private $photo_filename;
          private $photo_type;
          private $photo_size;
          private $photo_date;
          private $photo_caption;
          private $photo_alternate_text;
          private $photo_likes;
          
          public function set_id($id){
              $this->id = $id;
          }
          public function set_user($user){
              $this->user = $user;
          }
          public function set_photo_title($title){
              $this->photo_title = $title;
          }
          public function set_photo_description($description){
              $this->photo_description = $description;
          }
          public function set_photo_filename($filename){
              $this->photo_filename = $filename;
          }
          public function set_photo_type($type){
              $this->photo_type = $type;
          }
          public function set_photo_size($size){
              $this->photo_size = $size;
          }
          public function set_tmp_location($location){
              $this->tmp_location = $location;
          }
          public function set_photo_date($date){
              $this->photo_date = $date;
          }
          public function set_photo_caption($caption){
              $this->photo_caption = $caption;
          }
          public function set_photo_alternate_text($alternate_text){
              $this->photo_alternate_text = $alternate_text;
          }
          public function set_photo_likes($photo_likes){
              $this->photo_likes = $photo_likes;
          }
          
          public function get_id(){
             return $this->id;
          }
          public function get_user(){
              return $this->user;
          }
          public function get_photo_title(){
             return $this->photo_title;
          }
          public function get_photo_description(){
              return $this->photo_description;
          }
          public function get_photo_filename(){
              return $this->photo_filename;
          }
          public function get_photo_type(){
              return $this->photo_type;
          }
          public function get_photo_size(){     
              return $this->photo_size;
          }
          public function get_photo_date(){
              return $this->photo_date;
          }
          public function get_photo_caption(){
              return $this->photo_caption;
          }
          public function get_photo_alternate_text(){
              return $this->photo_alternate_text;
          }
          public function get_photo_likes(){
              return $this->photo_likes;
          }
      }

?>