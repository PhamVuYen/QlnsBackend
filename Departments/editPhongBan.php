<?php
    include '../Connect.php';
    include 'Department.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $TenPB = isset($_POST['TenPB']) ? $_POST['TenPB']: '';
        $MaPB = isset($_POST['MaPB']) ? $_POST['MaPB']: '';
       
        
        if(isset($_POST['MaPB']) && isset($_POST['TenPB']) ){

            $query = "UPDATE phongban SET TenPB = '$TenPB' WHERE MaPB = '$MaPB' ";
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
