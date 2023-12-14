<?php
    include '../Connect.php';
   include 'Job.php';

    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $CreateBy = isset($_POST['CreateBy']) ? $_POST['CreateBy']: '';
      
      if(isset($_POST['CreateBy'])){

          $query = "SELECT * FROM congviec WHERE CreateBy = '$CreateBy' ";
          $data = mysqli_query($conn, $query);
      
          while ($row = mysqli_fetch_assoc($data)){
            array_push($response, new CongViec(
                $row['MaNV'], 
                $row['MaCViec'], 
                $row['TenCViec'], 
                $row['DealineCV'], 
               $row['CreateBy'], 
                $row['CreateDate'], 
              //  $row['AsignedTo'], 
                $row['Status']
            ));
           }
      
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