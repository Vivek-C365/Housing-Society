<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../Admin panel/Event/event.css">
</head>
<script>
	function redirectToback() {
		// Change the window location to the desired page
		window.location.href = "/../society/assets/Admin panel/Event/Event.php";
	}
</script>

<body>
<?php
    include '../../Admin panel/Common/nav.php'
    ?>


	<section class="resident_form">

		<div class="full_form">


			<div class="form_img">
				<img src="../../Admin panel/Event/alexandre-debieve-DOu3JJ3eLQc-unsplash.jpg" alt="IMG">
			</div>

			<div class="forms">

				<form method="post" action="./Update.php">
					<div class="seperate">

						<div class="user_id form_element">

							<label for="event_id">Event ID</label>
							<input type="number" id="event_id" name="event_id">
						</div>
						

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

	<?php require '../../../footer.php' ?>

</body>

</html>