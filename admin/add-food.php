<?php include 'partials/menu.php';?>
<div class="main-content">
    <div class="wrapper">
    <h1>Add Food</h1>

    <br><br>
    <?php
if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>

    <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="Title of the Food">
            </td>
        </tr>

        <tr>
            <td>Description: </td>
            <td>
                <textarea name = "description" cols="30" rows="5" placeholder="Description of the food."></textarea>
            </td>
        </tr>
            <tr>
                <td>Price: </td>
                <td>
                    <input type = "number" name="price"></input>
                </td>
            </tr>
            <tr>
                <td>Select Image: </td>
                <td>
                    <input type = "file" name="image"></input>
                </td>
            </tr>
            <tr>
                <td colspan= "10">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
            </tr>
        </table>

    </form>

    <?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));
            $image_name = "Food-Name-" . rand(0000, 9999) . "." . $ext;

            $src = $_FILES['image']['tmp_name'];
            $dst = "../images/food/" . $image_name;

            $upload = move_uploaded_file($src, $dst);

            if ($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Faild to Upload Image.</div>";
                header('location:' . SITEURL . 'admin/add-food.php');
                die();
            }
        }
    } else {
        $image_name = "";
    }

    $sql = "INSERT INTO tbl_food SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name'
    ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-food.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
        header('location:' . SITEURL . 'admin/manage-food.php');
    }

}
?>
    </div>
</div>

<?php include 'partials/footer.php';?>