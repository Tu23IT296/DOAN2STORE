<?php
// Ngăn chặn truy cập trực tiếp vào file nếu không được định nghĩa hằng số APPPATH
defined('APPPATH') or exit('Không được quyền truy cập phần này');

// Bao gồm file cấu hình cơ sở dữ liệu
require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';

// Bao gồm file cấu hình chung cho ứng dụng
require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';

// Bao gồm file cấu hình email
require CONFIGPATH . DIRECTORY_SEPARATOR . 'email.php';

// Bao gồm file cấu hình autoload, định nghĩa các thư viện, helper được tải tự động
require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';

// Bao gồm lớp cốt lõi để làm việc với cơ sở dữ liệu
require LIBPATH . DIRECTORY_SEPARATOR . 'database.php';

// Bao gồm các lớp cốt lõi cơ bản cho ứng dụng (ví dụ: Controller, Model)
require COREPATH . DIRECTORY_SEPARATOR . 'base.php';

// Tự động tải các thành phần được khai báo trong autoload.php
if (is_array($autoload)) {
    foreach ($autoload as $type => $list_auto) {
        if (!empty($list_auto)) {
            foreach ($list_auto as $name) {
                // Hàm load() được sử dụng để tải các thành phần như library, helper, model
                load($type, $name);
            }
        }
    }
}

// Kết nối cơ sở dữ liệu sử dụng thông tin cấu hình từ database.php
db_connect($db);

// Bao gồm router để định tuyến các yêu cầu HTTP đến các controller và action tương ứng
require COREPATH . DIRECTORY_SEPARATOR . 'router.php';
