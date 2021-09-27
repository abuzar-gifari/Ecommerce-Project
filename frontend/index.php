<?php 
    include('layout/header.php'); 
    include('../function/helper.php');
?>     
        
        <!-- Bottom Bar End -->       
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <?php
                                    $sql = "SELECT * FROM categories";
                                    $connection = db_config::DBConnect();
                                    $resource_data = $connection->view($sql);
                                    
                                    while($resource_obj = $resource_data->fetch_object()){  ?>
                                        <li class="nav-item">
                                            <a  style="font-family: 'RocknRoll One', sans-serif;" class="nav-link" href="product-list.php?cat_id=<?php echo $resource_obj->id; ?>"><i class="fa fa-bullseye" aria-hidden="true"></i><?php echo $resource_obj->name ?></a>
                                        </li>
                                <?php } ?>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/laptop2.jpg" alt="Slider Image" style="height:400px;"/>
                                <div class="header-slider-caption">
                                    <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">Do you like this Laptop?</p>
                                    <a class="btn" href="cart.php" target="_blank"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/TV.jpg" alt="Slider Image" style="height:400px;width:600px;"/>
                                <div class="header-slider-caption">
                                    <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">Do you like this TV?</p>
                                    <a class="btn" href="cart.php" target="_blank"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/ac.webp" alt="Slider Image"  style="height:400px;"/>
                                <div class="header-slider-caption">
                                    <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">Do you like this A.C?</p>
                                    <a class="btn" href="cart.php" target="_blank"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/category-1.jpg" />
                                <a class="img-text" href="">
                                    <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">LIKE IT?</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="img/category-2.jpg" />
                                <a class="img-text" href="">
                                    <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">LIKE IT?</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
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
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">Secure Payment</p><br>
                            <p style="font-family: 'RocknRoll One', sans-serif;">
                                Our payment service is so secure.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">Worldwide Delivery</p><br>
                            <p style="font-family: 'RocknRoll One', sans-serif;">
                                Our Customer Care Ninjas Are Always There For You
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">90 Days Return</p><br>
                            <p style="font-family: 'RocknRoll One', sans-serif;">
								Costco will accept returns within 90 days
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <p style="font-family: 'RocknRoll One', sans-serif;font-size:20px;">24/7 Support</p><br>
                            <p style="font-family: 'RocknRoll One', sans-serif;">
                                We'll treat your customers like they're ours.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/category-3.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="img/category-4.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="img/category-5.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="img/category-6.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="img/category-7.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/category-8.jpg" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p style="font-family: 'RocknRoll One', sans-serif;font-size:30px;">Call us for any Queries</p>
                    </div>
                    <div class="col-md-6">
                        <a  style="font-family: 'RocknRoll One', sans-serif;font-size:25px;" href="tel:0123456789">+01783753653</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1 style="font-family: 'RocknRoll One', sans-serif;font-size:30px;">Our Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
        
                <?php
                    $sql = "SELECT * FROM products";
                    $connection = db_config::DBConnect();
                    $resource_data = $connection->view($sql);
                    
                    while($resource_obj = $resource_data->fetch_object()){  ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="product-detail.php?product_id=<?php echo $resource_obj->id ?>"><?php echo substr($resource_obj->name,0,50); ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <?php 
                                    $helper = Helper::HelperConnect(); 
                                    $image_obj = $helper->ProductIDToImage($resource_obj->id);
									$pro_image_obj = $image_obj->fetch_object();
                                ?>
                                <a href="product-detail.html">
                                    <img src="../image/<?php echo $pro_image_obj->product_image_name; ?>" alt="Product Image" style="height:225px;">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3>
									<span>Price Only : <span>$</span><?php echo $resource_obj->selling_price - ($resource_obj->selling_price * $resource_obj->discount)/100; ?> <?php echo "( -". $resource_obj->discount ." %)"; ?>
								</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1 style="font-family: 'RocknRoll One', sans-serif;font-size:30px;">Subscribe Our Newsletter</h1>
                    </div>
                    <div class="col-md-6">
					<form action="../function/functions.php" method="post">
                        <div class="form">
                            <input type="email" placeholder="Your email here" name="news_email">
                            <button name="news_submit">Submit</button>
                        </div>
					</form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        

<?php include('layout/footer.php'); ?>