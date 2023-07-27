<?php
 // Thông tin cấu hình MySQL
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "test";

    // Kết nối tới MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
    }

?>