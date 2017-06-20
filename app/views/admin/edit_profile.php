<?php include "./app/views/admin/includes/admin_header.php"; ?>
    <div id="wrapper">
<?php include "./app/views/admin/includes/admin_navbar.php"; ?>
<?php include "./app/views/admin/includes/admin_sidebar.php"; ?>
    <div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <?php
             use Gallery\User\User_query;
             use Gallery\Fn\Fn;
            if (isset($_GET["edit"])) {
                $user = User_query::get_user("users", "id", $_GET["edit"], $database);
            }
            ?>
            <div class="col-md-12">
                <h1 class="text-center">Edit : <?php echo $user->get_username(); ?></h1>
                <?php Fn::edit_user($database, $user); ?>
                <hr/>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <form method="post" enctype="multipart/form-data">
                    <label for="username">Username : </label>
                    <input type="text" class="form-control" name="username"
                           value="<?php echo $user->get_username(); ?>"/>
                    <br/>
                    <label for="password">Password : </label>
                    <input type="password" class="form-control" name="password" value=""/>
                    <br/>
                    <label for="first_name">First name : </label>
                    <input type="text" class="form-control" name="first_name"
                           value="<?php echo $user->get_username(); ?>"/>
                    <br/>
                    <label for="last_name">Last name : </label>
                    <input type="text" class="form-control" name="last_name"
                           value="<?php echo $user->get_username(); ?>"/>
                    <br/>
                    <img src="../photos/users/<?php echo $_SESSION["username"] . '/' . $user->get_photo(); ?>"
                         class='user-photo'/>
                    <div class="pull-right col-md-8">
                        <label for="photo" class="file-button">Upload photo : </label>
                          <span class="btn btn-file ">
                              Browse.. <input type="file" name="photo">
                          </span>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <input type="submit" class="btn btn-info" value="submit" name="submit"/>
                </form>
            </div>

        </div>
    </div>
    <br/>
    <br/>


<?php include "./app/views/admin/includes/admin_footer.php"; ?>