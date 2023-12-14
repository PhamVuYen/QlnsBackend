<?php
    include '../Connect.php';
    include 'Time_Recorder.php';

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        $Thang = isset($_POST['Thang']) ? $_POST['Thang']: '';

        if(isset($_POST['MaNV']) && isset($_POST['Thang'])  ){

            $query = "SELECT * FROM bangchamcong WHERE MaNV = '$MaNV' AND Thang = '$Thang'";
            $data = mysqli_query($conn, $query);
               while ($row = mysqli_fetch_assoc($data)){
                array_push($response, new TimeRecorder(
                    $row['MaNV'], 
                    $row['NgayCong'], 
                    $row['PhutDiMuon'], 
                    $row['Thang']
                ));
               }
            // if($conn->query($query) == TRUE){
            //      $response['message'] = "done";
            // }else{
            //     $response['message'] = "error";
            // }
         echo json_encode($response);
        }else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }

     }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
     }
   
   
?>