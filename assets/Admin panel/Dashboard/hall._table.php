<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../User panel/Hall booking/hal.css">
</head>

<body>

    <?php
    require '../Common/nav.php'
    ?>
    <section>


        <?php
        // Create a connection to the Oracle database
        include '../../conn.php';

        if (isset($_GET['delete_id'])) {
            // Get the announcement ID to be deleted
            $deleteId = $_GET['delete_id'];

            // Define the SQL query to delete the announcement with the given ID
            $sql = "DELETE FROM HALL_BOOKING WHERE BOOKING_ID = :deleteId";

            // Prepare the SQL statement
            $stmt = oci_parse($conn, $sql);

            // Bind the announcement ID to the SQL statement
            oci_bind_by_name($stmt, ":deleteId", $deleteId);

            // Execute the SQL statement
            oci_execute($stmt);
        }

        // Define the SQL query to retrieve all data from a table
        $sql = 'SELECT * FROM HALL_BOOKING ';

        // Prepare the SQL statement
        $stmt = oci_parse($conn, $sql);

        // Execute the SQL statement
        oci_execute($stmt);


        echo '<table class="my-table">';
        echo '<thead>
<tr>
<th>BOOKING_ID</th>
<th>USER_ID</th>
<th>PAYMENT</th>
<th>PURPOSE</th>
<th>DESCRIPTION</th>
<th>START_DATE</th>
<th>END_DATE</th>
<th>START_TIME</th>
<th>END_TIME</th>
<th>Action</th>
</tr>
</thead>';
        echo '<tbody>';
        while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
            // Do something with the data, such as display it on the screen

            echo '  <tr>';
            echo ' <td>' . $row['BOOKING_ID'] . '</td>';
            echo ' <td>' . $row['USER_ID'] . '</td>';
            echo ' <td>' . $row['PAYMENT'] . '</td>';
            echo ' <td>' . $row['PURPOSE'] . '</td>';
            echo ' <td>' . $row['DESCRIPTION'] . '</td>';
            echo ' <td>' . $row['START_DATE'] . '</td>';
            echo ' <td>' . $row['END_DATE'] . '</td>';
            echo ' <td>' . $row['START_TIME'] . '</td>';
            echo ' <td>' . $row['END_TIME'] . '</td>';


            echo '  <td>
        <a href="?delete_id=' . $row['BOOKING_ID'] . '"><button type="submit" name="delete">Delete</button></a>
      </td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Close the connection
        oci_close($conn);

        ?>


    </section>
    <?php require '../../../footer.php' ?>
</body>

</html>