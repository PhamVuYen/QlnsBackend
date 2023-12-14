<?php
    include '../Connect.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        $GioDen = isset($_POST['GioDen']) ? $_POST['GioDen']: '';
        $GioVe = isset($_POST['GioVe']) ? $_POST['GioVe']: '';
        $Ngay = isset($_POST['Ngay']) ? $_POST['Ngay']: '';
        $Thang = isset($_POST['Thang']) ? $_POST['Thang']: '';

        if(isset($_POST['MaNV']) && isset($_POST['GioDen']) && isset($_POST['Ngay']) && isset($_POST['Thang'])  ){
            
            $query = "INSERT INTO bangchamcongngay (MaNV, GioDen, Ngay, Thang) 
                        VALUES ('$MaNV', '$GioDen', '$Ngay', '$Thang')";
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