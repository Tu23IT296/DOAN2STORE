<?php
// Hàm currency_format dùng để định dạng một số tiền thành dạng có phân cách hàng nghìn và thêm đơn vị tiền tệ

function currency_format($number, $suffix = 'đ'){
    // Hàm number_format dùng để định dạng số với phân cách hàng nghìn
    return number_format($number) . $suffix;  // Thêm đơn vị tiền tệ vào sau số đã được định dạng
}
