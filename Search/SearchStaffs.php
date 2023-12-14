<?php

include '../Connect.php';
include '../Staffs/Staff.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){


    $Search = isset($_POST['Search']) ? $_POST['Search']: '';

    if(isset($_POST['Search'])){

        $search = "SELECT * FROM nhanvien WHERE TenNV LIKE'%$Search%' OR MaNV  LIKE'%$Search%' ";
        $data = mysqli_query($conn, $search);

        while ($row = mysqli_fetch_assoc($data)){
         array_push($response, new NhanVien(
             $row['MaNV'], 
             $row['TenNV'], 
             $row['NgaySinh'], 
             $row['DiaChi'], 
             $row['GioiTinh'], 
             $row['Phone'], 
             $row['Email'], 
             $row['SoCMND'], 
             $row['SoTk'], 
             $row['MaPB'], 
             $row['MucLuong'], 
             $row['ChucVu'],
             $row['Password']
         ));
        }
 

    }
}

echo json_encode($response);
?>