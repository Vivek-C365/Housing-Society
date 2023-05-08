<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Admin panel/Announcement/Announcement.css">
</head>
<script>
    function redirectToback() {
        // Change the window location to the desired page
        window.location.href = "/../society/assets/Admin panel/Announcement/Announcement.php";
    }
</script>



<body">

    <?php
    include '../../Admin panel/Common/nav.php'
    ?>
    <section id="announcement">


        <form method="post" action="./update_handler.php">
            <div class="ann_img">
                <img src="https://images.pexels.com/photos/8898643/pexels-photo-8898643.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            </div>

            <div class="ann_content">

                <div class="user_id form_element">

                    <label for="user_id">User ID</label>
                    <input type="number" name="announcement_id" id="user_id">
                </div>

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

                    echo    '</select>';
                    echo ' </div>';
                    ?>




                </div>
                <div class="an_title">

                    <label for="title">Announcement Title</label>
                    <input type="text" id="title" name="title">
                </div>


                <div class="an_message">

                    <label for="message">Announcement Message</label>
                    <textarea id="message" name="description" rows="5"></textarea>
                </div>

                <div id="btn">

                    <button class="back_btn" onclick="redirectToback()" type="button">Back</button>
                    <button class="submit_btn" type="submit">Submit</button>
                </div>
            </div>
        </form>

    </section>



    <?php require '../../../footer.php' ?>


    </body>

</html>