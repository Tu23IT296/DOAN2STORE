<?php
// Triệu gọi đến file xử lý thông qua request

// Xây dựng đường dẫn đến controller cần gọi, dựa trên module và controller hiện tại
$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';

// Kiểm tra xem file controller có tồn tại không
if (file_exists($request_path)) {
    // Nếu file tồn tại, bao gồm file controller vào
    require $request_path;
} else {
    // Nếu file không tồn tại, hiển thị thông báo lỗi với đường dẫn không tìm thấy
    echo "Không tìm thấy:$request_path ";
}

// Xây dựng tên hàm action cần gọi, thêm hậu tố 'Action' vào tên action
$action_name = get_action() . 'Action';

// Gọi các hàm đã được định nghĩa (ví dụ: hàm construct và action)
call_function(array('construct', $action_name));
