<?php
session_start();
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
if (!$con) {
    die(mysqli_error($con));
}
?>
<html>
<link rel="stylesheet" href="css/login.css">
<style>
    body {
        background: linear-gradient(#f5ebe0);
        background-image: url('https://cdn.shopify.com/s/files/1/0595/5262/8886/files/IRY_Jewelry_shop.jpg?v=1633184471');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .screen {
        background-image: url('image/img555.jpg');
        position: relative;
        height: 450px;
        width: 360px;
        box-shadow: 0px 0px 24px #9d8189;
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <p class="auth-link">
                    If You Are a Manager? <a href="loginmanger.php" style="color:#9d8189">Login</a>
                </p>
                <p class="auth-link">
                    Not a member? <a href="signup.php" style="color:#9d8189">Sign UP</a>
                </p>

                <form action="" class="login" method="post">
                    <div class="login__field">
                        <i style="color:#9d8189" class="bi bi-people-fill"></i>
                        <input type="text" name="username" class="login__input" placeholder="User name / Email"
                            required="required">
                    </div>
                    <div class="login__field">
                        <i style="color:#9d8189" class="bi bi-lock-fill"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password"
                            required="required">
                    </div>
                    <br>
                    <a href="forget password.php" class="auth-link" style="color:#9d8189">forgot password</a>
                    <button class="button login__submit" name="submit">
                        <span class="button__text" style="	font-family: cursive;">
                            Log In
                        </span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                    <div class="social-login">
                        <h3 style="	font-family: cursive;">log in via</h3><br>
                        <div class="col-lg-8">
                            <a href="" target="_blank"><i style="color:#9d8189" class="bi bi-facebook"></i></a>
                            &nbsp;
                            <a href="" target="_blank"><i style="color:#9d8189" class="bi bi-whatsapp"></i></a>
                            &nbsp;
                            <a href="" target="_blank"><i style="color:#9d8189" class="bi bi-instagram"></i></a>
                            &nbsp;
                            <a href="" target="_blank"><i style="color:#9d8189" class="bi bi-twitter"></i></a>
                            &nbsp;
                        </div>
                    </div>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen_backgroundshape screenbackground_shape4"></span>
                <span class="screen_backgroundshape screenbackground_shape3"></span>
                <span class="screen_backgroundshape screenbackground_shape2"></span>
                <span class="screen_backgroundshape screenbackground_shape1"></span>
            </div>
        </div>
    </div>

</body>
</html>

<?php
//loginusers
if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    }
    //making random password:
    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    $_SESSION['randpassword'] = randomPassword();
    if (!isset($_SESSION['email']))
        $_SESSION['email'] = $_POST['username'];

    if ($_SESSION['email'] != $_POST['username']) {
        $_SESSION['count'] = 0;
        $_SESSION['email'] = $_POST['username'];
    }
    $sql = "SELECT * From user";
    $result = mysqli_query($con, $sql);

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $user = $_POST['username'];
        $passs = $_POST['password'];
        while ($row = mysqli_fetch_array($result)) {
            if ($row['Username'] == $_POST['username']) {
                break;
            }
        }
        if ($row['Password'] == $_POST['password']) {
            header('location:homeuser.php');
        } else {
            if (!isset($_SESSION['count']))
                $_SESSION['count'] = 0;
            $_SESSION['count'] = $_SESSION['count'] + 1;
            echo $_SESSION['count'];
            if ($_SESSION['count'] == 3) {
                $result1 = mysqli_query($con, "UPDATE user set isblocked='1' WHERE Username='" . $user . "'");
                $_SESSION['count'] = 0;
                echo "we sent an email with the new password <br> we will send you to the login page again and there enter the new password.";
                $to = $_SESSION['email'];
                $subject = 'New password';
                $message = "Hello, your new password is:\n" . $_SESSION['randpassword'] . "\nLogin: http://localhost/php_program/project/pass_ran.php";
                $headers = "From: zainabhassoun123@gmail.com";
                $mail_sent = mail($to, $subject, $message, $headers);
                if ($mail_sent == true) {
                    $result = mysqli_query($con, "UPDATE user set Password_u= '" . $_SESSION['randpassword'] . "' WHERE Username='" . $user . "'");
                    echo "Your new password has been sent to your email";
                    header('location:homeuser.php');
                } else {
                    die(mysqli_error($con));
                }
            }
        }
    }
}
?>
