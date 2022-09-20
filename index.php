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
        <p>We are a team consisting of young professionals from all walks of life gathered by one great passion in
            service and anything related to love and tying the knot! We all have in our heart one goal
            - to provide quality, systematic and <strong>REAL</strong>ational services to all.</p>
        <p>Weddings have been one of the most celebrated gathers in the Filipino Culture. And we consider the details,
            preparation, and the coming together of everything envisioned as an art to be done precisely, systematically,
            and heartfully. <strong>WE COME</strong> in service and <strong>WE DO</strong> with sincere goal driven desires.</p>
        <p>The past year has been a good one for us. The countless learning we experienced humbled us through and
            inspired our brand to always strive for growth, improvement, and continuous geniune work.</p>
        <a href="about.php#meet-the-team" class="button">Meet the Team!</a>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>