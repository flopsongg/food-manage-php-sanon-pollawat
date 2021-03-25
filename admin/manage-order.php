<?php include 'partials/menu.php';?>


<div class = "main-content">
            <div class = "wrapper">
                <h1>Manage Order</h1>
    <br /> <br/>

<a href="#" class="btn-primary">Add Order</a>

<br /> <br/> <br/>

<table class = "tbl-full">
    <tr>
        <th>S.N.</th>
        <th>food</th>
        <th>price</th>
        <th>qty</th>
        <th>total</th>
        <th>order date</th>
        <th>customer name</th>
        <th>contact</th>
        <th>email</th>
        <th>address</th>
    </tr>

    <?php
$sql = "SELECT * FROM tbl_order";

$res = mysqli_query($conn, $sql);

$sn = 1;
$count = mysqli_num_rows($res);

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $food = $row['food'];
        $price = $row['price'];
        $qty = $row['qty'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];

        ?>
        <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $food; ?></td>
        <td><?php echo $price; ?></td>
        <td><?php echo $qty; ?></td>
        <td><?php echo $total; ?></td>
        <td><?php echo $order_date; ?></td>
        <td><?php echo $customer_name; ?></td>
        <td><?php echo $customer_contact; ?></td>
        <td><?php echo $customer_email; ?></td>
        <td><?php echo $customer_address; ?></td>

    </tr>
    <?php

    }
} else {
    echo "<tr><td colspan = '12' class = 'error'>Order not Available</td></tr>";
}

?>




</table>

</div>
        </div>

<?php include 'partials/footer.php';?>