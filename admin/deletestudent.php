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
<?php

include('../header.php');
include('../titlehead.php');

?>
<html>
<head>
	<title>Delete Student Details</title>
</head>
<body>

<form action="deletestudent.php" method="post">
	<h3 align="center" style="color:#000066; font-size:35px;margin-top:35px;">Delete Student Details</h3>
	<h6 style="color:red; font-size:20px; margin-top:40px; margin-left:220px;">* Required Fields</h6>
<table border="2px solid #000000" align="center" style="font-size:25px;height:20%;">
<tr align="center">
	<td>Course</td>
	<td>
    <select name="course" required="">
    <option value="">Select Course</option>	
    <option value="MCA(SE)">MCA(SE) </option>
    <option value="M.Tech">M.Tech </option>
    <option value="BCA">BCA</option>
    <option value="B.Tech">B.Tech</option>
    </select>
    <span style="color:red;">*</span>
    </td>

	<td>Enter Name</td>
	<td><input type="text" name="name" pattern="^[a-zA-Z]+$" title="Characters only" required=""><span style="color:red;">*</span></td>
</tr>
</table>
<div align="center">
	<input type="submit" name="submit" value="SEARCH">
</div>
</form>
<br>
<table align="center" border="2px solid #000000" style="font-size:25px;height:10%;">
<tr style="background-color:#ebebe0;">
<th>Id</th>
<th>Name</th>
<th>Course</th>
<th>Phone</th>
<th>City</th>
<th>Photo</th>
<th>Delete</th>

</tr>
<?php
if(isset($_POST['submit']))
{
	include('../dbcon.php');

	$course=$_POST['course'];
	$name=$_POST['name'];
	$sql="SELECT * FROM `student` WHERE course='$course' AND name LIKE '%$name%'";
	$run=mysqli_query($con,$sql);

	if(mysqli_num_rows($run)<1)
	{
		echo "<tr><td colspan='7'>No records Found</td></tr>";
	}

	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
			$count++;
			?>
		
            <tr align="center">
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['course']; ?></td>
				<td><?php echo $data['phone']; ?></td>
				<td><?php echo $data['city']; ?></td>
				<td><img src="../dataimg/<?php echo $data['Photo'];?>" style="max-width:100px"/></td>
				<td><a href="deleteform.php?sid=<?php echo $data['id'];?>">Delete</a></td>  <!-- '?'' left side is url and ryt side is the variable created(sid) to send the data to updateform.php throught get method-->
                <!-- id is written here $data['id'] bcoz id is made a primary key in db to identify which student's data is to be send in updateform.php-->
            </tr>
			<?php
		}
	}
}

?>

</table>


</body>
</html>
