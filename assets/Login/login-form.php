<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./login.css">
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post" action="login.php" style="font-family: sans-serif;">
                    <h2>LOGIN</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" id="username" required/>
                        <label for="">Email</label>

                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required/>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">


                    </div>
                    <button type="submit" class="loginbtn">Login</button>
                    <div class="register">
                        <p> ADMIN ? <a href="../ADMIN/ADMIN.php">Sign In</a></p>
                    </div>
                </form>
            </div>
            <div class="register home_tab">
                <p>  <a href="../../../society/index.php">Home</a></p>
            </div>
        </div>
    </section>

</body>

</html>