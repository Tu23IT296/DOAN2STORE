<?php require 'layout/header.php'; ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Trang chủ Admin</h3>
                </div>
            </div>
            <!-- Thêm các nút truy cập danh sách với icon -->
            <div class="section">
                <div class="clearfix">
                    <div class="btn-container fl-right">
                        <a href="?modules=blogs&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-pen-square"></i> Danh sách Bài Viết
                        </a>
                        <a href="?modules=products&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-box-open"></i> Danh sách Sản Phẩm
                        </a>
                        <a href="?modules=categorys&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-th-large"></i> Danh sách Danh Mục
                        </a>
                        <a href="?modules=brands&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-tags"></i> Danh sách Thương Hiệu
                        </a>
                        <a href="?modules=orders&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-shopping-cart"></i> Danh sách Đơn Hàng
                        </a>
                        <a href="?modules=customers&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-users"></i> Danh sách Khách Hàng
                        </a>
                        <a href="?modules=sliders&controllers=index&action=list" class="btn-custom">
                            <i class="fas fa-images"></i> Danh sách Slider
                        </a>
                        <!-- Thêm nút truy cập thống kê sản phẩm -->
                        <a href="?modules=statistics&controllers=products&action=list" class="btn-custom">
                            <i class="fas fa-chart-bar"></i> Thống kê Sản Phẩm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'layout/footer.php'; ?>
</div>

<!-- Thêm CSS ở đây -->
<style>
    /* Định dạng container chứa các nút */
    .btn-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 20px;
    }

    /* Định dạng từng nút */
    .btn-custom {
        display: inline-block;
        padding: 15px 25px;
        margin: 10px;
        background-color: #4fa327;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
        width: 220px;
        transition: background-color 0.3s, transform 0.3s ease;
        text-transform: uppercase;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-custom i {
        margin-right: 10px;
    }

    /* Hiệu ứng hover */
    .btn-custom:hover {
        background-color: #fff;
        transform: translateY(-3px);
    }

    /* Hiệu ứng khi nút bị nhấn */
    .btn-custom:active {
        transform: translateY(1px);
    }

    /* Cải thiện accessibility */
    .btn-custom:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
    }

    /* Đảm bảo các nút được căn chỉnh đẹp trên màn hình nhỏ */
    @media (max-width: 768px) {
        .btn-container {
            flex-direction: column;
            align-items: center;
        }

        .btn-custom {
            width: 100%;
        }
    }
</style>