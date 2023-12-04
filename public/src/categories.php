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
    <?php
    include '../../includes/dashboard_navigation.php';
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
                    <?php
                    $sql = "SELECT categories.*, count(souscategories.SousCategoryID) 
                            FROM categories
                            LEFT JOIN souscategories ON categories.CategoryID = souscategories.CategoryID
                            GROUP BY categories.CategoryID";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful
                    if ($result === false) {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } else {
                        // Check if there are rows in the result set
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['CategoryID'];
                                $CategoryName = $row['CategoryName'];
                                $SousCategories = $row['count(souscategories.SousCategoryID)'];
                    ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                                        <?= $CategoryName ?>
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        <?= $SousCategories ?>
                                    </td>
                                    <td class="flex px-6 py-4 dark:text-white">
                                        <form action="./editCategory.php" method="POST" class="w-full">
                                            <input type="number" name="id" class="hidden" id="id" value="<?= $id ?>">
                                            <button class="editfreelancer w-full self-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit Category</button>
                                        </form>
                                    </td>
                                    <td class=" px-4 py-4 dark:text-white">
                                        <a href="deleteCategory.php?id=<?= $id ?>" onclick="return confirmDelete()" class="w-full">
                                            <button href="#" id="removeCat" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Remove Category</button>
                                        </a>
                                    </td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo '<tr><td colspan="4">No results found.</td></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/navigation.js"></script>

<script>
    function confirmDelete() {
        var confirmation = confirm(`Are you sure you want to delete this Category?`);
        return confirmation;
    }
</script>

</html>