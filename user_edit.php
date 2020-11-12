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

    $query = "SELECT * FROM users where user_id=?";
    $stmt = $pdo->prepare($query);
    $stmt -> execute([$_SESSION['user_id']]);
    $row = $stmt->fetch();
    ?>

<section class="main">
        <div class="background fixed-top blur" style="background-image: url('<?php GetImage(); ?>');"></div>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-center my-auto">
                    <div class="center border-dark rounded bg-light">
                        <h1 class="text-center medieval py-3"><?php echo $_SESSION['user_name']; ?></h1>
                    </div>
                    <div class="border rounded bg-light" style="margin-top: 10%;">
                        <form class="px-4 py-3" name="register" action="user_update.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Bob" value="<?php echo $row['username']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="oldpassword">Old Password</label>
                                <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="password1">New Password</label>
                                <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" >
                            </div>
                            <div class="form-group">
                                <label for="password2">Confirm New Password</label>
                                <input type="password" name="password2" class="form-control" id="password2" placeholder="Password" >
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
</body>
</html>