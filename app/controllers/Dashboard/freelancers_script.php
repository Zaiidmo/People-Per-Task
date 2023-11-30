<?php
require 'D:\GITREPOS\PeoplePerTask-full\config\Connect.php';
//Function to Read freelancers Data 
function display_freelancer()
{
    global $conn;
    $sql = "SELECT freelances.*, users.email FROM freelances
    LEFT JOIN users ON freelances.UserID = users.UserID";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result === false) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        // Check if there are rows in the result set
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['FreelanceID'];
                $FreelanceName = $row['FreelanceName'];
                $Competences = $row['Competences'];
                $email = $row['email'];
?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                        <?= $FreelanceName ?>
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        <?= $Competences ?>
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        <?= $email ?>
                    </td>
                    <td class="flex px-6 py-4 dark:text-white">
                        <button class="editfreelancer w-full self-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit user</button>
                        <!-- <form action="" method="POST" class="w-full">
                            <input type="number" name="id" class="hidden" id="id" value="<?= $id ?>">

                        </form> -->
                    </td>
                    <td class=" px-4 py-4 dark:text-white">
                        <a href="../../app/controllers/Dashboard/remove.php?id=<?= $id ?>" onclick="return confirmDelete()" class="w-full">
                            <button id="removefreelancer" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Remove user</button>
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

//Function to Add New Freelancer to the DataBase 
function add_freelancer()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $FreelanceName = $_POST["FreelanceName"];
        $competences = $_POST["competences"];
        $username = $_POST["username"];

        // Fetch UserID based on the selected username 
        $findIDQuery = "SELECT UserID FROM users WHERE UserName = '$username'";
        $result = mysqli_query($conn, $findIDQuery);

        // Check if the query was successful
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $userID = $row['UserID'];
            // Insert data into Freelances Table 
            $insertQuery = "INSERT INTO freelances (FreelanceName, Competences, UserID) VALUES ('$FreelanceName', '$competences', '$userID')";

            if (mysqli_query($conn, $insertQuery)) {
                echo "New record added successfully";
                // Redirect back to the freelancers page using JS
                echo '<script>window.location.href = "freelancers.php";</script>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Function to edit freelancer 
function edit_freelancer()
{
    global $conn;
}
?>
<script src="../assets/js/editfreelancer.js"></script>