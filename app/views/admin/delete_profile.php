<?php include "./app/views/admin/includes/admin_header.php";?>
<?php 
    use Gallery\Fn\Fn;
    Fn::delete_user($database);
?>