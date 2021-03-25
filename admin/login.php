<?php include '../config/constants.php';?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel = "stylesheet" href="../css/admin.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
        <?php
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if (isset($_SESSION['no-login-message'])) {
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
?>
            <br><br>

            <form action="" method="POST" class="text-center">
                username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            </input>

        </div>

    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;
        header('location:' . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = "<div class='error'>Username or Password did not match.</div>";
        header('location:' . SITEURL . 'admin/login.php');
    }
}
?>