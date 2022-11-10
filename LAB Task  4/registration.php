<?php include 'header.php';?>
         
 <?php
// define variables and set to empty values
                                                        
 $done=1;  
 

 $error = ''; 

 $nameErr = $emailErr = $genderErr  = $DBerr= $unameErr = $npassErr= $cpassErr="";




 if(isset($_POST["submit"]))  
 {  
    //name

      if(empty($_POST["name"]))  
      {  
           $nameErr = "<label>Enter Name</label>"; 
           $done=0;  

      }
      else 
    {
          if(str_word_count($_POST["name"]<2))
        {
         $nameErr = "Use atleast two words";
         $done=0; 
        }

        else{$name = $_POST["name"];} 
    }
//email

      if(empty($_POST["email"]))  
      {  
           $emailErr = "<label>Enter an e-mail</label>"; 
           $done=0;   
      } 
      else {
    
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $done=0;  
        }
        else{$email = $_POST["email"];}

          }

//username
     if(empty($_POST["un"]))  
      {  
           $unameErr = "<label>Enter a username</label>";
           $done=0;    
      }  
      else {
    
      $un = $_POST["un"];
    
    }

//password

    if(empty($_POST["pass"]))  
      {  
           $npassErr = "<label >Enter a password</label>";  
           $done=0;  
      }
        
    else
    { 
          
           $newpassword=$_POST["pass"];

    }


      if(empty($_POST["Cpass"]))  
      {  
           $cpassErr = "<label>Confirm password field cannot be empty</label>";  
           $done=0;  
      } 
        else
      {
           if($_POST["Cpass"] == $newpassword)
           {
            $cpassErr = "MATCHED";
           }
           else
           {
            $cpassErr = "Not matched with new password";
            $done=0;  
           }
      }
//gender

      if(empty($_POST["gender"]))  
      {  
           $genderErr = "<label>Gender cannot be empty</label>";  
           $done=0;  
      } 
    else 
    {
        $gender = $_POST["gender"];
    }

       if($done==1){
   
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'                =>     $_POST['name'],
                     'password'          =>     $_POST['pass'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"],
                     
                     'profile picture' => ""  
                );  
               
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  

                if(file_put_contents('data.json', $final_data))  
                {    
                     header("location:login.php");
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
                header($_SERVER["PHP_SELF"]);

           }

         }
         else
         {
            $error = 'Wrong information--->try agin';
         }
      } 
   
 ?>

 <?php


$name = $un= $email =$Cpass =$pass= $gender = $dob= "";

  
?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
<style>
.error {color: #FF0000;}
</style>
      </head>  
      <body>  



           <br />  
           <div>  
                <h3>Add Data to JSON File</h3><br />                 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

            <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  

                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" />
                      <span class="error">* <?php echo $nameErr;?></span><br />  <br>
                     <label>E-mail</label>
                     <input type="text" name = "email"/>
                     <span class="error">* <?php echo $emailErr;?></span><br /><br>
                      
                     <label>User Name</label>
                     <input type="text" name = "un"/>
                      <span class="error">* <?php echo $unameErr;?></span><br><br>
                     <label>Password</label>
                     <input type="password" name = "pass"/>
                     <span class="error">* <?php echo $npassErr;?></span><br><br>
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass"/>
                      <span class="error">* <?php echo $cpassErr;?></span><br><br>

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label>
                      <span class="error">* <?php echo $genderErr;?></span><br><br>
                     </fieldset> 
                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> 
                     <span class="error">* <?php echo $DBerr;?></span><br><br>
                   
                     
                     <input type="submit" name="submit" value="REGISTER"/><br />                       
                </form>  
           </div>   
      </body>  
 </html>  

<?php include 'footer.php';?>