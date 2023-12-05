<?php
require "../../config/Connect.php";

session_start();
if (isset($_POST['signup'])) {
    signup();
} else if (isset($_POST['login'])) {
    login();
}

function signup()
{
    global $conn;

    // Check if all required fields are set
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['repeat_password'], $_POST['phone'], $_FILES['profile_picture'])) {

        // Check if passwords match
        if ($_POST['password'] === $_POST['repeat_password']) {

            $username = $_POST['first_name'] . "_" . $_POST['last_name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $password_confirmation = $_POST['repeat_password'];
            $phonenumber = $_POST["phone"];
            $usertype = $_POST["UserType"];

            // Check if the uploaded file is an image
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {

                // Set the target directory for uploads
                $uploadDirectory = "../../public/assets/uploads/";

                // Generate a unique filename for the uploaded image
                $targetFileName = $uploadDirectory . $username . "." . $fileExtension;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFileName)) {

                    // Insert user data into the database
                    $insertQuery = "INSERT INTO users (username, PasswordHash, Email, PhoneNumber, profile_picture, UserType ) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmtuser = mysqli_prepare($conn, $insertQuery);

                    mysqli_stmt_bind_param($stmtuser, "sssiss", $username, $password, $email, $phonenumber, $targetFileName, $usertype);

                    $resultuser = mysqli_stmt_execute($stmtuser);

                    if ($resultuser) {
                        // Insering the User's Data into Freelance table is UserType = Freelancer
                        if ($usertype === 'Freelancer') {
                            $newUserId = mysqli_insert_id($conn);
                            $insertFreelancerQuery = "INSERT INTO freelances (FreelanceName, Competences, UserID) VALUES (?, ?, ?)";
                            $stmtFreelancer = mysqli_prepare($conn, $insertFreelancerQuery);

                            //Collecting Values
                            $FreelanceName = $username;
                            $Skills = 'Add Skills';
                            $UserID = $newUserId;  

                            mysqli_stmt_bind_param($stmtFreelancer, "sss", $FreelanceName, $Skills, $UserID);

                            $resultFreelancer = mysqli_stmt_execute($stmtFreelancer);

                            if (!$resultFreelancer) {
                                echo 'Error inserting data into the freelancers table.';
                            }

                            mysqli_stmt_close($stmtFreelancer);
                        }
                        // Redirect to the sign-in page upon successful registration
                        header('Location: ../../public/src/signin.php');
                        exit();
                    } else {
                        // Handle the case where the insertion fails
                        echo 'Error inserting user data into the database.';
                    }

                    mysqli_stmt_close($stmtuser);
                } else {
                    echo 'Error moving the uploaded file.';
                }
            } else {
                echo 'Invalid file format. Allowed formats: ' . implode(', ', $allowedExtensions);
            }
        } else {
            echo 'Passwords do not match.';
        }
    } else {
        echo 'Missing required fields.';
    }

    mysqli_close($conn);
}


function login()
{
    global $conn;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $selectQuery = "SELECT * FROM Users WHERE email=?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['PasswordHash']);
        if ($pwdCheck == true) {
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['UserName'] = $row['UserName'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            $_SESSION['UserType'] = $row['UserType'];
            if (isset($_POST['email'])) {
                setcookie('email', $email, time() + 5 * 60, '/');
                setcookie('password', $password, time() + 5 * 60, '/');
                header('Location: ../../public/src/index.php');
            } 
        } else {
            echo 'Invalid Password';
        }
    } else {
        $error = 'Email Not Found';
        echo $error ;
    }
}


