<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./payment.css">
</head>
<script>
  function redirectToback() {
    // Change the window location to the desired page
    window.location.href = "/../society/assets/User panel/Dashboard/Dashboard.php";
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

<body>
<?php
    session_start();
  ?>
  <?php
  require '../Common/nav.php'
  ?>

  <section class="resident_form">

    <div class="full_form">


      <div class="form_img">
        <img src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="IMG">
      </div>

      <div class="forms">

        <form method="post" action="./pay_handler.php">
          <div class="seperate">


            <!-- <div class="user_id form_element">

              <label for="payment_id">Payment ID</label>
              <input type="text" name="payment_id" id="payment_id" required>
            </div> -->



            <div class="user_name form_element">

              <label for="user_id">User ID</label>
              <input type="text" name="user_id" id="user_id" value="<?php include '../../conn.php'; echo $_SESSION['user_id'];   ?>" readonly required>
            </div>

            <div class="user_email form_element">

              <label for="payment_detail">Payment Detail</label>
              <input type="text" name="payment_detail" id="payment_detail" >
            </div>

            <div class="user_phone form_element">

              <label for="date">Date</label>
              <input type="date" name="dates" id="dateInput">
            </div>

            <div class="user_pass form_element">

              <label for="time">Time</label>
              <input type="time" name="time" id="timeInput">
            </div>

            <div class="user_flat form_element">

              <label for="amount">Amount</label>
              <input type="text" name="amount" id="amount" >
            </div>

            <div class="form-group">
              <label for="type">Type</label>
              <select name="type" id="type" name='type'>
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Other">Other</option>
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
  <?php require '../../../footer.php' ?>
</body>

</html>