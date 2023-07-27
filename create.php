<?php
// Kết nối tới cơ sở dữ liệu MySQL
include('connect.php');
// Kiểm tra xem form đã được submit hay chưa
if (isset($_POST['submit'])) {

    // Lấy giá trị từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Thực thi truy vấn để thêm sản phẩm mới vào cơ sở dữ liệu
    $query = "INSERT INTO sanpham (name, description, price) VALUES ('$name', '$description', '$price')";
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả truy vấn
    if ($result) {
        echo "Thêm sản phẩm thành công.";
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($connection);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thêm sản phẩm</title>
</head>

<body>
    <h2>Thêm sản phẩm</h2>
    <a href="read.php">Danh sách sản phẩm</a>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" required><br>

        <label for="description">Mô tả:</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Giá:</label>
        <input type="number" name="price" required><br>

        <input type="submit" name="submit" value="Thêm sản phẩm">
    </form>

</body>

</html>