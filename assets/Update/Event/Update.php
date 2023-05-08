<?php
include '../../conn.php';
$event_id = $_POST['event_id'];
$welfare_id = $_POST['welfare_id'];
$title = $_POST['title'];
$coordinator = $_POST['coordinator'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$start_time = $_POST['start_time'];
$end_time= $_POST['end_time'];
$description= $_POST['description'];
$sql1 = "UPDATE EVENT
        SET welfare_id = NVL(:welfare_id,welfare_id) , title=NVL(:title,title), coordinator=NVL(:coordinator,coordinator),start_date=NVL(:start_date,start_date), end_date=NVL(:end_date,end_date),start_time=NVL(:start_time,start_time),end_time=NVL(:end_time,end_time) ,description=NVL(:description,description)WHERE event_id = :event_id";
$stmt_phone = oci_parse($conn, $sql1);

oci_bind_by_name($stmt_phone, ':event_id', $event_id);
oci_bind_by_name($stmt_phone, ':welfare_id', $welfare_id);
oci_bind_by_name($stmt_phone, ':title', $title);
oci_bind_by_name($stmt_phone, ':coordinator', $coordinator);
oci_bind_by_name($stmt_phone, ':start_date', $start_date);
oci_bind_by_name($stmt_phone, ':end_date', $end_date);
oci_bind_by_name($stmt_phone, ':start_time', $start_time);
oci_bind_by_name($stmt_phone, ':end_time', $end_time);
oci_bind_by_name($stmt_phone, ':description', $description);
oci_execute($stmt_phone);
oci_close($conn);
// Redirect to the home page
header('Location: ../../Admin panel/Event/Event.php');
