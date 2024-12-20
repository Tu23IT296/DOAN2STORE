<?php get_header(); ?>
<style>
    /* Breadcrumb styling */
    #breadcrumb-wp {
        background-color: #f4f4f4;
        padding: 15px 0;
    }

    #breadcrumb-wp .list-item {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #breadcrumb-wp .list-item li {
        margin-right: 10px;
    }

    #breadcrumb-wp .list-item li a {
        color: #555;
        text-decoration: none;
        font-weight: 500;
    }

    #breadcrumb-wp .list-item li::after {
        content: "/";
        margin-left: 10px;
        color: #aaa;
    }

    #breadcrumb-wp .list-item li:last-child::after {
        content: "";
    }

    /* Main content wrapper styling */
    #wrapper {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    /* Section styling */
    .section {
        background: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        flex: 1;
        /* Đảm bảo các phần tử chiếm không gian bằng nhau */
    }

    .section-head {
        margin-bottom: 15px;
        border-bottom: 2px solid #48ad48;
        padding-bottom: 10px;
    }

    .section-title {
        font-size: 20px;
        font-weight: bold;
        color: #48ad48;
        margin: 0;
    }

    /* Customer info styling */
    #customer-info-wp p {
        margin: 8px 0;
        font-size: 16px;
        color: #333;
    }

    #customer-info-wp p strong {
        font-weight: 600;
        color: #1e3a8a;
    }

    /* Order review section */
    #order-review-wp .section-detail p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }
</style>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thông tin tài khoản</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div>
                <?php if (!empty($user_info)) : ?>
                    <form id="update-user-info-form" method="POST" action="">
                        <p><strong>Họ và tên:</strong></p>
                        <input type="text" name="fullname" value="<?php echo htmlspecialchars($user_info['fullname']); ?>" readonly>
                        <p><strong>Email:</strong></p>
                        <input type="email" name="mail" value="<?php echo htmlspecialchars($user_info['mail']); ?>" readonly>
                        <p><strong>Số điện thoại:</strong></p>
                        <input type="text" name="phone" value="<?php echo htmlspecialchars($user_info['phone']); ?>" readonly>
                        <p><strong>Địa chỉ:</strong></p>
                        <input type="text" name="address" value="<?php echo htmlspecialchars($user_info['address']); ?>" readonly>
                        <!-- Nút Cập nhật thông tin -->
                        <button type="button" id="edit-btn" style="display:inline-block; padding:10px 15px; color:#fff; background-color:#48ad48; border-radius:5px; text-decoration:none;">Cập nhật thông tin</button>
                        <button type="submit" id="save-btn" style="display:none; padding:10px 15px; color:#fff; background-color:#007BFF; border-radius:5px; text-decoration:none;">Lưu thay đổi</button>
                    </form>
                <?php else : ?>
                    <p>Không có thông tin người dùng.</p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Lịch sử đơn hàng -->
        <div class="section" id="order-history-wp">
            <div class="section-head">
                <h1 class="section-title">Lịch sử đơn hàng</h1>
            </div>
            <div>
                <?php if (!empty($order_history)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Thời gian đặt</th>
                                <th>Tổng sản phẩm</th>
                                <th>Tổng giá</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_history as $key => $order) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo htmlspecialchars($order['code']); ?></td>
                                    <td><?php echo htmlspecialchars($order['create_date']); ?></td>
                                    <td><?php echo htmlspecialchars($order['total_num_product']); ?></td>
                                    <td><?php echo htmlspecialchars($order['total_price']) . ' VNĐ'; ?></td>
                                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Không có lịch sử đơn hàng.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<!-- JavaScript để kích hoạt chỉnh sửa -->
<script>
    document.getElementById('edit-btn').addEventListener('click', function() {
        let inputs = document.querySelectorAll('#update-user-info-form input');
        inputs.forEach(input => input.removeAttribute('readonly')); // Bỏ readonly
        document.getElementById('edit-btn').style.display = 'none'; // Ẩn nút Cập nhật
        document.getElementById('save-btn').style.display = 'inline-block'; // Hiện nút Lưu
    });
</script>
