<?php

include "config.php";
include "fpdf/fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();

// pick data from db

$sql = "SELECT `id`, `fullName`, `emailAddress`, `dob`, `gender`, `photo`, `cv`, `timestamp` FROM `students` WHERE 1";

$result = mysqli_query($link,$sql);

if($result){
    $data=mysqli_num_rows($result);

    if(!empty($data)){

        while($row=mysqli_fetch_array($result)){

            foreach($result as $row){
                $pdf->SetFont("Arial","","10");
                $pdf->Ln();
                foreach ($row as $column){
                    $pdf->Cell("45","15",$column,1);

                }
            }

            $pdf->Output();


        }


    }echo '<p class="alert alert-warning">No data in the database</p>';



}else{
    echo "<p class='alert alert-danger'>Error executing query $sql</p>".mysqli_error($link);
}