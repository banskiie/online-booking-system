<?php
include 'includes/head.php';
session_start();
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
                        <input name="first_name" type="text" required>
                    </div>
                    <div class="form-item">
                        <label>Middle Name</label>
                        <input name="middle_name" type="text">
                    </div>
                    <div class="form-item">
                        <label>Last Name</label>
                        <input name="last_name" type="text" required>
                    </div>
                    <div class="form-item">
                        <label>Contact Number</label>
                        <input name="contno" type="text" required>
                    </div>
                </div>
                <div class="register-column">
                    <div class="form-item">
                        <label>Address</label>
                        <input name="address" type="text" required>
                    </div>
                    <div class="form-item">
                        <label>Email</label>
                        <input name="email" type="email" required>
                    </div>
                    <div class="form-item">
                        <label>Password</label>
                        <input name="password" type="password" required>
                    </div>
                    <div class="form-item">
                        <label>Confirm Password</label>
                        <input name="confirm_password" type="password" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="register">Register</button>
            <a href="login.php">Already have an account? Register here!</a>
            <?php if (isset($_GET['password_not_the_same'])) { ?>
                <p>Password not the same!</p>
            <?php } ?>
            <?php if (isset($_GET['sql_error'])) { ?>
                <p>SQL Error!</p>
            <?php } ?>
            <?php if (isset($_GET['email_already_taken'])) { ?>
                <p>Email already taken!</p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p>Account registered!</p>
            <?php } ?>
        </form>
    </section>

    <?php
    include 'includes/footer.php';
    ?>

</body>

</html>