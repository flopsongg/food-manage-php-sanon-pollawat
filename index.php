<?php include 'partials-front/menu.php';?>
<?php include 'config/constants.php';?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">

    </section>
    <!-- fOOD sEARCH Section Ends Here -->

      <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<?php

$sql = "SELECT * FROM tbl_food";

$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $description = $row['description'];
        ?>
        <div class="food-menu-box">
                <div class="food-menu-img">

                    <?php
if ($image_name == "") {
            echo "div class='error'>Image not available.</div>";
        } else {
            ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
}
        ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        <?php

    }
} else {
    echo "<div class='error'>Food not avilable.</div>";
}

?>



            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

</body>

</html>
