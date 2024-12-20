<?php

// Ngăn chặn truy cập trực tiếp vào file nếu không được định nghĩa hằng số APPPATH
defined('APPPATH') or exit('Không được quyền truy cập phần này');

// Lấy tên controller từ URL, nếu không có thì lấy giá trị mặc định từ cấu hình
function get_controller()
{
    global $config;
    $controller = isset($_GET['controllers']) ? $_GET['controllers'] : $config['default_controller'];
    return $controller;
}

// Lấy tên module từ URL, nếu không có thì lấy giá trị mặc định từ cấu hình
function get_module()
{
    global $config;
    $module = isset($_GET['modules']) ? $_GET['modules'] : $config['default_module'];
    return $module;
}

// Lấy tên action từ URL, nếu không có thì lấy giá trị mặc định từ cấu hình
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}

// Hàm tải các thành phần như thư viện (lib) hoặc helper từ thư mục tương ứng
function load($type, $name)
{
    if ($type == 'lib')
        $path = LIBPATH . DIRECTORY_SEPARATOR . "{$name}.php";  // Thư viện
    if ($type == 'helper')
        $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";  // Helper

    // Kiểm tra nếu file tồn tại, thì bao gồm nó
    if (file_exists($path)) {
        require "$path";
    } else {
        echo "{$type}:{$name} không tồn tại";  // Nếu file không tồn tại, hiển thị thông báo lỗi
    }
}

// Hàm gọi một danh sách các hàm được chỉ định trong mảng
function call_function($list_function = array())
{
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f())) {
                $f();  // Gọi hàm nếu nó tồn tại
            }
        }
    }
}

// Hàm tải view từ module hiện tại, có thể truyền dữ liệu cho view
function load_view($name, $data_send = array())
{
    global $data;
    $data = $data_send;  // Dữ liệu gửi đến view
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';  // Đường dẫn tới view

    // Kiểm tra nếu view tồn tại, bao gồm nó
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key_data => $v_data) {
                $$key_data = $v_data;  // Chuyển dữ liệu thành biến
            }
        }
        require $path;  // Bao gồm file view
    } else {
        echo "Không tìm thấy {$path}";  // Nếu không tìm thấy view, hiển thị thông báo lỗi
    }
}

// Hàm tải model từ module hiện tại
function load_model($name)
{
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $name . 'Model.php';  // Đường dẫn tới model

    // Kiểm tra nếu model tồn tại, bao gồm nó
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Không tìm thấy {$path}";  // Nếu không tìm thấy model, hiển thị thông báo lỗi
    }
}

// Hàm lấy header từ layout, có thể chỉ định tên header khác
function get_header($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'header';  // Nếu không chỉ định tên, dùng header mặc định
    } else {
        $name = "header-{$name}";  // Nếu có chỉ định tên, lấy header theo tên đó
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';  // Đường dẫn tới header

    // Kiểm tra nếu header tồn tại, bao gồm nó
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;  // Chuyển dữ liệu thành biến
            }
        }
        require $path;  // Bao gồm file header
    } else {
        echo "Không tìm thấy {$path}";  // Nếu không tìm thấy header, hiển thị thông báo lỗi
    }
}

// Hàm lấy footer từ layout, có thể chỉ định tên footer khác
function get_footer($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'footer';  // Nếu không chỉ định tên, dùng footer mặc định
    } else {
        $name = "footer-{$name}";  // Nếu có chỉ định tên, lấy footer theo tên đó
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';  // Đường dẫn tới footer

    // Kiểm tra nếu footer tồn tại, bao gồm nó
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;  // Chuyển dữ liệu thành biến
            }
        }
        require $path;  // Bao gồm file footer
    } else {
        echo "Không tìm thấy {$path}";  // Nếu không tìm thấy footer, hiển thị thông báo lỗi
    }
}

// Hàm lấy sidebar từ layout, có thể chỉ định tên sidebar khác
function get_sidebar($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'sidebar';  // Nếu không chỉ định tên, dùng sidebar mặc định
    } else {
        $name = "{$name}";  // Nếu có chỉ định tên, lấy sidebar theo tên đó
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';  // Đường dẫn tới sidebar

    // Kiểm tra nếu sidebar tồn tại, bao gồm nó
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;  // Chuyển dữ liệu thành biến
            }
        }
        require $path;  // Bao gồm file sidebar
    } else {
        echo "Không tìm thấy {$path}";  // Nếu không tìm thấy sidebar, hiển thị thông báo lỗi
    }
}

// Hàm lấy phần template từ layout
function get_template_part($name)
{
    global $data;
    if (empty($name))
        return FALSE;  // Nếu tên template không có, trả về false
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . "template-{$name}.php";  // Đường dẫn tới template

    // Kiểm tra nếu template tồn tại, bao gồm nó
    if (file_exists($path)) {
        foreach ($data as $key => $a) {
            $$key = $a;  // Chuyển dữ liệu thành biến
        }
        require $path;  // Bao gồm file template
    } else {
        echo "Không tìm thấy {$path}";  // Nếu không tìm thấy template, hiển thị thông báo lỗi
    }
}
