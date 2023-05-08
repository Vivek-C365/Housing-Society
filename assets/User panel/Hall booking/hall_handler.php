<!-- <?php
        include_once '../../conn.php';
        // Parse the SQL statement
        $mybooking_id = rand(1000, 9999);
        $myuser_id = $_POST["user_id"];
        $mypurpose = $_POST["purpose"];
        $mystart_date = $_POST["start_date"];
        $myend_date = $_POST["end_date"];
        $mystart_time = $_POST["start_time"];
        $myend_time = $_POST["end_time"];
        $mypayment = $_POST["payment"];
        $mydescription = $_POST["description"];



        // Check for duplicate values in database
        $duplicateFields = array(); // Array to store fields with duplicate values

        // Check for duplicate email
        $sql = "SELECT COUNT(*) FROM HALL_BOOKING WHERE start_date = :start_date";
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ":start_date", $mystart_date);
        oci_execute($stid);
        $row = oci_fetch_assoc($stid);

        // If duplicate email exists, add "email" to the list of duplicate fields
        if ($row['COUNT(*)'] > 0) {
                $duplicateFields[] = "start_date";
        }
        oci_free_statement($stid);

        // If there are duplicate fields, show an alert with the field names and redirect back to the form page
        if (!empty($duplicateFields)) {
                $duplicateFieldsString = implode(", ", $duplicateFields);
                // echo "<script>alert('This Date is already Existing : " . $duplicateFieldsString . "'); window.location.href='../../Admin panel/Resident/Resident.php';</script>";
                echo "$duplicateFieldsString";
                exit(); // stop the execution of the script
        }



        $stid = oci_parse($conn, 'INSERT INTO hall_booking(booking_id, user_id,purpose,start_date,end_date,start_time,end_time,payment,description) VALUES(:booking_id,:user_id,:purpose,:start_date,:end_date,:start_time,:end_time,:payment,:description)');
        oci_bind_by_name($stid, ":booking_id", $mybooking_id);
        oci_bind_by_name($stid, ":user_id", $myuser_id);
        oci_bind_by_name($stid, ":purpose", $mypurpose);
        oci_bind_by_name($stid, ":start_date", $mystart_date);
        oci_bind_by_name($stid, ":end_date", $myend_date);
        oci_bind_by_name($stid, ":start_time", $mystart_time);
        oci_bind_by_name($stid, ":end_time", $myend_time);
        oci_bind_by_name($stid, ":payment", $mypayment);
        oci_bind_by_name($stid, ":description", $mydescription);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);

        // Redirect to the home page
        header('Location: ../../User panel/Hall booking/hall_booking.php');
        ?> -->