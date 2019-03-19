
<?php
include('../dbcon.php');


    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $course=$_POST['course'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $id=$_POST['sid'];
    $photo=$_FILES['photo']['name'];
    $tempname=$_FILES['photo']['tmp_name'];

    move_uploaded_file($tempname,"../dataimg/$photo");
    $qry="UPDATE `student` SET `name` = '$name', `course` = '$course', `phone` = '$phone', `city` = '$city', `Photo`='$photo' WHERE`id` = '$id';";
     // we haven't updated id as that is the primary key on the basis of which the data is fetched
    
    $run=mysqli_query($con,$qry);

    if($run)
    {
        ?>
        <script>
        alert('Data Updated successfully');
        window.open('updateform.php?sid=<?php echo $id;?>','_self');
        </script>
        <?php
    }


?>