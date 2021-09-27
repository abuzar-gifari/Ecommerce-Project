<?php
include('layout/header.php');
include('../function/helper.php');
?>


<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Product</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Price</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Quantity</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Total</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                $total_price = [];
                                foreach ($_SESSION['cart_item'] as $key => $value) { ?>
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <p style="font-family: 'RocknRoll One', sans-serif;font-size:15px;"><?php echo $_SESSION['cart_item'][$key]['pro_name']; ?></p>
                                            </div>
                                        </td>
                                        <td style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">$<?php echo $_SESSION['cart_item'][$key]['pro_price']; ?></td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="<?php echo $_SESSION['cart_item'][$key]['qty']; ?>">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">$<?php echo $total_price[] = $_SESSION['cart_item'][$key]['pro_price'] * $_SESSION['cart_item'][$key]['qty']; ?></td>
                                        <td><button><i class="fa fa-trash" name="remove_cart"></i></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon">
                                <input type="text" name="apply_text" placeholder="Coupon Code">
                                <button name="apply_coupon">Apply Code</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1 style="font-family: 'RocknRoll One', sans-serif;font-size:17px;">Cart Summary</h1>
                                    <p style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Sub Total<span>$<?php echo array_sum($total_price); ?></span></p>
                                    <h2 style="font-family: 'RocknRoll One', sans-serif;font-size:17px;">Grand Total<span>
                                            $<?php
                                                echo $total= array_sum($total_price);
                                                $_SESSION['grand_total'] = $total;
                                                ?>
                                        </span></h2>
                                </div>
                                <div class="cart-btn">
                                    <a href="../stripe/index.php" class="btn btn-block btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<?php include('layout/footer.php'); ?>
