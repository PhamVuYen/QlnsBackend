<?php
    include '../Connect.php';
    include 'Time_Recorder.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        $NgayCong = isset($_POST['NgayCong']) ? $_POST['NgayCong']: '';
        $PhutDiMuon = isset($_POST['PhutDiMuon']) ? $_POST['PhutDiMuon']: '';
        $Thang = isset($_POST['Thang']) ? $_POST['Thang']: '';
 
        if(isset($_POST['MaNV']) && isset($_POST['NgayCong'])  && isset($_POST['PhutDiMuon']) && isset($_POST['Thang'])  ){

            $query = "INSERT INTO bangchamcong (MaNV, NgayCong, PhutDiMuon, Thang) 

                        VALUES ('$MaNV', '$NgayCong', '$PhutDiMuon', '$Thang')";
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