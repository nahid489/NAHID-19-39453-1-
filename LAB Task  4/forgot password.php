<?php include 'header.php';?>

<!DOCTYPE html>
<html>
<body>
      <head>  
<style>
.error {color: #FF0000;}
</style>
      </head> 
<?php
 $emailErr = "";
 $existmail=$exituname="";
 $flag=0;

 if(isset($_POST["submit"]))  
 { 
   if(empty($_POST["email"]))  
      {  
           $emailErr = "<label>Enter an e-mail</label>"; 
   
      } 
    else {
    
	        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
	        {
	          $emailErr = "Invalid email format";
	        }
	        else{

	        	$email = $_POST["email"];

	        	  $data = file_get_contents("data.json");  
                       $data = json_decode($data, true);
                          if (isset($data)) 
                          {

                              foreach($data as $key => $value)  
                          {  
                              if ($value['e-mail']==$_POST["email"]) 
	                              {
	                   
		                           $existmail = $value['e-mail'];
		                           $exituname=$value['username'];

		                           if($email== $existmail)
		                           {
		                           	echo "<br>Hello ".$exituname." we found you<br> due to some reason we can't Varify you yet.<br><br>";
		                           	$flag=1;
		                           }

		                           
	                              } 
         
                          } 

                          if($flag=0){echo "<br><br>Email not found<br><br>";}
                          }

	            }

          }

}




$email ="";
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<br>
 <fieldset >
    <legend >FORGOT PASSWORD</legend>
                     <br />  
                     <label>Enter E-mail: </label>
                     <input type="text" name = "email"/>
                     <span class="error">* <?php echo $emailErr;?></span><br /><br>
              <input type="submit" name="submit" value="Submit"/><br />  
 </fieldset >



</body>
</html>

<?php include 'footer.php';?>