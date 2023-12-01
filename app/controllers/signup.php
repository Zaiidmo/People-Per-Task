<?php
require "../../config/Connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["first_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phone"];
    
    // Insert Data to Database
    $sql = "INSERT INTO users (UserName, PasswordHash, Email, PhoneNumber) 
            VALUES ('$username', '$password', '$email', '$phonenumber')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or perform other actions
        header("Location: index.php");
        exit();
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}