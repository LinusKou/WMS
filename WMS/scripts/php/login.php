
<?php
// 数据库连接
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 接收 POST 数据
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

// 查询数据库
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    // 登录成功
    $response['success'] = true;
} else {
    // 登录失败
    $response['success'] = false;
}

echo json_encode($response);

$conn->close();
?>