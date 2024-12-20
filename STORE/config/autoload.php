<?php
// Đảm bảo rằng file này chỉ được truy cập từ trong ứng dụng (tránh truy cập trực tiếp qua URL)
defined('APPPATH') or exit('Không được quyền truy cập phần này');

// Khai báo một mảng autoload để tự động tải các thư viện (libraries)
// Hiện tại, mảng 'lib' đang rỗng, tức là không có thư viện nào được tự động tải
$autoload['lib'] = array();

// Khai báo một mảng autoload để tự động tải các helper
// Helper 'data' sẽ được tự động tải để sử dụng các hàm hỗ trợ liên quan đến xử lý dữ liệu
$autoload['helper'] = array('data');
