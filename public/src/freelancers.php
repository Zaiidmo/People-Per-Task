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
    <title>Freelancers - peoplepertask</title>
</head>

<body class="dark:bg-gray-900">

    <?php
    include '../../includes/dashboard_navigation.php';
    require '../../app/controllers/Dashboard/freelancers_script.php';
    ?>

    <main class=" mt-14 p-12 ml-0  smXl:ml-64  ">

        <div class="relative overflow-x-auto  sm:rounded-lg">


            <!-- Modal toggle -->
            <a href="./addfreelancer.php">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block mb-7 font-inter text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                    + Add Freelancer
                </button>
            </a>


            <table class="w-full shadow-md text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Competences
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Remove
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?= display_freelancer() ?>
                </tbody>
            </table>
        </div>

    </main>

    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script>
        function confirmDelete() {
            var confirmation = confirm(`Are you sure you want to delete this Freelancer?`);
            return confirmation;
        }
    </script>
</body>

</html>