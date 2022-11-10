<?php include 'header.php';?>
<?php include 'dashboard.php';?>

<!DOCTYPE HTML>  
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<br>
<?php
// define variables and set to empty values

$currentpassword="";
$done=1;

$cpassErr=$cpass="";
$npass=$npassErr=$currpass=$currpassErr="";


   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {      

                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);
                          if (isset($data)) 
                          {

                              foreach($data as $key => $value)  
                          {  
                              if ($value['username']==$_SESSION['uname']) {

                              $currentpassword= $value['password'];
            
                              }
                                         
                          } 
                          }

                                        ///change password

  if (empty($_POST["currpass"]))
    {
      $currpassErr = "Enter your Password";
      $done=0;
    } 

    else
    {
          if($_POST["currpass"] != $currentpassword )
          {
            $currpassErr = "Password not mach try again ";
            $done=0;   //REQUARED A FUNCTION TO RESET ALL OR GO BACK FROM BEGNING
          }

   }
    //----


    if (empty($_POST["npass"])) 
    {
      $npassErr = "Enter a new Password";
    }
    else
    { 
          
          if($_POST["npass"]==$currentpassword)
          {
            $npassErr = "Try something new its your old one";
            $done=0;
          }
          else
          {
              $newpassword=$_POST["npass"];

          }

    }
          

//--
     if (empty($_POST["cpass"])) 
        {
          $cpassErr = "Please reenter your password";
          $done=0;
        }
      else
      {
           if($_POST["cpass"] != $newpassword)
           {
            $cpassErr = "Not matched with new password";
            $done=0;
           }
            else
          {
              $newpassword=$_POST["cpass"]; //could be use npass as they are same

          }
      }


      if($done==1)
      {
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);
                          if (isset($data)) 
                          {

                              foreach($data as $key => $value)  
                          {  
                              if ($value['username']==$_SESSION['uname']) {

                              $data[$key]['password']= $newpassword;
            
                         
                              }           
                          } 

                          $newJsonString = json_encode($data);
                          file_put_contents('data.json', $newJsonString);
                          }

                if(file_put_contents('data.json', $newJsonString) )
                {    
                      header("location:login.php");
                } 


     
      }
     

    }


?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 


 <fieldset >
    <legend >CHANGE PASSWORD</legend>

  Current Password:  <input type="password" name="currpass">
  <span class="error">* <?php echo $currpassErr;?></span><br><br>



   New Password:  <input type="password" name="npass">
   <span class="error">* <?php echo $npassErr;?></span><br><br>
 

  Confirm Password:   <input type="password" name="cpass">
  <span class="error">* <?php echo $cpassErr;?></span><br><br>



  <input type="submit" name="submit" value="Submit"> 


  </fieldset>
 
  </form>

</body>
</html>
<?php include 'footer.php';?>