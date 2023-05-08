<?php

include '../../conn.php';
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$gender = $_POST['gender'];

// Prepare the update query
$sql = "UPDATE RESIDENT 
        SET name = NVL(:name, name), email = NVL(:email, email), 
        password = NVL(:password, password), role = NVL(:role, role), gender=NVL(:gender,gender)
        WHERE user_id = :user_id";


// Prepare the statement
$stmt_resident = oci_parse($conn, $sql);

// Bind the parameters
oci_bind_by_name($stmt_resident, ':name', $name);
oci_bind_by_name($stmt_resident, ':email', $email);
oci_bind_by_name($stmt_resident, ':password', $password);
oci_bind_by_name($stmt_resident, ':role', $role);
oci_bind_by_name($stmt_resident, ':gender', $gender);
oci_bind_by_name($stmt_resident, ':user_id', $user_id);




// Execute the update statement
oci_execute($stmt_resident);


oci_close($conn);
?>




<?php
include '../../conn.php';
$user_id = $_POST['user_id'];
$flat = $_POST['flat'];
$sql1 = "UPDATE RESIDENT_FLAT
        SET flat = NVL(:flat,flat) WHERE user_id = :user_id";
$stmt_flat = oci_parse($conn, $sql1);

oci_bind_by_name($stmt_flat, ':flat', $flat);
oci_bind_by_name($stmt_flat, ':user_id', $user_id);
oci_execute($stmt_flat);

oci_close($conn);
?>








<?php
include '../../conn.php';
$user_id = $_POST['user_id'];
$phone = $_POST['phone'];
$sql1 = "UPDATE RESIDENT_PHONE
        SET phone = NVL(:phone,phone) WHERE user_id = :user_id";
$stmt_phone = oci_parse($conn, $sql1);

oci_bind_by_name($stmt_phone, ':phone', $phone);
oci_bind_by_name($stmt_phone, ':user_id', $user_id);
oci_execute($stmt_phone);
oci_close($conn);
// Redirect to the home page
header('Location: ../../Admin panel/Resident/Resident.php');
?>



<?php
include '../../conn.php';
$user_id = $_POST['user_id'];
$role = $_POST['role'];
$sql1 = "UPDATE RESIDENT_role
        SET role = NVL(:role,role) WHERE user_id = :user_id";
$stmt_role = oci_parse($conn, $sql1);

oci_bind_by_name($stmt_role, ':role', $role);
oci_bind_by_name($stmt_role, ':user_id', $user_id);
oci_execute($stmt_role);
oci_close($conn);
// Redirect to the home page
header('Location: ../../Admin panel/Resident/Resident.php');
?>