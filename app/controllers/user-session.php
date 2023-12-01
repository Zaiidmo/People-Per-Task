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

    $username = $_POST['first_name'] . $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $password_confirmation = $_POST['repeat_password'];
    $phonenumber = $_POST["phone"];

    if ($password_confirmation = $_POST['password']) {
        //Insertion Query 
        $Insert = "INSERT INTO users (username, PasswordHash, Email, PhoneNumber)
                    VALUES (?,?,?,?)";

        $stmt = mysqli_prepare($conn, $Insert);
        mysqli_stmt_bind_param($stmt, "sssi", $username, $password, $email, $phonenumber);

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
