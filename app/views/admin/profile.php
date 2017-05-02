<?php include "./app/views/admin/includes/admin_header.php";?>
    <div id="wrapper">
<?php include "./app/views/admin/includes/admin_navbar.php";?>
<?php include "./app/views/admin/includes/admin_sidebar.php";?>
    <div id="page-wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Profile</h1>
                    <hr/>
                </div>
            </div>
            <br/>
            <br/>
                <?php Fn::get_user($database);?>
                
            <?php include "./app/views/admin/includes/admin_footer.php";?>