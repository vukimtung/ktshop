DROP TABLE IF EXISTS admins;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name_ad` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO admins VALUES("1","admin@gmail.com","Vũ Kim Tùng","123456","2021-07-22 15:10:35","2021-07-22 15:10:35");



DROP TABLE IF EXISTS categories;

CREATE TABLE `categories` (
  `id_cate` int(11) NOT NULL AUTO_INCREMENT,
  `name_cate` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_cate`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","Bánh Kem","2021-03-26 20:27:40","2021-03-26 20:27:40"),
("2","Pizza","2021-03-26 21:01:53","2021-03-26 21:01:53"),
("3","Bánh Su Kem","2021-03-27 03:13:10","2021-03-27 03:13:10"),
("4","Bánh Ngọt","2021-03-27 03:15:10","2021-03-27 03:15:10"),
("5","Bánh Cupcake","2021-04-02 01:49:56","2021-04-02 01:49:56"),
("7","Bánh Mặn","2021-04-27 21:06:21","2021-04-27 21:06:21"),
("12","Bánh Mì","2021-08-24 22:37:58","2021-08-24 22:37:58");



DROP TABLE IF EXISTS chitietdonnhap;

CREATE TABLE `chitietdonnhap` (
  `id_ctdn` int(11) NOT NULL AUTO_INCREMENT,
  `id_donnhap` int(11) NOT NULL,
  `id_nglieu` int(11) NOT NULL,
  `sluong` int(11) NOT NULL,
  `dgia` int(11) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_ctdn`),
  KEY `FK_ctdn_dn` (`id_donnhap`),
  KEY `FK_ctdn_nl` (`id_nglieu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO chitietdonnhap VALUES("1","1","1","100","20000","Kg","2021-10-11 23:42:06","2021-10-11 23:42:06"),
("2","2","2","1000","3000","Quả","2021-10-12 00:18:43","2021-10-12 00:18:43"),
("3","3","3","100","20000","Kg","2021-10-13 21:45:27","2021-10-13 21:45:27"),
("11","11","5","10","25000","Lít","2021-11-01 21:54:01","2021-11-01 21:54:01");



DROP TABLE IF EXISTS chitietsanpham;

CREATE TABLE `chitietsanpham` (
  `id_ctsp` int(11) NOT NULL AUTO_INCREMENT,
  `id_nl` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_ctsp`),
  KEY `FK_ctsp_nl` (`id_nl`),
  KEY `FK_ctsp_sp` (`idsp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS comments;

CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `idsp` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `review` mediumtext NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_com`),
  KEY `FK_comment_sp` (`idsp`),
  KEY `FK_comment_kh` (`id_kh`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO comments VALUES("9","12","275","Sản phẩm rất ngon. Sẽ tiếp tục ủng hộ cửa hàng!!!","5","2021-07-22 14:56:54","2021-07-22 14:56:54"),
("10","12","271","Sản phẩm OK!","4","2021-07-22 15:08:39","2021-07-22 15:08:39");



DROP TABLE IF EXISTS contact;

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `msg` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO contact VALUES("6","khachhang@gmail.com","Chúc cửa hàng ngày càng thành công!!!","2021-08-26 22:05:33","2021-08-26 22:05:33");



DROP TABLE IF EXISTS customers;

CREATE TABLE `customers` (
  `id_cust` int(11) NOT NULL AUTO_INCREMENT,
  `email_cust` varchar(255) NOT NULL,
  `name_cust` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone_cust` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_cust`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;

INSERT INTO customers VALUES("271","kimtung204@gmail.com","Tùng Kim","123456","0915116104","2021-07-19 11:42:54","2021-07-19 11:42:54"),
("275","vukimtung204@gmail.com","Vũ Kim Tùng","123456","123456785","2021-07-22 14:22:25","2021-07-22 14:22:25"),
("279","tungb1706891@student.ctu.edu.vn","Kim Tùng","123456","0123478954","2021-08-26 23:42:26","2021-08-26 23:42:26");



DROP TABLE IF EXISTS dc_khachhang;

CREATE TABLE `dc_khachhang` (
  `id_dc` int(11) NOT NULL AUTO_INCREMENT,
  `id_kh` int(11) NOT NULL,
  `diachi_kh` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_dc`),
  KEY `FK_DC_KH` (`id_kh`),
  CONSTRAINT `FK_DC_KH` FOREIGN KEY (`id_kh`) REFERENCES `customers` (`id_cust`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO dc_khachhang VALUES("3","271","90/1 Trung Hải, Đại Hải, Kế Sách, Sóc Trăng","2021-10-24 00:08:40","2021-10-24 00:08:40");



DROP TABLE IF EXISTS donnhaphang;

CREATE TABLE `donnhaphang` (
  `id_donnhap` int(11) NOT NULL AUTO_INCREMENT,
  `id_ncc` int(11) NOT NULL,
  `id_nvien` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `ngaynhap` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_donnhap`),
  KEY `FK_pn_nv` (`id_nvien`),
  KEY `FK_pn_ncc` (`id_ncc`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO donnhaphang VALUES("1","1","4","2000000","2021-10-11 23:42:06","2021-10-11 23:42:06"),
("2","4","4","3000000","2021-10-12 00:18:43","2021-10-12 00:18:43"),
("3","1","4","2000000","2021-10-13 21:45:27","2021-10-13 21:45:27"),
("11","4","7","250000","2021-11-01 21:54:01","2021-11-01 21:54:01");



DROP TABLE IF EXISTS giagiam;

CREATE TABLE `giagiam` (
  `id_gg` int(11) NOT NULL AUTO_INCREMENT,
  `phantramgiam` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_gg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO giagiam VALUES("1","0","0000-00-00 00:00:00","0000-00-00 00:00:00"),
("7","5","2021-09-27 23:04:58","2021-09-27 23:04:58");



DROP TABLE IF EXISTS nguyenlieu;

CREATE TABLE `nguyenlieu` (
  `id_nl` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nl` text NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `sl` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_nl`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO nguyenlieu VALUES("1","Bột mì","Kg","100","2021-10-11 23:42:06","2021-10-11 23:42:06"),
("2","Trứng gà","Quả","1000","2021-10-12 00:18:43","2021-10-12 00:18:43"),
("3","Bột gạo","Kg","100","2021-10-13 21:45:27","2021-10-13 21:45:27"),
("5","Hương dâu tổng hợp","Lít","0","2021-11-01 21:54:01","2021-11-01 21:54:01");



DROP TABLE IF EXISTS nhacungcap;

CREATE TABLE `nhacungcap` (
  `id_n` int(11) NOT NULL AUTO_INCREMENT,
  `ten_n` varchar(255) NOT NULL,
  `diachi_n` text NOT NULL,
  `dienthoai_n` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_n`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO nhacungcap VALUES("1","Nhà cung cấp1","Đại Hải, Kế Sách, Sóc Trăng","0396875194","2021-08-26 21:42:19","2021-08-26 21:42:19"),
("4","Nhà cung cấp 2","Đại Hải, KS, ST","0394578962","2021-09-28 00:09:58","2021-09-28 00:09:58");



DROP TABLE IF EXISTS nhanvien;

CREATE TABLE `nhanvien` (
  `id_nv` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nv` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_nv` varchar(255) NOT NULL,
  `gioitinh` varchar(20) NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `dienthoai_nv` varchar(20) NOT NULL,
  `diachi_nv` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `id_quyen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_nv`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO nhanvien VALUES("4","Admin","123456","admin@gmail.com","Nam","1999-01-01","0394526149","Sóc Trăng","uploads/nhanvien/slider3.jpg","10","2021-08-26 00:03:07","2021-08-26 00:03:07"),
("5","Nguyễn Văn A","123456","nhanvien1@gmail.com","Nam","2000-05-17","0123478956","Ninh Kiều, Cần Thơ","uploads/nhanvien/111.jpg","10","2021-08-26 21:23:18","2021-08-26 21:23:18"),
("7","nhân viên 2","123456","nhanvien2@gmail.com","Khác","2000-06-21","0392498576","Cần Thơ","uploads/nhanvien/pizza.jpg","2","2021-09-28 00:25:21","2021-09-28 00:25:21");



DROP TABLE IF EXISTS order_details;

CREATE TABLE `order_details` (
  `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_orderdetail`),
  KEY `FK_orderdetail_order` (`order_id`),
  KEY `FK_orderdetail_product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO order_details VALUES("15","93","8","2","76000","2021-10-09 17:16:23","2021-10-09 17:16:23"),
("16","93","15","1","30000","2021-10-09 17:16:23","2021-10-09 17:16:23"),
("29","105","14","1","100000","2021-10-23 23:04:16","2021-10-23 23:04:16"),
("30","106","15","1","30000","2021-11-19 00:27:51","2021-11-19 00:27:51");



DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_nvien` int(11) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `img_confirm` varchar(255) NOT NULL,
  `id_shipper` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_order`),
  KEY `FK_order_cust` (`customer_id`),
  KEY `FK_order_shipper` (`id_shipper`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

INSERT INTO orders VALUES("93","271","Trung Hải, Đại, Hải, KS, ST","0394539094","182000","Tiền mặt","Đã xác nhận","4","","","3","2021-10-09 17:16:23","2021-10-09 17:16:23"),
("105","271","90/1 Trung Hải, Đại Hải, Kế Sách, Sóc Trăng","04587966214","100000","Paypal","Đã giao","4","2021-11-18 18:30:50","uploads/imgconfirm/hinhmaytinh.jpg","3","2021-10-23 23:04:16","2021-10-23 23:04:16"),
("106","271","90/1 Trung Hải, Đại Hải, Kế Sách, Sóc Trăng","0394539123","30000","Tiền mặt","Đơn hàng mới","0","","","0","2021-11-19 00:27:51","2021-11-19 00:27:51");



DROP TABLE IF EXISTS password_reset;

CREATE TABLE `password_reset` (
  `id_repass` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_repass`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO password_reset VALUES("2","kimtung204@gmail.com","94ad9f5f4f0ef8336278f10e9805452661a6d5b6ccd10","2021-10-22 23:05:25","2021-10-22 23:05:25"),
("25","vukimtung204@gmail.com","982d5e8d8234fb584c43ce632fe2b6ee619a588251024","2021-11-21 21:31:12","2021-11-21 21:31:12");



DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `name_pro` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `id_giagiam` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pro`),
  KEY `FK_product_cate` (`category_id`),
  KEY `FK_pro_giagiam` (`id_giagiam`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO products VALUES("8","Bánh kem dâu","80000","7","Bánh kem dâu.................","uploads/products/banhkem-dau.jpg","1","Cái","2021-03-27 04:43:25","2021-03-27 04:43:25"),
("10","Pizza hải sản","80000","1","Bánh là sự kết hợp của các nguyên liệu cùng với hải sản tươi ngon,....\n","uploads/products/pizza.jpg","2","Cái","2021-03-27 12:26:37","2021-03-27 12:26:37"),
("11","Bánh cupcake kem","20000","1","Bánh cupcake kem ngon..............","uploads/products/cupcake2.jpg","3","Hộp","2021-03-29 02:26:55","2021-03-29 02:26:55"),
("12","Bánh ngọt vị socola","30000","1","Bánh ngọt vị socola thơm ngon......","uploads/products/banhngot.jpg","4","Cái","2021-03-29 02:28:57","2021-03-29 02:28:57"),
("14","Bánh kem socola","100000","1","Bánh kem vị socola thơm ngon.................","uploads/products/hinh2.jpg","1","Cái","2021-04-22 01:31:16","2021-04-22 01:31:16"),
("15","Bánh Tiramisu – Ý","30000","1","Bánh là sự kết hợp hài hòa giữa rượu nhẹ marsala, trứng, kem phô mai mascarpone và café. Khi thưởng thức, vị bánh mềm mại như tan chảy đều trên đầu lưỡi nhưng vẫn mang vị xốp của bánh gato.\n","uploads/products/111.jpg","4","Cái","2021-04-23 14:34:28","2021-04-23 14:34:28"),
("16","Bánh bông lan trứng muối","90000","7","Nguyên liệu gồm: trứng gà, đường, sữa tươi, bơ, bột mì, trứng muối,...","uploads/products/productsbanhbonglantrungmuoi.jpg","7","Cái","2021-05-23 23:33:40","2021-05-23 23:33:40"),
("17","Bánh su kem dâu","30000","1","Nguyên liệu gồm: trứng gà, đường, sữa tươi, bơ, bột mì, dâu, kem, ....","uploads/products/sukemdau.jpg","3","Hộp","2021-05-23 23:36:54","2021-05-23 23:36:54"),
("18","Bánh cupcake kem","40000","1","Nguyên liệu gồm: trứng gà, đường, sữa tươi, bơ, bột mì, kem....","uploads/products/cupcake.jpg","5","Hộp","2021-05-23 23:47:09","2021-05-23 23:47:09"),
("20","Pizza Miami","90000","1","Sự kết hợp nguyên liệu cùng với phô mai nóng chảy tạo ra hương vị thơm ngon cho bánh.","uploads/products/pizza-miami.jpg","2","Cái","2021-05-23 23:53:50","2021-05-23 23:53:50"),
("23","bánh ngọt socola","25000","1","bánh ngọt vị socola thơm ngon","uploads/products/hinh4.jpg","4","Cái","2021-08-21 00:08:00","2021-08-21 00:08:00"),
("26","Bánh Sinh Nhật","100000","1","Bánh Sinh Nhật","uploads/products/banhkem2.jpg","1","Cái","2021-09-27 23:41:22","2021-09-27 23:41:22"),
("28","Bánh mì mặn","15000","7","Bánh mì mặn thơm ngon.....................","uploads/products/banhmi1.jpg","12","Cái","2021-10-07 23:04:54","2021-10-07 23:04:54");



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `ten_r` varchar(100) NOT NULL,
  `mota_r` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_r`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO roles VALUES("1","Xem","Nhân viên với quyền này được phép xem thông tin.","2021-08-24 22:39:27","2021-08-24 22:39:27"),
("2","Sửa","Nhân viên với quyền này được phép sửa thông tin","2021-08-24 23:34:55","2021-08-24 23:34:55"),
("4","Xóa","Nhân viên với quyền này được phép xóa thông tin.","2021-08-24 23:47:31","2021-08-24 23:47:31"),
("10","Toàn quyền","Được toàn quyền trên hệ thống bao gồm: xem, sửa, xóa thông tin.","2021-10-19 21:49:18","2021-10-19 21:49:18");



DROP TABLE IF EXISTS shipper;

CREATE TABLE `shipper` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `ten_s` varchar(255) NOT NULL,
  `email_s` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ngaysinh_s` varchar(20) NOT NULL,
  `gioitinh_s` varchar(20) NOT NULL,
  `dienthoai_s` varchar(20) NOT NULL,
  `diachi_s` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO shipper VALUES("3","Shipper 1","shipper1@gmail.com","123456","2001-04-16","Nam","0123547895","Đại Hải, Kế Sách, Sóc Trăng","uploads/shipper/banhngot.jpg","2021-08-27 21:28:43","2021-08-27 21:28:43"),
("4","Shipper 2","shipper2@gmail.com","123456","1995-12-05","Nam","0394875941","Sóc Trăng","uploads/shipper/banhngot.jpg","2021-09-28 00:36:45","2021-09-28 00:36:45");



