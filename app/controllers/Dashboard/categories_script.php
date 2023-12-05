<?php
require 'D:\GITREPOS\PeoplePerTask-full\config\Connect.php';
global $id;

//Function to display Categories 
function display_categories()
{
    global $id;
    global $conn;
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
                $CategoryID = $row['CategoryID'];
                $CategoryName = $row['CategoryName'];
                $SousCategories = $row['count(souscategories.SousCategoryID)'];
                $Cover = $row['Cover'];
?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                        <?= $CategoryName ?>
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        <?= $SousCategories ?>
                    </td>
                    <td class="flex px-6 py-4 dark:text-white">
                        <input type="number" name="id" class="hidden" id="id" value="<?= $id ?>">
                        <button data-category-id="<?= $id ?>" class="editCategory w-full self-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit Category</button>
                    </td>
                    <td class=" px-4 py-4 dark:text-white">
                        <a href="../../app/controllers/Dashboard/remove.php?CategoryID=<?= $CategoryID ?>" onclick="return confirmDelete()" class="w-full">
                            <button id="removeCategory" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Remove Category</button>
                        </a>
                    </td>
                </tr>
<?php
            }
        } else {
            echo '<tr><td colspan="4">No results found.</td></tr>';
        }
    }
}
