<header>
    <nav>
        <ul>
            <li><a href="index.php"><img src="images/yani-transparent.png" alt=""></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="package.php">Packages</a></li>
            <?php if (isset($_SESSION['loggedIn']) == true && ($_SESSION['role']) == "client") { ?>
                <li><a href="my_profile.php">My Profile</a></li>
                <li><a href="my_bookings.php">My Bookings</a></li>
            <?php } else { ?>
                <li><a href="contact.php">Contact Us</a></li>
            <?php } ?>
        </ul>
        <ul>
            <?php if (isset($_SESSION['loggedIn']) == true && ($_SESSION['role']) == "client") { ?>
                <li>Hello, <?php echo $_SESSION['first_name'] ?>! </li>
                <li><a href="util/logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>