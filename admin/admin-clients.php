<?php
include '../includes/admin-head.php';
include '../util/admin_conn.php';
?>

<body>
    <?php
    include '../includes/admin-header.php';
    ?>
    <main class="content">
        <h1>Client List</h1>
        <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <?php
                require '../db/database.php';
                $sql = "SELECT * FROM client";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['clnt_fn']; ?></td>
                            <td><?php echo $row['clnt_ln']; ?></td>
                            <td><?php echo $row['clnt_email']; ?></td>
                            <td>
                                <form action="admin-clients-view.php?clnt_id=<?php echo $row['clnt_id']; ?>" method="post">
                                    <button name="view" id="view-btn">View</button>
                                </form>
                            </td>
                        </tr>
                <?php };
                } ?>
            </table>
    </main>
    </div>
</body>
</html>