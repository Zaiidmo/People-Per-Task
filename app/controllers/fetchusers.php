<?php
require "../../config/Connect.php";

// Fetch usernames from the 'users' table
$usernamesQuery = "SELECT UserName FROM users";
$result = mysqli_query($conn, $usernamesQuery);

// Check for errors in the query
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Store the usernames in an array
$usernames = [];
while ($row = mysqli_fetch_assoc($result)) {
    $usernames[] = $row['UserName'];
}

// Close the result set
mysqli_free_result($result);
?>