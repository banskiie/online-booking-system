<?php
session_start();
include 'includes/head.php';
require 'db/database.php';
?>

<head>
    <link rel="stylesheet" href="styles/service.css">
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="package-intro">
        <img src="images/package_intro.jpg" alt="">
        <h1>Services</h1>
    </section>

    <section id="package-info">
        <?php
        $sql = "SELECT * FROM text";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <p><?php echo $row['text_service']; ?></p>
        <?php };
        } ?>
    </section>


    <section class="service">
        <h1>Packages</h1>
        <div class="container">
            <?php
            $sql = "SELECT * FROM package WHERE pkg_status=1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="package-card" style='background-image: url("images/package/<?php echo $row['pkg_img']; ?>")'>
                        <h2><?php echo $row['pkg_name']; ?></h2>
                        <p class="price">₱<?php echo $row['pkg_price']; ?></p>
                        <p class="desc"><?php echo $row['pkg_desc']; ?></p>
                    </div>
            <?php };
            } ?>
        </div>
    </section>

    <section class="service">
        <h1>Venues</h1>
        <div class="container">
            <?php
            $sql = "SELECT * FROM venue WHERE venue_status=1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="venue-card" style='background-image: url("images/venue/<?php echo $row['venue_img']; ?>")'>
                        <h2><?php echo $row['venue_name']; ?></h2>
                        <p><?php echo $row['venue_add']; ?></p>
                    </div>
            <?php };
            } ?>
        </div>
    </section>

    <section class="service">
        <h1>Suppliers</h1>
        <div class="container">
            <?php
            $sql = "SELECT * FROM supplier WHERE supp_status=1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="supp-card" style='background-image: url("images/supplier/<?php echo $row['supp_img']; ?>")'>
                        <h2><?php echo $row['supp_name']; ?></h2>
                        <p><?php echo $row['supp_role']; ?></p>
                    </div>
            <?php };
            } ?>
        </div>
    </section>


    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>