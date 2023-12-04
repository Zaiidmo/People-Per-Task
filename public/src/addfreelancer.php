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
    <link rel="stylesheet" href="../assets/dist/output.css" />
    <title>Admin - AddFreelancer</title>
</head>

<body class="dark:bg-gray-900 bg-[#F8F6F5]">
    <?php
    include '../../includes/dashboard_navigation.php';
    include '../../app/controllers/Dashboard/freelancers_script.php';
    include '../../app/controllers/fetchusers.php'
    ?>
    <main class="text-gray-400 body-font ">
        <div class="flex flex-col text-center items-center px-5 py-24 mx-auto">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-16 text-white">Add a new Freelancer</h1>
            <form action="" method="POST" class="space-y-8 flex flex-col justify-evenly w-full md:w-1/2" id="form">
                <div>
                    <input type="text" id="username" name="FreelanceName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Freelance Name">
                    <span class="text-red-600 hidden" id="email-error">No valid</span>
                </div>
                <div>
                    <input type="text" id="competences" name="competences" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Skills ">
                    <span class="text-red-600 hidden" id="email-error">No valid</span>
                </div>
                <div>
                    <select id="users" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose the user</option>
                        <?php
                        // Populate the dropdown with usernames
                        foreach ($usernames as $username) {
                            echo "<option value=\"$username\">$username</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="flex justify-center">
                    <div>
                        <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-3xl bg-orange-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">ADD</button>
                    </div>
                </div>
            </form>
            <?= add_freelancer() ?>
        </div>
    </main>
</body>
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/theme.js"></script>

</html>