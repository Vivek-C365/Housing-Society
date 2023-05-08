<?php
include '../../conn.php';
$announcement_id = $_POST['announcement_id'];
$welfare_id = $_POST['welfare_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$sql1 = "UPDATE ANNOUNCEMENT
        SET welfare_id = NVL(:welfare_id,welfare_id) , title=NVL(:title,title) , description=NVL(:description,description) WHERE announcement_id = :announcement_id";
$stmt_phone = oci_parse($conn, $sql1);

oci_bind_by_name($stmt_phone, ':welfare_id', $welfare_id);
oci_bind_by_name($stmt_phone, ':announcement_id', $announcement_id);
oci_bind_by_name($stmt_phone, ':title', $title);
oci_bind_by_name($stmt_phone, ':description', $description);
oci_execute($stmt_phone);
oci_close($conn);
// Redirect to the home page
header('Location: ../../Admin panel/Announcement/Announcement.php');
?>