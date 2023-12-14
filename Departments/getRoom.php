<?php
    include '../Connect.php';
    include 'Department.php';

    $response = array();
    $query = "SELECT * FROM phongban WHERE ";
    $data = mysqli_query($conn, $query);

       while ($row = mysqli_fetch_assoc($data)){
        array_push($response, new PhongBan(
            $row['MaPB'], 
            $row['TenPB'] 
        ));
       }
    echo json_encode($response);
?>