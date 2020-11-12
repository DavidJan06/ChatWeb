<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("core.php"); ?>
</head>
<body>
    <?php 
    include_once("session.php");
    include_once("header.php");
    include_once("connect.php");
    include_once("randomImage.php");
    ?>

    <section class="main">
        <div class="background fixed-top blur" style="background-image: url('<?php GetImage(); ?>');"></div>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-center my-auto">
                    <div class="center border-dark rounded bg-light">
                        <h1 class="text-center medieval py-3">Registration</h1>
                    </div>
                    <div class="border rounded bg-light" style="margin-top: 10%;">
                        <form class="px-4 py-3" name="register" action="user_insert.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Bob" required>
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <input type="password" name="password2" class="form-control" id="password2" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
</body>
</html>