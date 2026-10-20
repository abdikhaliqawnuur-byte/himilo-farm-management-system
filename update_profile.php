<?php
require_once ("db/connection.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit(); // Make sure to exit after redirect
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    // Update user profile in the database
    $updateQuery = "UPDATE users SET username = :username, email = :email WHERE id = :id";
    $updateStatement = $pdo->prepare($updateQuery);
    
    // Bind parameters
    $updateStatement->bindParam(':username', $newUsername, PDO::PARAM_STR);
    $updateStatement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $updateStatement->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT); // Assuming you have user_id in session
    
    // Execute the update
    if ($updateStatement->execute()) {
        // Update successful, redirect back to profile page
        header("location: profile.php");
        exit();
    } else {
        // Update failed, handle the error
        echo "Update failed.";
    }
}
?>
