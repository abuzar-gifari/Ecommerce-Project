<?php include('login_header.php'); ?>

        
        <!-- Login Start -->
        <div class="login" style="font-family: 'RocknRoll One', sans-serif;font-size:14px;">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-6">   

                        <form action="../function/functions.php" method="post" enctype="multipart/form-data"> 
                        <div class="register-form">
						
                            <div class="row">
							
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" name="fname" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control" name="lname" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="mobile" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input class="form-control" type="text" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Retype Password</label>
                                        <input class="form-control" type="text" name="retype_password" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Image</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" name="register">Submit</button>
                                    </div>
                                
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form action="../function/functions.php" method="post"> 
						<?php 
							if(isset($_SESSION['msg'])){
								echo "<p>".$_SESSION['msg']."</p>";
								unset($_SESSION['msg']);
							}
						?>
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" type="text" name="email" placeholder="E-mail / Username">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="text" name="password" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn" name="login">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
        

        
<?php include('layout/footer.php'); ?>
  