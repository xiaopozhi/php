<?php
// 数据库连接信息
$host = 'localhost';
$username = 'root';
$password = 'password';
$database = 'test_db';

// 建立数据库连接
$conn = mysqli_connect($host, $username, $password, $database);

// 检查连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

// 从GET请求中获取用户ID
$user_id = $_GET['id'];

// 不安全的SQL查询（容易受到SQL注入攻击）
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

// 显示结果
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "没有找到结果";
}

// 关闭连接
mysqli_close($conn);
?>