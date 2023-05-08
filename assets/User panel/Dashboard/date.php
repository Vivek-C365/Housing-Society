<!-- File: index.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Date Validation with Disabled Dates Example</title>
    <style>
        .disabled {
            /* Style for disabled dates */
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <h1>Date Validation with Disabled Dates Example</h1>
    <form>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>
        <br>
        <input type="submit" value="Submit">
    </form>
    <script>
        window.onload = function() {
            // Fetch booked dates from the server-side (Oracle database using PHP)
            // You can use an AJAX request or any other method to fetch the data
            // Example:
            var bookedDates = <?php echo json_encode(getBookedDatesFromOracle()); ?>;

            // Get the date input elements
            var startDateInput = document.getElementById("start_date");
            var endDateInput = document.getElementById("end_date");

            // Disable booked dates in date picker
            startDateInput.addEventListener('input', function() {
                // Enable all dates first
                endDateInput.disabled = false;

                // Get the selected start date
                var startDate = new Date(startDateInput.value);

                // Loop through booked dates and disable them
                for (var i = 0; i < bookedDates.length; i++) {
                    var bookedDate = new Date(bookedDates[i]);

                    // Compare dates to check for booked dates
                    if (startDate.getTime() === bookedDate.getTime()) {
                        endDateInput.disabled = true;
                        endDateInput.value = '';
                        break;
                    }
                }
            });
        };
    </script>
</body>

</html>

<?php
// File: functions.php

// Function to fetch booked dates from Oracle database
function getBookedDatesFromOracle()
{
    // Connect to Oracle database
    include '../../conn.php';
    // Query to fetch booked dates
    $query = "SELECT start_date , end_date FROM HALL_BOOKING"; // Replace with your actual query

    // Execute the query
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);

    // Fetch the booked dates into an array
    $bookedDates = array();
    while ($row = oci_fetch_assoc($stmt)) {
        echo $row['START_DATE'];
        echo $bookedDates;
    }

    // Close the database connection
    oci_close($conn);

    // Return the booked dates array
    return $bookedDates;
}
?>