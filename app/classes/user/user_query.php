<?php


class User_query extends Db_object
{
    public static function create_user($POST, $FILE, $database)
    {
        $username = $database->escape_string($POST["username"]);
        $password = $database->escape_string($POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
        $first_name = $database->escape_string($POST["first_name"]);
        $last_name = $database->escape_string($POST["last_name"]);
        $query = "SELECT * FROM users WHERE username = $username ";
        $result = $database->database_query($query, "fetchAll");
        if (count($result) < 1) {
            $folder = './photos/users/' . $_POST["username"];
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            if ($photo = self::check_file($FILE, "users", $_POST["username"])) {
                $query = "INSERT INTO users (photo, username, password, first_name, last_name) ";
                $query .= "VALUES ('$photo', $username, '$password', $first_name, $last_name)";
                $result = $database->database_query($query, "fetch");
                header("Location: http://localhost/php/gallery/login");
            } else {
                return false;
            }
        } else {
            echo "<h3 class='message-alert text-center'>Username already exist</h3><br/>";
            return false;
        }
    }

    public static function edit_user($id, $POST, $FILE, $SESSION, $database)
    {
        if (empty($POST["username"]) || empty($POST["password"]) || empty($POST["first_name"]) || empty($POST["first_name"])) {
            echo "<h3 class='user-edited message-alert text-center'>Empty fields are not allowed</h3>";
            return false;
        }

        $username = $database->escape_string($POST["username"]);
        $password = $database->escape_string($POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
        $first_name = $database->escape_string($POST["first_name"]);
        $last_name = $database->escape_string($POST["first_name"]);
        $query = "SELECT * FROM users WHERE username = $username ";

        $result = $database->database_query($query, "fetch");
        if (!$result) {
            self::rename_folder($SESSION["username"], $POST["username"]);
            $photo = self::check_file($FILE, "users", $POST["username"]);
            if ($photo) {
                $query = "UPDATE users SET photo = '$photo', username = $username, ";
                $query .= "password = '$password', first_name = $first_name, ";
                $query .= " last_name = $last_name WHERE id = $id ";
                $result = $database->database_query($query, "fetch");
                Photo_query::update_photo_by_username($SESSION["username"], $username, $database);
                Comment_query::update_comment_by_username($SESSION["username"], $username, $database);
                echo "<h3 class='user-edited message-alert text-center'>User edited, logging out ...</h3>";
            } else {
                return false;
            }
        } else {
            echo "<h3 class='message-alert text-center'>Username already exist</h3>";
            return false;
        }
    }

    public static function get_user($table, $param, $username, $database)
    {
        $result = static::get_all_by_username($table, $param, $username, $database);
        $new_user = new User();
        foreach ($result as $row) {
            $user = static::assign_values($new_user, $row);
        }
        return $user;
    }

    public static function get_users($table, $database)
    {
        $result = static::get_all($table, $database);
        $arr_users = [];
        foreach ($result as $user) {
            $new_user = new User();
            $arr_users[] = static::assign_values($new_user, $user);
        }
        return $arr_users;
    }

    public static function delete_user($table, $id, $SESSION, $database)
    {
        static::delete_one($table, $id, $database);
        $path_users = './photos/users/' . $SESSION["username"];
        $path_photos = './photos/photos/' . $SESSION["username"];
        self::remove_folder($path_users);
        self::remove_folder($path_photos);
    }

    private static function check_file($FILE, $folder, $user)
    {
        if ($_FILES["photo"]["error"] == 4) {
            echo "<h3 class='message-alert text-center'>No photo selected</h3>";
            return false;
        } else {
            $photo = new Photo();
            $photo->set_photo_filename($FILE["photo"]["name"]);
            $temp_location = $FILE["photo"]["tmp_name"];
            $path = "./photos/{$folder}/{$user}/{$photo->get_photo_filename()}";
            $path_save = "./photos/{$folder}/{$user}/{$photo->get_photo_filename()}";
            if (file_exists($path)) {
                unlink($path);
            }
            if (move_uploaded_file($temp_location, $path_save)) {
                unset($temp_location);
                return $photo->get_photo_filename();
            } else {
                return false;
            }
        }
    }

    public static function rename_folder($old_username, $new_username)
    {
        $old_path_users = './photos/users/' . $old_username;
        $old_path_photos = './photos/photos/' . $old_username;
        $new_path_users = './photos/users/' . $new_username;
        $new_path_photos = './photos/photos/' . $new_username;
        if (is_dir($old_path_photos)) {
            rename($old_path_photos, $new_path_photos);
        }
        if (is_dir($old_path_users)) {
            rename($old_path_users, $new_path_users);
        }
    }

    public static function remove_folder($folder)
    {
        if (file_exists($folder)) {
            $files = glob($folder . '/*');
            foreach ($files as $file) {
                if (is_file($file))
                    unlink($file);
            }
            rmdir($folder);
        }
    }

}

