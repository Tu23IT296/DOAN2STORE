<?php get_header(); ?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thống kê doanh thu và sản phẩm bán được theo tháng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <!-- Biểu đồ doanh thu theo tháng -->
                <div class="section-detail">
                    <h3>Doanh thu theo tháng</h3>
                    <canvas id="revenueChart" width="150" height="75"></canvas> <!-- Thu nhỏ kích thước biểu đồ -->
                </div>

                <!-- Biểu đồ số sản phẩm bán được theo tháng -->
                <div class="section-detail">
                    <h3>Số sản phẩm bán được theo tháng</h3>
                    <canvas id="productsSoldChart" width="150" height="75"></canvas> <!-- Thu nhỏ kích thước biểu đồ -->
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<!-- Thêm thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Dữ liệu doanh thu theo tháng
        const revenueData = <?php echo json_encode($data['monthly_statistics']); ?>;
        const months = revenueData.map(item => item.period); // Mảng tháng
        const revenue = revenueData.map(item => item.total_revenue); // Mảng doanh thu

        // Biểu đồ doanh thu theo tháng
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line', // Loại biểu đồ (line chart)
            data: {
                labels: months, // Mảng tháng
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: revenue, // Mảng doanh thu
                    borderColor: 'rgba(75, 192, 192, 1)', // Màu đường biên
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tháng'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Doanh thu (VND)'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            }
        });

        // Dữ liệu số sản phẩm bán được theo tháng
        const productsSoldData = <?php echo json_encode($data['monthly_products_sold']); ?>;
        const productsSold = productsSoldData.map(item => item.total_products); // Mảng số sản phẩm bán

        // Biểu đồ số sản phẩm bán được theo tháng
        const productsSoldCtx = document.getElementById('productsSoldChart').getContext('2d');
        const productsSoldChart = new Chart(productsSoldCtx, {
            type: 'bar', // Loại biểu đồ (bar chart)
            data: {
                labels: months, // Mảng tháng
                datasets: [{
                    label: 'Số sản phẩm bán được',
                    data: productsSold, // Mảng số sản phẩm bán được
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền
                    borderColor: 'rgba(255, 99, 132, 1)', // Màu đường biên
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tháng'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Số sản phẩm'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            }
        });
    });
</script>