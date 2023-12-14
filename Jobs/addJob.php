<?php
    include '../Connect.php';
    include 'Job.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        $MaCViec = isset($_POST['MaCViec']) ? $_POST['MaCViec']: '';
        $TenCViec = isset($_POST['TenCViec']) ? $_POST['TenCViec']: '';
        $DealineCV = isset($_POST['DealineCV']) ? $_POST['DealineCV']: '';
       $CreateBy = isset($_POST['CreateBy']) ? $_POST['CreateBy']: '';
        $CreateDate = isset($_POST['CreateDate']) ? $_POST['CreateDate']: '';
      //  $AsignedTo = isset($_POST['AsignedTo']) ? $_POST['AsignedTo']: '';
      $Status = isset($_POST['Status']) ? $_POST['Status']: '';

        if(isset($_POST['MaNV']) && isset($_POST['MaCViec']) && isset($_POST['TenCViec']) && isset($_POST['DealineCV']) && isset($_POST['CreateDate']) && isset($_POST['Status'])&& isset($_POST['CreateBy'])){

            $query = "INSERT INTO congviec (MaNV, MaCViec, TenCViec, DealineCV, CreateDate, Status,CreateBy) 
                        VALUES ('$MaNV', '$MaCViec', '$TenCViec', '$DealineCV', '$CreateDate', '$Status','$CreateBy')";
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