<?php 
	
	include('db_config.php');
	session_start();
	
	
	/*IMAGE UPLOAD PORTION START*/
	
	function imageUpload($tmp_name,$image_name){
		move_uploaded_file($tmp_name, __DIR__.'/../image/'.$image_name);
	}

	/*IMAGE UPLOAD PORTION END*/
	
	
	
	/*REGISTER PORTION START*/

	if(isset($_POST['register'])){
		//print_r($_POST);
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		$retype_password = $_POST['retype_password'];
		$image = $_FILES['image']['name'];

		$error = 0;
		if($fname == ""){
			$error = $error + 1;
		}
		if($lname == ""){
			$error = $error + 1;
		}
		if($email == ""){
			$error = $error + 1;
		}
		if($mobile == ""){
			$error = $error + 1;
		}
		if($password == ""){
			$error = $error + 1;
		}
		if($password != $retype_password){
			$error = $error + 1;
		}
		if($image == ""){
			$error = $error + 1;
		}
		if($error == 0){

			$connection = db_config::DBConnect();
			$sql = "INSERT INTO users VALUES('','$fname','$lname','$password','$email','$mobile','$image')";
			$response = $connection->insert($sql);

			$user_id = $response['last_id'];
			$sql = "INSERT INTO user_role VALUES('',2,'$user_id')";
			$connection->insert($sql);

			$_SESSION["msg"] = "User Registed Successfully";
			header('location:../frontend/login.php');

		}else{

		}

	}

	/*REGISTER PORTION END*/


	
	/*LOGIN AND LOGOUT PORTION START*/


	if(isset($_POST['login'])){
		//print_r($_POST);


		$email = $_POST['email'];
		$password = $_POST['password'];

		$error = 0;
		if($email == ""){
			$error = $error + 1;
		}
		if($password == ""){
			$error = $error + 1;
		}

		if($error == 0){

			$sql = "SELECT * FROM users where email='$email' && passwords ='$password'";
	        $connection = db_config::DBConnect();
	        $resource_data = $connection->view($sql);
		    $resource_obj = $resource_data->fetch_object();
		    //print_r(count((array)$resource_obj));
		    //die();
		    if(count((array)$resource_obj) == 0){
		    	$_SESSION["msg"] = "Username or password invalid";
				header('location:../frontend/login.php');

		    }else{
		    	$id = $resource_obj->id;
				$sql = "SELECT * FROM user_role where user_id='$id'";
		        $connection = db_config::DBConnect();
		        $resource_data = $connection->view($sql);
			    $resource_obj = $resource_data->fetch_object();
			    //print_r($resource_obj);
			    //die();
			    if($resource_obj->role_id == 2){
					$_SESSION["login"] = $resource_obj;
					header('location:../frontend/index.php');
			    }elseif($resource_obj->role_id == 1) {
					$_SESSION["login"] = $resource_obj;
					header('location:../admin/index.php');
			    }else{	
			    	$_SESSION["msg"] = "Username or password invalid";
					header('location:../frontend/login.php');
			    }
		    	//print_r($resource_obj);
		    	//die();
		    }
			//$_SESSION["login"] = $resource_obj;
			//header('location:../frontend/index.php');

		}
	

	}

	if(isset($_GET['logout'])){
		session_destroy();
		header('location:../frontend/login.php');
	}

	/*LOGIN AND LOGOUT PORTION END*/
	
	

	
	/***** CATEGORY PORTION ALL START *****/
	
	
	
	/* CATEGORY SUBMIT PORTION START */

	if(isset($_POST['category_submit'])){
		$category_name = $_POST['category_name'];
		$error = 0;
		if($category_name == ""){
			$error = $error + 1;
		}
		if($error == 0){
			$connection = db_config::DBConnect();
			$sql = "INSERT INTO categories VALUES('','$category_name')";
			$connection->insert($sql);
			$_SESSION["msg"] = "Category inserted successfully";
			header('location:../admin/index.php');
		}else{
			$_SESSION["msg"] = "Error Input";
			header('location:../admin/index.php');
		}
	}
	
	/* CATEGORY SUBMIT PORTION END */
	
	
	
	/*CATEGORY UPDATE PORTION START*/
	
	if(isset($_POST['category_update'])){

		$category_name = $_POST['category_name'];
		$id = $_POST['id'];
		$error = 0;
		if($category_name == ""){
			$error = $error + 1;
		}
		if($error == 0){
			$connection = db_config::DBConnect();
			$sql = "UPDATE categories set name='$category_name' where id='$id'";
			$connection->insert($sql);
			$_SESSION["msg"] = "Category inserted successfully";
			header('location:../admin/index.php');
		}else{
			$_SESSION["msg"] = "Error Input";
			header('location:../admin/index.php');
		}
	}

	/*CATEGORY UPDATE PORTION END*/
	
	
	
	/*CATEGORY DELETE PORTION START*/

	if(isset($_GET['delete_id'])){
		$connection = db_config::DBConnect();
		$id = $_GET['delete_id'];
		$sql = "delete from categories where id='$id'";
		$connection->delete($sql);
		$_SESSION["test_sess"] = "Deleted successfully";
		header('location:../admin/index2.php');
	}

	/*CATEGORY DELETE PORTION END*/
	
	

	/***** CATEGORY PORTION ALL END *****/
	




	/***** PRODUCT PARTITION START ALL *****/
	
	
	/*PRODUCT SUBMIT PORTION START*/
	
	if(isset($_POST['product_submit'])){
		//echo "<pre>";
		//print_r($_POST);
		//print_r($_FILES);
		//die();
		$category_id = $_POST['category_id'];
		$subcategory_id = $_POST['subcategory_id'];
		$product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
		$buying_price = $_POST['buying_price'];
		$selling_price = $_POST['selling_price'];
		$discount = $_POST['discount'];
		$vat = $_POST['vat'];
		$size = json_encode($_POST['size']);
		$product_qty = $_POST['product_qty'];
		$color = json_encode($_POST['color']);
		$sku_id = rand(0,9999999);

		$error = 0;
		if($product_name == ""){
			$error = $error + 1;
		}
		if($error == 0){
			$connection = db_config::DBConnect();
			$sql = "INSERT INTO products VALUES('','$product_name','$sku_id','$product_description','$buying_price','$selling_price','$discount','$vat','$size','$color','$product_qty','$category_id','$subcategory_id')";
			
			$response = $connection->insert($sql);


			$pro_id = $response['last_id'];
			//print_r($connection->insert($sql));
			//die();
			$image1 = rand(0,9999999).$_FILES["image1"]['name'];
			$image2 = rand(0,9999999).$_FILES["image2"]['name'];
			$image3 = rand(0,9999999).$_FILES["image3"]['name'];

			imageUpload($_FILES['image1']['tmp_name'],$image1);
			$sql = "INSERT INTO product_images VALUES('',$pro_id,'$image1',1)";
			$connection->insert($sql);
		
			imageUpload($_FILES['image2']['tmp_name'],$image2);
			$sql = "INSERT INTO product_images VALUES('',$pro_id,'$image2',2)";
			$connection->insert($sql);

			imageUpload($_FILES['image3']['tmp_name'],$image3);
			$sql = "INSERT INTO product_images VALUES('',$pro_id,'$image3',3)";
			$connection->insert($sql);
		
			$_SESSION["msg"] = "Product inserted successfully";
	
			header('location:../admin/index.php');
		
		}else{
			$_SESSION["msg"] = "Error Input";
			header('location:../admin/index.php');
		}
	}

	/*PRODUCT SUBMIT PORTION END*/

	
	/*PRODUCT UPDATE PORTION START*/
	
	if(isset($_POST['product_update'])){
		//echo "<pre>";
		//print_r($_POST);
		//die();
		$category_id = $_POST['category_id'];
		$subcategory_id = $_POST['subcategory_id'];
		$product_name = $_POST['product_name'];
		$product_description = $_POST['product_description'];
		$buying_price = $_POST['buying_price'];
		$selling_price = $_POST['selling_price'];
		$discount = $_POST['discount'];
		$vat = $_POST['vat'];
		$size = json_encode($_POST['size']);
		$product_qty = $_POST['product_qty'];
		$color = json_encode($_POST['color']);
		$sku_id = rand(0,9999999);

		$error = 0;
		if($product_name == ""){
			$error = $error + 1;
		}
		$id = $_POST['id'];
		if($error == 0){
			$connection = db_config::DBConnect();
			$sql = "UPDATE products set name='$product_name', sku='$sku_id',description='$product_description',buying_price='$buying_price',selling_price = '$selling_price',discount='$discount',vat='$vat', size='$size',color='$color',stock_qty='$product_qty',category_id='$category_id',sub_category_id='$subcategory_id' where id='$id'";
			//print_r($sql);
			//die();
			$connection->insert($sql);
			$_SESSION["msg"] = "Product updated successfully";
			header('location:../admin/product_view.php');
		}else{
			$_SESSION["msg"] = "Error Input";
			header('location:../admin/product_view.php');
		}
	}

	/*PRODUCT UPDATE PORTION END*/


	/*PRODUCT DELETE PORTION START*/


	if(isset($_GET['pro_delete_id'])){
		$connection = db_config::DBConnect();
		$id = $_GET['pro_delete_id'];
		

        $sql = "SELECT * FROM product_images where product_id='$id'";
        $connection = db_config::DBConnect();
        $resource_data = $connection->view($sql);
        
	    while($resource_obj = $resource_data->fetch_object()){ 
	    	unlink(__DIR__.'/../image/'.$resource_obj->product_image_name);
	    }


		$sql = "delete from products where id='$id'";
		$connection->delete($sql);
		$sql = "delete from product_images where product_id='$id'";
		$connection->delete($sql);


		$_SESSION["test_sess"] = "Deleted successfully";

		header('location:../admin/index2.php');
	}

	/*PRODUCT DELETE PORTION END*/
	
	
	/***** PRODUCT PARTITION END ALL *****/




	/*ADD TO CART PORTION START*/

	if(isset($_POST['add_to_cart'])){
		//print_r($_POST);
		//die();
	     $add_to_cart = [];
	     
	     // assign product name in add to cart array

	     $add_to_cart['pro_name']   = $_POST['pro_name'];
	     $add_to_cart['pro_price']  = $_POST['pro_price'];
	     $add_to_cart['product_id'] = $_POST['product_id'];
	     $add_to_cart['qty']    = $_POST['qty'];
	     $add_to_cart['pro_image']  = $_POST['pro_image'];
		
	       if(isset($_SESSION['cart_item'])){

	            foreach ($_SESSION['cart_item'] as $key => $value) {
	              if($value['product_id'] == $_POST['product_id']){
	                $exists = true; 
	                $_SESSION['cart_item'][$key]['qty'] += $_POST['qty'];
	              }else{
	                $exists = false;
	              }
	            }

	            // if not exists then add 
	            if(!isset($exists) || $exists == false){
	              echo "match not found";
	              $_SESSION['cart_item'][] = $add_to_cart;
	            }
	            
	       }else{
	              $_SESSION['cart_item'][] = $add_to_cart;
	       }

	       //echo "<pre>";
	       //print_r($_SESSION['cart_item']);
	       header('location:../frontend/cart.php');
	}

	// if (isset($_POST['remove_cart'])) {
	// 	unset($_SESSION['pro_name'][$key]);
	// }

	/*ADD TO CART PORTION END*/
	



	/*WISHLIST PORTION START*/

	if(isset($_POST['wishlist'])){

		//print_r($_POST);
		//die();
		$product_id = $_POST['product_id'];
		$size = $_POST['size'];
		$color = $_POST['color'];
		$user_id = $_SESSION['login']->user_id;
		$qty = $_POST['qty'];

		$connection = db_config::DBConnect();
		$sql = "INSERT INTO wishlist VALUES('','$product_id','$qty','$user_id','$size','$color','')";
		$response = $connection->insert($sql);
		header('location:../frontend/wishlist.php');

	}


	if(isset($_GET['wishlist_delete_id'])){
		$id=$_GET['wishlist_delete_id'];
		$connection = db_config::DBConnect();
		$sql = "delete from wishlist where id='$id'";
		$response = $connection->delete($sql);
		$_SESSION["wishlist_msg"] = "Deleted successfully";
		header('location:../frontend/wishlist.php');
		
	}


	/*WISHLIST PORTION END*/

	
	if(isset($_POST['con_submit'])){
		$con_name = $_POST['con_name'];
		$con_mail = $_POST['con_mail'];
		$con_subject = $_POST['con_subject'];
		$con_message = $_POST['con_message'];
		$error = 0;
		if($con_name==""){
			$error = $error + 1;
		}
		if($con_mail==""){
			$error = $error + 1;
		}
		if($con_subject==""){
			$error = $error + 1;
		}
		if($con_message==""){
			$error = $error + 1;
		}
		
		if($error==0){
				
			$connection = db_config::DBConnect();
			$sql = "INSERT INTO myguests VALUES('$con_name','$con_mail','$con_subject','$con_message')";
			$response = $connection->insert($sql);
			$_SESSION["con_msg"] = "Information successfully saved";
			header('location:../frontend/contact.php');
		}else{
			$_SESSION["con_msg"] = "error input";
			header('location:../frontend/contact.php');
		}
	}
	
	
	/* REVIEW PART START */
	
	if(isset($_POST['submit_review'])){
		$re_name = $_POST['re_name'];
		$re_email = $_POST['re_email'];
		$re_review = $_POST['re_review'];
		$error = 0;
		if($re_name==""){
			$error = $error + 1;
		}
		if($re_email==""){
			$error = $error + 1;
		}
		if($re_review==""){
			$error = $error + 1;
		}
		
		if($error==0){
				
			$connection = db_config::DBConnect();
			$sql = "INSERT INTO persons VALUES('','$re_name','$re_email','$re_review')";
			$response = $connection->insert($sql);
			$_SESSION["rev_msg"] = "Review sent successfully";
			header('location:../frontend/index.php');
		}
	}
	
	/* REVIEW PART END */
	
	
	
	/* NEWSLETTER SUBSCRIBTION START */
	
	if(isset($_POST['news_submit'])){
		$news_email=$_POST['news_email'];
		$connection = db_config::DBConnect();
		$sql = "INSERT INTO newsletter VALUES('','$news_email')";
		$response = $connection->insert($sql);
		$_SESSION["news_msg"] = "email sent successfully";
		header('location:../frontend/index.php');
	}
	
	
	/* NEWSLETTER SUBSCRIBTION END */
	
	
	/*ACCOUNT DETAILS UPDATE START*/
	
	if(isset($_POST['account_info_update'])){
		$user_fullname=$_POST['user_fullname'];
		$user_phoneno=$_POST['user_phoneno'];
		$user_email=$_POST['user_email'];
		$user_present_address=$_POST['user_present_address'];
		$user_permanent_address=$_POST['user_permanent_address'];
		
		
		$connection = db_config::DBConnect();
		$sql = "UPDATE account_details SET phone_no='$user_phoneno', fullname='$user_fullname', present_adress='$user_present_address', permanent_adress='$user_permanent_address', email='$user_email' where id='1'";
		$response = $connection->insert($sql);
		$_SESSION["user_info_msg"] = "Data updated successfully";
		header('location:../frontend/my-account.php');
	}
	
	
	/*ACCOUNT DETAILS UPDATE END*/
	
	
	/* CONFIRM ORDER PAYMENT START */
	
	if(isset($_POST['confirm_order'])){
		//print_r($_POST);
		//die();
		$card_user_name=$_POST['card_user_name'];
		$card_number=$_POST['card_number'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		$cvv=$_POST['cvv'];
		
		$connection = db_config::DBConnect();
		$sql = "INSERT INTO payment_info VALUES('','$card_user_name','$card_number','$month','$year','$cvv')";
		$connection->insert($sql);
		$_SESSION["payment_msg"] = "Payment successfully done!";
		header('location:../frontend/mycheckout.php');
	}
	
	
	
	/* CONFIRM ORDER PAYMENT END */
	
?>