<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./Resident.css">
  <link rel="stylesheet" href="../nav.css">
</head>
<script>
  function redirectToback() {
    // Change the window location to the desired page
    window.location.href = "/../society/assets/Admin panel/Dashboard/Dashboard.php";
  }
</script>
<script>
  function redirectToUpdate() {
    // Change the window location to the desired page
    window.location.href = "/../society/assets/Update/Resident/Resident_update.php";
  }
</script>

<body>
  <?php session_start()?>
  <?php
  require '../Common/nav.php';
  ?>
  <section class="resident_form">

    <div class="full_form">


      <div class="form_img">
        <img src="/../society/index image/ezgif.com-webp-to-jpg (1).jpg" alt="IMG">
      </div>

      <div class="forms">

        <form method="post" action="./resident_handler.php">
          <div class="seperate">

            <!-- <div class="user_id form_element">

              <label for="userid">User_ID</label>
              <input type="number" id="userid" name="user_id">
            </div> -->
            <?php
					include '../../conn.php';
					$sql = 'SELECT * FROM WELFARE_GROUP';
					$stmt = oci_parse($conn, $sql);
					oci_execute($stmt);
					echo '<div class="an_welfare form_element">';

					echo '<label for="welfare_id">Select Welfare ID</label>';
					echo ' 	<select id="category" name="welfare_id">';
					while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
						// Do something with the data, such as display it on the screen
						// echo $row['COLUMN_NAME'] . "<br>";
						echo '<option value="' . $row['WELFARE_ID'] . '">' . $row['WELFARE_ID'] . '---' . $row['NAME'] . '</option>';
					}

					echo	'</select>';
					echo ' </div>';
					?>

            <div class="user_name form_element">

              <label for="name">Name:</label>
              <input type="text" id="name" name="name">
            </div>

            <div class="user_email form_element">

              <label for="email">Email:</label>
              <input type="email" id="email" name="email">
            </div>

            <div class="user_phone form_element">

              <label for="phone">Phone:</label>
              <input type="tel" id="phone" name="phone">
            </div>

            <div class="user_pass form_element">

              <label for="password">Password</label>
              <input type="password" id="password" name="password">
            </div>

            <div class="user_flat form_element">

              <label for="flat">Flat</label>
              <input type="text" id="flat" name="flat">
            </div>

            <!-- <div class="user_role form_element">

              <label for="role">Role</label>
              <input type="text" id="role" name="role">
            </div> -->

            <div class="user_role form_element">

              <label for="role">Role</label>
              <select id="category" name="role">
                <option value="President">President</option>
                <option value="Vice President">Vice President</option>
                <option value="Residents">Residents</option>
                <option value="Treasurers">Treasurer</option>
                <option value="Security Personnel">Security Personnel</option>
              </select>
            </div>
            <div class="user_gender form_element">

              <label for="gender">Gender</label>
              <select id="category" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

          </div>
          <div id="btn">

            <button class="back_btn" onclick="redirectToback()" type="button">Back</button>
            <button class="submit_btn" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

  </section>
  <section>



    <?php
    // Create a connection to the Oracle database
    include '../../conn.php';

    // Check if a delete button is clicked
    if (isset($_POST['delete'])) {
      // Get the user ID from the delete button's value
      $userId = $_POST['delete'];






      // Define the SQL query to delete data from RESIDENT_PHONE table
      $deletePhoneSql = "DELETE FROM RESIDENT_PHONE WHERE USER_ID = :userId";

      // Prepare the delete statement for RESIDENT_PHONE table
      $deletePhoneStmt = oci_parse($conn, $deletePhoneSql);
      oci_bind_by_name($deletePhoneStmt, ':userId', $userId);

      // Execute the delete statement for RESIDENT_PHONE table
      oci_execute($deletePhoneStmt);




      // Define the SQL query to delete data from RESIDENT_FLAT table
      $deleteflatSql = "DELETE FROM RESIDENT_FLAT WHERE USER_ID = :userId";

      // Prepare the delete statement for RESIDENT_flat table
      $deleteflatStmt = oci_parse($conn, $deleteflatSql);
      oci_bind_by_name($deleteflatStmt, ':userId', $userId);

      // Execute the delete statement for RESIDENT_flat table
      oci_execute($deleteflatStmt);




      // Define the SQL query to delete data from HALL_BOOKING table
      $deleteflatSql = "DELETE FROM HALL_BOOKING WHERE USER_ID = :userId";

      // Prepare the delete statement for RESIDENT_flat table
      $deleteflatStmt = oci_parse($conn, $deleteflatSql);
      oci_bind_by_name($deleteflatStmt, ':userId', $userId);

      // Execute the delete statement for RESIDENT_flat table
      oci_execute($deleteflatStmt);
      
      
      
      // Define the SQL query to delete data from HALL_BOOKING table
      $deleteflatSql = "DELETE FROM PAYMENT WHERE USER_ID = :userId";

      // Prepare the delete statement for RESIDENT_flat table
      $deleteflatStmt = oci_parse($conn, $deleteflatSql);
      oci_bind_by_name($deleteflatStmt, ':userId', $userId);

      // Execute the delete statement for RESIDENT_flat table
      oci_execute($deleteflatStmt);
      
      
      // Define the SQL query to delete data from HALL_BOOKING table
      $deleteflatSql = "DELETE FROM PARTICIPATE_IN WHERE USER_ID = :userId";

      // Prepare the delete statement for RESIDENT_flat table
      $deleteflatStmt = oci_parse($conn, $deleteflatSql);
      oci_bind_by_name($deleteflatStmt, ':userId', $userId);

      // Execute the delete statement for RESIDENT_flat table
      oci_execute($deleteflatStmt);




      // Define the SQL query to delete data from RESIDENT table
      $deleteResidentSql = "DELETE FROM RESIDENT WHERE USER_ID = :userId";

      // Prepare the delete statement for RESIDENT table
      $deleteResidentStmt = oci_parse($conn, $deleteResidentSql);
      oci_bind_by_name($deleteResidentStmt, ':userId', $userId);

      // Execute the delete statement for RESIDENT table
      oci_execute($deleteResidentStmt);
    }

    // Define the SQL query to retrieve all data from the RESIDENT and RESIDENT_PHONE tables
    $sql = 'SELECT * FROM RESIDENT, RESIDENT_PHONE , RESIDENT_FLAT WHERE RESIDENT.USER_ID = RESIDENT_PHONE.USER_ID AND RESIDENT.USER_ID = RESIDENT_FLAT.USER_ID';

    // Prepare the SQL statement
    $stmt = oci_parse($conn, $sql);

    // Execute the SQL statement
    oci_execute($stmt);

    echo '<form method="post">';
    echo '<table class="my-table">';
    echo '<thead>
        <tr>
      <th>User ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Mobile Number</th>
      <th>Gender</th>
      <th>Role</th>
      <th>Flat</th>
      <th>Action</th>
    </tr>
  </thead>';
    echo '<tbody>';
    while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
      // Do something with the data, such as display it on the screen

      echo '  <tr>';
      echo ' <td>' . $row['USER_ID'] . '</td>';
      echo ' <td>' . $row['NAME'] . '</td>';
      echo ' <td>' . $row['EMAIL'] . '</td>';
      echo ' <td>' . $row['PASSWORD'] . '</td>';
      echo ' <td>' . $row['PHONE'] . '</td>';
      echo ' <td>' . $row['GENDER'] . '</td>';
      echo ' <td>' . $row['ROLE'] . '</td>';
      echo ' <td>' . $row['FLAT'] . '</td>';


      echo '  <td>';
      echo '<button type="submit" name="delete" value="' . $row['USER_ID'] . '">Delete</button>
      <button  onclick="redirectToUpdate()" type="button">Update</button>';
      echo '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</form>';

    // Close the connection
    oci_close($conn);
    ?>



  </section>
  <?php require '../../../footer.php' ?>


</body>



</html>