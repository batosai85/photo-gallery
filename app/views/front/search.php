<?php include "./app/views/front/includes/header.php"?>
<?php include "./app/views/front/includes/navbar.php"?> ;
<!-- Page Content -->
<div class="container">
    <div class="pull-right">
        <i class=" btn btn-lg glyphicon glyphicon-chevron-up scroll-up"></i>
    </div>
    <form method="POST" action="search">
        <div class="input-group search-input" >
            <input type="text" class="form-control" name="search" placeholder="Search galleries"/>
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <hr/>
    </form>
    <div class="row">
        <div class="col-md-12">
            <?php
               use Gallery\Fn\Fn;

               if(isset($_POST["submit"])){
                Fn::get_photos_front($_POST["search"], $database);
               }else if(isset($_GET["username"])){
                   Fn::get_photos_front($_GET["username"], $database);
               }
             ?>
        </div>
    </div> 
    <?php include "./app/views/front/includes/footer.php"?>