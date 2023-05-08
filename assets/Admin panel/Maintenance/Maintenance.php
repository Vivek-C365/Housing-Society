<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./main.css">
</head>
<script>
	function redirectToback() {
		// Change the window location to the desired page
		window.location.href = "/../society/assets/Admin panel/Dashboard/Dashboard.php";
	}
</script>

<body>

	<?php
	require '../Common/nav.php';
	?>

	<section class="resident_form">

		<div class="full_form">


			<div class="form_img">
				<img src="https://images.pexels.com/photos/3822900/pexels-photo-3822900.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="IMG">
			</div>

			<div class="forms">

				<form method="post" action="./main_handler.php">
					<div class="seperate">
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
						<div class="user_email form_element">

							<label for="date">Maintenance Start Date</label>
							<input type="date" id="date" name="start_date" required>
						</div>

						<div class="user_phone form_element">

							<label for="date">Maintenance End Date</label>
							<input type="date" id="date" name="end_date" required>
						</div>

						<div class="user_pass form_element">

							<label for="category">Category</label>
							<select id="category" name="category">
								<option value="Park">Park</option>
								<option value="Flat">Flat</option>
								<option value="water">water</option>
								<option value="electricity">electricity</option>
								<option value="security">security</option>
								<option value="Painting">Painting</option>
							</select>
						</div>

						<div class="user_flat form_element">

							<label for="cost">Cost</label>
							<input type="number" id="cost" name="cost" required>
						</div>

						<div class="user_role form_element">

							<label for="description">Maintenance Request Description:</label>
							<textarea id="description" name="description"></textarea>
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
			$sql = "DELETE FROM MAINTENANCE WHERE MAINTENANCE_ID = :deleteId";

			// Prepare the SQL statement
			$stmt = oci_parse($conn, $sql);

			// Bind the announcement ID to the SQL statement
			oci_bind_by_name($stmt, ":deleteId", $deleteId);

			// Execute the SQL statement
			oci_execute($stmt);
		}

		// Define the SQL query to retrieve all data from a table
		$sql = 'SELECT * FROM MAINTENANCE ';

		// Prepare the SQL statement
		$stmt = oci_parse($conn, $sql);

		// Execute the SQL statement
		oci_execute($stmt);


		echo '<table class="my-table">';
		echo '<thead>
        <tr>
      <th>MAINTENANCE_ID</th>
      <th>WELFARE_ID</th>
      <th>START_DATE</th>
      <th>END_DATE</th>
      <th>CATEGORY</th>
      <th>COST</th>
      <th>DESCRIPTION</th>
      <th>Action</th>
    </tr>
  </thead>';
		echo '<tbody>';
		while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
			// Do something with the data, such as display it on the screen

			echo '  <tr>';
			echo ' <td>' . $row['MAINTENANCE_ID'] . '</td>';
			echo ' <td>' . $row['WELFARE_ID'] . '</td>';
			echo ' <td>' . $row['START_DATE'] . '</td>';
			echo ' <td>' . $row['END_DATE'] . '</td>';
			echo ' <td>' . $row['CATEGORY'] . '</td>';
			echo ' <td>' . $row['COST'] . '</td>';
			echo ' <td>' . $row['DESCRIPTION'] . '</td>';


			echo '  <td>
                <a href="?delete_id=' . $row['MAINTENANCE_ID'] . '"><button type="submit" name="delete">Delete</button></a>
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