<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./hal.css">
</head>
<script>
    function redirectToback() {
        // Change the window location to the desired page
        window.location.href = "/../society/assets/User panel/Dashboard/Dashboard.php";
    }
</script>
<script>
    // Get today's date
    var today = new Date().toISOString().split('T')[0];

    // Get date 2 months from now
    var nextTwoMonths = new Date();
    nextTwoMonths.setMonth(nextTwoMonths.getMonth() + 2);
    var maxDate = nextTwoMonths.toISOString().split('T')[0];

    // Set the min and max attributes for the start and end date fields
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('start_date').setAttribute('min', today);
        document.getElementById('start_date').setAttribute('max', maxDate);
        document.getElementById('end_date').setAttribute('min', today);
        document.getElementById('end_date').setAttribute('max', maxDate);
    });
</script>
<script>
        function validateDates() {
            var startDate = new Date(document.getElementById("start_date").value);
            var endDate = new Date(document.getElementById("end_date").value);

            if (startDate > endDate) {
                alert("End date must be greater than start date!");
                return false;
            }

            return true;
        }
    </script>

<body>
    <?php
    session_start();
    ?>
    <?php include '../Common/nav.php' ?>
    <section class="resident_form">

        <div class="full_form">


            <div class="form_img">
                <img src="https://images.unsplash.com/photo-1586098094609-3a53d1099e44?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" alt="IMG">
            </div>

            <div class="forms">

                <form method="post" action="./hall_handler.php" onsubmit="return validateDates()">
                    <div class="seperate">

                        <!-- <div class="user_id form_element">

                    <label for="event_id">Event ID</label>
                    <input type="number" id="event_id" name="event_id">
                </div> -->




                        <div class="user_name form_element">

                            <label for="user_id">User ID:</label>
                            <input type="number" id="user_id" name="user_id" value="<?php include '../../conn.php';
                                                                                    echo $_SESSION['user_id'];   ?>" readonly required>
                        </div>

                        <div class="user_email form_element">

                            <label for="purpose">Purpose</label>
                            <input type="text" id="purpose" name="purpose">
                        </div>

                        <div class="user_phone form_element">

                            <label for="start_date">Start_date</label>
                            <input type="date" id="start_date" name="start_date">
                        </div>

                        <div class="user_pass form_element">

                            <label for="end_date">End_date</label>
                            <input type="date" id="end_date" name="end_date">
                        </div>

                        <div class="user_flat form_element">

                            <label for="start_time">Start_Time</label>
                            <input type="time" id="start_time" name="start_time">
                        </div>

                        <div class="user_role form_element">

                            <label for="end_time">End_time</label>
                            <input type="time" id="end_time" name="end_time">
                        </div>
                        <div class="user_role form_element">

                            <label for="payment">Payment</label>
                            <input type="number" id="payment" name="payment">
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