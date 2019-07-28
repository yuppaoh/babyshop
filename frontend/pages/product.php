<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';

// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

// 2. Chuẩn bị câu truy vấn $sql
// Sử dụng HEREDOC của PHP để tạo câu truy vấn SQL với dạng dễ đọc, thân thiện với việc bảo trì code
$sql = <<<EOT
    SELECT sp.*
        , lsp.lsp_ten
        , nsx.nsx_ten
        , km.km_ten, km.km_noidung, km.km_tungay, km.km_denngay, hsp.hsp_tentaptin
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    JOIN `nhasanxuat` nsx ON sp.nsx_ma = nsx.nsx_ma
    JOIN `hinhsanpham` hsp ON sp.sp_ma = hsp.sp_ma
    LEFT JOIN `khuyenmai` km ON sp.km_ma = km.km_ma
    ORDER BY sp.sp_ma DESC
EOT;
$sql_a = <<<EOT
    SELECT *
    FROM `hinhsanpham` hsp
    JOIN `sanpham` sp on hsp.sp_ma = sp.sp_ma
EOT;

// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sql);
// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$data = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
 /*   $km_tomtat = '';
    if(!empty($row['km_ten'])) {
        // Sử dụng hàm sprintf() để chuẩn bị mẫu câu với các giá trị truyền vào tương ứng từng vị trí placeholder
        $km_tomtat = sprintf("Khuyến mãi %s, nội dung: %s, thời gian: %s-%s", 
            $row['km_ten'],
            $row['km_noidung'],
            // Sử dụng hàm date($format, $timestamp) để chuyển đổi ngày thành định dạng Việt Nam (ngày/tháng/năm)
            // Do hàm date() nhận vào là đối tượng thời gian, chúng ta cần sử dụng hàm strtotime() để chuyển đổi từ chuỗi có định dạng 'yyyy-mm-dd' trong MYSQL thành đối tượng ngày tháng
            date('d/m/Y', strtotime($row['km_tungay'])),    //vd: '2019-04-25'
            date('d/m/Y', strtotime($row['km_denngay'])));  //vd: '2019-05-10'
    }*/
    $data[] = array(
        'hsp_tentaptin' => $row['hsp_tentaptin'],
        'sp_gia' => number_format($row['sp_gia'], 0, ".", ",") . ' vnđ',
        'sp_ten' => $row['sp_ten'],   

        'sp_ma' => $row['sp_ma'],
        
        'sp_mota_ngan' => $row['sp_mota_ngan'],
        'sp_mota_chitiet' => $row['sp_mota_chitiet'],
   
        'km_ma' => $row['km_ma'],
        // Các cột dữ liệu lấy từ liên kết khóa ngoại

        'lsp_ten' => $row['lsp_ten'],
        // 'nsx_ten' => $row['nsx_ten'],
        // 'km_tomtat' => $km_tomtat,
        
    );
}
// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/sanpham/index.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là `ds_sanpham`
echo $twig->render('frontend/pages/product.html.twig', ['ds_hinhsanpham' => $data] );
