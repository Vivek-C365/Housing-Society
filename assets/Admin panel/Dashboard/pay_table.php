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
            $sql = "DELETE FROM PAYMENT WHERE PAYMENT_ID = :deleteId";

            // Prepare the SQL statement
            $stmt = oci_parse($conn, $sql);

            // Bind the announcement ID to the SQL statement
            oci_bind_by_name($stmt, ":deleteId", $deleteId);

            // Execute the SQL statement
            oci_execute($stmt);
        }

        // Define the SQL query to retrieve all data from a table
        $sql = 'SELECT * FROM PAYMENT ';

        // Prepare the SQL statement
        $stmt = oci_parse($conn, $sql);

        // Execute the SQL statement
        oci_execute($stmt);


        echo '<table class="my-table">';
        echo '<thead>
<tr>
<th>PAYMENT_ID</th>
<th>USER_ID</th>
<th>PAYMENT_DETAIL</th>
<th>DATES</th>
<th>TIME</th>
<th>AMOUNT</th>
<th>TYPE</th>
<th>Action</th>
</tr>
</thead>';
        echo '<tbody>';
        while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
            // Do something with the data, such as display it on the screen

            echo '  <tr>';
            echo ' <td>' . $row['PAYMENT_ID'] . '</td>';
            echo ' <td>' . $row['USER_ID'] . '</td>';
            echo ' <td>' . $row['PAYMENT_DETAIL'] . '</td>';
            echo ' <td>' . $row['DATES'] . '</td>';
            echo ' <td>' . $row['TIME'] . '</td>';
            echo ' <td>' . $row['AMOUNT'] . '</td>';
            echo ' <td>' . $row['TYPE'] . '</td>';


            echo '  <td>
        <a href="?delete_id=' . $row['PAYMENT_ID'] . '"><button type="submit" name="delete">Delete</button></a>
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