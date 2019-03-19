<?php

session_start();

if(isset($_SESSION["uid"]))
{
	echo "";
}
else
{
	header("location: adminlogin.php");    // it will be redirected to login.php if session is destroyed
}

?>
<html>
<head>
	<title>Student management system</title>
</head>
<body>


<?php

include('../header.php');
include('titlehead1.php');

?>


<div class="dashboard" align="center">
	
	<form action="stuname.php" method="post">
<table border="2px solid #000000" align="center" style="height:20%;max-width:60%;">
	<h6 style="color:red; font-size:20px; margin-top:40px; margin-left:-700px;">* Required Field</h6>
	<tr align="center">
		<td>ENTER NAME</td>
		<td><input type="text" name="name" required pattern="^[a-zA-Z]+$" title="Characters only"><span style="color:red;">*</span></td>
	</tr>
	<!--<tr align="center">
		<td>ENTER ID</td>
		<td><input type="text" name="id" required></td>
	</tr>-->

</table>
<div align="center" style="max-width:86%;">
	<input type="submit" name="submit" value="GENERATE REPORT">

</div>
</form>
</div>


<?php

include('../dbcon.php');
//include('result.php');
if(isset($_POST['submit']))
{
    $name=$_POST['name'];


    //showdetails($name); 
}
?>
</body>
</html>
