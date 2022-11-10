

<!DOCTYPE html>
<html>
<body>
<br>
<br>
<fieldset>
    <legend>F</legend>

<?php

$usertype="";
if (isset($_SESSION['uname']))
{
    	$usertype="Booth manager";
}
else 
{
	$usertype="Guest User";
}
echo "<br>Today:" . date("Y-m-d") . "<br>";
echo "As ". $usertype;
?>

</fieldset>
<br>
</body>
</html>