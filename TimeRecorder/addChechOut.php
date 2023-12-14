<?php
    include '../Connect.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        $GioVe = isset($_POST['GioVe']) ? $_POST['GioVe']: '';
        $Ngay = isset($_POST['Ngay']) ? $_POST['Ngay']: '';
        $Thang = isset($_POST['Thang']) ? $_POST['Thang']: '';

        if(isset($_POST['MaNV']) && isset($_POST['GioVe']) && isset($_POST['Ngay']) ){
            
            $query = "UPDATE bangchamcongngay  SET GioVe = '$GioVe' WHere MaNV = '$MaNV' AND Ngay = '$Ngay'";
            if($conn->query($query) == TRUE){
                 $response['message'] = "done";
            }else{
                $response['message'] = "error";
            }
        
        }else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }

     }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
     }

     echo json_encode($response);
?>
