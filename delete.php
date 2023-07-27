<?php
// Kiểm tra xem có parameter ID được truyền vào hay không
if(isset($_GET['id'])){
    include 'connect.php';
    // Lấy giá trị ID từ parameter
    $id = $_GET['id'];

    // Thực thi truy vấn để xóa sản phẩm từ cơ sở dữ liệu
    $query = "DELETE FROM sanpham WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả truy vấn
    if ($result) {
        echo "Xóa sản phẩm thành công.";

        header("Location: read.php");

    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($conn);
        print("<a href='read.php'>Danh sách sản phẩm</a>");
    }

    // Đóng kết nối
    mysqli_close($conn);
} else {
    echo "Không tìm thấy sản phẩm để xóa.";
    print("<a href='read.php'>Danh sách sản phẩm</a>");
}
?>