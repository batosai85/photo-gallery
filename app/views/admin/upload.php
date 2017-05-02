<?php include "./app/views/admin/includes/admin_header.php"; ?>
    <div id="wrapper">
<?php include "./app/views/admin/includes/admin_navbar.php"; ?>
<?php include "./app/views/admin/includes/admin_sidebar.php"; ?>
    <div id="page-wrapper">
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Upload</h1>
            <h3><?php Fn::upload_photo($database); ?></h3>
            <hr/>
            <form method="POST" enctype="multipart/form-data">
                <label for="photo_title">Title : </label>
                <input type="text" class="form-control" name="photo_title"/>
                <br/>
                <label for="photo_caption">Caption : </label>
                <input type="text" class="form-control" name="photo_caption"/>
                <br/>
                <label for="photo_alternate_text">Alternate text : </label>
                <input type="text" class="form-control" name="photo_alternate_text"/>
                <br/>
                <label for="photo_description">Description : </label>
                <textarea type="text" class="form-control" name="photo_description"></textarea>
                <br/>
                <label for="filename">Upload photo : </label>
                                    <span class="btn btn-file file-button">
                                        Browse.. <input type="file" name="filename">
                                    </span>
                <br/>
                <br/>
                <input type="submit" class="btn btn-info" value="submit" name="submit"/></form>
        </div>
    </div>
    <br/>
    <br/>
<?php include "./app/views/admin/includes/admin_footer.php"; ?>