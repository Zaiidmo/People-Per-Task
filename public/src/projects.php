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
    <title>PROJECT - peoplepertask</title>
</head>

<body class="dark:bg-gray-900">
    <?php session_start() ?>
    <?php if (isset($_SESSION['UserID'])) :?>
    <?php
    include '../../includes/dashboard_navigation.php';
    include '../../app/controllers/Dashboard/projects_script.php';
    ?>
    <main class=" mt-14 p-12 ml-0  smXl:ml-64  ">

        <div class="relative overflow-x-auto  sm:rounded-lg">


            <a href="newProject.php"><button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block mb-7 font-inter text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-parimary-600 dark:hover:bg-primary-800 dark:focus:ring-primary-800" type="button">
                    + Create a New Project
                </button></a>
            <table class="w-full shadow-md text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Project Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sous Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php display_projects() ?>
                </tbody>
            </table>
        </div>

    </main>
    <?php else : ?>
        <div class=" grid h-screen px-4 place-content-center">
            <div class="text-center">
                <h1 class="font-black text-gray-200 text-9xl">:)</h1>

                <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Uh-oh!
                </p>

                <p class="mt-4 text-gray-500">You Don't Have Permission to be here. </p>

                <a href="../src/index.php" class="inline-block px-5 py-3 mt-6 text-sm font-medium text-white bg-orange-600 rounded hover:bg-orange-700 focus:outline-none focus:ring">
                    Go Back Home
                </a>
            </div>
        </div>
    <?php endif ?>
</body>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/navigation.js"></script>

</html>