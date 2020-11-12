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
                    <div class="col-sm-3 mx-auto  border-dark rounded bg-light">
                        <h1 class="text-center medieval py-3">Chat</h1>
                    </div>
                    <div class="border rounded bg-light px-4 py-3">
                        <h4 class="madieval">Worlds first and best real-time web chat of the last century.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
</body>
</html>