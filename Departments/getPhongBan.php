<?php
include '../Connect.php';
include 'Department.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $token = isset($_POST['token']) ? $_POST['token'] : '';
    $headers = getallheaders();
    $token = isset($headers['Authorization']) ? trim(str_replace('Bearer', '', $headers['Authorization'])) : '';
    $secretKey = 'key'; // Replace with your actual secret key

    // Split the token into parts
    list($header, $payload, $signature) = explode('.', $token);

    // Verify the signature
    $expectedSignature = hash_hmac('sha256', "$header.$payload", $secretKey, true);
    $expectedSignatureBase64 = rtrim(strtr(base64_encode($expectedSignature), '+/', '-_'), '=');

    if ($expectedSignatureBase64 !== $signature) {
        http_response_code(401); // Unauthorized
        echo json_encode(array('message' => 'Invalid signature.'));
        exit;
    }

    // Decode the payload
    $decodedPayload = json_decode(base64_decode($payload));

    // If needed, you can perform additional checks on the decoded payload here

    // If the signature is valid, proceed with the payload
    $role = $decodedPayload->ChucVu;

    // Perform actions based on the role
    if ($role === 'ADMIN') {
        $query = "SELECT * FROM phongban";
        $data = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($data)) {
            array_push($response, new PhongBan(
                $row['MaPB'],
                $row['TenPB']
            ));
        }
        echo json_encode($response);
    } 
    
    // elseif ($role === 'Trưởng phòng') {
    //     echo json_encode(array('message' => 'Regular user authenticated.'));
    // } else {
    //     http_response_code(403); // Forbidden
    //     echo json_encode(array('message' => 'Invalid role.'));
    // }
}
?>
