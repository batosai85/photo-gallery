<?php
if(!$session->get_is_login()){
    header("Location: http://gallery.dev");
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://gallery.dev/all-photos">Gallery</a>
        <a class="navbar-brand" href="http://gallery.dev/logout">Logout</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="navbar-brand nav-img">
          <img class="img-rounded" src="<?php  echo '../photos/users/' . $_SESSION["username"] . '/' . $_SESSION["photo"];?>" style="width:25px;"/>
        </li>
        <li class="navbar-brand session-username"><?php echo $_SESSION["username"];?></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
            <ul class="dropdown-menu drop">
                <li>
                    <a href="home"><i class="fa fa-fw fa-dashboard"> </i> Dashboard</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="photos"><i class="fa fa-picture-o" aria-hidden="true"></i>
                    Photos </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="upload"><i class="fa fa fa-upload" aria-hidden="true"> </i> Upload</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="comments"><i class="fa fa-comments" aria-hidden="true"> </i> Comments</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="profile"><i class="fa fa-user" aria-hidden="true"> </i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a  href="http://gallery.dev/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a>
                </li>
        
            </ul>
        </li>
    </ul>

