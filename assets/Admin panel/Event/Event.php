<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./event.css">
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
    window.location.href = "/../society/assets/Update/Event/Event_update.php";
  }
</script>

<body>
	<?php
	require '../Common/nav.php';
	?>


	<section class="resident_form">

		<div class="full_form">


			<div class="form_img">
				<img src="./alexandre-debieve-DOu3JJ3eLQc-unsplash.jpg" alt="IMG">
			</div>

			<div class="forms">

				<form method="post" action="./event_handler.php">
					<div class="seperate">

						<!-- <div class="user_id form_element">

							<label for="event_id">Event ID</label>
							<input type="number" id="event_id" name="event_id">
						</div> -->
						<!-- <div class="user_id form_element">

							<label for="welfare_id">Welfare ID</label>
							<input type="number" id="welfare_id" name="welfare_id">
						</div> -->

						<?php
						include '../../conn.php';
						$sql = 'SELECT * FROM WELFARE_GROUP';
						$stmt = oci_parse($conn, $sql);
						oci_execute($stmt);
						echo '<div class="user_pass form_element">';

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

							<label for="title">Event Title</label>
							<input type="text" id="title" name="title">
						</div>

						<div class="user_email form_element">

							<label for="coordinator">Event Coordinator</label>
							<input type="text" id="coordinator" name="coordinator">
						</div>

						<div class="user_phone form_element">

							<label for="date">Event Start Date</label>
							<input type="date" id="date" name="start_date">
						</div>

						<div class="user_pass form_element">

							<label for="date">Event End Date</label>
							<input type="date" id="date" name="end_date">
						</div>

						<div class="user_flat form_element">

							<label for="time">Event Start Time</label>
							<input type="time" id="time" name="start_time">
						</div>

						<div class="user_role form_element">

							<label for="time">Event End Time</label>
							<input type="time" id="time" name="end_time">
						</div>
						<div class="user_role form_element" style="width: 75%; ">

							<label for="description">Event Description</label>
							<textarea id="description" name="description" rows="5" style="background-color: rgb(0 0 0 / 37%) !important"></textarea>
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
		if (isset($_GET['delete_id'])) {
			// Get the announcement ID to be deleted
			$deleteId = $_GET['delete_id'];

			// Define the SQL query to delete the announcement with the given ID
			$sql = "DELETE FROM EVENT WHERE EVENT_ID = :deleteId";

			// Prepare the SQL statement
			$stmt = oci_parse($conn, $sql);

			// Bind the announcement ID to the SQL statement
			oci_bind_by_name($stmt, ":deleteId", $deleteId);

			// Execute the SQL statement
			oci_execute($stmt);
		}
		// Define the SQL query to retrieve all data from a table
		$sql = 'SELECT * FROM EVENT';

		// Prepare the SQL statement
		$stmt = oci_parse($conn, $sql);

		// Execute the SQL statement
		oci_execute($stmt);


		echo '<table class="my-table">';
		echo '<thead>
        <tr>
      <th>EVENT_ID</th>
      <th>WELFARE_ID</th>
      <th>COORDINATOR</th>
      <th>TITLE</th>
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
			echo ' <td>' . $row['EVENT_ID'] . '</td>';
			echo ' <td>' . $row['WELFARE_ID'] . '</td>';
			echo ' <td>' . $row['COORDINATOR'] . '</td>';
			echo ' <td>' . $row['TITLE'] . '</td>';
			echo ' <td>' . $row['DESCRIPTION'] . '</td>';
			echo ' <td>' . $row['START_DATE'] . '</td>';
			echo ' <td>' . $row['END_DATE'] . '</td>';
			echo ' <td>' . $row['START_TIME'] . '</td>';
			echo ' <td>' . $row['END_TIME'] . '</td>';


			echo '  <td>
                <a href="?delete_id=' . $row['EVENT_ID'] . '"><button type="submit" name="delete">Delete</button></a>
				<button  onclick="redirectToUpdate()" type="button">Update</button>
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