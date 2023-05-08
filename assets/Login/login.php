<?php
// Connect to the Oracle database
$conn = oci_connect('VIVEK', 'viv', 'localhost/XE');

// Check if the email and password were submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitize the inputs
    $email = filter_var($_POST['email']);
    $password = filter_var($_POST['password']);


    // Query the database for the user
    $stmt = oci_parse($conn, 'SELECT * FROM resident WHERE email = :email AND password = :password');
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':password', $password);
    oci_execute($stmt);

    // Check if the user was found
    if (oci_fetch($stmt)) {
        // Start a session and set the user ID
        session_start();
        $_SESSION['user_id'] = oci_result($stmt, 'USER_ID');
        
        // $user_id = $_SESSION['user_id'];
        // var_dump($_SESSION['user_id']); // or print_r($_SESSION);

        // // Check if user ID is set in $_SESSION['user_id']
        // if(isset($_SESSION['user_id'])){
        //     echo "User ID is stored in session variable.";
        // } else {
        //     echo "User ID is not stored in session variable.";
        // }
            
        // Redirect to the home page
        header('Location: /../society/assets/User panel/Dashboard/Dashboard.php?User_Id:-'.$_SESSION['user_id']);
        exit();
    } else {
        // Show an error message
        header('Location: invalid.php');
    }
}
