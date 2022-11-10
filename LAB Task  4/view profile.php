<?php include 'header.php';?>
<?php include 'dashboard.php';
$propic="df.jpg";?>

<!DOCTYPE html>
<html>
<body>
<fieldset>
    <legend>PROFILE</legend>
<?php
if (isset($_SESSION['uname'])) {


 
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);
                          if (isset($data)) 
                          {

                              foreach($data as $key => $value)  
                          {  
                              if ($value['username']==$_SESSION['uname']) {

                                $existgender = $value['gender'];

                              	if($value['profile picture']!="")
		                           {
		                              $propic= $value['profile picture'];
		                           }
		                           else
                              {

                              if($existgender=="male")
                                 {$propic="df.jpg";}
                              else{$propic="dff.jpg";} 
                              }     

                                echo "Name---->" .$value['name']."<br>";
                                echo "Email--->" .$value['e-mail']."<br>";
                                echo "Gender--> " .$value['gender']."<br>";
                                echo "DOB-----> " .$value['dob']."<br><br>";

                                echo " | ";
                                echo "<a href='edit profile.php'>Edit Profile</a>";
                                echo " | ";
                                echo str_repeat("&nbsp;", 90);
                                echo " | ";
                                echo "<a href='edit propic.php'>Edit Profile Picture</a>";
                                echo " | "."<br>";
                                echo str_repeat("&nbsp;", 120);




                                
                         
                              }           
                          } 
                          }
                       }
?>
<img src="<?php echo $propic;?>" alt= "Image" style="width:100px;height:100px";> 
</fieldset>
</body>
</html>
<?php include 'footer.php';?>