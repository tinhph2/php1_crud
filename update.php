<?php
// Kết nối tới cơ sở dữ liệu MySQL
include 'connect.php';
// Kiểm tra xem form đã được submit hay chưa trong trường hợp lưu
if (isset($_POST['submit'])) {
    // Lấy giá trị từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    // Thực thi truy vấn để cập nhật sản phẩm trong cơ sở dữ liệu
    $query = "UPDATE sanpham SET name = '$name', description = '$description', price = '$price' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    // Kiểm tra kết quả truy vấn
    if ($result) {
        echo "Cập nhật sản phẩm thành công.";
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($conn);
    }
    // Đóng kết nối
    mysqli_close($conn);
} elseif (isset($_GET['id'])) { // trong trường hợp lấy id khi click vào link ở trang danh sách
    // Lấy giá trị ID từ parameter
    $id = $_GET['id'];
    // Truy vấn sản phẩm dựa trên ID
    $query = "SELECT * FROM sanpham WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    // Kiểm tra kết quả truy vấn
    if ($result) {
        $row = mysqli_fetch_assoc($result); 
        $name = $row['name']; // lấy dữ liệu theo cột
        $description = $row['description'];
        $price = $row['price'];
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($conn);
    }
    // Đóng kết nối
    mysqli_close($conn);
} else {
    echo "Không tìm thấy sản phẩm để cập nhật.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật sản phẩm
    </title>
</head>
<body>
    <a href="read.php">Danh sách sản phẩm</a>
    <h2>Cập nhật sản phẩm</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required><br>
        <label for="description">Mô tả:</label>
        <textarea name="description" required><?php echo $description; ?></textarea><br>
        <label for="price">Giá:</label>
        <input type="number" name="price" value="<?php echo $price; ?>" required><br>
        <input type="submit" name="submit" value="Cập nhật sản phẩm">
    </form>
</body>
</html>