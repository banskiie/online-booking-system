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
        <form action="util/anon_actions.php" method="post">
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
        </form>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->
</body>

</html>