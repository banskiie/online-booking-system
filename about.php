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
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate illum magnam voluptates et animi quibusdam,
            magni nam facilis est iste neque, in voluptatum, adipisci repellendus dolores consequatur rem voluptatem
            voluptatibus hic delectus quod dolorem officiis molestias totam. Amet iure incidunt dicta repellendus
            autem eveniet officia sit mollitia veniam. Quo, error!
        </p>
    </section>

    <hr>

    <section id="meet-the-team">
        <h1>Meet the Team</h1>
        <div id="coordinator-cards">
            <?php
            $sql = "SELECT * FROM staff WHERE staff_status=1 ORDER by staff_pos ASC";
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

    <section id="testimonial">
        <h1>This is a sample testimonial from client.</h1>
        <p>-Mr. Client</p>
    </section>

    <section id="about-the-planner">
        <img id="pic" src="images/about-the-planner/planner-pic.png" alt="">
        <img id="info" src="images/about-the-planner/about-the-planner.png" alt="">
    </section>

    <section id="team-info">
        <img src="images/team-members/full-team.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vel delectus aperiam
            cupiditate ad numquam cumque enim, sit vero laborum, dolorem placeat eos corporis iste.</p>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>