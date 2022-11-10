<?php include 'header.php';?>
<?php include 'dashboard.php';?>
<!DOCTYPE html>
<html>
      <head>  
<style>
.error {color: #FF0000;}
</style>
      </head> 
<body>
<?php
 $nameErr = $emailErr = $genderErr  = $DBerr= "";

//////////////////////////////////////////////----change name
	 if(isset($_POST["Submit1"]))  
	 {  
			    

							        	$name = $_POST["name"];
							        	$data = file_get_contents("data.json");  
				                          $data = json_decode($data, true);
				                          if (isset($data)) 
				                          {

				                              foreach($data as $key => $value)  
				                          {  
				                              if ($value['username']==$_SESSION['uname']) {

				                              $data[$key]['name']= $name;
				            
				                         
				                              }           
				                          } 

				                          $newJsonString = json_encode($data);
				                          file_put_contents('data.json', $newJsonString);
				                          }

				                if(file_put_contents('data.json', $newJsonString) )
				                {    
				                      $nameErr = "Changed with".$name;
				                } 

			  }

//////////////////////////////////////////////////////change email

if(isset($_POST["Submit2"]))  
	 {  
			    

		           $email = $_POST["email"];

							        	$data = file_get_contents("data.json");  
				                          $data = json_decode($data, true);
				                          if (isset($data)) 
				                          {

				                              foreach($data as $key => $value)  
				                          {  
				                              if ($value['username']==$_SESSION['uname']) {

				                              $data[$key]['e-mail']= $email ;
				            
				                         
				                              }           
				                          } 

				                          $newJsonString = json_encode($data);
				                          file_put_contents('data.json', $newJsonString);
				                          }

				                if(file_put_contents('data.json', $newJsonString) )
				                {    
				                      $emailErr = "Changed with ".$email ;
				                } 

        }




//////////////////////////////////////////////////////---GENDER

if(isset($_POST["Submit3"]))  
	 {  
			    
						        $gender = $_POST["gender"];

							        	$data = file_get_contents("data.json");  
				                          $data = json_decode($data, true);
				                          if (isset($data)) 
				                          {

				                              foreach($data as $key => $value)  
				                          {  
				                              if ($value['username']==$_SESSION['uname']) {

				                              $data[$key]['gender']= $gender ;
				            
				                         
				                              }           
				                          } 

				                          $newJsonString = json_encode($data);
				                          file_put_contents('data.json', $newJsonString);
				                          }

				                if(file_put_contents('data.json', $newJsonString) )
				                {    
				                      $genderErr = "Changed with ".$gender ;
				                } 
	    }

//////////////////////////////////////////////////////---DOB

if(isset($_POST["Submit4"]))  
	 {  
			    

							
						        $dob = $_POST["dob"];

							        	$data = file_get_contents("data.json");  
				                          $data = json_decode($data, true);
				                          if (isset($data)) 
				                          {

				                              foreach($data as $key => $value)  
				                          {  
				                              if ($value['username']==$_SESSION['uname']) {

				                              $data[$key]['dob']=   $dob ;
				            
				                         
				                              }           
				                          } 

				                          $newJsonString = json_encode($data);
				                          file_put_contents('data.json', $newJsonString);
				                          }

				                if(file_put_contents('data.json', $newJsonString) )
				                {    
				                      $DBerr = "Changed with ".$dob ;
				                } 
 
	    }



 $name =  $email = $gender = $dob= "";

                       $data = file_get_contents("data.json");  
                       $data = json_decode($data, true);
                          if (isset($data)) 
                          {

                              foreach($data as $key => $value)  
                          {  
                              if ($value['username']==$_SESSION['uname']) {

                               	$default1 = $value['name'];
	                            $default2 = $value['e-mail'];
	                            $default3 = $value['gender'];
	                            $default4 = $value['dob'];
                         
                              }           
                          } 
                          }
?>

 <fieldset >
    <legend >EDIT PROFILE</legend>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label>Name</label>  
                     <input type="text" name="name" value =  <?php echo $default1;?> />
                      <span class="error">* <?php echo $nameErr;?></span> <br>
                       <input type="Submit" name="Submit1"  value="Change"><br><br>
   </form> 


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label>E-mail</label>
                     <input type="text" name = "email"value =  <?php echo $default2;?> />
                     <span class="error">* <?php echo $emailErr;?></span><br>
                      <input type="Submit" name="Submit2" value="Change"><br><br>
   </form> 


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<legend>Gender</legend>

<input type="radio" id="male" name="gender" value="male" <?php echo ($default3=='male'?' checked=checked':''); ?>>
                     <label for="male">Male</label>   

<input type="radio"id="female" name="gender"value="female" <?php echo($default3=='female'?' checked=checked':''); ?>>                  <label for="female">Female</label>

<input type="radio" id="other" name="gender" value="other" <?php echo ($default3=='other'?' checked=checked':''); ?>>                   <label for="other">Other</label>
                      <span class="error">* <?php echo $genderErr;?></span><br>
                      <input type="Submit" name="Submit3" value="Change"><br><br>
                      
   </form> 


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<legend>Date of Birth:</legend>
                     <input type="date" name="dob" value =  <?php echo $default4;?> > 
                     <span class="error">* <?php echo $DBerr;?></span><br>
                     <input type="Submit" name="Submit4" value="Change"><br><br>
   </form> 


  </fieldset> 
 


</body>
</html>
<?php include 'footer.php';?>