<?php include 'header.php';?>
<?php include 'dashboard.php';?>
<?php
$propic="df.jpg";

if(isset($_POST["submit"]))
{

               $target_dir="edit propic.php";
         $target_file=$target_dir. basename($_FILES["fileToUpload"]["name"]);
         $uploadOK=1;
         $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


         if(isset($_POST["submit"]))
         {
             $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                
                 if($check !== false)
                 {
                     echo "File is an image - " . $check["mime"] . ".";
                     $uploadOK = 1;
                 }
                 else
                 {
                     echo "File is not an image.";
                     $uploadOK =0;
                 }
         }

         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
             {
               echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
               $uploadOK = 0;
             }

         if ($_FILES["fileToUpload"]["size"] > 400000) 
             {
               echo "Sorry, your file is too large.";
               $uploadOK = 0;
             }

         if ($uploadOK == 0) 
         {
           echo "Sorry, your file was not uploaded.";
         }
         else 
         {
           if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
             



                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);
                          if (isset($data)) 
                          {

                              foreach($data as $key => $value)  
                          {  
                              if ($value['username']==$_SESSION['uname']) {

                              $data[$key]['profile picture']= $target_file;
                          //$data['profile picture']=$_FILES["fileToUpload"]["tmp_name"];
                         
                              }

                          } 

                          $newJsonString = json_encode($data);
                          file_put_contents('data.json', $newJsonString);
                          }

                if(file_put_contents('data.json', $newJsonString) )
                {    
                      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } 



            } 
            else {
             echo "Sorry, there was an error uploading your file.";
           }
         }


}

?>





<!DOCTYPE html>
<html>
<body>

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

<fieldset >
    <legend >PROFILE PICTURE</legend>

<?php

if (isset($_SESSION['uname']))    {      

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
                           else{
                              if($existgender=="male")
                                 {$propic="df.jpg";}

                                 else{$propic="dff.jpg";} 
                              }
            
                         
                              }           
                          } 
                          }}

?>


        <img src="<?php echo $propic;?>" alt= "Image" style="width:100px;height:100px";> 
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br> <br>
        <input type="submit" value="Upload Image" name="submit">

 </fieldset>
    </form>
</body>
</html>
<?php include 'footer.php';?>