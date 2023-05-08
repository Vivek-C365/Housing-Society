<!-- <?php
        include_once '../../conn.php';
        $stid = oci_parse($conn, 'INSERT INTO maintenance(maintenance_id,welfare_id,start_date,end_date,category,cost,description) VALUES(:maintenance_id,:welfare_id,:start_date,:end_date,:category,:cost,:description)');
        // Parse the SQL statement
        $mymaintenance_id = rand(1000, 9999);
        $mywelfare_id = $_POST["welfare_id"];
        $mystart_date = $_POST["start_date"];
        $myend_date = $_POST["end_date"];
        $mycategory = $_POST["category"];
        $mycost = $_POST["cost"];
        $mydescription = $_POST["description"];
        oci_bind_by_name($stid, ":maintenance_id", $mymaintenance_id);
        oci_bind_by_name($stid, ":welfare_id", $mywelfare_id);
        oci_bind_by_name($stid, ":start_date", $mystart_date);
        oci_bind_by_name($stid, ":end_date", $myend_date);
        oci_bind_by_name($stid, ":category", $mycategory);
        oci_bind_by_name($stid, ":cost", $mycost);
        oci_bind_by_name($stid, ":description", $mydescription);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);

        // Redirect to the home page
        header('Location: ../../Admin panel/Maintenance/Maintenance.php');
        ?> -->