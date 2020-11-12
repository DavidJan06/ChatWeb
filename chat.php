<!DOCTYPE html>
<html lang="sl">

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

    $room_id;

    if (!empty($_POST['room_id'])) {
        $room_id = $_POST['room_id'];
        $_SESSION['room_id'] = $room_id;
    } else {
        $room_id = $_SESSION['room_id'];
    }

    $res = request($pdo, "SELECT * FROM connection WHERE room_id=? AND user_id=?", $room_id, $_SESSION['user_id']);
    if ($res->fetch() == 0) {
        request($pdo, "INSERT INTO connection (user_id, room_id, connected) VALUES(?,?, true);", $_SESSION['user_id'], $room_id);
    }

    ?>

    <section class="main">
        <div class="background fixed-top blur" style="background-image: url('<?php GetImage(); ?>');"></div>
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-center my-auto">
                    <div class="border rounded bg-light" style="margin-top: 10%;">
                        <div class="chat_wraper">
                            <div class="chat"></div>
                        </div>
                        <form class="form-inline px-4 py-3" name="message" action="message_add.php" method="post">
                            <div class="form-group">
                                <?php
                                $query = "SELECT * FROM connection WHERE room_id=? AND user_id=?";
                                $res = request($pdo, $query, $room_id, $_SESSION['user_id']);
                                while ($row = $res->fetch()) {
                                    echo '<input type="hidden" id="connection_id" name="connection_id" value="' . $row['connection_id'] . '">';
                                }

                                ?>
                                <input type="message" name="message" class="form-control" id="message" placeholder="Text" required>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script>
        $(document).ready(function() {
            update();
            setInterval(update, 5000);
        });

        window.addEventListener("beforeunload", () => {
            console.log("leaving");
        });

        function update() {
            var message_array = new Array({
                'room_id':<?php echo $_SESSION['room_id'];?>
            });
            $.ajax({
                url: './chat_api.php',
                type: 'POST',
                data: JSON.stringify(message_array),
                contentType: 'application/json',
                processData: false,
                success: function(response){
                    console.log(response);
                    var jresponce = JSON.parse(response);
                    $(".chat").empty();
                    jresponce.forEach(element => {
                        console.log(element)
                        var msg = '<div class="message_template">' +
                            '<li class="message">' +
                            '<div class="text_wrapper">' +
                            '<div class="text">' + element.username + ': ' + element.message + '</div>' +
                            '</div>' +
                            '</li>' +
                            '</div>';

                        $(".chat").append(msg);
                    });
                }
            });

            
        }
    </script>


    <?php include_once("footer.php"); ?>
</body>

</html>