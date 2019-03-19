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
include('../dbcon.php');

$sid=$_GET['sid'];    //to fetch the data through get method
$sql="SELECT * FROM `student` WHERE `id`='$sid'";
$run=mysqli_query($con,$sql);

$data=mysqli_fetch_assoc($run);

?>
<form action="updatedata.php" method="post" enctype="multipart/form-data">
    <br><br><br>
<table border="2px solid #000000" align="center">
<tr align="center">
	<td>ID</td>
	<td><input type="text" name="id" pattern="^[0-9]{3}$" title="Enter 3 digit Unique ID" value="<?php echo $data['id']; ?>" required></td>
</tr>

<tr align="center">
    <td>Name</td>
    <td><input type="text" name="name" value="<?php echo $data['name'];?>"required pattern="^[a-zA-Z]+$" title="Characters only"></td>
</tr>

<tr align="center">
	<td>Course</td>
	<td>
    <select name="course" value="<?php echo $data['course'];?> " required>
    <option value="">Select Course</option>	
    <option value="MCA(SE)">MCA(SE) </option>
    <option value="M.Tech">M.Tech </option>
    <option value="BCA">BCA</option>
    <option value="B.Tech">B.Tech</option>
    </select>
    </td>
</tr>

<tr align="center">
	<td>Phone</td>
    <td><input type="text" name="phone" value="<?php echo $data['phone'];?>"required pattern="^[0-9]{10}$" title="Enter 10 digit phone number"></td>
</tr>

<tr align="center">
	<td>City</td>
    <td><input type="text" name="city" value="<?php echo $data['city'];?>"required pattern="^[a-zA-Z]+$" title="Characters only"></td>
</tr>

<tr align="center">
	<td>Photo</td>
    <td><input type="file" accept="image/*" name="photo" title="Upload Image" style="margin-left:-20px;" ><!--<input type="file" name="photo" value='<img src="../dataimg/<?php echo $data['Photo']; ?>"'/>--></td>
</tr>

</table>
<br>
<input type="hidden" name="sid" value="<?php echo $data['id']; ?>" >
<div align="center">
	<input type="submit" name="submit" value="SUBMIT">
</div>
</form>
