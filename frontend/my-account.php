<?php 
    include('layout/header.php'); 
    include('../function/helper.php');
?>   
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3"  style="font-family: 'RocknRoll One', sans-serif;font-size:14px;">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" href="login.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
							<?php
								$sql = "SELECT * FROM account_details where id='1'";
								$connection = db_config::DBConnect();
								$resource_data = $connection->view($sql);
								$resource_obj = $resource_data->fetch_object();
							?>
                            <div  style="font-family: 'RocknRoll One', sans-serif;font-size:14px;" class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4><br>
                                <span>Full Name: </span><span> <?php echo $resource_obj->fullname; ?> </span><br><br>
                                <span>Phone no: </span><span></span> <?php echo $resource_obj->phone_no;  ?> <br><br>
                                <span>Present Adress: </span><span> <?php echo $resource_obj->present_adress; ?> </span><br><br>
                                <span>Permanent Adress: </span><span> <?php  echo $resource_obj->permanent_adress; ?> </span><br><br>
                                <span>Email No: </span><span></span> <?php echo $resource_obj->email;?> <br><br>
                            </div>
                            <div  style="font-family: 'RocknRoll One', sans-serif;font-size:14px;" class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div  style="font-family: 'RocknRoll One', sans-serif;font-size:14px;" class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
							<?php
								if(isset($_SESSION["user_info_msg"])){
									echo "<p>". $_SESSION["user_info_msg"] ."</p>";
									unset($_SESSION["user_info_msg"]);
								}
							?>
                                <h4>Account Details Update</h4><br>
								<?php
								$sql = "SELECT * FROM account_details where id='1'";
								$connection = db_config::DBConnect();
								$resource_data = $connection->view($sql);
								$resource_obj = $resource_data->fetch_object();
							?>
								<form action="../function/functions.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="user_fullname" value="<?php echo $resource_obj->fullname;?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="user_phoneno" value="<?php echo $resource_obj->phone_no;?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="user_email" value="<?php echo $resource_obj->email;?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="user_present_address" value="<?php echo $resource_obj->present_adress;?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="user_permanent_address" value="<?php echo $resource_obj->permanent_adress;?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" name="account_info_update">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        
      <?php include('layout/footer.php'); ?>