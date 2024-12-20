<?php
// Khởi tạo session để lưu trữ và quản lý dữ liệu người dùng trong suốt phiên làm việc
session_start();

// Thiết lập cấu hình cơ bản của ứng dụng web
// Địa chỉ URL gốc của ứng dụng, sử dụng localhost trong quá trình phát triển
$config['base_url'] = "http://localhost/DOAN2/STORE/";

// Module mặc định được tải khi không chỉ định module nào trong URL
$config['default_module'] = 'home';

// Controller mặc định được tải khi không chỉ định controller nào trong module
$config['default_controller'] = 'index';

// Action mặc định được thực thi khi không chỉ định action nào trong controller
$config['default_action'] = 'index';
