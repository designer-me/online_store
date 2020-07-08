<?php
$db->where("skyevo_id",$_SESSION['skyevo_id']);
$user = $db->get("skyevo_admin");
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="" class="navbar-brand">Administrator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($user[0]['skyevo_name']); ?>&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-icon"><span class="glyphicon glyphicon-triangle-top pull-right"></span></li>
                        <li class="dropdown-header">Account Settings</li>
                        <li><a href="profile" style="color:black;"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a></li>
                        <li><a href="logout" onclick="return confirm('Are you sure you to log out?');"><span class=" glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
                    </ul>
                </li>                
            </ul>
        </div>
    </div>
</nav>