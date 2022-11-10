<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<body>
<br>
<fieldset>
    <legend>H</legend>
    
    <h1 text-align:center; color:Tomato;> ATCS </h1>

<?php

if (isset($_SESSION['uname']))
{
    echo str_repeat("&nbsp;", 90);
    echo "Logged in as ".$_SESSION['uname']." ";
    echo " | ";
    echo "<a href='logout.php'>Logout</a>";
}

else{


echo str_repeat("&nbsp;", 90);
 echo "<a href= '1Public Home.php' >Home</a>";
 echo " | ";
 echo "<a href='login.php'>Login</a>";
 echo " | ";
 echo "<a href='registration.php'>Registration</a>";
}
?>
<br>
</fieldset>
</body>
</html>