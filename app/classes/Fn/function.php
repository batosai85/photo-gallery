<?php
namespace Gallery\Fn;

use Gallery\User\User_query;
use Gallery\Photo\Photo_query;
use Gallery\Comment\Comment_query;


$photo_query = new Photo_query();

class Fn
{
    public static function login($user, $session, $database)
    {
        if (isset($_SESSION["user_login"])) {
            header("Location: http://localhost/php/gallery/admin/home");
        }
        $user->set_username = '';
        $user->set_password = '';
        if (isset($_POST["submit"])) {
            $session->login($_POST["username"], $_POST["password"], $database);
            $user->set_username($_POST["username"]);
            $user->set_password($_POST["password"]);
        }
    }

    public static function signup($user, $database)
    {
        $user->set_username = '';
        $user->set_password = '';
        $user->set_first_name = '';
        $user->set_last_name = '';

        if (isset($_POST["submit"])) {
            if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"])) {
                User_query::create_user($_POST, $_FILES, $database);
                $user->set_username($_POST["username"]);
                $user->set_password($_POST["password"]);
                $user->set_first_name($_POST["first_name"]);
                $user->set_last_name($_POST["last_name"]);
            } else {
                echo "<h3 class='message-alert text-center'>Empty fields are not allowed</h3><br/>";
            }
        }
    }

    public static function get_user($database)
    {
        $user = User_query::get_user("users", "username", $_SESSION["username"], $database);
        echo "<img class='user-photo img-responsive img-rounded pull-left' src='../photos/users/{$_SESSION["username"]}/{$user->get_photo()}'/>";
        echo "<ul class='list-group profile-ul pull-left'>";
        echo "<li class='list-group-item text-center'><h4>Profile id : <b>{$user->get_id()}</b></h4></li>";
        echo "<li class='list-group-item text-center'><h4>Profile username : <b>{$user->get_username()}</b></h4></li>";
        echo "<li class='list-group-item text-center'><h4>Profile firstname : <b>{$user->get_first_name()}</b></h4></li>";
        echo "<li class='list-group-item text-center'><h4>Profile lastname : <b>{$user->get_last_name()}</b></h4></li>";
        echo "<li class='list-group-item actions text-center'> ";
        echo "<h4><a href='delete-profile?delete={$user->get_id()}' class='btn btn-info delete-user' data-user='{$user->get_username()}'>";
        echo "<i class='fa fa-trash-o' aria-hidden='true'></i></a>";
        echo "&nbsp;<a href='edit_profile?edit={$user->get_id()}' class='btn btn-info'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
        echo "</h4></li></ul>";

    }

    public static function edit_user($database, $user)
    {
        if (isset($_POST["submit"])) {
            $id = $user->get_id();
            User_query::edit_user($id, $_POST, $_FILES, $_SESSION, $database);
        }
    }

    public static function delete_user($database)
    {
        if (isset($_GET["delete"])) {
            $photos = Photo_query::get_photos("photos", "user", $_SESSION["username"], $database);
            foreach ($photos as $photo) {
                Photo_query::delete_photo("photos", $photo->get_id(), $_SESSION["username"], $database);
                Comment_query::delete_comments($photo->get_id(), $database);
            }
            User_query::delete_user("users", $_GET["delete"], $_SESSION, $database);
            header("Location: http://localhost/php/gallery/logout");
        }
    }

    public static function get_photos($database)
    {
        $photos = Photo_query::get_photos("photos", "user", $_SESSION["username"], $database);
        foreach ($photos as $photo) {
            $photo_size = $photo->get_photo_size();
            $photo_size = round($photo_size / 1024, 2);
            echo "<tr>";
            echo "<td>";
            echo "<a href='view-photo?id={$photo->get_id()}'>";
            echo "<img class='photo' src='../photos/photos/{$_SESSION["username"]}/{$photo->get_photo_filename()}'/></a>";
            echo "</td>";
            echo "<td>{$photo->get_photo_title()}</td>";
            echo "<td>{$photo->get_photo_filename()}</td>";
            echo "<td>{$photo->get_photo_type()}</td>";
            echo "<td>{$photo_size} Kb</td>";
            echo "<td>{$photo->get_photo_likes()}</td>";
            echo "<td class='actions'>";
            echo "<h5><a href='photos?delete={$photo->get_id()}' class='btn btn-info'><i class='fa fa-trash-o' aria-hidden='true'></i></a></h5>";
            echo "<h5><a href='edit-photo?edit={$photo->get_id()}' class='btn btn-info'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></h5>";
            echo "<h5><a href='view-photo?id={$photo->get_id()}' class='btn btn-info'><i class='fa fa-eye' aria-hidden='true'></i></a></h5>";
            echo "</td>";
            echo "</tr>";
        }
    }

    public static function upload_photo($database)
    {
        if (isset($_POST["submit"])) {
            Photo_query::upload_photo($_POST, $_FILES, $_SESSION, $database);
        }
    }

    public static function delete_photo($database)
    {
        if (isset($_GET["delete"])) {
            Photo_query::delete_photo("photos", $_GET["delete"], $_SESSION, $database);
            Comment_query::delete_comments($_GET["delete"], $database);
        }
    }

    public static function get_photos_front($username, $database)
    {
        $photos = Photo_query::get_photos("photos", "user", $username, $database);
        if (count($photos) < 1) {
            echo "<h3 class='message-alert text-center'>Gallery is empty</h3>";
        } else {
            foreach ($photos as $photo) {
                $comments = Comment_query::get_comments_by_photo_id("comments", "comment_photo_id", $photo->get_id(), $database);
                echo "<div class='col-md-4 col-sm-6 text-center photo-container'>";
                echo "<div class='photo-scale'>";
                echo "<i class='fa fa-thumbs-o-up' aria-hidden='true' style='font-size:24px;margin-right: 15px;'> {$photo->get_photo_likes()}</i>";
                echo "<i class='fa fa-comments' aria-hidden='true' style='font-size:24px;'> " . count($comments) . "</i>";
                echo "<h4>View photo and comment</h4>";
                echo "<a href='photo?id={$photo->get_id()}' class='btn'><i class='fa fa-file-image-o' aria-hidden='true' style='font-size:48px;'></i></a>";
                echo "</div>";
                echo "<img class='img-responsive img-thumbnail photo-gallery' alt='{$photo->get_photo_alternate_text()}'";
                echo "src='photos/photos/{$photo->get_user()}/{$photo->get_photo_filename()}'/>";
                echo "</div>";
            }
        }
    }

    public static function get_photo_front($database)
    {
        if (isset($_GET["id"])) {
            $photo = Photo_query::get_photo("photos", $_GET["id"], $database);
            echo "<div class='col-md-8 photo-front text-center'>";
            echo "<img src='photos/photos/{$photo->get_user()}/{$photo->get_photo_filename()}' alt='{$photo->get_photo_alternate_text()}' style='width:65%;'/>";
            echo "</div>";
            echo "<div class='col-md-4 comments'>";
            echo "<h3><a href='photo?id={$_GET["id"]}&like=like' class='btn btn-xs btn-info'>Like <i class='fa fa-thumbs-o-up' aria-hidden='true'></i></a>";
            echo "<button class='btn btn-xs btn-info btn-comments '>Add comment</button>";
            echo "&nbsp;<a href='search?username={$photo->get_user()}' class='btn btn-xs btn-info'>Back</a></h3>";
            echo "<h3 class='text-left message'> </h3>";
            Fn::post_comment($database);
            Fn::like_photo($database);
            echo "<div class='comment-div text-center'>";
            echo "<form method='POST' action='photo?id={$_GET["id"]}'>";
            echo "<label>Commment</label>";
            echo "<textarea class='form-control content' name='content'></textarea><br/>";
            echo "<input type='submit' value='Send' name='submit' class='btn btn-info submit-comment'/>";
            echo "<button class='btn btn-info cancel-comment'>Cancel</button>";
            echo "</form>";
            echo "</div>";
            Fn::get_comments_by_photo_id($database);
            echo "</div>";
        }
    }

    public static function like_photo($database)
    {
        if (isset($_GET["like"])) {
            Photo_query::add_photo_like($_GET["id"], $database);
        }
    }

    public static function post_comment($database)
    {
        if (isset($_POST["submit"])) {
            Comment_query::post_comment("comments", $_POST, $_GET["id"], $database);
        }
    }

    public static function get_comments_by_photo_id($database)
    {
        $comments = Comment_query::get_comments_by_photo_id("comments", "comment_photo_id", $_GET["id"], $database);
        foreach ($comments as $comment) {
            echo "<div class='col-md-12'>";
            echo "<h4><span>{$comment->get_comment_user()} &nbsp;<span>";
            echo "<small>{$comment->get_comment_content()}</small></h4>";
            echo "<small> {$comment->get_comment_date()}</small><hr/>";
            echo "</div>";
        }
    }

    public static function get_comments($database)
    {
        $comments = Comment_query::get_comments($_SESSION["username"], $database);
        foreach ($comments as $comment) {
            $photo = Photo_query::get_photo("photos", $comment->get_comment_photo_id(), $database);
            echo "<tr>";
            echo "<td>{$comment->get_id()}</td>";
            echo "<td><a href='http://localhost/php/gallery/photo?id={$comment->get_comment_photo_id()}'>";
            echo "<img src='../photos/photos/{$_SESSION["username"]}/{$photo->get_photo_filename()}' class='user-photo'/></td></a>";
            echo "<td>{$comment->get_comment_user()}</td>";
            echo "<td>{$comment->get_comment_content()}</td>";
            echo "<td>{$comment->get_comment_date()}</td>";
            echo "<td><a href='comments?delete={$comment->get_id()}' class='btn btn-info'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
            echo "<tr/>";

        }
    }

    public static function delete_comment($database)
    {
        if (isset($_GET["delete"])) {
            Comment_query::delete_one("comments", $_GET["delete"], $database);
        }
    }
}

