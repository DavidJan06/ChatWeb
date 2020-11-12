<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("core.php"); ?>
</head>
<body>
    <?php 
    include_once("session.php");
    include_once("header.php");
    include_once("randomImage.php");
    ?>

    <section class="main">
        <div class="background fixed-top blur" style="background-image: url('<?php GetImage(); ?>');"></div>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-center my-auto">
                    <div class="center border-dark rounded bg-light">
                        <h1 class="text-center medieval py-3">Sign In</h1>
                    </div>
                    <div class="border rounded bg-light" style="margin-top: 10%;">
                        <form class="px-4 py-3" name="login" action="login_check.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" name="username" class="form-control" id="username" placeholder="bob" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
</body>
</html>