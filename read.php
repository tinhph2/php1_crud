<?php
include 'connect.php';
// Truy vấn danh sách các sản phẩm
$query = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sản phẩm</title>
</head>

<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="create.php">Thêm sản phẩm mới</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        <?php
        // Hiển thị danh sách sản phẩm từ cơ sở dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>";
            echo "<a href='update.php?id=" . $row['id'] . "'>Sửa</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Xóa</a>";
            echo "</td>";
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