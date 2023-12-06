<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
    <meta name="author" content="ZAIID MOUMNII">
    <meta name="description" content="this page is an html project was given in a bootcamp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../dist/output.css" />
    <title>Settings</title>
</head>

<body>
    <?php
    require '../../app/controllers/user-session.php';
    require '../../includes/dashboard_navigation.php';

    $id = $_SESSION['UserID'] ;
    $UserName = $_SESSION['UserName'] ; 
    $email = $_SESSION['Email'] ; 
    ?>
</body>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/navigation.js"></script>
</html>
