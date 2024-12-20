<?php
function getStatisticsByDate($groupBy = 'month')
{
    // Tùy chọn nhóm theo ngày, tuần hoặc tháng
    $dateFormat = match ($groupBy) {
        'day' => '%Y-%m-%d',
        'week' => '%Y-%u',
        'month' => '%Y-%m',  
        default => '%Y-%m-%d'
    };

    // Truy vấn thống kê doanh thu theo tháng
    $statistics = db_fetch_array("  
        SELECT 
            DATE_FORMAT(o.create_date, '{$dateFormat}') AS period,
            IFNULL(SUM(do.qty * p.price), 0) AS total_revenue  -- Tính tổng doanh thu
        FROM tbl_order o
        JOIN tbl_detail_order do ON o.id = do.id_order
        JOIN tbl_product p ON do.id_product = p.id
        WHERE o.status = 'Thành công'  -- Chỉ tính các đơn hàng thành công
        GROUP BY period
        ORDER BY period ASC 
    ");

    return $statistics;
}

function getProductsSoldByMonth()
{
    // Truy vấn số sản phẩm bán được theo tháng
    $statistics = db_fetch_array("
        SELECT 
            DATE_FORMAT(o.create_date, '%Y-%m') AS period,  -- Nhóm theo năm-tháng
            IFNULL(SUM(do.qty), 0) AS total_products  -- Tính tổng số sản phẩm bán được
        FROM tbl_order o
        JOIN tbl_detail_order do ON o.id = do.id_order
        WHERE o.status = 'Thành công'  -- Chỉ tính các đơn hàng thành công
        GROUP BY period
        ORDER BY period ASC 
    ");

    return $statistics;
}

function getStatisticsData()
{
    // Thống kê tổng số liệu
    $total_products = db_fetch_row("SELECT COUNT(*) AS total FROM `tbl_product`")['total'];
    $total_customers = db_fetch_row("SELECT COUNT(*) AS total FROM `tbl_customer`")['total'];
    $total_orders = db_fetch_row("SELECT COUNT(*) AS total FROM `tbl_order`")['total'];
    $total_blogs = db_fetch_row("SELECT COUNT(*) AS total FROM `tbl_blog`")['total'];

    // Thống kê doanh thu theo tháng
    $monthly_statistics = getStatisticsByDate('month');  // Lấy thống kê doanh thu theo tháng

    // Thống kê số sản phẩm bán được theo tháng
    $monthly_products_sold = getProductsSoldByMonth();  // Lấy thống kê số sản phẩm bán được theo tháng

    return [
        'total_products' => $total_products,
        'total_customers' => $total_customers,
        'total_orders' => $total_orders,
        'total_blogs' => $total_blogs,
        'monthly_statistics' => $monthly_statistics,  // Thêm thống kê doanh thu theo tháng
        'monthly_products_sold' => $monthly_products_sold,  // Thêm thống kê số sản phẩm bán được theo tháng
    ];
}
