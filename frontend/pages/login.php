<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';

// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

// 2. Nếu người dùng có bấm nút Đăng nhập thì thực thi câu lệnh
if(isset($_POST['btnDangNhap']))
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Câu lệnh SELECT
    $sql = "SELECT * FROM `khachhang` WHERE kh_tendangnhap='$username' and kh_matkhau='$password';";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $result = mysqli_query($conn, $sql);
    
    // Sử dụng hàm `mysqli_num_rows()` để đếm số dòng SELECT được
    // Nếu có bất kỳ dòng dữ liệu nào SELECT được <-> Người dùng có tồn tại và đã đúng thông tin USERNAME, PASSWORD
    if(mysqli_num_rows($result)>0) {
        $data = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $data[] = array(
                'kh_tendangnhap' => $row['kh_tendangnhap'],
                'kh_ten' => $row['kh_ten'],
                'kh_trangthai' => $row['kh_trangthai'],
            );
        }

        if($data[0]['kh_trangthai'] != 1) { //Chưa kích hoạt tài khoản
            echo $twig->render('frontend/pages/user-not-activated.html.twig' );
        }
        else { //Đã kích hoạt
            // echo 'Đăng nhập thành công!';
            $_SESSION['username'] = $username;
            $_SESSION['trangthai'] = 1; // 1: Đăng nhập thành công; 0: Thất bại
            header('location:home.php');
        }
    }
    else {
        $loidangnhap = 'Đăng nhập thất bại!';
        // Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/pages/login.html.twig`
        // với dữ liệu truyền vào file giao diện được đặt tên là `login`
        echo $twig->render('frontend/pages/login.html.twig', [
            'loidangnhap' => $loidangnhap
        ]);
    }
    // Đóng kết nối
    mysqli_close($conn);

}
else {
    // Nếu trong SESSION có giá trị của key 'username' <-> người dùng đã đăng nhập thành công
    // Điều hướng người dùng về trang DASHBOARD
    if(isset($_SESSION['username'])) {
        // echo "<h1>Xin chào mừng ". $_SESSION['username'] ."</h1>";
        // echo session_save_path();
        header('location:home.php');
    }
    else {
        // Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/pages/login.html.twig`
        // với dữ liệu truyền vào file giao diện được đặt tên là `login`
        echo $twig->render('frontend/pages/login.html.twig');
    }
}