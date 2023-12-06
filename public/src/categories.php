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
    <title>Categories</title>
</head>

<body class="dark:bg-gray-900">
    <?php session_start() ?>
    <?php if (isset($_SESSION['UserID'])) : ?>
        <?php
        include '../../includes/dashboard_navigation.php';
        include '../../app/controllers/Dashboard/categories_script.php';
        ?>
        <main class=" mt-14 p-12 ml-0  smXl:ml-64  ">

            <div class="relative overflow-x-auto  sm:rounded-lg">


                <a href="addcategory.php"><button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block mb-7 font-inter text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-parimary-600 dark:hover:bg-primary-800 dark:focus:ring-primary-800" type="button">
                        + Add Category
                    </button></a>
                <table class="w-full shadow-md text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Count of Sous Categories
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
                        <?= display_categories() ?>
                    </tbody>
                </table>
            </div>
            <!-- Modification Modal -->
            <div id="modification-modal" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border  top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 overflow-auto bg-opacity-50 ">
                <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                    <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                        <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Edit a Category</h2>
                        <span class="close cursor-pointer">&times;</span>
                    </div>

                    <div class="mt-10 self-center w-1/2">
                        <form class="space-y-6" action="" method="POST" enctype="multipart/form-data">
                            <input type="number" name="id" id="CategoryID" class="hidden" value="<?= $id ?>">
                            <div>
                                <label for="Category_name" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New Category Name</label>
                                <div class="mt-2">
                                    <input type="text" id="CategoryName" name="New_Category_Name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Category Name">
                            </div>
                        </div>
                        <div>
                            <div class=" relative z-0 w-full mb-5 group">
                                <label for="Cover" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New Category Cover</label>
                                <input type="file" name="New_Cover" id="New_Cover" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" placeholder=" " />
                            </div>
                        </div>
                        <div class=" flex justify-center">
                            <button type="submit" class="flex w-1/2 justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm font-semibold leading-6 tracking-widest text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Submit Edits</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                edit_category();
            }
            ?>

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
<!-- <script src="../assets/js/dashboard.js"></script> -->
<script src="../assets/js/navigation.js"></script>
<script src="../assets/js/categories.js"></script>

<script>
    function confirmDelete() {
        var confirmation = confirm(`Are you sure you want to delete this Category?`);
        return confirmation;
    }
</script>

</html>