<?php

include '../Connect.php';
include 'Time_Recorder.php';

$response = array();


$query = "SELECT * FROM bangchamcong WHERE MaNV = '$MaNV' AND Thang = '$Thang'";
$data = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($data)){
    array_push($response, new TimeRecorder(
        $row['MaNV'], 
        $row['NgayCong'], 
        $row['NgayDiMuon'], 
        $row['PhutDiMuon'], 
        $row['Thang']
    ));
   }
   echo json_encode($response);

?>