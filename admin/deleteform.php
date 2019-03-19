<?php
include('../dbcon.php');


    
    $id=$_REQUEST['sid'];

    
    $qry="DELETE FROM `student` WHERE `id`='$id'";
     
    
    $run=mysqli_query($con,$qry);

    if($run)
    {
        ?>
        <script>
        alert('Data Deleted successfully');
        window.open('deletestudent.php','_self');
        </script>
        <?php
    }


?>