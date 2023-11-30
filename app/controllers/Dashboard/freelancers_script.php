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
                        <form action="./editfreelancer.php" method="POST" class="w-full">
                            <input type="number" name="id" class="hidden" id="id" value="<?= $id ?>">
                            <button class="editfreelancer w-full self-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit user</button>
                        </form>
                    </td>
                    <td class=" px-4 py-4 dark:text-white">
                        <a href="freelancers.php?id=<?= $id ?>" onclick="return confirmDelete()" class="text-primary-600 dark:text-primary-600 hover:underline hover:text-blue-900">
                            Remove Freelancer
                            <?= remove_freelancer() ?>
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
                // Redirect back to the form page
                // header("location:freelancers.php");
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

// Function to delete freelancer 
function remove_freelancer()
{
    global $conn;
    $id = $_GET['id'];

    $sql = "DELETE from freelances where FreelanceID = $id";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        echo 'Error Query' ;
    }
}

//Function to Edit Freelancer 
