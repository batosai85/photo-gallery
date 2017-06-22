<?php include "./app/views/front/includes/header.php"; 
    use Gallery\Fn\Fn;
    Fn::login($user, $session, $database);
?>
<div id="wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-4 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1">
                <h3 class='message-alert text-center'><?php echo $session->message; ?></h3><br/>
                <form method="post">
                    <label for="username" >Username :</label>
                    <input type="text" name="username" class="form-control"
                           value="<?php echo htmlentities($user->get_username()); ?>" >
                    <br/>
                    <label for="password" >Password :</label>
                    <input type="password" name="password" class="form-control"
                           value="<?php echo htmlentities($user->get_password()); ?>">
                    <br/>
                    <input type="submit" class="btn btn-info" name="submit" value="Login"/>
                    <a href="signup" class="btn btn-info pull-right">Sign Up</a>
                </form>
            </div>

        </div>
        <br/>
        <br/>
    </div>

