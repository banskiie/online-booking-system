<?php
session_start();
include 'includes/head.php';
?>

<head>
    <link rel="stylesheet" href="styles/register.css">
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="login-section">
        <img src="images/login_bg.jpg" alt="">
        <form action="util/anon_actions.php" method="POST" enctype="multipart/form-data">
            <h1>Register</h1>
            <div id="register-form">

                <div class="register-column">
                    <div class="img-container">
                        <label>Profile Picture</label>
                        <input type="file" name="uploadfile">
                    </div>
                    <div class="form-item">
                        <label>First Name</label>
                        <input name="first_name" type="text" maxlength="50" required>
                    </div>
                    <div class="form-item">
                        <label>Middle Name</label>
                        <input name="middle_name" type="text" maxlength="50">
                    </div>
                    <div class="form-item">
                        <label>Last Name</label>
                        <input name="last_name" type="text" maxlength="50" required>
                    </div>
                    <div class="form-item">
                        <label>Contact Number</label>
                        <input name="contno" type="text" maxlength="11" required>
                    </div>
                </div>
                <div class="register-column">
                    <div class="form-item">
                        <label>Address</label>
                        <input name="address" type="text" maxlength="100" required>
                    </div>
                    <div class="form-item">
                        <label>Email</label>
                        <input name="email" type="email" maxlength="100" required>
                    </div>
                    <div class="form-item">
                        <label>Password</label>
                        <input name="password" type="password" maxlength="50" required>
                    </div>
                    <div class="form-item">
                        <label>Confirm Password</label>
                        <input name="confirm_password" type="password" maxlength="50" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="register">Register</button>
            <a href="login.php">Already have an account? Register here!</a>
            <?php if (isset($_GET['password_not_the_same'])) {
                echo '<script>alert("Password is not the same!")</script>';
            } ?>
            <?php if (isset($_GET['sql_error'])) {
                echo '<script>alert("SQL Error!")</script>';
            } ?>
            <?php if (isset($_GET['email_already_taken'])) {
                echo '<script>alert("Email already taken!")</script>';
            } ?>
            <?php if (isset($_GET['success'])) {
                echo '<script>alert("Account registered!")</script>';
            } ?>
        </form>
    </section>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>