<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "raovat";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy ID từ URL
    $id = $_GET['id'];

    // Thực hiện truy vấn xóa bài viết
    $query = "DELETE FROM product WHERE Id = $id";

    if ($conn->query($query) === TRUE) {
        echo "Bài viết đã được xóa thành công.";
        header("refresh:2;url=managepost.php");
    } else {
        echo "Có lỗi xảy ra khi xóa bài viết: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "ID không hợp lệ.";
}
?>
