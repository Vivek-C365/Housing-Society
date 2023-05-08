<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../Admin panel/Resident/Resident.css">
  <link rel="stylesheet" href="../../Admin panel/Common/nav.css">
</head>
<script>
  function redirectToback() {
    // Change the window location to the desired page
    window.location.href = "/../society/assets/Admin panel/Resident/Resident.php";
  }
</script>

<body>
  <?php
  session_start()
  ?>
  <?php
  include '../../Admin panel/Common/nav.php'
  ?>
  <section class="resident_form">

    <div class="full_form">


      <div class="form_img">
        <img src="/../society/index image/ezgif.com-webp-to-jpg (1).jpg" alt="IMG">
      </div>

      <div class="forms">

        <form method="post" action="./Update_handler.php">
          <div class="seperate">

            <div class="user_id form_element">

              <label for="user_id">User ID</label>
              <input type="text" name="user_id" id="user_id">
            </div>

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

  <?php require '../../../footer.php' ?>


</body>



</html>