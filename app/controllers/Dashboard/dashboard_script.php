<?php
require '../../config/connect.php';

//Function to Count FREELANCERS
function count_freelancers()
{
    global $conn;
    $countQuery = "SELECT COUNT(*) AS FreelancersCount FROM freelances";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $freelancers = $rowCountFreelances['FreelancersCount'];
        return $freelancers;
    } else {
        echo "Error: " . $freelancers . "<br>" . mysqli_error($conn);
    }
}
//Function to Count USERS
function count_users()
{
    global $conn;
    $countQuery = "SELECT COUNT(*) AS UsersCount FROM users";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $Users = $rowCountFreelances['UsersCount'];
        return $Users;
    } else {
        echo "Error: " . $Users . "<br>" . mysqli_error($conn);
    }
}

//Function to Count Categories
function count_categories()
{
    global $conn;
    $countQuery = "SELECT COUNT(*) AS CategoriesCount FROM categories";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        // Fetch the count of categories
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $Categories = $rowCountFreelances['CategoriesCount'];
        return $Categories;
    } else {
        echo "Error: " . $Categories . "<br>" . mysqli_error($conn);
    }
}

//Function to Count Project
function count_projects()
{
    global $conn;
    $countQuery = "SELECT COUNT(*) AS projectsCount FROM projects";
    $result = mysqli_query($conn, $countQuery);

    // Check if the query was successful
    if ($result) {
        // Fetch the count of projects
        $rowCountFreelances = mysqli_fetch_assoc($result);
        $projects = $rowCountFreelances['projectsCount'];
        return $projects;
    } else {
        echo "Error: " . $projects . "<br>" . mysqli_error($conn);
    }
}