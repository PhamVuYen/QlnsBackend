<?php

include '../Connect.php';

  static $MAX_TOKEN = 1;
  $userAgent = $_SERVER['HTTP_USER_AGENT'];

  $Expiration = new DateInterval('P3M');
  $Expirations = new DateTime('now');
  $Expirations->format('Y-m-d H:i:s');
  $Expirations ->add($Expiration);
  echo 'Current Date and Time: ' . $Expirations->format('Y-m-d H:i:s');

  $typeUsingFunction = gettype($Expirations);
echo "Type using gettype(): $typeUsingFunction";

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

        $query = "SELECT * FROM nhanvien WHERE MaNV = '$MaNV' AND `Password` = '$Password'";
        $data = mysqli_query($conn, $query);

        if($data && $data-> num_rows > 0){
            if(isset($_POST['MaNV']) && isset($_POST['Password'])){
                $Token = generateTokens('MaNV', 'Password');
                $sql = "INSERT INTO tokens (Token, User_id, Expiration_date)  VALUES ('$Token', '$MaNV', '$Expirations')";
    
                if($conn->query($sql) == TRUE){
                $response['message'] = 'done';
                }else{
                    $response['message'] = 'error';
    
                }
            }
            $response['success'] = true;
        }else {
            header("HTTP/1.1 401 Unauthorized");
            $response['success'] = false;
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
     }
echo json_encode($response);

function generateTokens($MaNV, $Password) {
    $secretKey = 'key';

    // Access Token
    $accessTokenPayload = array(
        "MaNV" => $MaNV,
        "Password" => $Password,
        "exp" => time() + (3 * 30 * 24 * 60 * 60) // 3 months validity
    );
    $accessToken = jwt_encode($accessTokenPayload, $secretKey);

    return $accessToken;
    
}

function jwt_encode($payload, $key) {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'SHA256']);
    $header = base64UrlEncode($header);
    $payload = base64UrlEncode(json_encode($payload));
    $signature = hash_hmac('SHA256', "$header.$payload", $key, true);
    $signature = base64UrlEncode($signature);

    return "$header.$payload.$signature";
}

function base64UrlEncode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

?>
