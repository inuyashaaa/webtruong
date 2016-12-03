--
-- Database: `web_truong`
--
CREATE DATABASE IF NOT EXISTS `web_truong` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web_truong`;

-- --------------------------------------------------------

--
-- Table structure for table `bo_mon`
--

DROP TABLE IF EXISTS `bo_mon`;
CREATE TABLE `bo_mon` (
  `id_bo_mon` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_khong_dau` text NOT NULL,
  `mo_ta` text NOT NULL,
  `hinh_anh` varchar(45) DEFAULT NULL,
  `lien_he` varchar(45) DEFAULT NULL,
  `id_khoa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bo_mon`
--

INSERT INTO `bo_mon` (`id_bo_mon`, `name`, `name_khong_dau`, `mo_ta`, `hinh_anh`, `lien_he`, `id_khoa`, `created_at`, `updated_at`) VALUES
(1, 'Bộ môn Các Hệ thống Thông tin', '', 'Bộ môn Hệ thống thông tin (HTTT) được thành lập từ năm 1995 cùng với thời điểm thành lập Khoa Công nghệ thông tin, Trường Đại học Khoa học tự nhiên, đến nay Bộ môn đã phát triển đội ngũ cán bộ dày dạn kinh nghiệm trong giảng dạy cũng như nghiên cứu khoa học. Hiện tại Bộ môn có 6 PGS, 5 tiến sĩ, 6 thạc sĩ và nhiều sinh viên giỏi ở lại làm cán bộ tạo nguồn. Nhiều cán bộ trong bộ môn tốt nghiệp tiến sĩ tại các viện, trường đại học tiên tiến ở các nước Nhật, Pháp, Hàn Quốc. Cũng như nhiều giáo sư, giảng viên ở các trường, viện tiên tiến ở nước ngoài tham gia làm giảng viên kiêm nhiệm tại bộ môn.', NULL, NULL, 1, NULL, NULL),
(2, 'Bộ môn Công nghệ Phần mềm', '', 'Bộ môn CNPM đảm nhận vai trò quan trọng trong phát triển các ngành và chuyên ngành tại khoa CNTT, bao gồm cả đào tạo cử nhân, thạc sĩ, và tiến sĩ. Giảng viên của bộ môn tham gia xây dựng khung chương trình, đề cương chi tiết, xây dựng giáo trình, giảng dạy nhiều môn học cơ sở của CNTT và các môn chuyên ngành theo định hướng CNPM.\r\n', NULL, NULL, 1, NULL, NULL),
(3, 'Bộ môn Khoa học Máy tính', '', 'Thành lập từ năm 1995, đến nay Bộ môn Khoa học máy tính đã phát triển đội ngũ cán bộ dày dạn kinh nghiệm trong giảng dạy cũng như nghiên cứu khoa học và phát triển hệ thống. Bộ môn có 1 giáo sư, 2 PGS, 8 tiến sĩ, 3 thạc sĩ và nhiều sinh viên giỏi ở lại làm cán bộ tạo nguồn. Nhiều cán bộ trong bộ môn tốt nghiệp tiến sĩ tại các viện, trường đại học tiên tiến ở các nước Mỹ, Nhật, Anh, Úc, Đức.\r\n\r\nNhiều giáo sư, giảng viên ở các trường, viện tiên tiến ở nước ngoài tham gia làm giảng viên kiêm nhiệm tại bộ môn: GS Hồ Tú Bảo, PGS. Huỳnh Văn Nam, PGS. Nguyễn Lê Minh, GS. Thái Trà My đại học Florida, PGS. Nguyễn Xuân Long đại học Michigan, Mỹ.\r\n\r\nCác cán bộ, giảng viên của Bộ môn được đào tạo cơ bản và chuyên sâu về nhiều lĩnh vực trong Khoa học máy tính. Bộ môn có chiến lược tập trung vào các hướng nghiên cứu chủ đạo là “Học máy thống kê và ứng dụng” và “Xử lý ngôn ngữ tự nhiên”. Bộ môn định hướng phát triển tiếp các hướng trong tương lai về xử lý tiếng nói, xử lý ảnh.\r\n\r\n', NULL, NULL, 1, NULL, NULL),
(4, 'Bộ môn Mạng và Truyền thông Máy tính', '', 'Bộ môn Mạng và Truyền thông máy tính được thành lập vào năm 2004 với nhiệm vụ:\r\n\r\nGiảng dạy các môn học thuộc ngành và chuyên ngành Mạng và Truyền thông máy tính ở bậc đại học và sau đại học\r\nHướng dẫn sinh viên làm khóa luận tốt nghiệp, luận văn cao học và luận văn tiến sỹ\r\nThực hiện các nghiên cứu tiên tiến trong lĩnh vực Mạng và Truyền thông máy tính\r\nĐội ngũ giảng viên của bộ môn hiện đang có 6 tiến sỹ, 4 thạc sỹ trong đó có nhiều giảng viên được đào tạo tại các viện, trường đại học tiên tiến trên thế giới. Các cán bộ của bộ môn đã thực hiện nhiều đề tài, công trình nghiên cứu khoa học tiên tiến trong lĩnh vực mạng và truyền thông như các đề tài về mạng ngang hàng, tính toán phân tán, mạng không dây, an ninh mạng, …. Bên cạnh đó, bộ môn cũng đã có một số hợp tác nghiên cứu với nhiều phòng thí nghiệm của các trường đại học trên thế giới như Đại học British Columbia (Canada), Đại học Paris Sud 11 (Pháp), Đại học North Carolina tại Charlotte, (Mỹ), Đại học Massachusetts Boston (Mỹ), Viện khoa học và công nghệ tiên tiến Nhật Bản (JAIST), ….\r\n\r\nBộ môn Mạng và Truyền thông máy tính đang phấn đấu để trở thành địa chỉ giảng dạy và nghiên cứu hàng đầu tại Việt Nam trong lĩnh vực Mạng và Truyền thông máy tính.\r\n\r\nVới mục tiêu góp phần thúc đẩy sự phát triển của khoa học và công nghệ trong lĩnh vực mạng và truyền thông máy tính tại Việt Nam cũng như trên thế giới, các cán bộ giảng viên của bộ môn Mạng và truyền thông máy tính đã thực hiện nhiều đề tài, công trình nghiên cứu khoa học theo các định hướng chính bao gồm\r\n\r\nCác công nghệ mạng tiên tiến\r\nCác mạng không dây di động\r\nCác ứng dụng mạng thế hệ mới', NULL, NULL, 2, NULL, NULL),
(5, 'Bộ môn Khoa học và Kỹ thuật tính toán', '', 'Bộ môn Khoa học & Kỹ thuật tính toán được thành lập tháng 12/2013 với tiền thân là Bộ môn Các Phương pháp toán trong Công nghệ (được thành lập năm 2003).\r\n\r\nBộ môn “Khoa học và Kỹ Thuật Tính Toán với chức năng nhiệm vụ phụ trách một số môn cơ bản liên quan đến khoa học và kỹ thuật như: Các môn toán chung của trường, Toán rời rạc, Xử lý số tín hiệu, Xác suất – Thống kê, Tối ưu hóa và Phương pháp tính. Ngoài ra, Bộ môn còn phụ trách phát triển phong trào Olympic như Olympic toán toàn quốc, Olympic tin học toàn quốc.\r\n\r\nCác cán bộ, giảng viên của Bộ môn được đào tạo cơ bản và chuyên sâu về nhiều lĩnh vực liên quan đến các phương pháp toán trong công nghệ, khoa học và kỹ thuật tính toán, khai phá dữ liệu, tin sinh học, mật mã và an toàn thông tin, các hệ thống thương mại trực tuyến, các phương pháp và hệ thống tính toán lớn. Bộ môn có chiến lược tập trung vào các hướng nghiên cứu chủ đạo là “Tin Sinh học (Sinh học Tính toán) – Phân tích Hệ gene”, đặc biệt ứng dụng của nó liên quan đến sức khỏe con người, “Bảo mật – An toàn thông tin” và “Các hệ thống thương mại điện tử và hệ thống tính toán lớn”.', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `de_tai`
--

DROP TABLE IF EXISTS `de_tai`;
CREATE TABLE `de_tai` (
  `id_de_tai` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_khong_dau` varchar(100) NOT NULL,
  `tom_tat` varchar(1000) NOT NULL,
  `noi_dung` text NOT NULL,
  `id_huong_nghien_cuu` int(11) NOT NULL,
  `id_sv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `de_tai`
--

INSERT INTO `de_tai` (`id_de_tai`, `name`, `name_khong_dau`, `tom_tat`, `noi_dung`, `id_huong_nghien_cuu`, `id_sv`) VALUES
(1, 'Hướng tới tài nguyên mở sử dụng dịch vụ', 'huong-toi-tai-nguyen-mo', 'Hàng năm, giảng viên của Khoa thực hiện số lượng lớn các đề tài, dự án từ các cấp khác nhau. Ở dưới là danh sách một số các đề tài, dự án tiêu biểu đang và đã thực hiện trong thời gian gần đây.', 'Được thành lập vào năm 1995 nhưng Khoa CNTT có truyền thống hơn 50 năm phát triển từ năm 1965 với việc đào tạo chuyên ngành Máy tính tại Khoa Toán Cơ thuộc Trường Đại học Tổng hợp Hà Nội. Với sự nỗ lực cố gắng của tập thể các cán bộ giảng viên, các thế hệ sinh viên, học viên và nghiên cứu sinh; dưới sự chỉ đạo sát sao, ủng hộ và tạo điều kiện của các thế hệ lãnh đạo Trường ĐHCN và ĐHQGHN, Khoa CNTT ngày hôm nay đã đạt được nhiều thành tích nổi bật trong hoạt động đào tạo, bồi dưỡng nhân tài và nghiên cứu khoa học tiếp cận trình độ tiên tiến trong khu vực và thế giới.', 1, 14020631);

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

DROP TABLE IF EXISTS `giang_vien`;
CREATE TABLE `giang_vien` (
  `id_giang_vien` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_bo_mon` int(11) DEFAULT NULL,
  `id_ptn` int(11) DEFAULT NULL,
  `name_khong_dau` varchar(45) NOT NULL,
  `hinh_anh` varchar(50) DEFAULT NULL,
  `level` smallint(4) NOT NULL,
  `id_linh_vuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giang_vien`
--

INSERT INTO `giang_vien` (`id_giang_vien`, `name`, `email`, `id_bo_mon`, `id_ptn`, `name_khong_dau`, `hinh_anh`, `level`, `id_linh_vuc`) VALUES
(1, 'Nguyễn Ngọc Hóa', 'hoa.nguyen@vnu.edu.vn', 1, 1, 'hoanguyen', NULL, 2, NULL),
(2, 'Nguyễn Trí Thành', 'ntthanh@vnu.edu.vn', 1, NULL, 'ntthanh', 'ntthanh.jpg', 2, NULL),
(3, 'Hà Quang Thụy', 'thuyhq@vnu.edu.vn', 1, NULL, 'thuyhq', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `huong_nghien_cuu`
--

DROP TABLE IF EXISTS `huong_nghien_cuu`;
CREATE TABLE `huong_nghien_cuu` (
  `id_huong_nghien_cuu` int(11) NOT NULL,
  `id_giang_vien` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_khong_dau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `huong_nghien_cuu`
--

INSERT INTO `huong_nghien_cuu` (`id_huong_nghien_cuu`, `id_giang_vien`, `name`, `name_khong_dau`) VALUES
(1, 1, 'Quản lý dữ liệu lớn', 'quan-ly-du-lieu-lon'),
(2, 1, 'Hệ tích hợp thông minh', 'he-tich-hop-thong-minh'),
(3, 2, 'Học máy', 'hoc-may'),
(4, 2, 'Khai phá dữ liệu (text/web, mạng xã hội, quy trình kinh doanh)', 'khai-pha-du-lieu'),
(5, 3, 'Tập thô', 'tap-tho'),
(6, 3, 'Công nghệ tri thức', 'cong-nghe-tri-thuc');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

DROP TABLE IF EXISTS `khoa`;
CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `name` text NOT NULL,
  `name_khong_dau` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `name`, `name_khong_dau`, `updated_at`, `created_at`) VALUES
(1, 'Khoa Công nghệ thông tin', 'khoa-cong-nghe-thong-tin', NULL, NULL),
(2, 'Khoa Điện tử Viễn thông', 'khoa-dien-tu-vien-thong', NULL, NULL),
(3, 'Khoa Vật lý Kỹ thuật & Công nghệ Nanô', 'khoa-vat-ky-ki-thuat-cong-nghe-nano', NULL, NULL),
(4, 'Khoa Cơ học Kỹ thuật & Tự động hóa', 'khoa-co-hoc-ky-thuat-tu-dong-hoa', NULL, NULL),
(5, 'Khoa Cơ điện tử', 'khoa-co-dien-tu', '2016-11-29 18:07:56', '2016-11-29 18:07:56'),
(6, 'Khoa Công nghệ vi tính', 'khoa-cong-nghe-vi-tinh', '2016-11-30 04:26:51', '2016-11-30 04:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `khoa_hoc`
--

DROP TABLE IF EXISTS `khoa_hoc`;
CREATE TABLE `khoa_hoc` (
  `id_khoa_hoc` varchar(50) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_khong_dau` varchar(45) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa_hoc`
--

INSERT INTO `khoa_hoc` (`id_khoa_hoc`, `name`, `name_khong_dau`, `id_khoa`) VALUES
('QH2014', 'Khóa 2014', 'khoa-2014', 1),
('QH2015', 'Khóa 2015', 'khoa-2015', 1),
('QH2016', 'Khóa 2016', 'khoa-2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `linh_vuc`
--

DROP TABLE IF EXISTS `linh_vuc`;
CREATE TABLE `linh_vuc` (
  `id_linh_vuc` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_khong_dau` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linh_vuc`
--

INSERT INTO `linh_vuc` (`id_linh_vuc`, `name`, `name_khong_dau`) VALUES
(1, 'Phân tích dữ liệu', 'phan-tich-du-lieu'),
(2, 'Quản trị hệ thống ', 'quan-tri-he-thong'),
(3, 'Lập trình viên', 'lap-trinh-vien'),
(4, 'Kỹ sư phần mềm', 'ky-su-phan-mem'),
(5, 'Phân tích hệ thống ', 'phan-tich-he-thong'),
(6, 'Chuyên viên hỗ trợ kỹ thuật', 'chuyen-vien-ho-tro-ky-thuat'),
(7, 'Thiết kế web/ dịch vụ Internet ', 'thiet-ke-web-dich-vu-internet');

-- --------------------------------------------------------

--
-- Table structure for table `nganh_hoc`
--

DROP TABLE IF EXISTS `nganh_hoc`;
CREATE TABLE `nganh_hoc` (
  `id_nganh_hoc` varchar(50) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_khong_dau` varchar(45) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nganh_hoc`
--

INSERT INTO `nganh_hoc` (`id_nganh_hoc`, `name`, `name_khong_dau`, `id_khoa`) VALUES
('1', 'Công nghệ thông tin', 'cong-nghe-thong-tin', 1),
('2', 'Điện tử', 'dien-tu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phong_thi_nghiem`
--

DROP TABLE IF EXISTS `phong_thi_nghiem`;
CREATE TABLE `phong_thi_nghiem` (
  `id_phong_thi_nghiem` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_khong_dau` varchar(100) NOT NULL,
  `mo_ta` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phong_thi_nghiem`
--

INSERT INTO `phong_thi_nghiem` (`id_phong_thi_nghiem`, `name`, `name_khong_dau`, `mo_ta`, `created_at`, `id_khoa`) VALUES
(1, 'Phòng Thí nghiệm An toàn thông tin', 'phong-thi-nghiem-an-toan-thong-tin', 'Phòng thí nghiệm An toàn thông tin được thành lập tháng 12 năm 2013 có nhiệm vụ đào tạo và nghiên cứu về các lĩnh vực an toàn thông tin và an ninh mạng.\r\n\r\nMột số đề tài nghiên cứu của phòng thí nghiệm:\r\n\r\nPhát triển thử nghiệm hệ thống cảnh báo cháy sử dụng mạng cảm biến không dây. Trường Đại học Công nghệ, ĐHQGHN, 2013-2014.\r\nNâng cao hiệu năng của một số giao thức định tuyến trong các mạng không dây. Trường Đại học Công nghệ, Đại học Quốc gia Hà Nội, 2011-2012.\r\nNghiên cứu xây dựng Hệ thống cung cấp và quản lý chứng chỉ số thuộc Hạ tầng cơ sở mật mã khóa công khai (PKI), nhằm bảo đảm an toàn các giao dịch trên mạng máy tính, phục vụ công tác quản lý Nhà nước tại TP Hà Nội. Thành phố Hà Nội, 2007-2008.\r\nNghiên cứu ứng dụng công nghệ tác tử tìm kiếm, truy nhập và truyền tải thông tin trên mạng Internet. Trường Đại học Công nghệ, ĐHQGHN, 2005-2006.\r\nHạ tầng cơ sở mật mã khóa công khai (PKI), nhằm bảo đảm an toàn các giao dịch trên mạng máy tính, phục vụ công tác quản lý Nhà nước tại TP Hà Nội. Thành phố Hà Nội, 2005-2006.\r\nNghiên cứu khả năng, hiệu quả của một số thuật toán trong an toàn truyền tin. Bộ Khoa học và Công nghệ, 2004-2005.', '2016-11-28 20:07:04', 1),
(2, 'Phòng Thí nghiệm Công nghệ Tri thức', 'phong-thi-nghiem-cong-nghe-tri-thuc', 'hòng Thí nghiệm Công nghệ Tri thức (Knowledge Technology Laboratory – KTLab), Khoa Công nghệ Thông tin được thành lập theo quyết định số 1070/QĐ-TCHC ngày 15/11/2010 của Hiệu trưởng Trường Đại học Công nghệ, Đại học Quốc gia Hà Nội. Tiền thân của KTLab là nhóm nghiên cứu Khai phá dữ liệu và ứng dụng (1998 – 2006) và Phòng Thí nghiệm vệ tinh “Công nghệ Tri thức và An toàn dữ liệu” (SIS-KTLab, 2006 – 2010). Bên cạnh nhiệm vụ đạo tạo đại học và sau đại học, KTLab tập trung thúc đẩy việc tổ chức và triển khai các dự án nghiên cứu về khoa học dữ liệu (data science) và công nghệ tri thức (knowledge technology) cũng như việc hợp tác với doanh nghiệp, các đơn vị trong nước và quốc tế.\r\n\r\nKTLab hiện nay có một phó giáo sư, 1 tiến sĩ, 2 thạc sĩ có nhiều kinh nghiệm trong giảng dạy đào tạo và triển khai các dự án nghiên cứu về khai phá dữ liệu (data mining), học máy (machine learning), trí tuệ doanh nghiệp (business intelligence). Ngoài ra, với lịch sử phát triển từ năm 1998, KTLab có một lực lượng đông đảo các cán bộ cộng tác viên đang công tác trong và ngoài nước như Giáo sư Nguyễn Hùng Sơn, Giáo sư Nguyễn Anh Linh (Ba Lan), Tiến sĩ Đoàn Sơn (Hoa Kỳ), TS. Nguyễn Cẩm Tú (Trung Quốc).', '2016-11-29 20:08:13', 1),
(3, 'Phòng Thí nghiệm Hệ thống Nhúng', 'phong-thi-nghiem-he-thong-nhung', 'Ngày 11 tháng 10 năm 2005 Đại học Quốc gia Hà Nội (ĐHQGHN) đã phê duyệt dự án “Đầu tư chiều sâu trang thiết bị, nâng cao năng lực nghiên cứu khoa học và triển khai ứng dụng công nghệ” cho Phòng thí nghiệm Các hệ tích hợp thông minh – SIS (Smart Integrated Systems). Phòng thí nghiệm (PTN) SIS thuộc trường Đại học Công nghệ đã được thành lập ngày 11 tháng 8 năm 2006 (theo Quyết định số 406/QĐ-TCCB&CTSV), bao gồm các PTN vệ tinh: 1/ Central Lab: VLSI/ASIC Systems Design LAB-0; 2/ SP Lab: Signal Processing Laboratory; 3/ INS Lab: Intelligent Networks and Systems Laboratory; 4/ KTIS Lab: Knowledge Technology and Information Security Laboratory và 5/ Laboratory of Embedded Systems.\r\n\r\nPhòng thí nghiệm Hệ thống nhúng (PTN HTN) được thành lập ngày 15 tháng 11 năm 2010, với chức năng sau:\r\n\r\nTổ chức nghiên cứu và triển khai ứng dụng trong lĩnh vực hệ thống nhúng;\r\nThực hiện nhiệm vụ đào tạo sau đại học và đào tạo đại học; Tổ chức triển khai giải pháp tích hợp đào tạo và nghiên cứu khoa học;\r\nKhai thác, sử dụng trang thiết bị được đầu tư từ Dự án “Đầu tư chiều sâu trang thiết bị, nâng cao năng lực nghiên cứu khoa học và triển khai ứng dụng cho phòng thí nghiệm các hệ tích hợp thông minh” phục vụ các hướng nghiên cứu về hệ thống nhúng.\r\nCác nhiệm vụ cụ thể:\r\n\r\nNghiên cứu các vấn đề lý thuyết, công nghệ và quy trình sản xuất các hệ thống nhúng. Các kết quả nghiên cứu này cần được sử dụng cho các môn học có liên quan trong trường ĐHCN.\r\nThử nghiệm chế tạo một số hệ thống nhúng từ đơn giản đến phức tạp. Nhiệm vụ này cần gắn với việc làm Khóa luận tốt nghiệp của sinh viên, hoặc Luận văn Cao học, hoặc Luận án Tiến sĩ.\r\nĐưa vào áp dụng một số hệ thống nhúng, trước hết là tại trường ĐHCN để đánh giá hiệu quả của việc áp dụng. Những hệ thống có nhiều khả năng áp dụng rộng rãi sẽ được đầu tư nghiên cứu để sản xuất và đưa ra thị trường.\r\nTìm kiếm và thiết lập các mối quan hệ hợp tác trong nước và quốc tế trong việc nghiên cứu và triển khai ứng dụng (R&D), cũng như đào tạo nhân lực làm việc trong lĩnh vực hệ thống nhúng.', '2016-11-29 22:10:22', 1),
(4, 'Phòng Thí nghiệm Tương tác Người – Máy', 'phong-thi-nghiem-tuong-tac-nguoi-may', 'Được thành lập từ năm 2008, phòng thí nghiệm Tương tác Người máy đã có đội ngũ cán bộ dày dặn kinh nghiệm trong công tác nghiên cứu khoa học cũng như giảng dạy. PTN có 2 phó giáo sư, 4 tiến sỹ, 2 thạc sỹ. Nhiều cán bộ tốt nghiệp tiến sỹ từ các cơ sở đào tạo tiến tiến ở các nước phát triển như: Úc, Hà Lan, Ý, Hàn Quốc.\r\n\r\nPhòng thí nghiệm Tương tác người-máy đảm nhận nhiệm vụ: Tổ chức nghiên cứu và triển khai ứng dụng về tương tác người-máy, xử lý ngôn ngữ tự nhiên, xử lý ảnh, đồ hoạ máy tính và bảo mật ảnh,… Tổ chức thực hiện điểm các giải pháp tích hợp đào tạo và nghiên cứu khoa học, góp phần thực hiện chủ trương đào tạo phân luồng theo định hướng học thuật, đào tạo chất lượng cao và đào tạo trình độ quốc tế. Thực hiện nhiệm vụ đào tạo đại học, sau đại học. Các cán bộ nghiên cứu của phòng thí nghiệm được đào tạo cơ bản và chuyên sâu về nhiễu lĩnh vực trong Khoa học máy tính trong đó có:\r\n\r\nXử lý ngôn ngữ tự nhiên\r\nĐồ họa máy tính\r\nXử lý ảnh\r\nXử lý video\r\nThị giác máy\r\nXử lý ảnh viễn thám\r\nPhân tích dữ liệu không thời gian', '2016-11-28 22:09:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

DROP TABLE IF EXISTS `sinh_vien`;
CREATE TABLE `sinh_vien` (
  `id_sinh_vien` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `id_khoa_hoc` varchar(50) DEFAULT NULL,
  `id_nganh_hoc` varchar(50) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` smallint(4) NOT NULL,
  `quyen_de_tai` smallint(4) NOT NULL,
  `id_khoa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinh_vien`
--

INSERT INTO `sinh_vien` (`id_sinh_vien`, `name`, `id_khoa_hoc`, `id_nganh_hoc`, `email`, `password`, `level`, `quyen_de_tai`, `id_khoa`, `created_at`) VALUES
(14020631, 'Phạm Huy Mạnh', NULL, NULL, 'huymanhtmhp@gmail.com', 'manhtmhp123', 1, 0, 1, '2016-11-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vpk`
--

DROP TABLE IF EXISTS `vpk`;
CREATE TABLE `vpk` (
  `id_vpk` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bo_mon`
--
ALTER TABLE `bo_mon`
  ADD PRIMARY KEY (`id_bo_mon`),
  ADD KEY `bomon_to_khoa_idx` (`id_khoa`),
  ADD KEY `id_khoa` (`id_khoa`);

--
-- Indexes for table `de_tai`
--
ALTER TABLE `de_tai`
  ADD PRIMARY KEY (`id_de_tai`),
  ADD KEY `detai_to_hnc_idx` (`id_huong_nghien_cuu`),
  ADD KEY `detai_to_sv_idx` (`id_sv`);

--
-- Indexes for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id_giang_vien`),
  ADD KEY `giangvien_to_bomon_idx` (`id_bo_mon`),
  ADD KEY `giangvien_to_ptn_idx` (`id_ptn`),
  ADD KEY `giangvien_to_linhvuc_idx` (`id_linh_vuc`);

--
-- Indexes for table `huong_nghien_cuu`
--
ALTER TABLE `huong_nghien_cuu`
  ADD PRIMARY KEY (`id_huong_nghien_cuu`),
  ADD KEY `hnc_to_gv_idx` (`id_giang_vien`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Indexes for table `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD PRIMARY KEY (`id_khoa_hoc`),
  ADD KEY `khoahoc_to_khoa_idx` (`id_khoa`);

--
-- Indexes for table `linh_vuc`
--
ALTER TABLE `linh_vuc`
  ADD PRIMARY KEY (`id_linh_vuc`);

--
-- Indexes for table `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  ADD PRIMARY KEY (`id_nganh_hoc`),
  ADD KEY `nganhhoc_to_khoa_idx` (`id_khoa`);

--
-- Indexes for table `phong_thi_nghiem`
--
ALTER TABLE `phong_thi_nghiem`
  ADD PRIMARY KEY (`id_phong_thi_nghiem`),
  ADD KEY `ptn_to_khoa_idx` (`id_khoa`);

--
-- Indexes for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`id_sinh_vien`),
  ADD KEY `sv_to_khoa_idx` (`id_khoa`),
  ADD KEY `sv_to_khoahoc_idx` (`id_khoa_hoc`),
  ADD KEY `sv_to_nganhhoc_idx` (`id_nganh_hoc`);

--
-- Indexes for table `vpk`
--
ALTER TABLE `vpk`
  ADD PRIMARY KEY (`id_vpk`),
  ADD KEY `vpk_to_khoa_idx` (`id_khoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `de_tai`
--
ALTER TABLE `de_tai`
  MODIFY `id_de_tai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `huong_nghien_cuu`
--
ALTER TABLE `huong_nghien_cuu`
  MODIFY `id_huong_nghien_cuu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `linh_vuc`
--
ALTER TABLE `linh_vuc`
  MODIFY `id_linh_vuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bo_mon`
--
ALTER TABLE `bo_mon`
  ADD CONSTRAINT `id_to_id` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON UPDATE CASCADE;

--
-- Constraints for table `de_tai`
--
ALTER TABLE `de_tai`
  ADD CONSTRAINT `detai_to_hnc` FOREIGN KEY (`id_huong_nghien_cuu`) REFERENCES `huong_nghien_cuu` (`id_huong_nghien_cuu`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detai_to_sv` FOREIGN KEY (`id_sv`) REFERENCES `sinh_vien` (`id_sinh_vien`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD CONSTRAINT `giangvien_to_bomon` FOREIGN KEY (`id_bo_mon`) REFERENCES `bo_mon` (`id_bo_mon`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `giangvien_to_linhvuc` FOREIGN KEY (`id_linh_vuc`) REFERENCES `linh_vuc` (`id_linh_vuc`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `giangvien_to_ptn` FOREIGN KEY (`id_ptn`) REFERENCES `phong_thi_nghiem` (`id_phong_thi_nghiem`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `huong_nghien_cuu`
--
ALTER TABLE `huong_nghien_cuu`
  ADD CONSTRAINT `hnc_to_gv` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id_giang_vien`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD CONSTRAINT `khoahoc_to_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  ADD CONSTRAINT `nganhhoc_to_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `phong_thi_nghiem`
--
ALTER TABLE `phong_thi_nghiem`
  ADD CONSTRAINT `ptn_to_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sv_to_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sv_to_khoahoc` FOREIGN KEY (`id_khoa_hoc`) REFERENCES `khoa_hoc` (`id_khoa_hoc`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sv_to_nganhhoc` FOREIGN KEY (`id_nganh_hoc`) REFERENCES `nganh_hoc` (`id_nganh_hoc`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `vpk`
--
ALTER TABLE `vpk`
  ADD CONSTRAINT `vpk_to_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
