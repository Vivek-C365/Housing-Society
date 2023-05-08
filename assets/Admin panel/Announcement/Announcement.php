<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./Announcement.css">
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
    window.location.href = "/../society/assets/Update/Annoucement/Annoucement_update.php";
  }
</script>
<script>
	window.onload = function() {
		// Get the current date and time
		var currentDateTime = new Date();

		// Format the date as yyyy-mm-dd
		var formattedDate = currentDateTime.toISOString().substr(0, 10);

		// Format the time as HH:mm
		var formattedTime = ('0' + currentDateTime.getHours()).slice(-2) + ':' + ('0' + currentDateTime.getMinutes()).slice(-2);

		// Set the values of the input fields to the formatted date and time
		document.getElementById('dateInput').value = formattedDate;
		document.getElementById('timeInput').value = formattedTime;
	}
</script>

<body">

	<?php
	require '../Common/nav.php';
	?>
	<section id="announcement">

		<h1 style="    color: white;
    font-size: 3rem;">Announcement Form</h1>
		<form method="post" action="./ann_handler.php">
			<div class="ann_img">
				<img src="https://images.pexels.com/photos/8898643/pexels-photo-8898643.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
			</div>

			<div class="ann_content">



				<div class="an_section">





					<?php
					include '../../conn.php';
					$sql = 'SELECT * FROM WELFARE_GROUP';
					$stmt = oci_parse($conn, $sql);
					oci_execute($stmt);
					echo '<div class="an_welfare">';

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




				</div>
				<div class="an_title">

					<label for="title">Announcement Title</label>
					<input type="text" id="title" name="title" required>
				</div>

				<!-- <div class="an_date">

					<label for="date"> Date</label>
					<input type="date" id="date" name="date_time" >
				</div> -->
				<div class="date_time">

					<div class="an_date">

						<label for="date"> Date</label>
						<input type="date" id="dateInput" name="dates">
					</div>

					<div class="an_time">

						<label for="time"> Time</label>
						<input type="time" id="timeInput" name="time">
					</div>
				</div>
				<div class="an_message">

					<label for="message">Announcement Message</label>
					<textarea id="message" name="description" rows="5" required></textarea>
				</div>

				<div id="btn">

					<button class="back_btn" onclick="redirectToback()" type="button">Back</button>
					<button class="submit_btn" type="submit">Submit</button>
				</div>
			</div>
		</form>

	</section>


	<section>


		<?php
		// Create a connection to the Oracle database
		include '../../conn.php';

		if (isset($_GET['delete_id'])) {
			// Get the announcement ID to be deleted
			$deleteId = $_GET['delete_id'];

			// Define the SQL query to delete the announcement with the given ID
			$sql = "DELETE FROM ANNOUNCEMENT WHERE ANNOUNCEMENT_ID = :deleteId";

			// Prepare the SQL statement
			$stmt = oci_parse($conn, $sql);

			// Bind the announcement ID to the SQL statement
			oci_bind_by_name($stmt, ":deleteId", $deleteId);

			// Execute the SQL statement
			oci_execute($stmt);
		}

		// Define the SQL query to retrieve all data from the ANNOUNCEMENT table
		$sql = 'SELECT * FROM ANNOUNCEMENT';

		// Prepare the SQL statement
		$stmt = oci_parse($conn, $sql);

		// Execute the SQL statement
		oci_execute($stmt);

		echo '<table class="my-table">';
		echo '<thead>
        <tr>
            <th>ANNOUNCEMENT_ID</th>
            <th>WELFARE_ID</th>
            <th>TITLE</th>
            <th>DATES</th>
            <th>TIME</th>
            <th>DESCRIPTION</th>
            <th>Action</th>
        </tr>
    </thead>';
		echo '<tbody>';
		while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
			// Do something with the data, such as display it on the screen

			echo '  <tr>';
			echo ' <td>' . $row['ANNOUNCEMENT_ID'] . '</td>';
			echo ' <td>' . $row['WELFARE_ID'] . '</td>';
			echo ' <td>' . $row['TITLE'] . '</td>';
			echo ' <td>' . $row['DATES'] . '</td>';
			echo ' <td>' . $row['TIME'] . '</td>';
			echo ' <td>' . $row['DESCRIPTION'] . '</td>';

			echo '  <td>
                <a href="?delete_id=' . $row['ANNOUNCEMENT_ID'] . '"><button type="submit" name="delete">Delete</button></a>
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