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
            <!-- Modification Modal -->
            <div id="modification-modal" class="modification_modal hidden bg-white rounded-2xl m-10 shadow dark:bg-gray-700">
                <div aria-hidden="true" class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 text-gray-900 dark:text-white">
                    <div class=" sm:mx-auto sm:w-full sm:max-w-sm lg:w-full flex gap-16 items-center">
                        <!-- <img class="mx-auto h-10 w-auto" src="../assets/images/logo.webp" alt="People Per Task"> -->
                        <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Edit a Freelancer</h2>
                        <span class="close cursor-pointer">&times;</span>
                    </div>

                    <div class="mt-10 self-center w-1/2">
                        <form class="space-y-6" action="#" method="POST">
                            <div>
                                <label for="Freelance_name" class="block text-sm font-medium leading-6">New Freelancer Name</label>
                                <div class="mt-2">
                                    <input type="text" id="FreelanceName" name="New_Freelancer_Name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Freelance Name" ">
                            </div>
                        </div>
                        <div>
                            <div class=" mt-2">
                                    <label for="Competences" class="block text-sm font-medium leading-6">New Competences</label>
                                    <input type="text" id="Competences" name="New_Competences" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Competences" ">
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
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/editfreelancer.js"></script>
    <script>
        function confirmDelete() {
            var confirmation = confirm(`Are you sure you want to delete this Freelancer?`);
            return confirmation;
        }
    </script>
    <script src="../assets/js/editfreelancer.js"></script>

</body>

</html>