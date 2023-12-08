<?php

use LDAP\Result;

require 'D:\GITREPOS\PeoplePerTask-full\config\Connect.php';
global $id;

//Function to display Categories 
function display_categories()
{
    global $id;
    global $conn;
    $sql = "SELECT categories.*, count(souscategories.SousCategoryID) as SubCategoryCount
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
                $SubCategoryCount = $row['SubCategoryCount'];
                $Cover = $row['Cover'];
    ?>

                <!-- Main Category Row -->
                <tr class="category-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" data-catid="<?= $id ?>">
                    <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                        <?= $CategoryName ?>
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        <?= $SubCategoryCount ?>
                    </td>
                    <td class="flex px-6 py-4 dark:text-white">
                        <input type="number" name="id" class="hidden" id="id" value="<?= $id ?>">
                        <button data-Cat_id="<?= $id ?>" class="toggle-subcategories editCategory w-full self-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit Category</button>
                    </td>
                    <td class="px-4 py-4 dark:text-white">
                        <a href="../../app/controllers/Dashboard/remove.php?CategoryID=<?= $id ?>" onclick="return confirmDelete()" class="w-full">
                            <button id="removeCategory" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Remove Category</button>
                        </a>
                    </td>
                </tr>

                <!-- Subcategories Dropdown Row -->
                <tr class="subcategories-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="4" class="px-6 py-2 dark:text-white leading-relaxed " scope="row">
                        <div id="subcategories<?= $id ?>" class="hidden">
                            <?php
                            $subcategoriesQuery = "SELECT * FROM souscategories WHERE CategoryID = $id";
                            $subcategoriesResult = mysqli_query($conn, $subcategoriesQuery);

                            if ($subcategoriesResult) {
                                while ($subrow = mysqli_fetch_assoc($subcategoriesResult)) {
                                    $subCategoryId = $subrow['SousCategoryID'];
                                    $subCategoryName = $subrow['SousCategoryName'];
                            ?>
                                    <p><?= $subCategoryName ?></p>
                            <?php
                                }
                            } else {
                                echo "Error fetching subcategories: " . mysqli_error($conn);
                            }
                            ?>
                        </div>
                    </td>
                </tr>

    <?php
            }
        } else {
            echo '<tr><td colspan="4">No results found.</td></tr>';
        }
    }
}


//Function to Edit a Category 
function edit_category()
{
    global $conn;
    global $id;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $CategoryID = $_POST['id'];
        $NewCategoryName = $_POST['New_Category_Name'];

        // Check if the uploaded file is an image
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($_FILES['New_Cover']['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {

            // Set the target directory for uploads
            $uploadDirectory = "../../public/assets/uploads/";

            // Generate a unique filename for the uploaded image
            $targetFileName = $uploadDirectory . $NewCategoryName . "." . $fileExtension;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['New_Cover']['tmp_name'], $targetFileName)) {

                // Escape values to prevent SQL injection
                $CategoryID = mysqli_real_escape_string($conn, $CategoryID);
                $NewCategoryName = mysqli_real_escape_string($conn, $NewCategoryName);
                $targetFileName = mysqli_real_escape_string($conn, $targetFileName);

                $query = "UPDATE categories 
                          SET 
                              CategoryName = ?,
                              Cover = ?
                          WHERE 
                              CategoryID = ?";

                $stmt = mysqli_prepare($conn, $query);

                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssi", $NewCategoryName, $targetFileName, $CategoryID);

                // Execute the statement
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "Edited Successfully";
                    // Redirect back to the form page
                    echo "<script> window.location.href = '../../../public/src/categories.php'</script>";
                    exit;
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo 'Invalid file format. Allowed formats: ' . implode(', ', $allowedExtensions);
        }
    }
}
