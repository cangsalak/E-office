-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 05:02 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `accessId` int(11) NOT NULL,
  `accessDate` date NOT NULL,
  `accessAttachment` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `positionId` int(11) NOT NULL,
  `documentId` int(11) NOT NULL,
  `userId` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `accessAaction` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`accessId`, `accessDate`, `accessAttachment`, `positionId`, `documentId`, `userId`, `accessAaction`) VALUES
(1, '2017-12-15', 'image_5a3307b6c8019.jpg', 2, 14, '1', ''),
(2, '2017-12-15', 'image_5a3307b6c8019.jpg', 13, 14, '1', ''),
(3, '2017-12-15', 'image_5a3307b6c8019.jpg', 28, 14, '1', ''),
(4, '2017-12-15', 'image_5a3307b6c8019.jpg', 33, 14, '1', ''),
(5, '2017-12-15', 'image_5a3354aedf09d.', 13, 14, '2', ''),
(6, '2017-12-15', 'image_5a3354aedf09d.', 28, 14, '2', ''),
(7, '2017-12-15', 'image_5a3356237115f.', 2, 17, '1', ''),
(8, '2017-12-15', 'image_5a3356dd094f7.', 13, 17, '2', 'จัด'),
(9, '2017-12-15', 'image_5a3356dd094f7.', 28, 17, '2', 'จัด'),
(10, '2017-12-15', 'image_5a335724d873b.', 33, 17, '3', ''),
(11, '2017-12-18', 'image_5a3746481eda5.', 2, 18, '1', ''),
(12, '2017-12-18', 'image_5a3746fb9da9d.', 13, 18, '2', ''),
(13, '2017-12-18', 'image_5a3746fb9da9d.', 28, 18, '2', ''),
(14, '2018-01-22', 'image_5a65a928f094c.', 3, 14, '1', ''),
(15, '2018-01-22', 'image_5a65a98fa31c0.', 32, 15, '1', 'dsfsdfdsf'),
(16, '2018-01-22', 'image_5a65aa9f3de41.', 2, 15, '1', 'นำส่งสำนักการคลังและทรัพย์สิน'),
(17, '2018-01-22', 'image_5a65aae1ed75b.', 24, 1, '1', 'เพื่อโปรดสั่งการ'),
(18, '2018-01-22', 'image_5a65ab243977b.', 28, 14, '1', 'on'),
(19, '2018-01-22', 'image_5a65ac29d5f46.', 0, 14, '1', '<br />\r\n<b>Notice</b>:  Undefined variable: accessAaction1 in <b>C:xampphtdocsE-officeadminaccessDocument.php</b> on line <b>173</b><br />\r\n'),
(20, '2018-01-22', 'image_5a65ad1f5d83b.', 0, 14, '1', 'sdfdsfdsfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `categoryid`
--

CREATE TABLE `categoryid` (
  `categoryId` int(11) UNSIGNED NOT NULL,
  `categoryName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoryid`
--

INSERT INTO `categoryid` (`categoryId`, `categoryName`) VALUES
(0, 'แอดมิน'),
(2, 'อธิการบดี'),
(3, 'รองอธิการบดี'),
(4, 'ผู้อำนวยการ'),
(5, 'คณบดี');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `fromName` varchar(150) NOT NULL,
  `statusName` varchar(150) NOT NULL,
  `documentDate` date NOT NULL,
  `documentTime` date NOT NULL,
  `attachment` varchar(300) CHARACTER SET latin1 NOT NULL,
  `categoryDocument` varchar(150) NOT NULL,
  `documentName` varchar(250) NOT NULL,
  `action` varchar(150) NOT NULL,
  `story` varchar(250) NOT NULL,
  `Number_of_book` varchar(10) NOT NULL,
  `positionId` int(11) NOT NULL,
  `documentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`fromName`, `statusName`, `documentDate`, `documentTime`, `attachment`, `categoryDocument`, `documentName`, `action`, `story`, `Number_of_book`, `positionId`, `documentId`) VALUES
('sdfsdf', 'ผู้อำนวยการหลักสูตรบริหารธุรกิจดุษฏีบัณฑิต', '2017-01-01', '2017-11-20', '', 'เอกสารภายใน', 'dsfsd', 'เห็นควรชะลอ', ' ', '123321', 1, 1),
('ำดพ', 'ู้อำนวยการหลักสูตรศึกษาศาสตรสดุษฏีบัณฑิต', '2017-01-01', '2017-11-23', 'parkpoom_android_resume.pdf', 'เอกสารภายใน', 'กกดกด', 'เห็นควรชะลอ', ' ', '213313', 9, 4),
('ฟหกฟหก', '', '2017-01-01', '2017-11-23', '', 'เอกสารภายนอก', 'ฟหกฟหก', '', ' ', 'ฟหกก', 16, 5),
('ฟหกหฟก', 'ู้อำนวยการหลักสูตรศึกษาศาสตรสดุษฏีบัณฑิต', '2017-01-01', '2017-11-23', '', 'เอกสารภายนอก', 'ฟหก', 'ขอความเห็น', ' ', 'หฟกฟหก', 0, 6),
('กฟหกฟหก', '', '2017-01-01', '2017-11-23', '', 'เอกสารภายนอก', 'กฟหกฟห', '', ' ', 'ฟหกฟห', 17, 7),
('asdas', '', '2017-01-01', '2017-11-24', '', 'เอกสารภายนอก', 'sadsa', '', ' ', '5456', 5, 8),
('454545', '', '2017-01-01', '2017-11-24', '', 'เอกสารภายนอก', '4545', 'โปรดตรวจสอบข้อมูล', ' ', '4545', 14, 9),
('sdsd', 'ผู้อำนวยการหลักสูตรบริหารธุรกิจดุษฏีบัณฑิต', '2017-01-01', '2017-11-24', 'image_5a17ca935ad9e.jpg', 'เอกสารภายนอก', 'sdsdsdsd', 'เพื่อโปรดสั่งการ', ' ', 'sasdsdsds', 1, 10),
('สำนักงานคณะกรรมการ', 'ู้อำนวยการหลักสูตรศึกษาศาสตรสดุษฏีบัณฑิต', '2017-08-02', '2017-11-24', 'image_5a17dcdd3b821.pdf', 'เอกสารภายนอก', 'การจัดทำข้อเสนอ', 'เพื่อโปรดพิจารณา', ' ', '1903/2560', 3, 11),
('sadasdsad', 'ู้อำนวยการหลักสูตรนิติศาสตรมหาบัณฑิต', '2017-01-01', '2017-11-24', 'image_5a17f07b0bd9f.pdf', 'เอกสารภายใน', 'sadsad', 'เห็นควรชะลอ', ' ', '2312323', 3, 12),
('สำนักงานคณะกรรมการ', 'อำนวยการหลักสูตรศึกษาศาสตรสดุษฏีบัณฑิต', '2560-12-15', '2017-12-15', 'image_5a32b16916c11.jpg', 'เอกสารภายนอก', 'การจัดทำข้อเสนอ', 'เพื่อโปรดสั่งการ', ' ', '12321323', 1, 14),
('สำนักงานคณะกรรมการ', 'ผู้ช่วยอธิการบดีฝ่ายพัฒนานักศึกษา', '2560-12-15', '2017-12-15', 'image_5a32dc49418be.jpg', 'เอกสารภายนอก', 'การจัดทำข้อเสนอ', 'นำส่งสำนักหอสมุดกลาง', ' ', 'asdsadsad', 33, 15),
('สำนักงานคณะกรรมการ', 'ผู้ช่วยอธิการบดีฝ่ายประกันคุณภาพการศึกษา', '2560-12-15', '2017-12-15', 'image_5a32e24b2b6f6.jpg', 'เอกสารภายนอก', 'การจัดทำข้อเสนอ', 'เพื่อโปรดพิจารณา', ' ', 'sadsa', 13, 16),
('สำนักงาน', 'ผู้ช่วยอธิการบดีฝ่ายพัฒนานักศึกษา', '2560-12-15', '2017-12-15', 'image_5a335601f3da8.jpg', 'เอกสารภายนอก', 'ทดสอบ', 'เพื่อโปรดพิจารณา', ' ', '112112', 2, 17),
('สำนักงาน', 'อธิการบดี', '2560-12-18', '2017-12-18', 'image_5a374558985fb.jpg', 'เอกสารภายใน', 'ทดสอบ', 'เพื่อโปรดทราบ', ' ', '131232314', 2, 18),
('ม.ราชภัฏจันทรเกษม', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', 0, 19),
('ม.ราชภัฏจันทรเกษม', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `positionuser`
--

CREATE TABLE `positionuser` (
  `positionId` int(11) UNSIGNED NOT NULL,
  `positionName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `positionuser`
--

INSERT INTO `positionuser` (`positionId`, `positionName`) VALUES
(2, 'อธิการบดี'),
(3, 'รองอธิการบดีนโยบายและแผน'),
(4, 'รองอธิการบดีฝ่ายพัฒนากิจกรรมมหาวิทยาลัย'),
(5, 'รองอธิการบดีฝ่ายวิชาการ'),
(6, 'ที่ปรึกษาอธิการบดี'),
(7, 'ผู้ช่วยอธิการบดี'),
(8, 'ผู้ช่วยอธิการบดีฝ่ายวิชาการ'),
(9, 'ผู้ช่วยอธิการบดีฝ่ายบริหาร คณะการบิน'),
(10, 'ผู้ช่วยอธิการบดีฝ่ายพัฒนานักศึกษา'),
(11, 'ผู้ช่วยอธิการบดีฝ่ายประกันคุณภาพการศึกษา'),
(12, 'ผู้ช่วยอธิการบดีฝ่ายพัฒนานักศึกษา'),
(13, 'ผู้ช่วยอธิการบดีฝ่ายประกันคุณภาพการศึกษา'),
(14, 'ผู้อำนวยการสำนักการคลังและทรัพย์สิน'),
(15, 'ผู้อำนวยการหลักสูตรวิทยาศาสตร์มหาบัณฑิต สาขาวิชาการบริหารการบิน'),
(16, 'ผู้อำนวยการสำนักพัฒนานักศึกษา'),
(17, 'ผู้อำนวยการสำนักแผนงานและประกันคุณภาพการศึกษา'),
(18, 'ผู้อำนวยการสำนักประชาสัมพันธ์'),
(19, 'ผู้อำนวยการหลักสูตรศึกษาศาสตรดุษฏีบัณฑิต สาขาวิชาการบริหารการและภาวะผู้นำการเปลี่ยนแปลง'),
(20, 'ผู้อำนวยการหลักสูตรศึกษาศาสตรมหาบัณฑิต สาขาวิชาการบริหารการศึกษา'),
(21, 'ผู้อำนวยการหลักสูตรปรัชญาดุษฏีบัณฑิต สาขาวิชารัฐประศาสนศาสตร์'),
(22, 'ผู้อำนวยการหลักสูตรบริหารธุรกิจดุษฏีบัณฑิต สาขาวิชาการตลาด'),
(23, 'ผู้อำนวยการหลักสูตรบริหารธุรกิจมหาบัณฑิต'),
(24, 'ผู้อำนวยการสำนกวิจัยและบริการวิชาการ'),
(25, 'ผู้อำนวยการหลักสูตรรัฐประศาสนศาสตรมหาบัณฑิต สาขาวิชารัฐประศาสนศาสตร์'),
(26, 'ผู้อำนวยการหลักสูตรนิติศาสตรมหาบัณฑิต'),
(27, 'ผู้อำนวยการหลักสูตรพยาบาลศาสตรมหาบัณฑิต สาขาวิชาการบริหารการพยาบาล'),
(28, 'ผู้อำนวยการสำนักวิชาการ'),
(29, 'ผู้อำนวยการสำนักสารสนเทศ'),
(30, 'ผู้อำนวยการสำนักหอสมุดกลาง'),
(31, 'ผู้อำนวยการสำนักหอสมุดกลาง'),
(32, 'คณบดี'),
(33, 'สำนักอธิการบดี (เพื่อจัดเก็บ)');

-- --------------------------------------------------------

--
-- Table structure for table `the_user`
--

CREATE TABLE `the_user` (
  `userId` varchar(13) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `positionId` int(11) UNSIGNED NOT NULL,
  `positionId2` int(11) UNSIGNED NOT NULL,
  `positionId3` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `the_user`
--

INSERT INTO `the_user` (`userId`, `userName`, `email`, `password`, `categoryId`, `positionId`, `positionId2`, `positionId3`) VALUES
('1', 'ผู้ดูแลระบบ', 'admin@gmail.com', '12345', 1, 1, 0, 0),
('2', 'ผู้ใช้ระดับ2', 'user2@gmail.com', '12345', 2, 2, 0, 0),
('3', 'ผูัใช้ระดับ 3', 'user3@gmail.com', '12345', 3, 13, 0, 0),
('4', 'ผู้ใช้ระดับ4', 'user4@gmail.com', '12345', 4, 28, 0, 0),
('5', 'ผู้ใช้ระดับ5', 'user5@gmail.com', '12345', 5, 33, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`accessId`);

--
-- Indexes for table `categoryid`
--
ALTER TABLE `categoryid`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`documentId`);

--
-- Indexes for table `positionuser`
--
ALTER TABLE `positionuser`
  ADD PRIMARY KEY (`positionId`);

--
-- Indexes for table `the_user`
--
ALTER TABLE `the_user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `accessId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categoryid`
--
ALTER TABLE `categoryid`
  MODIFY `categoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `documentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `positionuser`
--
ALTER TABLE `positionuser`
  MODIFY `positionId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
