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
    upload_image();
    global $target_file;

    $username = $_POST['first_name'] . "_" . $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $password_confirmation = $_POST['repeat_password'];
    $phonenumber = $_POST["phone"];
    $picture = $target_file; 

    if ($password_confirmation = $_POST['password']) {
        //Insertion Query 
        $Insert = "INSERT INTO users (username, PasswordHash, Email, PhoneNumber, profile_picture)
                    VALUES (?,?,?,?,?)";

        $stmt = mysqli_prepare($conn, $Insert);
        mysqli_stmt_bind_param($stmt, "sssis", $username, $password, $email, $phonenumber, $picture);

        $result = mysqli_stmt_execute($stmt);
        if (!$result) {
            echo 'Error';
        } else {
            header('Location: ../../public/src/signin.php');
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo 'Passwords Not Matched';
    }
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
            if (isset($_POST['email'])) {
                setcookie('email', $email, time() + 5 * 60, '/');
                setcookie('password', $password, time() + 5 * 60, '/');
                header('Location: ../../public/src/index.php');
            }
        } else {
            echo 'Invalid Password';
        }
    } else {
        echo 'Invalid Email';
    }
}

function upload_image()
{
    $target_dir = "../../public/assets/uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check for allowed image file types
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Move the uploaded file to the destination
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profile_picture"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}