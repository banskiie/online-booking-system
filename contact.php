<?php
include 'includes/head.php';
session_start();
?>


<head>
    <link rel="stylesheet" href="styles/contact.css">
</head>

<body>

    <?php
    include 'includes/header.php';
    ?>

    <section id="contact-section">
        <h1>Get in touch</h1>
        <form action="util/anon_actions.php" method="POST" enctype="multipart/form-data">
            <label>Name</label>
            <input name="name" type="text" required>
            <label>Contact Number</label>
            <input name="contno" type="text" required>
            <label>Email</label>
            <input name="email" type="email" required>
            <label>Remark</label>
            <textarea name="remark" required></textarea>
            <button type="submit" name="send">Send</button>
            <?php if (isset($_GET['inquiry-sent'])) { ?>
                <p>Inquiry Sent!</p>
            <?php } ?>
        </form>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
</body>

</html>