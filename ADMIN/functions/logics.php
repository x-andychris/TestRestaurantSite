<?php 
require_once '../../connections/connection.php';

if (isset($_POST['logout'])) {
	session_start();
	session_destroy();
	session_unset();
	header("Location: ../../index.php");
}

if(isset($_POST['login']))
{
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	
    session_start();
	if(empty($username))
    {
    	$_SESSION['errors']= "Please Enter Username";
    	header("Location: ../index.php");
    }
    else if(empty($password)){
    	$_SESSION['errors'] = "Please Enter Password";
    	header("Location: ../index.php");
    }
	else{
		$sql ="SELECT * FROM users where UserName = '$username' && Password = '$password'";
		$result=$con->prepare($sql);
		$row =$result->execute();
		$length = 0;
		while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
		if($length>0){
			$_SESSION['uname'] = $username;
			$_SESSION['pwd'] = $password;
			$_SESSION['utype'] = "Admin";
			header("Location: ../addmenu.php");
		}else{
			$_SESSION['errors'] = "Username of Password Incorrect";
			header("Location: ../index.php");
		}
	}

}

// code to handle adding a new meal
if(isset($_POST['add_menu'])){

	$meal = strip_tags($_POST['meal']);
	$price = strip_tags($_POST['price']);
	$photo= $_FILES['photo']['name'];
	$path="../../IMAGES/";
	$description =strip_tags($_POST['description']);
    //move_uploaded_fie($photo, $path);
    session_start();
    //$_SESSION['errors'] ="";
    if(empty($meal))
    {
    	$_SESSION['errors']= "Please Enter Meal";
    	header("Location: ../index.php");
    }
    else if(empty($price)){
    	$_SESSION['errors']-"Please Enter Price";
    	header("Location: ../index.php");
    }
    else if(empty($photo)){
    	$_SESSION['errors']="Please Enter Photo";
    	header("Location: ../index.php");
    }
    else if(empty($description)){
    	$_SESSION['errors']="Please Enter Description";
    	header("Location: ../index.php");
    }
    else{
    	try{
    		$sql= "INSERT INTO menu(Title,Description,Price,Image) VALUES(:title,:description,:price,:image)";
    		$result=$con->prepare($sql);
    		$values = array(':title' =>$meal,
							':description'=>$description,
    		                ':price'=>$price,
    		                ':image'=>$photo);
			$row =$result->execute($values);
			if($row>0){
				session_start();
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../../IMAGES/".$photo);
				$_SESSION['success']="Meal Added Successfully";
				header("Location: ../index.php");
			}
			else{
				$_SESSION['success']="Could'nt Add Meal";
			}

    	}
    	catch(PDOException $ex){
          echo "A Database Error Occured: ".$ex;
    	}
    }
}

// code to handle editing a selected meal
if(isset($_POST['edit_menu']))
{
	$id = strip_tags($_POST['id']);
	$meal = strip_tags($_POST['meal']);
	$price = strip_tags($_POST['price']);
	$photo= $_FILES['photo']['name'];
	$photo2= strip_tags($_POST['photo2']);
	$path="../../IMAGES/";
	$description =strip_tags($_POST['description']);
    //move_uploaded_file($photo, $path);
    session_start();
    // checking if the fields are empty
    if(empty($meal))
    {
    	$_SESSION['errors']= "Please Enter Meal for update to be successful";
    	header("Location: ../viewmenu.php");
    }
    else if(empty($price)){
    	$_SESSION['errors']-"Please Enter Price for update to be successful";
    	header("Location: ../viewmenu.php");
    }
    else if(empty($description)){
    	$_SESSION['errors']="Please Enter Description for update to be successful";
    	header("Location: ../viewmenu.php");
    }
    else{
		if(empty($photo)){
			header("Location: ../viewmenu.php");
			$photo = $photo2;
		}
		// update logic
		$sql = "UPDATE menu SET Title='$meal',Price='$price',Image='$photo',Description='$description' WHERE MenuId = $id";
		$result=$con->prepare($sql);
		$row =$result->execute();
		if($row>0){
			$_SESSION['success']="Meal Updated Successfully";
			header("Location: ../viewmenu.php");
		}
	}
}

// code to handle deleting a selected meal
if(isset($_POST['delete_menu']))
{
	$id = strip_tags($_POST['MenuId']);
	if(!empty($id)){
		// delete logic
		$sql = "DELETE FROM menu WHERE MenuId = $id";
		$result=$con->prepare($sql);
		$row =$result->execute();
		if($row>0){
			header("Location: ../viewmenu.php");
		}
		
	}else{
		header("Location: ../viewmenu.php");
	}
	
}

