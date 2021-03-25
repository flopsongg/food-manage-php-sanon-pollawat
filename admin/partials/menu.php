<?php include '../config/constants.php';?>
<?php include 'login-check.php'?>

<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel.</div>";
    header('location:' . SITEURL . 'admin/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Orders</title>
        <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
    <div class = "menu text-center">
        <div class = "wr
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin Manager</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    </html>

