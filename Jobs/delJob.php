<?php
    include '../Connect.php';
    include 'Job.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaCViec = isset($_POST['MaCViec']) ? $_POST['MaCViec']: '';
        
        if(isset($_POST['MaCViec']) ){

            $query = "DELETE FROM congviec WHERE  MaCViec ='$MaCViec' ";
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