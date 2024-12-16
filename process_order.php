<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
require_once 'inc/database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $note = isset($_POST['note']) ? trim($_POST['note']) : '';
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total_amount = 0;

    if (empty($cart)) {
        die('Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi đặt hàng.');
    }

    foreach ($cart as $item) {
        $total_amount += $item->quantity * $item->price * 1000;
    }

    if (empty($name) || empty($address) || empty($phone)) {
        die('Vui lòng nhập đầy đủ thông tin bắt buộc.');
    }

    $db = Database::getConnection();
    if (!$db) {
        die('Không thể kết nối cơ sở dữ liệu.');
    }

    $db->begin_transaction();
    try {
        $stmt = $db->prepare("INSERT INTO `orders` (customer_name, customer_address, customer_phone, note, total_amount, created_at)  VALUES (?, ?, ?, ?, ?, NOW())");
        if (!$stmt) {
            throw new Exception('Lỗi chuẩn bị câu lệnh: ' . $db->error);
        }
        $stmt->bind_param('ssssd', $name, $address, $phone, $note, $total_amount);
        if (!$stmt->execute()) {
            throw new Exception('Lỗi thực thi câu lệnh: ' . $stmt->error);
        }

        $order_id = $stmt->insert_id;
        $stmt_item = $db->prepare("INSERT INTO `order_items` (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        if (!$stmt_item) {
            throw new Exception('Lỗi chuẩn bị câu lệnh (order_items): ' . $db->error);
        }
        foreach ($cart as $item) {
            $stmt_item->bind_param('iiid', $order_id, $item->id, $item->quantity, $item->price);
            if (!$stmt_item->execute()) {
                throw new Exception('Lỗi thực thi câu lệnh (order_items): ' . $stmt_item->error);
            }
        }

        unset($_SESSION['cart']);
        $db->commit();

        // Giao diện hiển thị thành công
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Đặt hàng thành công</title>
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #f8f9fa;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                }
                .success-container {
                    text-align: center;
                    background: white;
                    padding: 40px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                    max-width: 450px;
                }
                .success-icon {
                    font-size: 80px;
                    color: #28a745;
                    margin-bottom: 20px;
                    animation: bounce 1s infinite;
                }
                .message {
                    font-size: 26px;
                    font-weight: bold;
                    color: #333;
                    margin-bottom: 10px;
                }
                .details {
                    font-size: 18px;
                    color: #555;
                    margin-bottom: 20px;
                }
                .btn {
                    display: inline-block;
                    padding: 12px 20px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    font-size: 16px;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                }
                .btn:hover {
                    background-color: #0056b3;
                }
                @keyframes bounce {
                    0%, 100% {
                        transform: translateY(0);
                    }
                    50% {
                        transform: translateY(-10px);
                    }
                }
            </style>
            <script>
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 10000);
            </script>
        </head>
        <body>
            <div class="success-container">
                <div class="success-icon">✔</div>
                <div class="message">Đặt hàng thành công!</div>
                <div class="details">
                    Cảm ơn bạn đã tin tưởng và lựa chọn sản phẩm của chúng tôi.<br>
                    Đơn hàng sẽ sớm được xử lý.
                </div>
                <a href="index.php" class="btn">Tiếp tục mua sắm</a>
            </div>
        </body>
        </html>
        HTML;

    } catch (Exception $e) {
        $db->rollback();
        die('Có lỗi xảy ra trong quá trình xử lý đơn hàng: ' . $e->getMessage());
    } finally {
        $db->close();
    }
} else {
    die('Yêu cầu không hợp lệ.');
}
?>
