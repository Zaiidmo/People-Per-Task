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


//Create a new project 
function create_project()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $Title = $_POST["Title"];
        $Description = $_POST["Description"];
        $category = $_POST["category"];
        $souscategory = $_POST["souscategories"];
        $tags = $_POST["tags"];
        $price = $_POST["Price"];
        $Deadline = $_POST["deadline"];

        // Retrieve CategoryID and SousCategoryID
        $findIDQuery = "SELECT categories.CategoryID, souscategories.SousCategoryID 
                        FROM categories 
                        INNER JOIN souscategories ON categories.CategoryID = souscategories.CategoryID
                        WHERE CategoryName = ? AND SousCategoryName = ?";

        // Prepare the statement
        $stmtFindID = mysqli_prepare($conn, $findIDQuery);

        // Check for errors in preparing the statement
        if (!$stmtFindID) {
            die("Error preparing statement: " . mysqli_error($conn));
        }

        // Bind parameters
        mysqli_stmt_bind_param($stmtFindID, "ss", $category, $souscategory);

        // Execute the statement
        if (!mysqli_stmt_execute($stmtFindID)) {
            die("Error executing statement: " . mysqli_error($conn));
        }

        // Get the result set
        $result = mysqli_stmt_get_result($stmtFindID);

        // Check for errors in getting the result
        if (!$result) {
            die("Error getting result: " . mysqli_error($conn));
        }

        // Fetch the row
        $row = mysqli_fetch_assoc($result);
        $catID = $row['CategoryID'];
        $subcatID = $row['SousCategoryID'];

        // Check if required fields are not empty
        if (empty($Title) || empty($Description)|| empty($Deadline) || empty($price) || empty($category) || empty($souscategory)) {
            echo "<script> alert('All fields are required.')</script>";
        } else {
            // Insert data into the projects table
            $query = "INSERT INTO projects (ProjectTitle, Description, deadline, price, UserID, CategoryID, SousCategoryID) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Use prepared statement to prevent SQL injection
            $stmt = mysqli_prepare($conn, $query);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssiiii", $Title, $Description, $Deadline, $price, $_SESSION['UserID'], $catID, $subcatID);

            // Execute the statement
            $add_result = mysqli_stmt_execute($stmt);

            if ($add_result) {
                // Get the ID of the inserted project
                $projectID = mysqli_insert_id($conn);

                // Handle tags
                $tagArray = explode(",", $tags);
                foreach ($tagArray as $tag) {
                    $tag = trim($tag);

                    // Check if the tag already exists
                    $tagExistsQuery = "SELECT Tag_id FROM tags WHERE Tag_name = ?";
                    $stmtTagExists = mysqli_prepare($conn, $tagExistsQuery);
                    mysqli_stmt_bind_param($stmtTagExists, "s", $tag);
                    mysqli_stmt_execute($stmtTagExists);
                    $tagResult = mysqli_stmt_get_result($stmtTagExists);

                    if ($tagResult && $tagRow = mysqli_fetch_assoc($tagResult)) {
                        // Tag already exists, get its ID
                        $tagID = $tagRow['Tag_id'];
                    } else {
                        // Tag does not exist, add it to the tags table
                        $addTagQuery = "INSERT INTO tags (tag_name) VALUES (?)";
                        $stmtAddTag = mysqli_prepare($conn, $addTagQuery);
                        mysqli_stmt_bind_param($stmtAddTag, "s", $tag);
                        mysqli_stmt_execute($stmtAddTag);

                        // Get the ID of the newly added tag
                        $tagID = mysqli_insert_id($conn);
                    }

                    // Add project-tag relationship
                    $addProjectTagQuery = "INSERT INTO Projects_tags (projectID, tagID) VALUES (?, ?)";
                    $stmtAddProjectTag = mysqli_prepare($conn, $addProjectTagQuery);
                    mysqli_stmt_bind_param($stmtAddProjectTag, "ii", $projectID, $tagID);
                    mysqli_stmt_execute($stmtAddProjectTag);
                }

                echo "<script> alert('Project Added Successfully.')</script>";
                echo "<script>window.location.href = 'marketplace.php'</script>";
            } else {
                echo "Error Inserting Data: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmtFindID);
    }
}




