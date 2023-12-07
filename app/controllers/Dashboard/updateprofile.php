<?php

require '../../config/Connect.php';
if (isset($_SESSION['UserID'])) {
    $id = $_SESSION['UserID'];
    update_profile();
} else {
    echo "UserID not set in the session.";
}
// Assuming the user is logged in if reaching this page
$id = $_SESSION['UserID'];


function update_profile()
{
    global $id, $conn;

    if (isset($_POST['update'])) {
        // Get the data from the form
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
                            PhoneNumber=?,
                            profile_picture=?
                        WHERE 
                            UserID=?";
                    $update_stmt = mysqli_prepare($conn, $update_query);

                    if (!$update_stmt) {
                        die("Error in prepared statement: " . mysqli_error($conn));
                    }

                    mysqli_stmt_bind_param($update_stmt, "sssssi", $new_UserName, $new_Email, $new_Password, $new_Phone, $targetFileName, $id);

                    $update_result = mysqli_stmt_execute($update_stmt);

                    if (!$update_result) {
                        echo "Error updating profile: " . mysqli_error($conn);
                    } else {
                        echo "<script>alert('Profile Updated Successfully!')</script>";
                        echo "<script>window.location.href = 'dashboard.php'</script>";
                    }
                } else {
                    echo 'Error moving the uploaded file.';
                }
            } else {
                echo 'Invalid file format. Allowed formats: ' . implode(', ', $allowedExtensions);
            }
        } else {
            echo "<script>alert('Passwords do not match !!')</script>";
        }
    } elseif (isset($_POST['delete'])) {
        // Delete query
        $delete_query = "DELETE FROM users WHERE UserID=?";
        $delete_stmt = mysqli_prepare($conn, $delete_query);

        if (!$delete_stmt) {
            die("Error in prepared statement: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($delete_stmt, "i", $id);
        $delete_result = mysqli_stmt_execute($delete_stmt);

        if (!$delete_result) {
            echo "Error deleting account: " . mysqli_error($conn);
        } else {
            // Logout the user after deleting the account
            session_destroy();
            echo "<script>window.location.href = 'index.php'</script>";
        }
    }
}
