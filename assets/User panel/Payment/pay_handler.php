<!-- <?php
        include_once '../../conn.php';
        $stid = oci_parse($conn, 'INSERT INTO payment(payment_id,user_id,payment_detail,dates,time,amount,type) VALUES(:payment_id,:user_id,:payment_detail,:dates,:time,:amount,:type)');
        // Parse the SQL statement
        $mypayment_id = rand(1000, 9999);
        $myuser_id = $_POST["user_id"];
        $mypayment_detail = $_POST["payment_detail"];
        $mydates = $_POST["dates"];
        $mytime = $_POST["time"];
        $myamount = $_POST["amount"];
        $mytype = $_POST["type"];
        oci_bind_by_name($stid, ":payment_id", $mypayment_id);
        oci_bind_by_name($stid, ":user_id", $myuser_id);
        oci_bind_by_name($stid, ":payment_detail", $mypayment_detail);
        oci_bind_by_name($stid, ":dates", $mydates);
        oci_bind_by_name($stid, ":time", $mytime);
        oci_bind_by_name($stid, ":amount", $myamount);
        oci_bind_by_name($stid, ":type", $mytype);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);

        // Redirect to the home page
        header('Location: ../../User panel/Payment/payment.php');
        ?> -->