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
?>
<?php

include('../header.php');
include('../titlehead.php');

?>
<br><br><br>
<html>
<head>
    <title>Add Student Details</title>
</head>
<body>
   
</style>
<!--<span id="error" style="alignment:center">*Required Fields</span>-->
<form action="addstudent.php" method="post" enctype="multipart/form-data">
    <h3 align="center" style="color:#000066; font-size:35px;margin-top:-30px;">Add Student Details</h3>
    <h6 style="color:red; font-size:20px; margin-top:-20px; margin-left:220px;">* Required Fields</h6>
<table border="2px solid #000000" align="center" style="margin-top:-30px">
<tr align="center">
	<td>ID</td>
	<td><input type="text" name="id" required  pattern="^[0-9]{3}$" title="Enter 3 digit Unique ID" > &nbsp<span style="color:red;">*</span>
<?php   

//$id ="";  $idErr="";
//if(isset($_POST['id'])){
    //if(!filter_var($id, FILTER_VALIDATE_INT) === false) {
    //echo $idErr="";
//} else {
    //echo $idErr="Invalid Entry";
//}
//}
     ?>

    </td>
</tr>

<tr align="center">
    <td>Name</td>
    <td><input type="text" name="name" required  pattern="^[a-zA-Z]+$" title="Characters only"> &nbsp<span style="color:red;">*</span></td>
</tr>

<tr align="center" >
	<td>Course</td>
	<td>
    <select name="course" required title="Select Course">
    <option value="">Select Course</option>	
    <option value="MCA(SE)">MCA(SE) </option>
    <option value="M.Tech">M.Tech </option>
    <option value="BCA" >BCA</option>
    <option value="B.Tech">B.Tech</option>
    </select> &nbsp
    <span style="color:red;">*</span>
    </td>
</tr>

<tr align="center">
	<td>Phone</td>
    <td><input type="text" name="phone" required  pattern="^[0-9]{10}$" title="Enter 10 digit phone number" > &nbsp<span style="color:red;">*</span></td>
</tr>

<tr align="center">
	<td>City</td>
    <td><input type="text" name="city" required pattern="^[a-zA-Z]+$" title="Characters only"> &nbsp<span style="color:red;">*</span></td>
</tr>

<tr align="center">
	<td>Photo</td>
    <td><input type="file" accept="image/*" name="photo" title="Upload Image" style="margin-left:-20px;" ></td>
</tr>

</table>
<br>
<div align="center">
	<input type="submit" name="submit" value="SUBMIT">
</div>
</form>

<?php
include('../dbcon.php');
//include('form validation.php');

if(isset($_POST['submit']))
{
   
    $id=$_POST['id'];
    $name=$_POST['name'];
    $course=$_POST['course'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $photo=$_FILES['photo']['name'];
    $tempname=$_FILES['photo']['tmp_name'];

    move_uploaded_file($tempname,"../dataimg/$photo");

    $qry="INSERT INTO `student`(`id`, `name`, `course`, `phone`, `city`, `Photo`) VALUES ('$id','$name','$course','$phone','$city','$photo')";

    $run=mysqli_query($con,$qry);

    if($run)
    {
        ?>
        <script>
        alert('Data inserted successfully');
        </script>
        <?php
    }
}

?>
</body>
</html>