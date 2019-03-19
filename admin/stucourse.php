<?php

include('../dbcon.php');
require('../assets/fpdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"STUDENT INFORMATION (COURSE:MCA(SE))",0,1,"C");
$pdf->Ln(5);
$pdf->SetFont("Arial","B",14);
$pdf->Cell(38,10,"ID",1,0,"C");
$pdf->Cell(38,10,"NAME",1,0,"C");
$pdf->Cell(38,10,"PHONE",1,0,"C");
$pdf->Cell(38,10,"CITY",1,0,"C");
$pdf->Cell(38,10,"COURSE",1,1,"C");

$course=$_POST['course'];

$qry="SELECT * FROM `student` WHERE `course`='$course'";
$run=mysqli_query($con,$qry);
if(mysqli_num_rows($run)>0)
{
while($data=mysqli_fetch_assoc($run))
    {
        
        $pdf->SetFont("Arial","",12);

        $pdf->Cell(38,8,$data['id'],1,0,"C");
        $pdf->Cell(38,8,$data['name'],1,0,"C");
        $pdf->Cell(38,8,$data['phone'],1,0,"C");
        $pdf->Cell(38,8,$data['city'],1,0,"C");
        $pdf->Cell(38,8,$data['course'],1,1,"C");
    }
}
else
{
	header("location:sbycourse.php");
}
$pdf->Output();

?>