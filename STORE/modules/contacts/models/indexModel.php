<?php

// Hàm getUserById: Truy vấn thông tin người dùng dựa trên ID người dùng
function getUserById($user_id)
{
    // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng từ bảng 'tbl_customer' theo 'id' người dùng
    // Hàm db_fetch_row sẽ trả về một mảng chứa thông tin của người dùng
    $result = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `id` = '$user_id'");

    // Trả về kết quả truy vấn (thông tin người dùng)
    return $result;
}

// Hàm getListOrder: Truy vấn danh sách đơn hàng của khách hàng theo ID khách hàng
function getListOrder($id_customer)
{
    // Truy vấn cơ sở dữ liệu để lấy danh sách đơn hàng của khách hàng từ bảng 'tbl_order' theo 'custom_id' (ID khách hàng)
    // Hàm db_fetch_array sẽ trả về một mảng chứa tất cả các đơn hàng của khách hàng
    return db_fetch_array("SELECT * FROM `tbl_order` WHERE `custom_id` = '$id_customer'");
}
// Cập nhật thông tin người dùng
function updateUser($user_id, $data)
{
    // Hàm db_update sẽ thực thi lệnh UPDATE SQL
    return db_update('tbl_customer', $data, "`id` = '$user_id'");
}
