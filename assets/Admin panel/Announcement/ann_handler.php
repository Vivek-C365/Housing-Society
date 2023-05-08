<!-- <?php
        include_once '../../conn.php';
        $stid = oci_parse($conn, 'INSERT INTO announcement(announcement_id,welfare_id,title,description,dates,time) VALUES(:announcement_id,:welfare_id,:title,:description,:dates,:time)');
        // Parse the SQL statement
        $myannouncement_id = rand(1000, 9999);
        $mytitle = $_POST["title"];
        $mydescription = $_POST["description"];
        $mydates = $_POST["dates"];
        $mytime = $_POST["time"];
        $mywelfare_id = $_POST["welfare_id"];
        oci_bind_by_name($stid, ":announcement_id", $myannouncement_id);
        oci_bind_by_name($stid, ":title", $mytitle);
        oci_bind_by_name($stid, ":description", $mydescription);
        oci_bind_by_name($stid, ":dates", $mydates);
        oci_bind_by_name($stid, ":time", $mytime);
        oci_bind_by_name($stid, ":welfare_id", $mywelfare_id);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);

        // Redirect to the home page
        header('Location: ../../Admin panel/Announcement/Announcement.php');
        ?> -->