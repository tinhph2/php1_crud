<?php
include 'connect.php';
// Kiểm tra xem form đã được submit hay chưa
if(isset($_POST['submit'])){
    // lấy tên sản phẩm từ form 
    $namepro = $_POST['namepro'];
    $target_dir = "uploads/";
    // đường dẫn đến thư mục lưu trữ file
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // gán trạng thái upload file = 1 (thành cồng)
    $uploadOk = 1;
    // lấy định dạng ảnh
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Kiểm tra xem file đã tồn tại hay chưa
    if (file_exists($target_file)) {
        echo "File đã tồn tại.";
        // bật trạng thái upload khi file lỗi
        $uploadOk = 0;
    }
    // Kiểm tra kích thước file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File quá lớn.";
        $uploadOk = 0;
    }
    // Kiểm tra định dạng file
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Chỉ chấp nhận file JPG, JPEG, PNG và GIF.";
        $uploadOk = 0;
    }
    // Kiểm tra nếu $uploadOk = 0, tức là có lỗi xảy ra
    if ($uploadOk == 0) {
        echo "Tập tin không được tải lên.";
    } else {
        // Di chuyển file từ thư mục tạm lên thư mục đích
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // lấy địa chỉ ảnh sau khi đã upload thành công
            $path = $target_dir.basename( $_FILES["fileToUpload"]["name"]);
             // Chèn vào bảng product trong cơ sở dữ liệu test
            $query = "INSERT INTO product (namepro, image_url) VALUES ('$namepro','$path')";
            $result = mysqli_query($conn, $query);
            // Kiểm tra kết quả truy vấn
            if ($result) {
                echo "Thêm sản phẩm thành công.";
            } else {
                echo "Có lỗi xảy ra: " . mysqli_error($connection);
            }
        } else {
            echo "Có lỗi xảy ra khi tải lên file.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="viewpro.php">Danh sách </a> <br>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        Name<input type="text" name="namepro" id="namepro"><br>
        <input type="file" name="fileToUpload" id="fileToUpload"> <br>
        <input type="submit" value="Upload File" name="submit">
    </form>     
</body>
</html>