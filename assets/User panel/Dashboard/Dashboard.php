<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./dass.css">
  <link rel="stylesheet" href="/../society/assets/Admin panel/panel.css">
  <script>
    const panels = document.querySelectorAll('.panel');

    panels.forEach(panel => {
      panel.addEventListener('click', () => {
        panel.classList.toggle('active');
      });
    });
  </script>
</head>

<body>
  <?php
  session_start();
  ?>
  <?php
  require '../Common/nav.php'
  ?>

  <section id="dash">

    <div class="panel">
      <div class="name_no">

        <h2>Hall Booking</h2>
        <h3><?php
            include '../../conn.php';
            $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM HALL_BOOKING');
            oci_execute($s);
            $b = oci_fetch_array($s);
            $total = $b['TOTAL'];
            echo $total;

            ?></h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/User panel/Hall booking/hall_booking.php">

          <img src="/../society/index image/icons/Hall Booking.png" alt="Logo">
        </a>
      </div>
    </div>
    <div class="panel" style="background-color: #fbf2c2;">
      <div class="name_no">

        <h2>Payments</h2>
        <h3><?php
            include '../../conn.php';


            $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM PAYMENT WHERE USER_ID =' . $_SESSION['user_id']);
            oci_execute($s);
            $b = oci_fetch_array($s);
            $total = $b['TOTAL'];
            echo $total;

            ?></h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/User panel/Payment/payment.php">

          <img src="/../society/index image/icons/payments.png" alt="Logo">
        </a>
      </div>
    </div>

    </div>



  </section>



  <section class="user_info">

    <div class="card_content">
      <div class="head">
        <h1>Personal Booking</h1>
      </div>
      <?php
      // Create a connection to the Oracle database
      include '../../conn.php';

      // Prepare the SQL statement
      // $stmt = oci_parse($conn, 'SELECT * FROM HALL_BOOKING WHERE USER_ID =' . $_SESSION['user_id']);

      $stmt = oci_parse($conn, "SELECT * FROM HALL_BOOKING WHERE USER_ID = {$_SESSION['user_id']} AND TO_DATE(END_DATE,'YYYY-MM-DD') >= TRUNC(SYSDATE) - 5");

      // Execute the SQL statement
      oci_execute($stmt);
      while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {


        echo '<div class="detail_content">';
        echo '  <div class="user_name">';
        echo '  </div>
        <div class="timimg_detail">

          <div class="date_detail">
          <span> Date </span>
            <div class="from_date dat">

              <span>From ---  </span>';
        echo     '<span>' . $row['START_DATE'] . '</span>';
        echo ' </div>
            <div class="to_detail dat">
              <span>To ---  </span>';
        echo '  <span>' . $row['END_DATE'] . '</span>';
        echo '  </div>
          </div>
          <div class="time_detail">
          <span> Time </span>
            <div class="from_time dat">
              <span>From--</span>';
        echo   ' <span>' . $row['START_TIME'] . '</span>';
        echo '  </div>
            <div class="to_date dat">
              <span>To--</span>';
        echo '  <span>' . $row['END_TIME'] . '</span>';
        echo '</div>
          </div>
        </div>
      </div>';
      }
      // Close the connection
      oci_close($conn);
      ?>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <div class="card_content">
      <div class="head">
        <h1>Hall Booking</h1>
      </div>
      <?php
      // Create a connection to the Oracle database
      include '../../conn.php';
      // Define the SQL query to retrieve all data from a table
      // $sql = 'SELECT * FROM HALL_BOOKING , RESIDENT WHERE HALL_BOOKING.USER_ID = RESIDENT.USER_ID ';

      // Prepare the SQL statement
      $stmt = oci_parse($conn, "SELECT * FROM HALL_BOOKING, RESIDENT WHERE HALL_BOOKING.USER_ID = RESIDENT.USER_ID AND TO_DATE(END_DATE,'YYYY-MM-DD') >= TRUNC(SYSDATE) - 7");


      // Execute the SQL statement
      oci_execute($stmt);
      while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {


        echo '<div class="detail_content">';
        echo '  <div class="user_name">
        <span> Name: - </span>';
        echo '<span>' . $row['NAME'] . '</span>';
        echo '  </div>
        <div class="timimg_detail">

          <div class="date_detail">
          <span> Date </span>
            <div class="from_date dat">

              <span>From ---  </span>';
        echo     '<span>' . $row['START_DATE'] . '</span>';
        echo ' </div>
            <div class="to_detail dat">
              <span>To ---  </span>';
        echo '  <span>' . $row['END_DATE'] . '</span>';
        echo '  </div>
          </div>
          <div class="time_detail">
          <span> Time </span>
            <div class="from_time dat">
              <span>From--</span>';
        echo   ' <span>' . $row['START_TIME'] . '</span>';
        echo '  </div>
            <div class="to_date dat">
              <span>To--</span>';
        echo '  <span>' . $row['END_TIME'] . '</span>';
        echo '</div>
          </div>
        </div>
      </div>';
      }
      // Close the connection
      oci_close($conn);
      ?>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="card_content">
      <div class="head">
        <h1>Announcement</h1>
      </div>
      <?php
      // Create a connection to the Oracle database
      include '../../conn.php';
      // Define the SQL query to retrieve all data from a table
      $sql = "SELECT * FROM ANNOUNCEMENT WHERE TO_DATE(DATES, 'YYYY-MM-DD') >= TRUNC(SYSDATE) - 7";


      // Prepare the SQL statement
      $stmt = oci_parse($conn, $sql);

      // Execute the SQL statement
      oci_execute($stmt);
      while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {


        echo '<div class="detail_content">';
        echo '  <div class="user_name">
        <span> Title : - </span>';

        echo '<span>' . $row['TITLE'] . '</span>';
        echo '  </div>
        <div class="timimg_detail">

          <div class="date_detail">
          <span> Date </span>
            <div class="from_date dat">';
        echo     '<span>' . $row['DATES'] . '</span>';
        echo ' </div>
            
          </div>
          <div class="time_detail">
          <span> Time </span>
            <div class="from_time dat">';
        echo   ' <span>' . $row['TIME'] . '</span>';
        echo '</div>
          </div>
          
        </div>';
        echo ' <div class="para">
       <span> Description </span>';
        echo '<p>' . $row['DESCRIPTION'] . '</p>';
        echo '</div>
      </div>';
      }
      // Close the connection
      oci_close($conn);
      ?>
    </div>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="card_content">
      <div class="head">
        <h1>Payments</h1>
      </div>
      <?php
      // Create a connection to the Oracle database
      include '../../conn.php';

      // Prepare the SQL statement
      $stmt = oci_parse($conn, "SELECT * FROM PAYMENT WHERE USER_ID = {$_SESSION['user_id']} AND TO_DATE(DATES, 'YYYY-MM-DD') >= TRUNC(SYSDATE) - 15");

      // Execute the SQL statement
      oci_execute($stmt);
      while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {


        echo '<div class="detail_content">';
        echo '  <div class="user_name">
        <span> Payment ID : - </span>';

        echo '<span>' . $row['PAYMENT_ID'] . '</span>';
        echo '  </div>';
        echo '<div class="timimg_detail">';

        echo ' <div class="date_detail">';
        echo ' <span> Date </span>';
        echo '  <div class="from_date dat">';
        echo     '<span>' . $row['DATES'] . '</span>';
        echo ' </div>';

        echo '  </div>';
        echo '  <div class="time_detail">';
        echo '  <span> Time </span>';
        echo '    <div class="from_time dat">';
        echo   ' <span>' . $row['TIME'] . '</span>';
        echo '</div>';
        echo '  </div>';
        echo ' <div class="date_detail">';
        echo ' <span> Amount </span>';
        echo '  <div class="from_date dat">';
        echo     '<span>' . $row['AMOUNT'] . '</span>';
        echo ' </div>';

        echo '  </div>';
        echo '  <div class="time_detail">';
        echo '  <span> Mode </span>';
        echo '    <div class="from_time dat">';
        echo   ' <span>' . $row['TYPE'] . '</span>';
        echo '</div>';
        echo '  </div>';


        echo '</div>';

        echo ' <div class="para">
       <span> Payment Detail </span>';
        echo '<p>' . $row['PAYMENT_DETAIL'] . '</p>';
        echo '</div>
      </div>';
      }
      // Close the connection
      oci_close($conn);
      ?>
    </div>




  </section>

  <?php require '../../../footer.php' ?>
</body>

</html>