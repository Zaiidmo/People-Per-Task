<?php
require 'D:\GITREPOS\PeoplePerTask-full\config\Connect.php';

if (isset($_GET['id'])) {
    //deleting a freelancer
    $id = $_GET['id'];

    $sql = "DELETE from freelances where FreelanceID = $id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        mysqli_close($conn);
        header("location:../../../public/src/freelancers.php");
    } 
}else if(isset($_GET['CategoryID'])) {
    $categoryId = $_GET['CategoryID'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM categories WHERE CategoryID = $categoryId";
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        mysqli_close($conn);
        header("Location: ../../../public/src/categories.php");
        exit();
    }
}
