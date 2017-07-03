<?php
 
    use Gallery\User\User;

    class pagesCtrl {   
        public static function login(){
            $user = new User();
            require "./app/views/front/login.php";
        }
        public static function logout(){
            require "./app/views/front/logout.php";
        }
        public static function signup(){
            $user = new User();
            require "./app/views/front/signup.php";
        }
        public static function admin(){
            require "./app/views/admin/index.php";
        }
        public static function admin_photos(){
            require "./app/views/admin/photos.php";
        }

        public static function edit_photo(){
            require "./app/views/admin/edit_photo.php";
        }
        public static function view_photo(){
            require "./app/views/admin/view_photo.php";
        }
        public static function upload(){
            require "./app/views/admin/upload.php";
        }
        public static function comments(){
            require "./app/views/admin/comments.php";
        }
        public static function profile(){
            require "./app/views/admin/profile.php";
        }
        public static function edit_profile(){
            require "./app/views/admin/edit_profile.php";
        }
        public static function delete_profile(){
            require "./app/views/admin/delete_profile.php";
        }
        public static function front_photos(){
            require "./app/views/front/photos.php";
        }
        public static function front_photo(){
            require "./app/views/front/photo.php";
        }
        public static function front_search(){
            require "./app/views/front/search.php";
        }
    }