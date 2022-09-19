<?php
include 'includes/head.php';
include 'util/client_conn.php';
require 'db/database.php';
?>

<head>
    <link rel="stylesheet" href="styles/my_profile.css">
    <script src="scripts/my_profile.js" defer></script>
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="client-profile">
        <div id="profile-info">
            <div>
                <div id="display-image">
                    <?php
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM client WHERE clnt_id = $id";
                    $result = $conn->query($sql);
                    if ($row = $result->fetch_assoc()) {
                        if ($row['clnt_img'] == NULL) { ?>
                            <img src="images/client/default.jpg">
                        <?php } else { ?>
                            <img src="images/client/<?php echo $row['clnt_img']; ?>">
                        <?php } ?>
                </div>
            <?php }; ?>
            </div>
            <div>
                <h2>
                    <?php echo $_SESSION['first_name'] . " "
                        . $_SESSION['middle_name'] . " "
                        . $_SESSION['last_name'] ?>
                </h2>
                <p> <?php echo $_SESSION['email'] ?> </p>
                <p> <?php echo $_SESSION['address'] ?> </p>
                <p> <?php echo $_SESSION['contno'] ?> </p>
            </div>
            <div id="client-button">
                <button id="edit-info-btn" class="btn1">Edit Info</button>
            </div>
        </div>
        <div id="update-info">
            <h1>Update Info</h1>
            <form action="util/client_actions.php" method="post" enctype="multipart/form-data">
                <label>Profile Picture</label>
                <input type="file" name="uploadfile" required>
                <label>First Name</label>
                <input name="first_name" type="text" value="<?php echo $_SESSION['first_name']; ?>" required>
                <label>Middle Name</label>
                <input name="middle_name" type="text" value="<?php echo $_SESSION['middle_name']; ?>">
                <label>Last Name</label>
                <input name="last_name" type="text" value="<?php echo $_SESSION['last_name']; ?>" required>
                <label>Address</label>
                <input name="address" type="text" value="<?php echo $_SESSION['address']; ?>" required>
                <label>Contact Number</label>
                <input name="contno" type="text" value="<?php echo $_SESSION['contno']; ?>" required>
                <div>
                    <button class="btn1" name="update">Update</button>
                    <button id="cancel-update-btn" class="btn2" type="button">Cancel</button>
                </div>
            </form>
        </div>
        <?php if (isset($_GET['info-updated'])) { ?>
            <h1>Info Updated!<h1>
                <?php } else if (isset($_GET['update_error'])) { ?>
                    <h1>Update Error!</h1>
                <?php } ?>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
</body>


</html>