<?php
include 'util/client_conn.php';
include 'includes/head.php';
require 'db/database.php';
?>

<head>
    <link rel="stylesheet" href="styles/my_bookings.css">
    <script src="scripts/my_booking.js" defer></script>
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <div class="tbl-cont">
        <table>
            <tr>
                <th style="width: 12vw;">Time</th>
                <th style="width: 68vw;">Message</th>
            </tr>
            <?php
            $id = $_SESSION['id'];


            $sql = "SELECT * FROM inbox WHERE clnt_id = $id ORDER BY inbox_datetime DESC";
            $res_data = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res_data)) { ?>
                <tr>
                    <td>
                        <?php $date_time = new DateTime($row['inbox_datetime']);
                        $formated_date = $date_time->format('D h:i:s A [d M y]');
                        echo $formated_date;
                        ?>
                    </td>
                    <td>
                        <?php echo $row['inbox_text']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <form id="inbox-form" action="util/inbox.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <textarea class="inbox-textarea"name="msg" maxlength="1000" required></textarea>
        </div>
        <div class="form-btn-grp">
            <button class="send-btn" name="send">Send</button>
        </div>
    </form>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>