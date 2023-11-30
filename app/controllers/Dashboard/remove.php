<?php
require 'D:\GITREPOS\PeoplePerTask-full\config\Connect.php';

$id = $_GET['id'];

$sql = "DELETE from freelances where FreelanceID = $id";
$res = mysqli_query($conn, $sql);

if($res){
    mysqli_close($conn);
    header("location:../../../public/src/freelancers.php");
}

?>