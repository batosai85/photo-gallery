<?php include "./app/views/admin/includes/admin_header.php"; ?>
    <div id="wrapper">
    <div class="pull-right">
        <i class=" btn btn-lg glyphicon glyphicon-chevron-up scroll-up"></i>
    </div>
    <?php include "./app/views/admin/includes/admin_navbar.php"; ?>
    <?php include "./app/views/admin/includes/admin_sidebar.php"; ?>
    <div id="page-wrapper">
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Comments </h1>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-hover">
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
        <th>Content</th>
        <th>Date</th>
        <th>Delete</th>
        <?php Fn::delete_comment($database); ?>
        <?php Fn::get_comments($database); ?>
    </table>

    <br/>
    <br/>

<?php include "./app/views/admin/includes/admin_footer.php";?>