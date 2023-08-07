<!DOCTYPE html>
<html>
<head>
    <title>Gửi Email</title>
</head>
<body>
<?php
// nhúng file để sử dụng cấu hình
include 'mail/process_send_mail.php';
// Xử lý khi form submit
if(isset($_POST['submit'])) {
    // Lấy các giá trị từ form
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // Gửi email
    echo var_dump(send_email($to, $subject, $message));
    if(send_email($to, $subject, $message)) {
        echo "Đã gửi email thành công!";
    } else {
        echo "Gửi email thất bại!";
    }
}
?>
<h2>Form gửi email</h2>
<form method="POST" action="">
    <label for="to">Người nhận:</label><br>
    <input type="text" name="to" id="to" required><br><br>
    <label for="subject">Tiêu đề:</label><br>
    <input type="text" name="subject" id="subject" required><br><br>
    <label for="message">Nội dung:</label><br>
    <textarea name="message" id="message" rows="5" required></textarea><br><br>
    <input type="submit" name="submit" value="Gửi Email">
</form>
</body>
</html>