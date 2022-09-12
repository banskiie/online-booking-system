<!-- head.php -->
<?php
include 'includes/head.php';
@session_start();
?>
<!-- head.php -->

<head>
    <link rel="stylesheet" href="styles/service.css">
</head>

<body>

    <!-- header.php -->
    <?php
    include 'includes/header.php';
    ?>
    <!-- header.php -->

    <!-- about intro -->
    <section id="package-intro">
        <img src="images/package_intro.jpg" alt="">
        <h1>Services</h1>
    </section>
    <!-- about intro -->

    <!-- package info -->
    <section id="package-info">
        <p>Just got engaged and no idea of what to do next? We got you covered!
            Our team will provide you the service to get everything started
            from scratch to finish.</p>
        <p>You deserve the best hassle-free wedding experience!</p>
    </section>
    <!-- package info -->

    <!-- package offerings -->
    <section id="package-offering">
        <h1>Our Offerings</h1>
        <div id="package-cards">
            <div id="card1"><a href=""><img src="images/services/intima-boda.jpg" alt=""></a>
                <p id="text1">intima boda</p>
            </div>
            <div id="card2"><a href=""><img src="images/services/full.jpg" alt=""></a>
                <p id="text2">full day coordination</p>
            </div>
            <div id="card3"> <a href=""><img src="images/services/otc.jpg" alt=""></a>
                <p id="text3">on-the-day coordination</p>
            </div>
        </div>
    </section>
    <!-- package offerings -->

    <!-- footer.php -->
    <?php
    include 'includes/footer.php';
    ?>
    <!-- footer.php -->
</body>

</html>