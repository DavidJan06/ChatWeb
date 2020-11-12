<!DOCTYPE html>
<html lang="sl">
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
                        <h1 class="text-center medieval py-3">Make New Room</h1>
                    </div>
                    <div class="border rounded bg-light" style="margin-top: 10%;">
                        <form class="px-4 py-3" name="rooms_add" action="rooms_insert.php" method="post">
                            <div class="form-group">
                                <label for="roomname">Room Name</label>
                                <input type="roomname" name="roomname" class="form-control" id="roomname" placeholder="My Room" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Make Room</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
</body>
</html>