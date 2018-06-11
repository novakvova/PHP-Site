<?php
require_once "connetiondb.php";
?>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="Index.php">Binary admin</a>
    </div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
        <?php
        if($auth->isAuth())
        {
            echo"<a href='userProfiles.php'>".$auth->getLogin()."</a>";
            echo "&nbsp; <a href=\"logout.php\" class=\"btn btn-success square-btn-adjust\">Вихід</a>";
        }
        else
        {
            echo "<a href=\"login.php\" class=\"btn btn-danger square-btn-adjust\">Вхід</a>";
        }
        ?>
    </div>
</nav>
