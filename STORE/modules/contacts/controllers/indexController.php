<?php

// Hàm construct được gọi khi đối tượng controller được tạo ra
function construct()
{
	// Tải model có tên 'index'
	load_model('index');
}

// Hàm contactAction xử lý yêu cầu liên quan đến trang liên hệ
function contactAction()
{
	// Tải view 'contact' để hiển thị trang liên hệ
	load_view('contact');
}
function introduceAction()
{
    $data = array();

    if (!empty($_SESSION['id_customer'])) {
        $user_id = $_SESSION['id_customer'];

        // Xử lý khi người dùng gửi form cập nhật
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $update_data = array(
                'fullname' => $_POST['fullname'], // Họ và tên
                'mail'     => $_POST['mail'],     // Email
                'phone'    => $_POST['phone'],    // Số điện thoại
                'address'  => $_POST['address'],  // Địa chỉ
            );

            // Gọi hàm updateUser để lưu thông tin
            if (updateUser($user_id, $update_data)) {
                $data['success'] = "Cập nhật thông tin thành công!";
            } else {
                $data['error'] = "Cập nhật thất bại, vui lòng thử lại.";
            }
        }

        // Lấy thông tin người dùng
        $data['user_info'] = getUserById($user_id);
        $data['order_history'] = getListOrder($user_id);
    } else {
        $data['user_info'] = null;
        $data['order_history'] = null;
    }

    // Tải view và truyền dữ liệu vào
    load_view('introduce', $data);
}