// code to handle inserting user messages
if(isset($_POST['send_message']))
{
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$message = strip_tags($_POST['message']);
	session_start();
    // checking if the fields are empty
    if(empty($name))
    {
    	$_SESSION['errors']= "Please Enter Your name";
    	header("Location: ../../index.php#contact");
    }
    else if(empty($email)){
    	$_SESSION['errors']="Please Enter Your email";
    	header("Location: ../../index.php#contact");
    }
    else if(empty($message)){
    	$_SESSION['errors']="Please the Message field can't be blank";
    	header("Location: ../../index.php#contact");
    }
    else{
		// send mesage logic
		try{
			$sql= "INSERT INTO messages(Name,Email,Message,Status) VALUES(:name,:email,:message,:status)";
			$result=$con->prepare($sql);
			$values = array(':name' =>$name,
							':email'=>$email,
							':message'=>$message,
							':status'=>'Unread');
			$row =$result->execute($values);
			if($row>0){
				$_SESSION['success']="Message Sent Successfully";
				header("Location: ../../index.php#contact");
			}
			else{
				$_SESSION['success']="Could'nt send Message";
			}
		}
		catch(PDOException $ex){
		echo "A Database Error Occured: ".$ex;
		}
	}
}

// code to handle updating a selected message read status
if(isset($_POST['edit_message_status']))
{
	$id = strip_tags($_POST['MessageId']);
	$status = strip_tags($_POST['currentstatus']);
	$newstatus = '';
	session_start();
	if(!empty($id)){
		// changing the newstatus based on the current status
		if($status == 'Unread'){$newstatus = 'Read';}
		else if($status == 'Read'){$newstatus = 'Unread';}
		// update logic
		$sql = "UPDATE messages SET Status='$newstatus' WHERE EntryId = $id";
		$result=$con->prepare($sql);
		$row =$result->execute();
		if($row>0){
			$_SESSION['success']="Message Status Updated Successfully";
			header("Location: ../messages.php");
		}
		
	}else{
		$_SESSION['errors']="Error while updating Message Status";
		header("Location: ../messages.php");
	}
	
}

// code to handle orders from cart
if(isset($_POST['cart_checkout']) && isset($_POST['user_info']))
{
	$cart = $_POST['cart_checkout'];
	$userinfo = $_POST['user_info'];
	$message = null;
	foreach($cart as $item)
	{
		$customername = $userinfo[0];
		$customercontact = $userinfo[1];
		$menuid = $item['MenuId'];
		$menutitle = $item['Menu'];
		$quantity = $item['Quantity'];
		$totalprice = $item['TotalPrice'];
		
		try{
			$sql= "INSERT INTO orders(CustomerName,CustomerContact,MenuId,MenuTitle,Quantity,TotalPrice,OrderStatus) VALUES(:customername,:customercontact,:menuid,:menutitle,:quantity,:totalprice,:orderstatus)";
			$result=$con->prepare($sql);
			$values = array(':customername' =>$customername,
							':customercontact'=>$customercontact,
							':menuid'=>$menuid,
							':menutitle'=>$menutitle,
							':quantity'=>$quantity,
							':totalprice'=>$totalprice,
							':orderstatus'=>'Unconfirmed');
			$row =$result->execute($values);
			if($row>0){
				$message = "Your Order had been placed, \nawait confirmation via Phone Call";
			}
			else{
				$message =  "An error occured while placing order";
			}
		}
		catch(PDOException $ex){
			$message = "An error occured while placing order";
			//echo "A Database Error Occured: ".$ex;
		}	
	}
	echo $message;
}

// code to edit the order status
if(isset($_POST['edit_order_status']))
{
	$id = strip_tags($_POST['orderid']);
	$status = strip_tags($_POST['orderstatus']);
	$newstatus = '';
	session_start();
	if(!empty($id)){
		// changing the newstatus based on the current status
		if($status == 'Confirmed'){$newstatus = 'Unconfirmed';}
		else if($status == 'Unconfirmed'){$newstatus = 'Confirmed';}
		// update logic
		$sql = "UPDATE orders SET OrderStatus='$newstatus' WHERE EntryId = $id";
		$result=$con->prepare($sql);
		$row =$result->execute();
		if($row>0){
			$_SESSION['success']="Food Order  Status Updated Successfully";
			header("Location: ../foodorders.php");
		}
		
	}else{
		$_SESSION['errors']="Error while updating Food Order Status";
		header("Location: ../foodorders.php");
	}
}

?>