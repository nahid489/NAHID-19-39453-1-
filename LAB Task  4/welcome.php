<?php include 'header.php';?>
<?php include 'dashboard.php';?>

<?php 

	if (isset($_SESSION['uname'])) {

		echo "<h2>Welcome ". $_SESSION['uname']. "</h2>";

		//cookie--------------------------------------
			if (!empty($_SESSION['remember'])) {
		setcookie("username", $_SESSION['uname'], time()+10);
		setcookie("password", $_SESSION['pass'], time()+10);
		//echo "Cookie set successfully<br>";
		
	}else{
		setcookie("username", "");
		setcookie("password", "");
		//echo "Cookie not set<br>";

	}
   //-----------------------------------------
	
	}else{
		header("location:login.php");
	}

 ?>


<?php include 'footer.php';?>