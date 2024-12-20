<?php

// Cấu hình gửi email sử dụng giao thức SMTP
$email = Array(
    // Giao thức gửi email, ở đây là SMTP (Simple Mail Transfer Protocol)
    'protocol' => 'smtp',
    
    // Địa chỉ máy chủ SMTP. Ở đây sử dụng Google SMTP với SSL
    'smtp_host' => 'ssl://smtp.googlemail.com',
    
    // Cổng giao tiếp SMTP, 465 là cổng bảo mật sử dụng SSL
    'smtp_port' => 465,
    
    // Tên đăng nhập tài khoản email (chưa được cung cấp, cần điền vào)
    'smtp_user' => '',
    
    // Mật khẩu tài khoản email (chưa được cung cấp, cần điền vào)
    'smtp_pass' => '',
    
    // Thời gian chờ tối đa cho một kết nối SMTP (tính bằng giây)
    'smtp_timeout' => '7',
    
    // Loại email được gửi, ở đây là HTML để hỗ trợ định dạng nội dung phức tạp
    'mailtype' => 'html',
    
    // Bộ ký tự sử dụng trong email, ở đây là UTF-8 để hỗ trợ đa ngôn ngữ
    'charset' => 'UTF-8'
);
