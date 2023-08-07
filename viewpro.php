<?php
include 'connect.php';
// Truy vấn danh sách các sản phẩm
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
    <style>
        img{
            width: 70px;
            height: 90px;
        }

    </style>
</head>

<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="addpro.php">Thêm sản phẩm mới</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
          
        </tr>
        <?php
        // Hiển thị danh sách sản phẩm từ cơ sở dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><img  src = ".$row['image_url']."></td>";
            echo "<td>" . $row['namepro'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
// Đóng kết nối
mysqli_close($conn);
?>