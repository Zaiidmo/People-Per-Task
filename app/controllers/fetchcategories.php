<?php
require "../../config/Connect.php";

// Fetch categories from the 'users' table
$cat_Query = "SELECT CategoryName FROM categories";
$result = mysqli_query($conn, $cat_Query);

// Check for errors in the query
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Store the categories in an array
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row['CategoryName'];
}

// Close the result set
mysqli_free_result($result);
?>