<?php
include('layout/header.php');
include('../function/helper.php');
?>


<!-- Wishlist Start -->
<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?php
                        if (isset($_SESSION["wishlist_msg"])) {
                            echo "<p>" . $_SESSION["wishlist_msg"] . "</p>";
                            unset($_SESSION["wishlist_msg"]);
                        }
                        ?>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:14px;">Product</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:14px;">Price</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:14px;">Quantity</th>
                                    <th style="font-family: 'RocknRoll One', sans-serif;font-size:14px;">Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                $count = 0;
                                $user_id = $_SESSION['login']->user_id;
                                $sql = "SELECT * FROM wishlist WHERE user_id='$user_id'";
                                $connection = db_config::DBConnect();
                                $resource_data = $connection->view($sql);
                                while ($resource_obj = $resource_data->fetch_object()) {

                                    $count++;
                                    $helper = Helper::HelperConnect();
                                    $pro_info = $helper->ProductIDToProductAllInfo($resource_obj->product_id);
                                    $products = $pro_info->fetch_object();

                                    $pro_img_resource = $helper->ProductIDToImage($resource_obj->product_id);
                                    $pro_img = $pro_img_resource->fetch_object();

                                ?>

                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="../image/<?php echo $pro_img->product_image_name; ?>" alt="Image"></a>
                                                <p><?php echo $products->name; ?></p>
                                            </div>
                                        </td>
                                        <td><?php echo $products->selling_price * $resource_obj->qty; ?></td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="<?php echo $resource_obj->qty; ?>">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td><button onclick="wishlist_delete(<?php echo $resource_obj->id; ?>)"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function wishlist_delete(id) {
        value = confirm("Do you sure want to delete?");
        if (value == true) {
            window.location.href = '../function/functions.php?wishlist_delete_id=' + id;
        }
    }
</script>
<?php include('layout/footer.php'); ?>
