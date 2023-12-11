<?php
require '../../config/Connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
    $FreelanceID = $_SESSION['UserID'];

    // Assuming you have a table named 'freelances' with a column 'skills'
    $query = 'UPDATE freelances SET skills = ? WHERE FreelanceID = ?';
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'si', $skills, $FreelanceID);
    
    if (mysqli_stmt_execute($stmt)) {
        echo 'Skills added successfully!';
    } else {
        echo 'Error updating skills: ' . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    http_response_code(405);
    echo 'Invalid request method.';
}
?>
