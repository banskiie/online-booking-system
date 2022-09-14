<!-- head.php -->
<?php
include 'includes/head.php';
@session_start();
?>
<!-- head.php -->

<head>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>

    <!-- header.php -->
    <?php
    include 'includes/header.php';
    ?>
    <!-- header.php -->

    <section id="login-section">
        <img src="images/login_bg.jpg" alt="">
        <form action="util/anon_actions.php" method="post" enctype="multipart/form-data">
            <h1>Login</h1>
            <div>
                <label>Email</label>
                <input name="email" type="text" required>
            </div>
            <div>
                <label>Password</label>
                <input name="password" type="password" required>
            </div>
            <button type="submit" name="login">Login</button>
            <a href="register.php">New User? Register here!</a>
            <?php if (isset($_GET['invalid_credentials'])) { ?>
                <p><?php echo "Wrong Email or Password!"; ?></p>
            <?php } else if (isset($_GET['sql_error'])) { ?>
                <p><?php echo "SQL Error!"; ?></p>
            <?php } else if (isset($_GET['no_user'])) { ?>
                <p><?php echo "User doesn't exist! Please register!"; ?></p>
            <?php } ?>
        </form>
    </section>


    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->
</body>

</html>