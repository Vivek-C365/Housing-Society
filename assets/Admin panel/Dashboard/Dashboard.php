<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
  require '../Common/nav.php'
  ?>

  <section id="dash">


    <div class="panel" style="
    background-color: #7cff7c57;
    border: none;
">
      <div class="name_no">

        <h2>Members</h2>
        <h3><?php
            include '../../conn.php';
            $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM RESIDENT');
            oci_execute($s);
            $b = oci_fetch_array($s);
            $total = $b['TOTAL'];
            echo $total;

            ?>
        </h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/Admin panel/Resident/Resident.php">

          <img src="/../society/index image/icons/users.png" alt="Logo">
        </a>
      </div>
    </div>
    <div class="panel" style="
    background-color: #daeeff;
">
      <div class="name_no">

        <h2>Announcement</h2>
        <h3>
          <?php
          include '../../conn.php';
          $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM ANNOUNCEMENT');
          oci_execute($s);
          $b = oci_fetch_array($s);
          $total = $b['TOTAL'];
          echo $total;

          ?>
        </h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/Admin panel/Announcement/Announcement.php">

          <img src="/../society/index image/icons/Announcement.png" alt="Logo">
        </a>
      </div>
    </div>
    <div class="panel" style="background-color: #7807ff30;">
      <div class="name_no">

        <h2>Event</h2>
        <h3><?php
            include '../../conn.php';
            $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM EVENT');
            oci_execute($s);
            $b = oci_fetch_array($s);
            $total = $b['TOTAL'];
            echo $total;

            ?></h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/Admin panel/Event/Event.php">

          <img src="/../society/index image/icons/Event.png" alt="Logo">
        </a>
      </div>
    </div>
    <div class="panel" style="background-color: #9f9f9f70;">
      <div class="name_no">

        <h2>Maintenance</h2>
        <h3><?php
            include '../../conn.php';
            $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM MAINTENANCE');
            oci_execute($s);
            $b = oci_fetch_array($s);
            $total = $b['TOTAL'];
            echo $total;

            ?></h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/Admin panel/Maintenance/Maintenance.php">

          <img src="/../society/index image/icons/Maintenance.png" alt="Logo">
        </a>
      </div>
    </div>
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
        <a href="/../society/assets/Admin panel/Dashboard/hall._table.php">

          <img src="/../society/index image/icons/Hall Booking.png" alt="Logo">
        </a>
      </div>
    </div>
    <div class="panel" style="background-color: #fbf2c2;">
      <div class="name_no">

        <h2>Payments</h2>
        <h3><?php
            include '../../conn.php';
            $s = oci_parse($conn, 'SELECT COUNT(*) as total FROM PAYMENT');
            oci_execute($s);
            $b = oci_fetch_array($s);
            $total = $b['TOTAL'];
            echo $total;

            ?></h3>
      </div>
      <div class="img_logo">
        <a href="/../society/assets/Admin panel/Dashboard/pay_table.php">

          <img src="/../society/index image/icons/payments.png" alt="Logo">
        </a>
      </div>
    </div>

    </div>



  </section>



  <?php require '../../../footer.php' ?>
</body>

</html>