<?php
// Hàm show_array dùng để in ra nội dung của một mảng dưới dạng dễ đọc

function show_array($data) {
    // Kiểm tra xem biến $data có phải là mảng hay không
    if (is_array($data)) {
        // Nếu là mảng, in ra nội dung của mảng
        echo "<pre>";  // Thẻ <pre> giúp hiển thị mảng theo dạng có định dạng (có thụt lề, dễ đọc)
        print_r($data);  // Hàm print_r in ra cấu trúc của mảng
        echo "<pre>";  // Đóng thẻ <pre>
    }
}
