<?php
require "../../config/Connect.php";

session_start();
if (isset($_POST['Approve'])) {
    Approve();
} else if (isset($_POST['Deny'])) {
    Deny();

}

function Approve(){
    global $conn;
    $id = $_GET['id'];
    $query= 'UPDATE offers 
                SET status = "approved"
                WHERE OfferID = ?';
    $stmt = mysqli_prepare($conn , $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    echo '<script> window.location.href = "../../public/src/profile.php" </script>';
}
function Deny(){
    global $conn;
    $id = $_GET['id'];
    $query= 'UPDATE offers
    SET status = "denied"
    WHERE OfferID = ?';
    $stmt=mysqli_prepare($conn , $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    echo '<script> window.location.href = "../../public/src/profile.php" </script>';
}
