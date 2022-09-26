<?php
session_start();
include 'includes/head.php';
require 'db/database.php';
?>


<head>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="book-now-section">
        <img src="images/bg-book-now.jpg" alt="">
        <h1>Online Booking System</h1>
        <a href="contact.php" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>Book Now!</a>
    </section>
    <hr>

    <section id="welcome-info-section">
        <h1>We are Yani M!</h1>
        <?php
        $sql = "SELECT * FROM text";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <p><?php echo $row['text_home']; ?></p>
        <?php };
        } ?>
        <a href="about.php#meet-the-team" class="button">Meet the Team!</a>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>