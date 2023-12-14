<?php
    include '../Connect.php';
    include 'Job.php';

    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
      
      if(isset($_POST['MaNV'])){

          $query = "SELECT *  FROM congviec WHERE MaNV = '$MaNV' ";
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
      
        //   if($conn->query($query) == TRUE){
        //        $response['message'] = "done";
        //   }else{
        //       $response['message'] = "error";
        //   }
      
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