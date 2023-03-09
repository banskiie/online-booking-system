<?php
require 'db/database.php';
?>

<header>
    <nav>
        <ul>
            <li><a href="index.php"><img src="images/yani-transparent.png" alt=""></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="service.php">Services</a></li>
            <?php if (isset($_SESSION['loggedIn']) == true && ($_SESSION['role']) == "client") { ?>
                <li><a href="my_profile.php">My Profile</a></li>
                <li><a href="my_bookings.php">My Booking</a></li>
                <li><a href="my_inbox.php">My Inbox</a></li>
            <?php } else { ?>
                <li><a href="contact.php">Contact Us</a></li>
            <?php } ?>
        </ul>
        <ul id="right-nav">
            <?php if (isset($_SESSION['loggedIn']) == true && ($_SESSION['role']) == "client") { ?>
                <li>Hello, <?php echo $_SESSION['first_name'] ?>! </li>
                <li>
                    <form id="logoutform" action="util/client_logout.php" method="POST">
                        <a id="logout-link" onclick="myFunction()">Logout</a>
                    </form>
                </li>
                <li id="nav-client-icon"><?php
                                            $id = $_SESSION['id'];
                                            $sql = "SELECT * FROM client WHERE clnt_id = $id";
                                            $result = $conn->query($sql);
                                            if ($row = $result->fetch_assoc()) {
                                                if ($row['clnt_img'] == NULL) { ?>
                            <img src="images/client/default.jpg">
                        <?php } else { ?>
                            <img src="images/client/<?php echo $row['clnt_img']; ?>">
                    <?php }
                                            } ?>
                </li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>

<script>
    function myFunction() {
        document.getElementById("logoutform").submit();
    }
</script>