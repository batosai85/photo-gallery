<?php include "./app/views/admin/includes/admin_header.php";?>
    <div id="wrapper">
<?php include "./app/views/admin/includes/admin_navbar.php";?>
<?php include "./app/views/admin/includes/admin_sidebar.php";?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Photo</h1>
                </div>
            </div>
            <hr/>
            <br/>
            <?php
                if(isset($_GET["id"])){
                    $photo = Photo_query::get_photo("photos", $_GET["id"], $database);
                }
            ?>
            <div class="col-md-6 col-md-offset-1">
              <img src="../photos/photos/<?php echo $photo->get_user().'/'.$photo->get_photo_filename();?>"
                    alt="" class="img-responsive thumbnail thumb-width-2">
            </div>
            <div class="col-md-5 photo-details">
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    Title : <b><?php echo $photo->get_photo_title();?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    Caption : <b><?php echo $photo->get_photo_caption();?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-calendar" aria-hidden="true"></i> 
                    Alternate text : <b><?php echo $photo->get_photo_alternate_text();?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    Photo id : <b><?php echo $photo->get_id();?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    Filename : <b><?php echo $photo->get_photo_filename();?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    File type : <b><?php echo $photo->get_photo_type();?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    File size : <b><?php echo round($photo->get_photo_size()/1024, 2) . " Kb";?></b> 
                </p>
                <p class="lead">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i> 
                    Description : 
                </p>
                 <blockquote
                  <span class="word-wrap"><?php echo $photo->get_photo_description();?></span>
                </blockquote>
            </div>
        <?php include "./app/views/admin/includes/admin_footer.php";?>