<?php


class Photo_query extends Db_object
{

    public static function upload_photo($POST, $FILE, $SESSION, $database)
    {
        if (!empty($POST["photo_title"]) && !empty($POST["photo_description"])) {
            $title = $database->escape_string($POST["photo_title"]);
            $caption = $database->escape_string($POST["photo_caption"]);
            $alternate_text = $database->escape_string($POST["photo_alternate_text"]);
            $description = $database->escape_string($POST["photo_description"]);
            $date = date('Y-m-d H:i:s');
            $photo_likes = 0;
            $user = $_SESSION["username"];
            $folder = './photos/photos/' . $SESSION["username"];
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $photo = self::check_file($FILE, $SESSION["username"]);

            if ($photo) {
                $query = "INSERT INTO photos (user, photo_title, photo_description, photo_filename, photo_type, photo_size, ";
                $query .= "photo_date, photo_caption, photo_alternate_text, photo_likes) ";
                $query .= "VALUES ('$user', $title, $description, '{$photo->get_photo_filename()}', '{$photo->get_photo_type()}',";
                $query .= "'{$photo->get_photo_size()}', '$date', $caption, $alternate_text, '$photo_likes')";
                $result = $database->database_query($query, "fetch");
            }
        } else {
            echo "<h3 class='message-alert text-center'>Empty fields are not allowed</h3>";
            return false;
        }
    }

    public static function update_photo($POST, $id, $database)
    {
        if (!empty($POST["photo_title"]) && !empty($POST["photo_description"]) && !empty($POST["photo_caption"]) && !empty($POST["photo_alternate_text"])) {
            $title = $database->escape_string($POST["photo_title"]);
            $caption = $database->escape_string($POST["photo_caption"]);
            $alternate_text = $database->escape_string($POST["photo_alternate_text"]);
            $description = $database->escape_string($POST["photo_description"]);
            $query = "UPDATE photos SET  photo_title = $title,  photo_description = $description, ";
            $query .= "photo_caption = $caption, ";
            $query .= "photo_alternate_text = $alternate_text WHERE id = $id ";
            $result = $database->database_query($query, "fetch");
            echo "<h3 class='message-alert text-center photo-edited'>Photo details update</h3>";
        } else {
            echo "<h3 class='message-alert text-center photo-edited'>Empty fields are not allowed</h3>";
            return false;
        }
    }

    public static function update_photo_by_username($old_username, $new_username, $database)
    {
        $query = "UPDATE photos SET user = $new_username WHERE user = '$old_username'";
        $result = $database->database_query($query, "fetchAll");
    }

    public static function get_photo($table, $id, $database)
    {
        $result = static::get_one($table, $id, $database);
        $new_photo = new Photo();
        $photo = static::assign_values($new_photo, $result);
        return $photo;
    }

    public static function get_photos($table, $param, $username, $database)
    {
        $rows = static::get_all_by_username($table, $param, $username, $database);
        $arr_photos = [];
        foreach ($rows as $row) {
            $new_photo = new Photo();
            $arr_photos[] = static::assign_values($new_photo, $row);
        }
        return $arr_photos;
    }

    public static function delete_photo($table, $id, $SESSION, $database)
    {
        $result = static::get_one($table, $id, $database);
        $file = $result["photo_filename"];
        $path = "./photos/photos/" . $SESSION["username"] . '/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }
        static::delete_one($table, $id, $database);
    }

    public static function delete_photo_by_username($table, $param, $username, $database)
    {
        static::delete_by_param($table, $param, $username, $database);
    }

    private static function check_file($FILE, $username)
    {
        if ($_FILES["filename"]["error"] == 4) {
            echo "<h3 class='message-alert text-center'>Empty fields are not allowed</h3>";
            return false;
        } else {
            $photo = new Photo();
            $photo->set_photo_filename($FILE["filename"]["name"]);
            $temp_location = $FILE["filename"]["tmp_name"];
            $photo->set_photo_size($FILE["filename"]["size"]);
            $photo->set_photo_type($FILE["filename"]["type"]);
            $path = "./photos/photos/{$username}/{$photo->get_photo_filename()}";
            if (file_exists($path)) {
                echo "<h3 class='upload-photo message-alert text-center '>Photo already exist</h3>";
                return false;
            } else {
                if (move_uploaded_file($temp_location, $path)) {
                    unset($temp_location);
                    echo "<h3 class='upload-photo message-alert text-center'>Photo uploaded</h3>";
                    return $photo;
                } else {
                    echo "Wrong directory";
                    return false;
                }
            }
        }
    }

    public static function add_photo_like($id, $database)
    {
        $query = "UPDATE photos SET photo_likes = photo_likes + 1 WHERE id = $id";
        $result = $database->database_query($query, "fetchAll");
    }

}