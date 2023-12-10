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
    <title></title>
</head>

<body class="dark:bg-gray-900">
    <?php include '../../includes/header.php' ?>
    <?php 
    if (isset($_GET['id'])) {
        $id_project = $_GET['id'];
        $query = 'SELECT projects.* , users.UserName, users.profile_picture,
    FROM projects
    JOIN users ON projects.UserID = users.UserID;';
        $res = mysqli_query($conn, $query);
    
        // Fetch the data from the result set
        if ($row = mysqli_fetch_assoc($res)) :
    ?>
    <div id="about_card" class="bg-white dark:bg-gray-800 border  rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col ">
                            <div id="about_title" class="flex items-center space-x-2 font-semibold text-gray-900 dark:text-white leading-8">
                                <span clas="text-blue-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">ABOUT ME</h3>
                            </div>
                            <div class="text-gray-700 dark:text-gray-400">
                                <div class="grid md:grid-cols-2 text-sm ">
                                    <div class="grid grid-cols-2 ">
                                        <div class="px-4 py-2 font-semibold text-gray-700 dark:text-gray-300">Full Name</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= $_SESSION['UserName'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold  text-gray-700 dark:text-gray-300">Work's Phone Number</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= '+' . $_SESSION['Phone'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold  text-gray-700 dark:text-gray-300">Email.</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= $_SESSION['Email'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold  text-gray-700 dark:text-gray-300">Actual Position</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= $_SESSION['UserType'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <button class="inline-block self-center text-primary-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100       hover:shadow-xs p-3 my-4"> Edit Information</button>
                        </div>
                        <?php
                        endif;
        
                    }?> 
    
    
</body>
<script src="../assets/js/theme.js"></script>

</html>