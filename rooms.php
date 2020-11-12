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
    include_once("databaseFunctions.php");
    include_once("randomImage.php");
    ?>

    <section class="main">
        <div class="background fixed-top blur" style="background-image: url('<?php GetImage(); ?>');"></div>
        <div class="container h-100">
            <div class="row justify-content-center ">
                <div class="col-center my-3">
                    <div class="center border-dark rounded bg-light">
                        <h1 class="text-center medieval py-3">Rooms</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-center">
                    <div class="border rounded bg-light">
                    <div class="text-center medieval p-3">
                        <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Number of Users</th>
                                <th scope="col">Join</th>
                            </tr>
                        </thead>
                            <?php
                                
                                $res = request($pdo, "SELECT * FROM rooms");
                                while($row = $res->fetch()){
                                    echo '<tr>';
                                    echo '<td>'.$row['name'].'</td>';

                                    $res1 = request($pdo, "SELECT COUNT(*) AS number FROM connection WHERE room_id=? AND connected = 1", $row['room_id']);
                                    $number = $res1->fetch();

                                    echo '<td>'.$number['number'].'</td>';
                                    echo '<td><form action="chat.php" method="post">';
                                    echo '<input type="hidden" id="room_id" name="room_id" value="'.$row['room_id'].'">';
                                    echo '<button class="btn btn-link" type="submit"><img src="./icon/Chat.png" width="25"></button>';
                                    echo '</form></td>';
                                    echo '</tr>';
                                }
                            ?>
                            <tr><td colspan="5"><a href="rooms_add.php">Make New Room</a></td></tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once("footer.php"); ?>
</body>
</html>