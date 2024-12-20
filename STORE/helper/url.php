<?php
// Hàm base_url dùng để tạo ra URL đầy đủ từ cấu hình base URL và đường dẫn bổ sung

function base_url($url = "") {
    // Truy cập vào biến cấu hình toàn cục $config
    global $config;

    // Kết hợp base URL với đường dẫn bổ sung ($url) và trả về kết quả
    return $config['base_url'] . $url;
}
