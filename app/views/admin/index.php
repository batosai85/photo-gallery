<?php include "./app/views/admin/includes/admin_header.php";?>

    <div id="wrapper">
    <div class="pull-right">
        <i class=" btn btn-lg glyphicon glyphicon-chevron-up scroll-up"></i>
    </div>
        <?php include "./app/views/admin/includes/admin_navbar.php";?>
            <?php include "./app/views/admin/includes/admin_sidebar.php";?>
            <?php 
               use Gallery\Photo\Photo_query;
               use Gallery\Comment\Comment_query;
            ?>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="pull-right">
                            <i class=" btn btn-lg glyphicon glyphicon-chevron-up scroll-up"></i>
                        </div>
                        <h1 class="text-center">Statistics</h1>
                        <hr/>
                        <div class="row">
                         <div class='col-md-6'>
                            <br/>
                            <br/>
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['bar']
                                });
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                    ['Gallery details', 'Count'],
                                    ['Photos', <?php $photos = Photo_query::get_photos("photos", "user", $_SESSION["username"], $database); echo count($photos);?>],
                                    ['Comments', <?php $comments = Comment_query::get_comments($_SESSION["username"],$database); echo count($comments);?>],
                                    ['Likes', <?php $photos = Photo_query::get_photos("photos", "user", $_SESSION["username"],$database);
                                                      $likes = 0;
                                                      foreach ($photos as $photo){
                                                          $likes = $likes + $photo->get_photo_likes();
                                                      }
                                                      echo $likes;
                                    ?>]
                                ]);
                                    var options = {
                                        chart: {
                                            title: '',
                                        }
                                    };
                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="columnchart_material"></div>
                        </div>
                        <div class='col-md-6'>
                           <br/>
                           <br/>
                           <br/>
                            <div class="col-lg-8 col-lg-offset-2 col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3"> <i class="fa fa-files-o fa-5x"></i> </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                    <?php $photos = Photo_query::get_photos("photos", "user", $_SESSION["username"],$database); echo count($photos);?>
                                                </div>
                                                <div>Photos</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="photos">
                                        <div class="panel-footer"> 
                                            <span class="pull-left">View Details</span> 
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                                <div class="col-lg-8 col-lg-offset-2 col-md-8">
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3"> <i class="fa fa-files-o fa-5x"></i> </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">
                                                        <?php $comments = Comment_query::get_comments($_SESSION["username"], $database); echo count($comments);?>
                                                    </div>
                                                    <div>Comments</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="comments">
                                            <div class="panel-footer"> 
                                                <span class="pull-left">View Details</span> 
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>

        <?php include "./app/views/admin/includes/admin_footer.php";?>