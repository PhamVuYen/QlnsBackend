<?php
    include '../Connect.php';

    $response = array();
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        $GioDen = isset($_POST['GioDen']) ? $_POST['GioDen']: '';
        $Ngay = isset($_POST['Ngay']) ? $_POST['Ngay']: '';

        if(isset($_POST['MaNV']) && isset($_POST['Ngay'])  ){

            $query = "SELECT GioDen FROM bangchamcongngay WHERE MaNV = '$MaNV' AND Ngay = '$Ngay' ";
            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($data)){
             array_push($response, new TimeRecorder(
                 $row['GioDen']
             ));
            }
        
        }else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }

     }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
     }
    

  class TimeRecorder{
         public $GioDen;
     
      function __construct( $GioDen)
      {
          $this->GioDen = $GioDen;
    

      }
  }
     echo json_encode($response);
?>