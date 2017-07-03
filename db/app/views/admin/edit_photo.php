<?php include "./app/views/admin/includes/admin_header.php";?>
<div id="wrapper">
    <?php include "./app/views/admin/includes/admin_navbar.php";?>
    <?php include "./app/views/admin/includes/admin_sidebar.php";?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Edit photo</h1>
                </div>
            </div>
            <br/>
            <br/>
            <?php
                use Gallery\Photo\photo_query;
                if(isset($_POST["submit"])){
                    Photo_query::update_photo($_POST, $_GET["edit"], $database);
                }
                 if(isset($_GET["edit"])){
                      $photo = Photo_query::get_photo("photos", $_GET["edit"], $database);
                  }
            ?>     
           <div class="col-md-7">
            <form method="POST" enctype="multipart/form-data">
                <label for="photo_title">Title : </label>
                <input type="text" class="form-control" name="photo_title" value="<?php echo $photo->get_photo_title();?>" />
                <br/>
                <label for="photo_caption">Caption : </label>
                <input type="text" class="form-control" name="photo_caption" value="<?php  echo $photo->get_photo_caption();?>" />
                <br/>
                <label for="photo_alternate_text">Alternate text : </label>
                <input type="text" class="form-control" name="photo_alternate_text" value="<?php echo $photo->get_photo_alternate_text();?>" />
                <br/>
                <label for="photo_description">Description : </label>
                <textarea type="text" class="form-control" name="photo_description">
                    <?php echo $photo->get_photo_title();?>
                </textarea>
                <br/>
                <input type="submit" class="btn btn-info" value="submit" name="submit"/> </form>
            </div>
            <div class="col-md-5 text-left photo-details">
                <h2>Photo info</h2>
                <hr/>
             <p class="lead">
                 <i class="fa fa-calendar" aria-hidden="true"></i> 
                 Uploaded on : <b><?php echo $photo->get_photo_date();?></b> 
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
                <img class="thumbnail thumb-width"
                     src="../photos/photos/<?php echo $photo->get_user().'/'.$photo->get_photo_filename();?>"/>
            </div>
        </div>
    
    <?php include "./app/views/admin/includes/admin_footer.php";?>