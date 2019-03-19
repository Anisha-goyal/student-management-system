<?php

session_start();

if(isset($_SESSION["uid"]))
{
	echo "";
}
else
{
	header("location:adminlogin.php");    // it will be redirected to login.php if session is destroyed
}

?>
<html>
<head>
	<title>Student management system</title>
</head>
<body>


<?php

include('../header.php');

?>
<div class="admintitle" align="center">

	<h1>ADMIN DASHBOARD</h1>
	<div class="nested">
		<h4><a href="../logout.php" style="color:#fff;font-size:30px;text-decoration:none;">Logout</a></h4>
	</div>
</div>

<div class="dashboard" align="center">
<h3><a href="addstudent.php" id="link"> Add Student Details </h3>
<h3><a href="updatestudent.php" id="link">Update Student Details</h3>
<h3><a href="deletestudent.php" id="link">Delete Student Details</h3>
<h3><a href="searchstudent.php" id="link">Generate Report</h3>
</div>
</body>
</html>
