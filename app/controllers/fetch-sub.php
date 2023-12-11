<?php
require "../../config/Connect.php";

// Fetch Subcategories from the 'users' table
$sub_Query = "SELECT SousCategoryName FROM souscategories";
$result = mysqli_query($conn, $sub_Query);

// Check for errors in the query
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Store the Subcategories in an array
$souscategories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $souscategories[] = $row['SousCategoryName'];
}

// Close the result set
mysqli_free_result($result);
?>