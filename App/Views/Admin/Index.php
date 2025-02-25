<?php
namespace App\Views\Admin;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">
                <h1 class="mb-3 text-primary">Thống kê</h1>
                <div class="container-fluid pt-4 px-4 mt-3 pt-3">
                    <div class="row">
                        <div class="col-sm-4 col-xl-3 text-center">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <img width="100px" src="<?= APP_URL ?>/public/admin/assets/img/cargo.png" alt="">
                                <h2><?= $data['total_order']['total'] ?> <span> đơn</span></h2>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xl-3 text-center">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <img width="100px" src="<?= APP_URL ?>/public/admin/assets/img/team.png" alt="">
                                <h2><?= $data['total_user']['total'] ?> <span> tài khoản</span></h2>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-3 text-center">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <img width="100px" src="<?= APP_URL ?>/public/admin/assets/img/products.png" alt="">
                                <h2><?= $data['total_product']['total'] ?> <span>sản phẩm</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" pb-3 mb-3 mb-6" >
                <div class="col-md-12 mt-3" style="margin-bottom: 5rem">
                    <div>
                        <canvas id="inventories"></canvas>
                    </div>
                </div>
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let myChart = document.getElementById('inventories').getContext('2d');
    var php_data = <?php echo json_encode($data['total_warehouse']); ?>;
    console.log('Kiểu dữ liệu của php_data:', typeof php_data);
    console.log('Dữ liệu php_data:', php_data);

    if (typeof php_data === 'string') {
        try {
            php_data = JSON.parse(php_data); 
        } catch (error) {
            console.error('Lỗi khi phân tích JSON:', error);
            php_data = [];
        }
    }

    if (!Array.isArray(php_data)) {
        console.error('php_data không phải là một mảng:', php_data);
    } else {
        let labels = php_data.map(item => item.name); // Tên sản phẩm
        let quantities = php_data.map(item => parseFloat(item.quantity)); // Số lượng (chuyển sang số)

        let massPopChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '',
                    data: quantities,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)'
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#000'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Số lượng tồn kho',
                        font: {
                            size: 25
                        }
                    },
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            color: '#000'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                let dataIndex = context.dataIndex;
                                let item = php_data[dataIndex];
                                return `${item.name} (${item.unit}): ${item.quantity}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            callback: function(value, index) {
                                // Hiển thị tên sản phẩm dưới mỗi cột
                                return php_data[index].name;
                            },
                            font: {
                                size: 12 // Điều chỉnh kích thước font nếu cần
                            }
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                layout: {
                    padding: {
                        left: 50,
                        right: 0,
                        bottom: 0,
                        top: 0
                    }
                }
            }
        });
    }
</script>
        <?php
    }
}
?>