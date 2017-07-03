<?php include "./app/views/front/includes/header.php"; ?>
<?php
if(!$session->get_is_login()){
    header("Location: http://gallery.dev");
}
?>
<?php include "./app/views/front/includes/navbar.php" ?> ;
    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <hr/>
        <div class="col-md-12">
            <?php use Gallery\Fn\Fn;?>
            <?php Fn::get_photo_front($database); ?>
        </div>
    </div>
<?php include "./app/views/front/includes/footer.php" ?>