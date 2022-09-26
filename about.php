<?php
session_start();
include 'includes/head.php';
require 'db/database.php';
?>

<head>
    <link rel="stylesheet" href="styles/about.css">
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="about-intro">
        <img src="images/about-intro.jpg" alt="">
        <h1>About</h1>
    </section>

    <section id="about-info">
        <img src="images/yani-transparent.png" alt="">
        <div class="vl"></div>
        <?php
        $sql = "SELECT * FROM text";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <p><?php echo $row['text_about']; ?></p>
        <?php };
        } ?>
    </section>

    <hr>

    <section id="meet-the-team">
        <h1>Meet the Team</h1>
        <div id="coordinator-cards">
            <?php
            $sql = "SELECT * FROM staff WHERE staff_status=1 ORDER by staff_id ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>

                    <div class="card">
                        <?php if ($row['staff_img'] == NULL) { ?>
                            <img src="images/staff/default.jpg">
                        <?php } else { ?>
                            <img src="images/staff/<?php echo $row['staff_img']; ?>">
                        <?php } ?>
                        <div class="container">
                            <h4><b><?php echo $row['staff_fn']; ?></b></h4>
                            <p><?php echo $row['staff_pos']; ?></p>
                        </div>
                    </div>

            <?php }
            } ?>
        </div>
    </section>

    <hr>

    <section id="about-the-planner">
        <img id="pic" src="images/about-the-planner/planner-pic.png" alt="">
        <img id="info" src="images/about-the-planner/about-the-planner.png" alt="">
    </section>

    <section id="team-info">
        <img src="images/team-members/full-team.jpg" alt="">
        <?php
        $sql = "SELECT * FROM text";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <p><?php echo $row['text_team']; ?></p>
        <?php };
        } ?>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>