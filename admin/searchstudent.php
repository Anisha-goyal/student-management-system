<?php

session_start();
$idErr="";
$id="";
if(isset($_SESSION["uid"]))
{
	echo "";
}
else
{
	header("location: adminlogin.php");    // it will be redirected to login.php if session is destroyed
}

include('../header.php');
include('../titlehead.php');

?>
<br>
<html>
<head>
    <title>Add Student Details</title>
</head>
<body>

<div class="dashboard" align="center">
<h3><a href="sbyname.php" id="link"> Search by Name</h3>
<h3><a href="sbycourse.php" id="link">Search By Course</h3>
<h3><a href="sbycity.php" id="link">Search By City</h3>

</div>
</body>
</html>
