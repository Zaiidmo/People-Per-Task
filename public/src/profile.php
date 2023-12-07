<?php session_start() ?>
<?php if (isset($_SESSION['UserID'])) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
        <meta name="author" content="Soulaiman Bouhlal">
        <meta name="description" content="this page is an html project was given in a bootcamp">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/dist/output.css" />
        <title><?= $_SESSION['UserName'] ?></title>
        <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">
    </head>

    <body class="bg-gray-200 dark:bg-gray-900">
        <?php
        include '../../includes/dashboard_navigation.php';

        ?>
    </body>
<?php endif ?>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/navigation.js"></script>
    </html>