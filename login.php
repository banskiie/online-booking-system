<?php
session_start();
include 'includes/head.php';
?>

<head>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="login-section">
        <img src="images/login_bg.jpg" alt="">
        <form action="util/anon_actions.php" method="post" enctype="multipart/form-data">
            <h1>Login</h1>
            <div>
                <label>Email</label>
                <input name="email" type="text" maxlength="100" required>
            </div>
            <div>
                <label>Password</label>
                <input name="password" type="password" maxlength="50" required>
            </div>
            <button type="submit" name="login">Login</button>
            <a href="register.php">New User? Register here!</a>

            <?php if (isset($_GET['no_user'])) {
                echo '<script>alert("User does not exist! Please register!")</script>';
            } ?>
            <?php if (isset($_GET['sql_error'])) {
                echo '<script>alert("SQL Error!")</script>';
            } ?>
            <?php if (isset($_GET['invalid_credentials'])) {
                echo '<script>alert("Wrong Email or Password!")</script>';
            } ?>
        </form>
    </section>


    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>