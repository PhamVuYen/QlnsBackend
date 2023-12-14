<?php

include '../Connect.php';
include '../Staffs/Staff.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $MaNV = $_POST['MaNV'];
    $Password = $_POST['Password'];
    // Your login logic here
    // Verify email and password against your nhanvien table
    if(isset($_POST['MaNV']) && isset($_POST['Password'])){
        $query = "UPDATE nhanvien SET Password = ' $Password' WHERE MaNV = '$MaNV' ";
        $result = $conn->query($query);
        $conn->close();
    }
  
}


?>
