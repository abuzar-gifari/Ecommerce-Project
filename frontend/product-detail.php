<?php 
    include('layout/header.php'); 
    include('../function/helper.php');
?>        

        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <?php 
                                            $product_id = $_GET['product_id'];
                                            $helper = Helper::HelperConnect(); 
                                            $image_obj = $helper->ProductIDToImage($product_id);

                                            while($resource_obj = $image_obj->fetch_object()){ 
                                            $pro_image = $resource_obj->product_image_name;
                                        ?>
                                        <img src="../image/<?php echo $resource_obj->product_image_name; ?>" alt="Product Image">
                                        <?php } ?>
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        

                                        <?php 
                                            $helper = Helper::HelperConnect(); 
                                            $image_obj = $helper->ProductIDToImage($product_id);
                                            
                                            while($resource_obj_img = $image_obj->fetch_object()){ 
                                        ?>
                                        <div class="slider-nav-img"><img src="../image/<?php echo $resource_obj_img->product_image_name; ?>" alt="Product Image">
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">

                                <?php
                                    $sql = "SELECT * FROM products where id=$product_id";
                                    $connection = db_config::DBConnect();
                                    $resource_data = $connection->view($sql);
                                    $resource_obj = $resource_data->fetch_object(); ?>
                                    
                                    <div class="title"><h2 style="font-family: 'RocknRoll One', sans-serif;font-size:25px;"><?php echo $resource_obj->name; ?></h2></div>

                                        <form action="../function/functions.php" method="post">

                                        <input type="hidden" name="pro_name" value="<?php echo $resource_obj->name; ?>">
                                        <input type="hidden" name="pro_price" value="<?php echo $resource_obj->selling_price - ($resource_obj->selling_price * $resource_obj->discount)/100; ?>">
                                        <input type="hidden" name="pro_name" value="<?php echo $resource_obj->name; ?>">
                                        <input type="hidden" name="pro_image" value="<?php echo $pro_image; ?>">

                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>$<?php echo $resource_obj->selling_price - ($resource_obj->selling_price * $resource_obj->discount)/100; ?> <span>$<?php echo $resource_obj->selling_price; ?></span></p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" name="qty" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <?php foreach(json_decode($resource_obj->size) as $key=>$sizes){ ?>
                                                <input type="radio" name="size" value="<?php echo $key; ?>" class="btn"><?php echo $sizes; ?>
                                                <?php } ?>
                                            </div> 
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <?php foreach(json_decode($resource_obj->color) as $key=>$colors){ ?>
                                                <input type="radio" name="color" value="<?php echo $key; ?>"><?php echo $colors; ?>
                                                <?php } ?>
                                            </div> 
                                        </div>
                                        <input type="hidden" name="product_id" value="<?php echo $resource_obj->id; ?>">
                                        <div class="action">
                                            <button type="submit" name="add_to_cart" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                            <button type="submit" name="buy_now" class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</button>
                                            <button type="submit" name="wishlist" class="btn" href="#"><i class="fa fa-wishlist"></i>Wish list</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4 style="font-family: 'RocknRoll One', sans-serif;font-size:20px;"><?php echo $resource_obj->name; ?><span> Description</span></h4><br>
                                        <p style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo.Donec libero ante, hendrerit eget auctor eget, varius eu ante. Aliquam vitae metus odio. Donec vitae ultrices mauris. Vivamus posuere tellus vitae lorem viverra mollis. Pellentesque euismod, metus id lacinia mollis, libero enim posuere leo, non auctor mi dui at lectus. Donec et consequat tellus, id pharetra elit. Morbi magna felis, cursus vitae mattis ac, vestibulum a sem. Donec mauris sapien, iaculis non nisl a, interdum vestibulum quam. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum.Donec arcu libero, commodo ac est a, malesuada finibus dolor. 
                                        </p>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <div class="reviews-submitted">
                                            <div class="reviewer" style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Please Give Your Valuable Comment</div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">
												You can share your valuable feedback with us so that we can get an idea how ​​you feel to use our product.
                                            </p>
                                        </div>
                                        <div class="reviews-submit">
                                            <h4 style="font-family: 'RocknRoll One', sans-serif;font-size:25px;">Give your Review:</h4><br>
                                            <div class="ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
											<?php
												if(isset($_SESSION["rev_msg"])){
													echo "<p>".$_SESSION["rev_msg"]."</p>";
													unset($_SESSION["rev_msg"]);
												}
											?>
											
											<form action="../function/functions.php" method="post">
												<div class="row form">
													<div class="col-sm-6">
														<input type="text" placeholder="Product Name" name="re_name">
													</div>
													<div class="col-sm-6">
														<input type="email" placeholder="Your Email" name="re_email">
													</div>
													<div class="col-sm-12">
														<textarea placeholder="Review" name="re_review"></textarea>
													</div>
													<div class="col-sm-12">
														<button type="submit" name="submit_review">Submit</button>
													</div>
												</div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title" style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <?php
                                    $sql = "SELECT * FROM categories LIMIT 5";
                                    $connection = db_config::DBConnect();
                                    $resource_data = $connection->view($sql);
                                    
                                    while($resource_obj = $resource_data->fetch_object()){  ?>
                                        <li class="nav-item">
                                            <a  style="font-family: 'RocknRoll One', sans-serif; font-size:15px;" class="nav-link" href="product-list.php?cat_id=<?php echo $resource_obj->id; ?>"><i class="fa fa-bullseye" aria-hidden="true"></i><?php echo $resource_obj->name ?></a>
                                        </li>
                                <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
							<?php
                                    $sql = "SELECT * FROM products LIMIT 15";
                                    $connection = db_config::DBConnect();
                                    $resource_data = $connection->view($sql);
                                    
                                    while($resource_obj = $resource_data->fetch_object()){  ?>
							
                                <div class="product-item">
								
                                    <div class="product-title">
                                        <a href="product-detail.php?product_id=<?php echo $resource_obj->id; ?>"><?php echo $resource_obj->name; ?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
									
									<!--here code start-->
										<?php
											$helper = Helper::HelperConnect(); 
                                            $image_obj = $helper->ProductIDToImage($resource_obj->id);
											$resource_obj_img = $image_obj->fetch_object();
										?>
									
									
                                        <a href="product-detail.html">
                                            <img style="height:260px;" src="../image/<?php echo $resource_obj_img->product_image_name; ?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$<?php echo $resource_obj->selling_price; ?></span></h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
									
                                </div>
                                
                            <?php } ?>    
                            </div>
							
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title" style="font-family: 'RocknRoll One', sans-serif;font-size:15px;">Our Brands</h2>
                            <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                                <li><a href="#">Curabitur </a><span>(34)</span></li>
                                <li><a href="#">Nunc </a><span>(67)</span></li>
                                <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                <li><a href="#">Fusce </a><span>(89)</span></li>
                                <li><a href="#">Sagittis</a><span>(28)</span></li>
                            </ul>
                        </div>
                      
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
        
     
        

<?php include('layout/footer.php'); ?>