<?php
 
   //namespace Gallery\CSR;

    class CSRouter {
        private $routes = [

        ];
        public static function route_login(){
            require "./app/views/front/login.php";
        }
        public static function route_logout(){
            require "./app/views/front/logout.php";
        }
        public static function route_signup(){
            require "./app/views/front/signup.php";
        }
        public static function route_admin(){
            require "./app/views/admin/index.php";
        }
        public static function route_admin_photos(){
            require "./app/views/admin/photos.php";
        }

        public static function route_edit_photo(){
            require "./app/views/admin/edit_photo.php";
        }
        public static function route_view_photo(){
            require "./app/views/admin/view_photo.php";
        }
        public static function route_upload(){
            require "./app/views/admin/upload.php";
        }
        public static function route_comments(){
            require "./app/views/admin/comments.php";
        }
        public static function route_profile(){
            require "./app/views/admin/profile.php";
        }
        public static function route_edit_profile(){
            require "./app/views/admin/edit_profile.php";
        }
        public static function route_delete_profile(){
            require "./app/views/admin/delete_profile.php";
        }
        public static function route_front_photos(){
            require "./app/views/front/photos.php";
        }
        public static function route_front_photo(){
            require "./app/views/front/photo.php";
        }
        public static function route_front_search(){
            require "./app/views/front/search.php";
        }
    }