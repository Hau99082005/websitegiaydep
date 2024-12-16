-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2024 lúc 08:02 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`) VALUES
(1, 'background.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Giày Sneaker'),
(2, 'Giày Chạy Bộ'),
(3, 'Giày Đá Bóng'),
(4, 'Giày Tây'),
(5, 'Giày Sandal'),
(6, 'Dép'),
(7, 'Giày Clogs'),
(8, 'Giày Cao Gót');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinhsach`
--

CREATE TABLE `chinhsach` (
  `id` int(100) NOT NULL,
  `title_container` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chinhsach`
--

INSERT INTO `chinhsach` (`id`, `title_container`, `title`, `pagraph`) VALUES
(1, '1. Chính Sách Bảo Hành', 'Điều kiện áp dụng:', '- Trong thời gian bảo hành Khách hàng có nhu cầu bảo hành sản phẩm thì sẽ miễn phí bảo hành với các trường hợp sau: Hở keo, dứt chỉ, gãy móc khoá, bung hoạ tiết trang trí (nơ, nút, hoa, …), lờn gai nỉ.\r\n- Bảo hành trọn đời với lỗi bong keo, đứt chỉ (vật tư của sản phẩm đủ điều kiện tái chế không bị rách, tróc si...).\r\n- Với các lỗi khác thời gian bảo hành: 6 tháng với các sản phẩm.\r\n- Khi bảo hành, khách hàng cần cung cấp hóa đơn hoặc mail xác nhận giao hàng và phiếu bảo hành của sản phẩm.'),
(2, '', 'Địa điểm nhận bảo hành: ', 'Tại tất cả các cửa hàng trên toàn quốc.'),
(3, '', 'LƯU Ý:', 'Trường hợp hết thời gian bảo hành, giày dép hư hỏng do hao mòn tự nhiên hoặc bị tác động mạnh từ bên ngoài, tiếp nhận bảo hành tuy nhiên chi phí sửa chữa và vận chuyển khách hàng thanh toán.'),
(4, '2. Chính Sách Đổi Trả', 'Điều kiện áp dụng:', '- Khách hàng có thể đổi trả sản phẩm trong vòng 7 ngày kể từ ngày mua.\r\n- Khi giao nhầm màu, nhầm kích cỡ, nhầm sản phẩm hoặc sản phẩm bị hư hỏng do nhà sản xuất. Khách gửi các hình ảnh sản phẩm nhận được kèm mã đơn hàng để được hỗ trợ.\r\n- Sản phẩm cần đổi còn mới 100% chưa qua sử dụng hoặc giặt tẩy, nguyên phiếu bảo hành, tem nhãn sản phẩm, không bị dơ bẩn, trầy xước, đầy đủ bao bì, túi hộp.\r\n- Khách hàng phải có hoá đơn giao hàng (phiếu giao hàng, email xác nhận đơn hàng).'),
(5, '', 'Địa điểm đổi trả:', 'Tại tất cả các cửa hàng trên toàn quốc.'),
(6, '', 'LƯU Ý: ', 'Trường hợp sản phẩm lỗi cần đổi, khi gửi về đổi nhưng bị hết hàng, khách hàng có thể đổi sang sản phẩm khác có giá trị lớn hơn hoặc bằng sản phẩm trước đó (khách hàng sẽ bù tiền chênh lệch nếu giá trị cao hơn và sẽ không được hoàn lại tiền chênh lệch nếu giá trị thấp hơn).'),
(7, '3. Chính Sách Khách Hàng Thân Thiết', 'Điều kiện áp dụng:', '- Tích điểm: Mỗi 1.000 đồng chi tiêu = 1 điểm thưởng.\r\n- Trên 1000 điểm thưởng sẽ trở thành khách hàng thân thiết\r\n- Giảm giá hoặc quà tặng đặc biệt vào những ngày sự kiện.\r\n- Nhận thông tin khuyến mãi, giảm giá độc quyền. Giảm giá từ 5-15% cho các lần mua tiếp theo khi trở thành khách hàng thân thiết.'),
(8, '', 'Ưu đãi thành viên thân thiết:', '- Giảm 5% cho hóa đơn từ 1 triệu đồng.\r\n- Giảm 10% cho hóa đơn từ 2 triệu đồng.\r\n- Giảm 15% cho hóa đơn từ 5 triệu đồng.'),
(9, '', 'Cách tham gia: ', ' Đăng ký tại cửa hàng hoặc trên website để trở thành khách hàng thân thiết.'),
(10, '', 'LƯU Ý: ', ' Điểm thưởng có thời hạn sử dụng trong vòng 12 tháng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotro`
--

CREATE TABLE `hotro` (
  `id` int(100) NOT NULL,
  `title_container` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotro`
--

INSERT INTO `hotro` (`id`, `title_container`, `title`, `pagraph`) VALUES
(1, '1. Cần Trợ Giúp', 'Trả Lời:', 'Chúng tôi cung cấp một dịch vụ hỗ trợ khách hàng tận tình để giúp bạn giải quyết bất kỳ vấn đề nào liên quan đến giày dép mà bạn đã mua hoặc có kế hoạch mua. Dưới đây là một số câu hỏi thường gặp và giải đáp:\r\n\r\n- Cách chọn kích cỡ giày phù hợp?\r\n- Chính sách đổi trả và bảo hành?\r\n- Giày có sẵn tại cửa hàng không?'),
(2, '', 'Nhận sự trợ giúp: ', 'Tại cửa hàng hoặc liên hệ online.'),
(3, '2. Hệ Thống Cửa Hàng', 'Trả Lời:', 'Chúng tôi có hệ thống cửa hàng trên toàn quốc, nơi bạn có thể thử giày trực tiếp và nhận tư vấn từ đội ngũ nhân viên chuyên nghiệp. Các hệ thống cửa hàng:\r\n\r\n- Cửa hàng tại Huế\r\n- Cửa hàng tại Hà Nội\r\n- Cửa hàng tại TP.HCM\r\n- Cửa hàng tại Đà Nẵng'),
(4, '', 'Các cửa hàng:', 'Chúng tôi luôn đảm bảo chất lượng sản phẩm và dịch vụ tại mọi cửa hàng.'),
(5, '3. Liên Hệ Hợp Tác', 'Trả Lời: ', 'Chúng tôi luôn tìm kiếm cơ hội hợp tác với các đối tác để mở rộng hệ thống phân phối và cung cấp giày dép chất lượng đến người tiêu dùng. Nếu bạn là một doanh nghiệp, cửa hàng bán lẻ hoặc tổ chức quan tâm đến việc hợp tác:\r\n\r\n- Về mặt bằng: Vị trí gần khu dân cư, đông người qua lại. Diện tích tối thiểu: 12m², Chiều ngang tối thiểu: 3m\r\n- Về tài chính: Vốn tối thiểu để mua lô hàng đầu: 120 triệu (thành phố, thị xã) và 80 triệu (thị trấn, huyện lị).\r\n- Về nhân lực: Có ít nhất 01 người thường xuyên bán hàng.'),
(6, '', 'Tư vấn mở đại lý liên hệ: ', 'LNmates.@gmail.com hoặc liên hệ trực tiếp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagraph` text NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `pagraph`, `day`) VALUES
(1, 'tintuc1.jpg', 'Triển Vọng Ngành Giày Dép Việt Nam 2024: Xuất Khẩu và Tiêu Chuẩn Xanh', 'Đề cập đến triển vọng của ngành giày dép trong đầu năm 2024. Các doanh nghiệp tập trung mở rộng thị trường xuất khẩu, đa dạng hóa sản phẩm và áp dụng sản xuất theo tiêu chuẩn xanh để đáp ứng yêu cầu ngày càng cao của thị trường quốc tế. Bộ Công Thương cũng hỗ trợ doanh nghiệp thông qua các hoạt động xúc tiến thương mại lớn như Vietnam Expo 2024, nhằm giúp doanh nghiệp kết nối và xây dựng hệ sinh thái đáp ứng nhu cầu thế giới.', '2024-12-13'),
(2, 'tintuc2.jpg', 'Cách Lưu Trữ Giày Dép Đúng Cách Để Giữ Lâu Bền', 'Cách lưu trữ giày dép để giữ được form và tuổi thọ lâu dài. Các phương pháp bao gồm sử dụng hộp đựng chuyên dụng, túi vải để bảo vệ giày khỏi bụi bẩn, và các mẹo đơn giản như xếp giày đúng cách, tránh lưu trữ ở nơi ẩm ướt để giày không bị biến dạng hoặc hư hỏng. Bài viết cũng đề cập đến việc làm sạch giày trước khi lưu trữ để tránh vết bẩn và mùi hôi.', '2024-12-19'),
(3, 'tintuc3.jpg', 'Trung Quốc Phát Triển Giày Dép Phân Hủy Sinh Học, Bảo Vệ Môi Trường', 'Trung Quốc phát triển giày dép phân hủy sinh học, giúp giảm thiểu tác động tiêu cực đến môi trường. Những đôi giày này được làm từ vật liệu tự nhiên có thể phân hủy, thay vì các chất liệu nhựa khó phân hủy, góp phần vào việc bảo vệ môi trường và giảm rác thải nhựa. Đây là bước tiến mới trong ngành công nghiệp giày dép, hướng đến sự bền vững và thân thiện với thiên nhiên.', '2024-12-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `total_amount` decimal(10,3) DEFAULT NULL,
  `status` enum('Pending','Processing','Completed','Cancelled') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `customer_address`, `total_amount`, `status`, `created_at`, `note`) VALUES
(1, 'Lê Văn Hậu', '0367722389', 'Thôn Thống Nhất-Hải Ba-Hải Lăng-Quảng Trị', 2100000.000, NULL, '2024-12-16 19:00:31', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 32, 1, 600.000),
(2, 1, 7, 2, 400.000),
(3, 1, 8, 1, 700.000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `color`, `id_category`, `image2`, `status`) VALUES
(1, 'Giày Tây BT01', 'tay1.png', 800.000, 'đen', 4, 'tay1-1.png', 1),
(2, 'Giày Tây BT02', 'tay2.png', 700.000, 'đen', 4, 'tay2-1.png', 1),
(3, 'Giày Tây BT03', 'tay3.png', 700.000, 'đen', 4, 'tay3-1.png', 1),
(4, 'Giày Tây BT04', 'tay4.png', 690.000, 'nâu', 4, 'tay4-1.png', 1),
(5, 'Giày Tây BT05', 'tay5.png', 800.000, 'đen', 4, 'tay5-1.png', 1),
(6, 'Giày Sneaker AS01', 'sneaker1.png', 700.000, 'đỏ', 1, 'sneaker1-1.png', 1),
(7, 'Giày Sneaker XS01', 'sneaker2.png', 400.000, 'đỏ', 1, 'sneaker2-1.png', 1),
(8, 'Giày Sneaker AS02', 'sneaker3.png', 700.000, 'đen', 1, 'sneaker3-1.png', 1),
(9, 'Giày Sneaker XS02', 'sneaker4.png', 800.000, 'đỏ', 1, 'sneaker4-1.png', 1),
(10, 'Giày Sneaker XS03', 'sneaker5.png', 600.000, 'xám', 1, 'sneaker5-1.png', 1),
(11, 'Giày Sneaker XS04', 'sneaker6.png', 650.000, 'đen', 1, 'sneaker6-1.png', 1),
(12, 'Giày Sneaker AS03', 'sneaker7.png', 900.000, 'đen', 1, 'sneaker7-1.png', 1),
(13, 'Giày Sneaker AS04', 'sneaker8.png', 710.000, 'trắng', 1, 'sneaker8-1.png', 1),
(14, 'Giày Sneaker XS05', 'sneaker9.png', 750.000, 'đỏ', 1, 'sneaker9-1.png', 1),
(15, 'Giày Sneaker XS06', 'sneaker10.png', 500.000, 'đen', 1, 'sneaker10-1.png', 1),
(16, 'Giày Sneaker AS05', 'sneaker11.png', 300.000, 'đen', 1, 'sneaker11-1.png', 1),
(17, 'Giày Sandal VS01', 'sandal1.png', 350.000, 'xám', 5, 'sandal1-1.png', 1),
(18, 'Giày Sandal VS02', 'sandal2.png', 410.000, 'trắng', 5, 'sandal2-1.png', 1),
(19, 'Giày Sandal VS03', 'sandal3.png', 350.000, 'xanh', 5, 'sandal3-1.png', 1),
(20, 'Giày Sandal VS04', 'sandal4.png', 200.000, 'đen', 5, 'sandal4-1.png', 1),
(21, 'Giày Sandal VS05', 'sandal5.png', 410.000, 'cam', 5, 'sandal5-1.png', 1),
(22, 'Giày Sandal VS06', 'sandal6.png', 200.000, 'đen', 5, 'sandal6-1.png', 1),
(23, 'Giày Sandal VS07', 'Sandal7.png', 300.000, 'vàng', 5, 'sandal7-1.png', 1),
(24, 'Dép Eva AD01', 'dep1.png', 100.000, 'đen', 6, 'dep1-1.png', 1),
(25, 'Dép Xốp BD01', 'dep2.png', 110.000, 'đen', 6, 'dep2-1.png', 1),
(26, 'Dép Eva AD02', 'dep3.png', 200.000, 'đen', 6, 'dep3-1.png', 1),
(27, 'Dép Eva AD03', 'dep4.png', 120.000, 'xanh', 6, 'dep4-1.png', 1),
(28, 'Dép Eva AD04', 'dep5.png', 90.000, 'nâu', 6, 'dep5-1.png', 1),
(29, 'Dép Eva AD05', 'dep6.png', 110.000, 'xanh', 6, 'dep6-1.png', 1),
(30, 'Dép Eva AD06', 'dep7.png', 200.000, 'kem', 6, 'dep7-1.png', 1),
(31, 'Dép Eva AD07', 'dep8.png', 100.000, 'đen', 6, 'dep8-1.png', 1),
(32, 'Giày Đá Bóng FD01', 'dabong1.png', 600.000, 'xanh', 3, 'dabong1-1.png', 1),
(33, 'Giày Đá Bóng FD02', 'dabong2.png', 650.000, 'cam', 3, 'dabong2-1.png', 1),
(34, 'Giày Đá Bóng FD03', 'dabong3.png', 710.000, 'cam', 3, 'dabong3-1.png', 1),
(35, 'Giày Clog JC01', 'clog1.png', 600.000, 'trắng', 7, 'clog1-1.png', 1),
(36, 'Giày Clog JC02', 'clog2.png', 500.000, 'đen', 7, 'clog2-1.png', 1),
(37, 'Giày Clog JC03', 'clog3.png', 500.000, 'đen', 7, 'clog3-1.png', 1),
(38, 'Giày Chạy Bộ R01', 'chay1.png', 410.000, 'xám', 2, 'chay1-1.png', 1),
(39, 'Giày Chạy Bộ R02', 'chay2.png', 510.000, 'xanh', 2, 'chay2-1.png', 1),
(40, 'Giày Chạy Bộ R03', 'chay3.png', 510.000, 'cam', 2, 'chay3-1.png', 1),
(41, 'Giày Chạy Bộ R03 Pro', 'chay4.png', 630.000, 'đen', 2, 'chay4-1.png', 1),
(42, 'Giày Chạy Bộ R03 Lite ', 'chay5.png', 490.000, 'xanh', 2, 'chay5-1.png', 1),
(43, 'Giày Cao Gót G01', 'caogot1.png', 400.000, 'đỏ', 8, 'caogot1-1.png', 1),
(44, 'Giày Cao Gót G02', 'caogot2.png', 510.000, 'đen', 8, 'caogot2-1.png', 1),
(45, 'Giày Cao Gót G03', 'caogot3.png', 450.000, 'đỏ', 8, 'caogot3-1.png', 1),
(46, 'Giày Cao Gót G04', 'caogot4.png', 210.000, 'hồng', 8, 'caogot4-1.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `sizeID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`sizeID`, `productID`, `size`) VALUES
(1, 1, '39'),
(2, 1, '40'),
(3, 1, '41'),
(4, 1, '42'),
(5, 2, '39'),
(6, 2, '40'),
(7, 2, '41'),
(8, 2, '42'),
(9, 3, '39'),
(10, 3, '40'),
(11, 3, '41'),
(12, 3, '42'),
(13, 4, '39'),
(14, 4, '40'),
(15, 4, '41'),
(16, 4, '42'),
(17, 5, '39'),
(18, 5, '40'),
(19, 5, '41'),
(20, 5, '42'),
(21, 6, '39'),
(22, 6, '40'),
(23, 6, '41'),
(24, 6, '42'),
(25, 7, '39'),
(26, 7, '40'),
(27, 7, '41'),
(28, 7, '42'),
(29, 8, '39'),
(30, 8, '40'),
(31, 8, '41'),
(32, 8, '42'),
(33, 9, '39'),
(34, 9, '40'),
(35, 9, '41'),
(36, 9, '42'),
(37, 10, '39'),
(38, 10, '40'),
(39, 10, '41'),
(40, 10, '42'),
(41, 11, '39'),
(42, 11, '40'),
(43, 11, '41'),
(44, 11, '42'),
(45, 12, '39'),
(46, 12, '40'),
(47, 12, '41'),
(48, 12, '42'),
(49, 13, '39'),
(50, 13, '40'),
(51, 13, '41'),
(52, 13, '42'),
(53, 14, '39'),
(54, 14, '40'),
(55, 14, '41'),
(56, 14, '42'),
(57, 15, '39'),
(58, 15, '40'),
(59, 15, '41'),
(60, 15, '42'),
(61, 16, '39'),
(62, 16, '40'),
(63, 16, '41'),
(64, 16, '42'),
(65, 17, '39'),
(66, 17, '40'),
(67, 17, '41'),
(68, 17, '42'),
(69, 18, '39'),
(70, 18, '40'),
(71, 18, '41'),
(72, 18, '42'),
(73, 19, '39'),
(74, 19, '40'),
(75, 19, '41'),
(76, 19, '42'),
(77, 20, '39'),
(78, 20, '40'),
(79, 20, '41'),
(80, 20, '42'),
(81, 21, '39'),
(82, 21, '40'),
(83, 21, '41'),
(84, 21, '42'),
(85, 22, '39'),
(86, 22, '40'),
(87, 22, '41'),
(88, 22, '42'),
(89, 23, '39'),
(90, 23, '40'),
(91, 23, '41'),
(92, 23, '42'),
(93, 24, '39'),
(94, 24, '40'),
(95, 24, '41'),
(96, 24, '42'),
(97, 25, '39'),
(98, 25, '40'),
(99, 25, '41'),
(100, 25, '42'),
(101, 26, '39'),
(102, 26, '40'),
(103, 26, '41'),
(104, 26, '42'),
(105, 27, '39'),
(106, 27, '40'),
(107, 27, '41'),
(108, 27, '42'),
(109, 28, '39'),
(110, 28, '40'),
(111, 28, '41'),
(112, 28, '42'),
(113, 29, '39'),
(114, 29, '40'),
(115, 29, '41'),
(116, 29, '42'),
(117, 30, '39'),
(118, 30, '40'),
(119, 30, '41'),
(120, 30, '42'),
(121, 31, '39'),
(122, 31, '40'),
(123, 31, '41'),
(124, 31, '42'),
(125, 32, '39'),
(126, 32, '40'),
(127, 32, '41'),
(128, 32, '42'),
(129, 33, '39'),
(130, 33, '40'),
(131, 33, '41'),
(132, 33, '42'),
(133, 34, '39'),
(134, 34, '40'),
(135, 34, '41'),
(136, 34, '42'),
(137, 35, '39'),
(138, 35, '40'),
(139, 35, '41'),
(140, 35, '42'),
(141, 36, '39'),
(142, 36, '40'),
(143, 36, '41'),
(144, 36, '42'),
(145, 37, '39'),
(146, 37, '40'),
(147, 37, '41'),
(148, 37, '42'),
(149, 38, '39'),
(150, 38, '40'),
(151, 38, '41'),
(152, 38, '42'),
(153, 39, '39'),
(154, 39, '40'),
(155, 39, '41'),
(156, 39, '42'),
(157, 40, '39'),
(158, 40, '40'),
(159, 40, '41'),
(160, 40, '42'),
(161, 41, '39'),
(162, 41, '40'),
(163, 41, '41'),
(164, 41, '42'),
(165, 42, '39'),
(166, 42, '40'),
(167, 42, '41'),
(168, 42, '42'),
(169, 43, '39'),
(170, 43, '40'),
(171, 43, '41'),
(172, 43, '42'),
(173, 44, '39'),
(174, 44, '40'),
(175, 44, '41'),
(176, 44, '42'),
(177, 45, '39'),
(178, 45, '40'),
(179, 45, '41'),
(180, 45, '42'),
(181, 46, '39'),
(182, 46, '40'),
(183, 46, '41'),
(184, 46, '42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `phone`, `password`, `role`) VALUES
(1, 'Nguyễn Văn Việt', 'Viet@gmail.com', '0319999990', '123', 'admin'),
(2, 'Nguyễn Văn B', 'B@gmail.com', '0328888888', '123', NULL),
(4, 'Lê Văn Hậu', NULL, '0367722389', '123', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chinhsach`
--
ALTER TABLE `chinhsach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_categorys_idx` (`id_category`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `FK_size_products_idx` (`productID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chinhsach`
--
ALTER TABLE `chinhsach`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hotro`
--
ALTER TABLE `hotro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_categorys` FOREIGN KEY (`id_category`) REFERENCES `categorys` (`id`);

--
-- Các ràng buộc cho bảng `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_size_products` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
