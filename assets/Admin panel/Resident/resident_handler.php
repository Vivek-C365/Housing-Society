<?php
include_once '../../conn.php';
// Parse the SQL statement
$myuser = rand(1000, 9999);
$myname = $_POST["name"];
$mywelfare_id = $_POST["welfare_id"];
$myemail = $_POST["email"];
$myphone = $_POST["phone"];
$mypassword = $_POST["password"];
$myflat = $_POST["flat"];
$myrole = $_POST["role"];
$mygender = $_POST["gender"];
//////////////////////////////////////////////////////////// 



// Check for duplicate values in database
$duplicateFields = array(); // Array to store fields with duplicate values

// Check for duplicate email
$sql = "SELECT COUNT(*) FROM RESIDENT WHERE email = :email";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":email", $myemail);
oci_execute($stid);
$row = oci_fetch_assoc($stid);

// If duplicate email exists, add "email" to the list of duplicate fields
if ($row['COUNT(*)'] > 0) {
  $duplicateFields[] = "email";
}
oci_free_statement($stid);

// If there are duplicate fields, show an alert with the field names and redirect back to the form page
if (!empty($duplicateFields)) {
  $duplicateFieldsString = implode(", ", $duplicateFields);
  echo "<script>alert('This Email is already Existing : " . $duplicateFieldsString . "');window.location.href='../../Admin panel/Resident/Resident.php';</script>";
  exit(); // stop the execution of the script
}






//////////////////////////////////////////////////////////////

if($myrole == 'President' || $myrole == 'Vise President' || $myrole == 'Treasurer'){
  $sql = "INSERT ALL 
                  INTO RESIDENT (user_id , name , password, role ,email,gender) VALUES(:user_id, :name, :password, :role ,:email,:gender)
                  INTO RESIDENT_PHONE (user_id, phone) VALUES(:user_id, :phone)
                  INTO RESIDENT_FLAT (user_id , flat) VALUES(:user_id, :flat)
                  INTO PARTICIPATE_IN (user_id , welfare_id , designation) VALUES(:user_id, :welfare_id , :role)
                SELECT 1 FROM dual";
}
else{
  $sql = "INSERT ALL 
                  INTO RESIDENT (user_id , name , password, role ,email,gender) VALUES(:user_id, :name, :password, :role ,:email,:gender)
                  INTO RESIDENT_PHONE (user_id, phone) VALUES(:user_id, :phone)
                  INTO RESIDENT_FLAT (user_id , flat) VALUES(:user_id, :flat)
                SELECT 1 FROM dual";
}

$stid = oci_parse($conn, $sql);

oci_bind_by_name($stid, ":user_id", $myuser);
oci_bind_by_name($stid, ":welfare_id", $mywelfare_id);
oci_bind_by_name($stid, ":name", $myname);
oci_bind_by_name($stid, ":email", $myemail);
oci_bind_by_name($stid, ":phone", $myphone);
oci_bind_by_name($stid, ":password", $mypassword);
oci_bind_by_name($stid, ":flat", $myflat);
oci_bind_by_name($stid, ":role", $myrole);
oci_bind_by_name($stid, ":gender", $mygender);
oci_execute($stid);
oci_free_statement($stid);
oci_close($conn);

// Redirect to the home page
header('Location: ../../Admin panel/Resident/Resident.php');
?>
