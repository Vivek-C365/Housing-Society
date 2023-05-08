<!-- <?php
        include_once '../../conn.php';
        $stid = oci_parse($conn, 'INSERT INTO event(event_id, welfare_id,coordinator,title,description,start_date,end_date,start_time,end_time) VALUES(:event_id,:welfare_id,:coordinator,:title,:description,:start_date,:end_date,:start_time,:end_time)');
        // Parse the SQL statement
        $myevent_id = rand(1000, 9999);
        $mywelfare_id = $_POST["welfare_id"];
        $mycoordinator = $_POST["coordinator"];
        $mytitle = $_POST["title"];
        $mydescription = $_POST["description"];
        $mystart_date = $_POST["start_date"];
        $myend_date = $_POST["end_date"];
        $mystart_time = $_POST["start_time"];
        $myend_time = $_POST["end_time"];
        oci_bind_by_name($stid, ":event_id", $myevent_id);
        oci_bind_by_name($stid, ":welfare_id", $mywelfare_id);
        oci_bind_by_name($stid, ":coordinator", $mycoordinator);
        oci_bind_by_name($stid, ":title", $mytitle);
        oci_bind_by_name($stid, ":description", $mydescription);
        oci_bind_by_name($stid, ":start_date", $mystart_date);
        oci_bind_by_name($stid, ":end_date", $myend_date);
        oci_bind_by_name($stid, ":start_time", $mystart_time);
        oci_bind_by_name($stid, ":end_time", $myend_time);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);

        // Redirect to the home page
        header('Location: ../../Admin panel/Event/Event.php');
        ?> -->