<?php
$active = "Checkout";
include('db.php');
include("functions.php");
include("header.php");
?>


<!-- A seção de car começa -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="shop.php">Loja</a>
                    <span>Confira</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Seção de carrinho de compras começa -->
<section class="checkout-section spad">
    <div class="container">
        <form class="checkout-form">
            <div class="row">

                <div class="col-lg-6" <?php if (!($_SESSION['customer_email'] == 'unset')) {
                                            echo "style = 'margin: 0 auto'";
                                        } ?>>
                    <div class="checkout-content">
                        <a href="shop.php" class="content-btn">Continue comprando</a>
                    </div>
                    <div class="place-order">
                        <h4>Seu pedido</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Produtos <span>Total</span></li>
                                <?php checkoutProds(); ?>

                                <li class="fw-normal">Subtotal <span><?php total_price(); ?></span></li>
                                <li class="total-price">Total <span><?php total_price(); ?></span></li>
                            </ul>
                            <form action="check-out.php" method="post">
                                <div class="order-btn">
                                    <a href="check-out.php?place=1" class="site-btn place-btn">Termine o Pedido</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>
<!-- Seção de carrinho de compras final -->


<?php
include('footer.php');
?>

</body>

</html>


<?php


if (isset($_GET['place'])) {


    $c_id = $_SESSION['customer_email'];

    $query = "select * from customer where customer_email= '$c_id'";

    $run_query = mysqli_query($con, $query);


    $get_query = mysqli_fetch_array($run_query);

    $custom_id = $get_query['customer_id'];


    $get_items = "select * from cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);

    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];

        $get_item = "select * from products where products_id = '$p_id'";
        $run_item = mysqli_query($db, $get_item);

        while ($row_item = mysqli_fetch_array($run_item)) {

            $pro_price = $row_item['product_price'];

            $total_q += $pro_qty;
            $pro_total_p = $pro_price * $pro_qty;
        }

        $final_price += $pro_total_p;
    }
    $order = "insert into orders (order_qty, order_price, c_id, date) values ('$total_q','$final_price','$custom_id',NOW())";

    $run_order = mysqli_query($con, $order);


    $cart_clear = "delete from cart where c_id = '$c_id'";

    $run_clear = mysqli_query($con, $cart_clear);

    echo "<script>alert('Order Placed. Thankyou for Shopping')</script>";
    echo "<script>window.open('account.php?orders','_self')</script>";
}







?>