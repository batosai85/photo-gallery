<?php include "./app/views/admin/includes/admin_header.php";?>
<div id="wrapper">
    <div class="pull-right">
        <i class=" btn btn-lg glyphicon glyphicon-chevron-up scroll-up"></i>
    </div>
    <?php include "./app/views/admin/includes/admin_navbar.php";?>
    <?php include "./app/views/admin/includes/admin_sidebar.php";?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Photos</h1>
                </div>
            </div>
            <br/>
            <br/>
            <table class="table table-hover">
               <th>Photo</th>
               <th>Title</th>
               <th>Filename</th>
               <th>Type</th>
               <th>Size</th>
               <th>Likes</th>
               <th>Actions</th>
                <?php Fn::delete_photo($database);?>
                <?php Fn::get_photos($database);?>
            </table>

<?php include "./app/views/admin/includes/admin_footer.php";?>