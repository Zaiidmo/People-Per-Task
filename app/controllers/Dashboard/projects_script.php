<?php
// require '../../../config/Connect.php';

//Display Projects 
function display_projects()
{
    global $conn;
    $sql = "SELECT
    projects.ProjectTitle,
    users.username,
    categories.CategoryName,
    souscategories.SousCategoryName
        FROM
            projects
        JOIN
            users ON projects.UserID = users.UserID
        JOIN
            categories ON projects.CategoryID = categories.CategoryID
        JOIN
            souscategories ON projects.SousCategoryID = souscategories.SousCategoryID";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result === false) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        // Check if there are rows in the result set
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $projectTitle = $row['ProjectTitle'];
                $UserName = $row['username'];
                $CategoryName = $row['CategoryName'];
                $SousCategoryName = $row['SousCategoryName'];
?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                        <?= $projectTitle ?>
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        <?= $UserName ?>
                    </td>
                    <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                        <?= $CategoryName ?>
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        <?= $SousCategoryName ?>
                    </td>
                    <?php
                    // Check if the Usertype in the session is Admin
                    if ($_SESSION['UserType'] == 'Admin') {
                    ?>
                        <td class="flex px-6 py-4 dark:text-white">
                            <form action="./editCategory.php" method="POST" class="w-full">
                                <input type="number" name="id" class="hidden" id="id" value="">
                                <button class="editfreelancer w-full self-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit Category</button>
                            </form>
                        </td>
                        <td class=" px-4 py-4 dark:text-white">
                            <a href="deleteCategory.php?id=" onclick="return confirmDelete()" class="w-full">
                                <button href="#" id="removeCat" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Remove Category</button>
                            </a>
                        </td>
                </tr>

            <?php
                    } else {
                        // Display something else when Usertype is not Admin
            ?>
                <td colspan="2" class="px-6 py-4 dark:text-white">
                    <!-- Display an alternative content -->
                    Not authorized to edit or remove categories.
                </td>
<?php
                    }
                }
            } else {
                echo '<tr><td colspan="4">No results found.</td></tr>';
            }
        }
    }
