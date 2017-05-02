<?php include "./app/views/front/includes/header.php";?>

<div id="wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1">
             <div class="message-div">
                <?php  
                    $user = new User();
                    Fn::signup($user, $database);
                ?>
                </div><br/>
                <form method="post"  enctype="multipart/form-data">
                    <label for="username" >Username :</label>
                    <input type="text" name="username" class="form-control" 
                           value="<?php echo htmlentities($user->get_username());?>" >
                    <br/>
                    <label for="password" >Password :</label>
                    <input type="password" name="password" class="form-control"
                           value="<?php echo htmlentities($user->get_password());?>" >
                    <br/>
                    <label for="password" >First name :</label>
                    <input type="text" name="first_name" class="form-control"
                           value="<?php echo htmlentities($user->get_first_name());?>" >
                    <br/>
                    <label for="password" >Last name:</label>
                    <input type="text" name="last_name" class="form-control"
                           value="<?php echo htmlentities($user->get_last_name());?>">
                    <br/>
                    <label for="photo" class="file-button" >Photo : </label>
                    <span class="btn btn-file">
                        Browse.. <input type="file" name="photo">
                    </span>
                    <hr/>
                    <input type="submit" class="btn btn-info" name="submit" value="Submit"/>
                    <a href="login" class="btn btn-info pull-right">Login</a><span></span>
                </form>
            </div>

        </div>
        <br/>
        <br/>
