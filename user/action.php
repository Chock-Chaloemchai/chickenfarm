<?php
	session_start();
	require 'server.php';
	date_default_timezone_set('Asia/Bangkok');
	
	$date1 = date("Ymd_His");
	$user = $_SESSION['username'];
	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $puser = $user;
    //   $pqty = $_POST['pqty'];
      $pqty=1;
         $num1 = (int)$pprice;
         $num2 = (int)$pqty;
	  $total_price = $num1 * $num2;


	  if (isset($_SESSION['username'])) {
	    $query = $conn->prepare('INSERT INTO tbl_cart (p_name,p_price,p_img,qty,total_price,product_username) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$puser);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Please Login</strong>
						</div>';
	  }
	
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare("SELECT * FROM tbl_cart where product_username = '$user'");
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM tbl_cart WHERE p_id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare("DELETE FROM tbl_cart where product_username = '$user'");
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE tbl_cart SET qty=?, total_price=? WHERE p_id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	if (isset($_POST['action']) && isset($_POST['action']) == 'Order') {
		$username = $_POST['username'];
		$firstname = $_POST['firstname'];
	   $lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$products = $_POST['products'];
		$address = $_POST['address'];
			  $total = $_POST['grand_total'];
			
			   
		$data = '';
	 
		$stmt = $conn->prepare('INSERT INTO tbl_order (username,or_firstname,or_lastname,or_tel,or_address,or_product,or_total)VALUES(?,?,?,?,?,?,?)');
		$stmt->bind_param('sssssss',$username,$firstname,$lastname,$phone,$address,$products,$total);
		$stmt->execute();
		$stmt2 = $conn->prepare("DELETE FROM tbl_cart where product_username = '$user'");
		$stmt2->execute();
		
		

		$data .= '<div class="text-center">
			 <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
			 <h2 class="text-success">Your Order Placed Successfully!</h2>
			 <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
			 <h4>Your Name : ' . $firstname.' '.$lastname . '</h4>
																	 <h4>Your Phone : ' . $phone . '</h4>
																	 <h4>Your Address : ' . $address . '</h4>
			 <h4>Your Amount total : ' . $total . '</h4>
			 </div>';
		echo $data;
		
	  
				 }