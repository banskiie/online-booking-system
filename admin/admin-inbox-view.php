<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<head>
    <link rel="stylesheet" href="../styles/admin/admin-upper.css">
</head>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>

    <main class="content">

        <div>
            <?php
            require '../db/database.php';
            if (isset($_POST['view'])) {
                $admin_id = $_SESSION['id'];
                $inbox_id = $_GET['inbox_id'];
                $sql = "SELECT * FROM inbox INNER JOIN client ON client.clnt_id = inbox.clnt_id WHERE inbox_id = $inbox_id";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) {
                    $clnt_id = $row['clnt_id']; ?>
                    <table style="width: 80vw; height:60vh; overflow-y: scroll; display: block;">
                        <tr>
                            <th style="width: 12vw">Time</th>
                            <th style="width: 68vw">Message</th>
                        </tr>
                        <?php

                        $sql = "SELECT * FROM inbox WHERE clnt_id = $clnt_id ORDER BY inbox_datetime DESC";
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
                        <?php }
                        ?>
                    </table>
                </div>
                <form id="inbox-form"
                    action="../util/inbox.php?clnt_id=<?php echo $clnt_id; ?>&inbox_id=<?php echo $_GET['inbox_id'] ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="form-item">
                        <textarea name="msg" maxlength="1000" required></textarea>
                    </div>
                    <div class="form-btn-grp">
                        <button id="add-new" name="send-admin">Send</button>
                    </div>
                </form>
            <?php }
                $sql = "UPDATE inbox SET inbox_status=1 WHERE inbox_id=$inbox_id";
                mysqli_query($conn, $sql);
            } ?>
        <div id="button-grp">
            <a href="admin-inbox.php"><button id="back">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                </button></a>
        </div>

    </main>
    </div>

</body>

</html>