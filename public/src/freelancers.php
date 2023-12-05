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
    <?php session_start() ?>
    <?php if (isset($_SESSION['UserID'])) : ?>

        <?php
        include '../../includes/dashboard_navigation.php';
        require '../../app/controllers/Dashboard/freelancers_script.php';
        include '../../app/controllers/fetchusers.php';
        ?>

        <main class=" mt-14 p-12 ml-0  smXl:ml-64  ">

            <div class="relative overflow-x-auto  sm:rounded-lg">

                <!-- Creation button -->
                <a href="./addfreelancer.php">
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="inline-block mb-7 font-inter text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
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
            <!-- Modification Modal -->
            <div id="modification-modal" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border  top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 overflow-auto bg-opacity-50 ">
                <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                    <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                        <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Edit a Freelancer</h2>
                        <span class="close cursor-pointer">&times;</span>
                    </div>

                    <div class="mt-10 self-center w-1/2">
                        <form class="space-y-6" action="" method="POST">
                            <input type="number" name="id" id="FreelanceID" class="hidden" value="<?= $id ?>">
                            <div>
                                <label for="Freelance_name" class="block text-sm font-medium leading-6">New Freelancer Name</label>
                                <div class="mt-2">
                                    <input type="text" id="FreelanceName" name="New_Freelancer_Name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Freelance Name" ">
                            </div>
                        </div>
                        <div>
                            <div class=" mt-2">
                                    <label for="Competences" class="block text-sm font-medium leading-6">New Skills</label>
                                    <input type="text" id="Competences" name="New_Competences" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Skills" ">
                            </div>
                        </div>
                        <div>
                            <label for=" user" class="block text-sm font-medium leading-6">Linked User</label>
                                    <select id=" users" name="New_username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                    <button type="submit" class="flex w-1/2 justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm font-semibold leading-6 tracking-widest text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Submit Edits</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                edit_freelancer();
            }
            ?>

        </main>
    <?php else : ?>
        <div class="grid h-screen px-4 place-content-center">
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
    <script src="../assets/js/theme.js"></script>
    <script>
        function confirmDelete() {
            var confirmation = confirm(`Are you sure you want to delete this Freelancer?`);
            return confirmation;
        }
    </script>
    <script src="../assets/js/freelancers.js"></script>
    <script src="../assets/js/navigation.js"></script>

</body>

</html>