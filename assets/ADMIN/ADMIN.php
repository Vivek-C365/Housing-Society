<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Sign.css">


</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="./admin_handler.php" method="post" style="font-family: sans-serif;">
                    <h2>Hi, Admin</h2>
                    <h2 style="
    font-size: 1rem;
    width: 19rem;
">Enclave wants to make sure it's really you trying to access admin system</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email"  required />
                        <label for="">Email</label>

                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required />
                        <label for="">Password</label>
                    </div>
                    <div class="forget">


                    </div>
                    <button type="submit" class="loginbtn">Access Admin</button>
                    <div class="register">
                        <p> Enclave Members ? <a href="/../society/assets/Login/login-form.php">Sign In</a></p>
                    </div>
                </form>
            </div>
            <div class="register home_tab">
                <p> <a href="/../society/index.php">Home</a></p>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>