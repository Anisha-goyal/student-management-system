<?php

session_start();
if(isset($_SESSION['uid']))
{
	header('location:admindash.php');
}

?>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>
<style>

input[type=text]
{
	padding:10px 15px;
	border-radius:4px;
	margin:8px 0;
	border:2px solid #ccc;
	font-size:25px;
}

input[type=password]
{
	padding:10px 15px;
	border-radius:4px;
	margin:8px 0;
	border:2px solid #ccc;
	font-size:25px;
}
input[type=text]:focus
{
	border:2px solid #555;
}

input[type=password]:focus
{
	border:2px solid #555;
}


input[type=submit]
{
	background-color: #000000;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 10px 2px;
    cursor: pointer;
    border-radius:8px;
    font-size:20px;

}
</style>
<h1 align="center" style="margin-top:100px;font-size:50px">Admin Login</h1>
<form action="adminlogin.php" method="post">
	<table align="center">
	<tr>
		<td style="font-size:25px">Username</td>
		<td> <input type="text" name="uname" required  pattern="^[a-zA-Z]+$" title="Characters only"></td>
	</tr>
	<tr>
	    <td style="font-size:25px">Password</td>
	    <td><input type="password" name="pass" required></td>
	</tr>
	<tr>
	    <td align="center" colspan="2"><input type="submit" name="submit" value="LOGIN"></td>
	</tr>    
</table>
</form>

<?php
include("../dbcon.php");
if(isset($_POST["submit"]))
{
	$username=$_POST["uname"];
	$password=$_POST["pass"];

	$qry="SELECT * FROM admin where username='$username' and BINARY password='$password'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row < 1)
	{
	    ?>
		<script>
        alert('Username or password do not match');
        window.open("adminlogin.php","_self");
		</script>
	<?php
	}
	else
	{
		$data=mysqli_fetch_assoc($run);      //will fetch the data in associative array
	    
	    $id=$data['id'];
	    
	    $_SESSION['uid']=$id;
if($_SESSION['uid'])
{
	header('location:admindash.php');
}

}
}

?>
</body>
</html>