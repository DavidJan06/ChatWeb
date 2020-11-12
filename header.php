<?php include_once("session.php");?>

<!-- Navigation -->
<nav class="navbar navbar-expand navbar-dark bg-dark" id="mainNav">
    <div class="container">
        <img src="./icon/Chat.png" style="width:35px;">
        <a class="navbar-brand js-scroll-trigger medieval" href=".\index.php">Chat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION['user_id'])){?>
                <li class="nav-item"><a class="nav-link" href=".\registration.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href=".\login.php">Sign In</a></li>
            <?php }else{?>
                <li class="nav-item"><a class="nav-link" href=".\rooms.php">Rooms</a></li>
                <li class="nav-item"><a class="nav-link" href="user_edit.php"><?php echo $_SESSION['user_name']; ?></a></li>
                <li class="nav-item"><a class="nav-link" href=".\logout.php">Odjava</a></li>
            <?php }?>
            </ul>
        </div>
    </div>
</nav>