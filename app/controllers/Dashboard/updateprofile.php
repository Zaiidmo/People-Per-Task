<?php

require '../../config/Connect.php';
global $id;

if (isset($_SESSION['UserID'])) {
    $id = $_SESSION['UserID'];
    update_profile(); 
} else {
    echo "UserID not set in the session.";
}
function update_profile()
{
    global $id, $conn;
    if (isset($_POST['update'])) {
        // Get the data from form
        $new_UserName = $_POST['UserName'];
        $new_Email = $_POST['Email'];
        $new_Password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $new_Phone = $_POST['phoneNumber'];
        if ($_POST['password'] === $_POST['confirmpassword']) {
            // Check if the uploaded file is an image
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($_FILES['New_profilePic']['name'], PATHINFO_EXTENSION));
            if (in_array($fileExtension, $allowedExtensions)) {

                // Set the target directory for uploads
                $uploadDirectory = "../../public/assets/uploads/";

                // Generate a unique filename for the uploaded image
                $targetFileName = $uploadDirectory . $new_UserName . "." . $fileExtension;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['New_profilePic']['tmp_name'], $targetFileName)) {
                    // Update query
                    $update_query = "UPDATE users 
                        SET 
                            UserName=?,
                            Email=?,
                            PasswordHash=?,
                            PhoneNumber =?,
                            profile_picture =? 
                        WHERE 
                            UserID = ?";
                    $update_stmt = mysqli_prepare($conn, $update_query);
                    mysqli_stmt_bind_param($update_stmt, "sssisi", $new_UserName, $new_Email, $new_Password, $new_Phone, $targetFileName,$id);
                    $update_result = mysqli_stmt_execute($update_stmt);
                    echo "<script>alert('Profile Updated Successfully!')</script>";
                    echo "<script>window.location.href = 'dashboard.php'</script>";
                } else {
                    echo 'Error moving the uploaded file.';
                }
            } else { 
                echo 'Invalid file format. Allowed formats: ' . implode(', ', $allowedExtensions);
            }
        } else {
            echo "<script>alert('Passwords do not match !!')</script>";
        }
    }
}
