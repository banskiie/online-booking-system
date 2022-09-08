<!-- head.php -->
<?php
include 'includes/head.php';
@session_start();
include 'util/client_conn.php';
?>
<!-- head.php -->

<head>
    <link rel="stylesheet" href="styles/my_profile.css">
    <script src="scripts/my_profile.js" defer></script>
</head>

<body>

    <!-- header.php -->
    <?php
    include 'includes/header.php';
    ?>
    <!-- header.php -->

    <section id="client-profile">
        <div id="profile-info">
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
        <!-- aside -->
        <div id="update-info">
            <h1>Update Info</h1>
            <form action="util/client_actions.php" method="post">
                <label>First Name</label>
                <input name="first_name" type="text" value="<?php echo $_SESSION['first_name']; ?>">
                <label>Middle Name</label>
                <input name="middle_name" type="text" value="<?php echo $_SESSION['middle_name']; ?>">
                <label>Last Name</label>
                <input name="last_name" type="text" value="<?php echo $_SESSION['last_name']; ?>">
                <label>Address</label>
                <input name="address" type="text" value="<?php echo $_SESSION['address']; ?>">
                <label>Contact Number</label>
                <input name="contno" type="text" value="<?php echo $_SESSION['contno']; ?>">
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
                <!-- aside -->
    </section>

    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->
</body>


</html>