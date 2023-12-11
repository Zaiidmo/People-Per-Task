<?php
require '../../config/Connect.php' ;
session_start();

// Collecting form data 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $projectID = $_POST["project_id"];
    $freelancerID = $_POST["freelancer_id"];
    $amount = $_POST["amount"];
    $deadline = $_POST["deadline"];
    $proposal = $_POST["proposal"]; 
    $auto_status = 'pending';

    $insertQuery = "INSERT INTO offers (Amount, Deadline, proposal, FreelanceID, ProjectID, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertQuery);

    mysqli_stmt_bind_param($stmt, "issiis", $amount, $deadline, $proposal, $freelancerID, $projectID, $auto_status);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>Alert('Proposal submitted successfully!')</script>";
        echo "<script>window.location.href='../../public/src/profile.php'</script>";
    } else {
        echo "Error submitting proposal: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "<script>window.location.href='../../public/src/index.php'</script>";
    exit();
}
?>