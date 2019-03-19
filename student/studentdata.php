<?php 
session_start();

		if($_SESSION['uid']){
			$id=$_SESSION['uid'];
		}
		else{
			header('location: studentlogin.php');
		} 


include('../dbcon.php');
include('../header.php');
//include('../titlehead.php');
	
	$query="SELECT * FROM `student` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($run);
	$row=mysqli_num_rows($run);
	if($row<1){
		echo"failure";
	}
	else{
	echo"";
	}
?>
<!--id : <?php echo $data['id'];?>
name : <?php echo $data['name'];?>
course : <?php echo $data['course'];?>
phone : <?php echo $data['phone'];?>
city : <?php echo $data['city'];?>-->

<div class="admintitle" align="center">

    <h1>STUDENT INFORMATION</h1>
    <div class="nested">
        <h4><a href="../logout.php" style="color:#fff;font-size:30px;text-decoration:none;">Logout</a></h4>
    </div>
</div>

<div class="dashboard" align="center">
    
<table align="center" border="1px solid black" style="width:50%;margin-top:10px;">
        	<tr>
                <th colspan="3">STUDENT DETAILS</th>
            </tr>

            <tr>
                <td rowspan="5" align="center"><img src="../dataimg/<?php  echo $data['Photo']; ?>" style="max-height:150px;max-width:200px;"/></td>	
                <th>ID</th>
                <th><?php echo $data['id']; ?></th>
            </tr>

            <tr>
            	<th>NAME</th>
            	<th><?php echo $data['name']; ?></th>
            </tr>

            <tr>
            	<th>COURSE</th>
            	<th><?php echo $data['course']; ?></th>
            </tr>

            <tr>
            	<th>PHONE</th>
            	<th><?php echo $data['phone']; ?></th>
            </tr>

            <tr>
            	<th>CITY</th>
            	<th><?php echo $data['city']; ?></th>
            </tr>

        </table> 	
        </div>	

