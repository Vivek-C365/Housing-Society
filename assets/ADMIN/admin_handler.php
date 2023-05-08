<?php
// Connect to the Oracle database
include_once '../conn.php';

// Check if the email and password were submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitize the inputs
    $email = filter_var($_POST['email']);
    $password = filter_var($_POST['password']);
    $sql = 'SELECT * FROM resident 
        WHERE email= :email AND password = :password AND ROLE IN (\'President\',\'Vice President\',\'admin\')';

    // Query the database for the user
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':password', $password);
    oci_execute($stmt);

    // Check if the user was found
    if (oci_fetch($stmt)) {
        // Start a session and set the user ID
        session_start();
        $_SESSION['user_id'] = oci_result($stmt, 'ID');

        // Redirect to the home page
        header('Location: /../society/assets/Admin panel/Dashboard/Dashboard.php');
        exit();
    } else {
        // Show an error message
        header('Location: invalid.php');
    }
}
