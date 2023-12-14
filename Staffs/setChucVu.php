<?php
    include '../Connect.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';

         $query = "UPDATE nhanvien SET ChucVu = 'Nhân viên' WHERE MaNV = '$MaNV' ";
            if($conn->query($query) == TRUE){
                 $response['message'] = "done";
            }else{
                $response['message'] = "error";
            }
     }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
     }

     echo json_encode($response);
?>