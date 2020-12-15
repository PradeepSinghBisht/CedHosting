-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2020 at 03:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CedHosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(44) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_date` datetime NOT NULL,
  `author_name` varchar(44) NOT NULL DEFAULT 'Anonymous',
  `caption_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(55) NOT NULL,
  `comp_logo` varchar(1000) NOT NULL,
  `comp_contact` varchar(33) NOT NULL,
  `comp_email` varchar(33) NOT NULL,
  `comp_address` varchar(88) NOT NULL,
  `comp_city` varchar(44) NOT NULL,
  `comp_state` int(11) NOT NULL,
  `comp_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_billing_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `promocode_applied_id` int(11) NOT NULL,
  `discount_amt` float NOT NULL,
  `total_amt_after_dis` float NOT NULL,
  `tax_amt` float NOT NULL,
  `final_invoice_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `prod_parent_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `html` longtext DEFAULT NULL,
  `prod_available` tinyint(1) NOT NULL,
  `prod_launch_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES
(1, 0, 'Hosting', NULL, 1, '2020-12-14 16:55:01'),
(13, 1, 'Linux Hosting', '<div class=\"linux-section\">\r\n						<div class=\"container\">\r\n							<div class=\"linux-grids\">\r\n								<div class=\"col-md-8 linux-grid\">\r\n								<h2>Linux Hosting</h2>\r\n								<ul>\r\n									<li><span>Unlimited </span> Domains, Disk Space, Bandwidth and Email Addresses</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>\r\n									<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>\r\n								</ul>\r\n									<a href=\"#product\">view plans</a>\r\n								</div>\r\n								<div class=\"col-md-4 linux-grid1\">\r\n									<img src=\"images/linux.png\" class=\"img-responsive\" alt=\"\"/>\r\n								</div>\r\n								<div class=\"clearfix\"></div>\r\n							</div>\r\n						</div>\r\n					</div>', 1, '2020-12-14 16:55:01'),
(14, 1, 'Cms Hosting', '<div class=\"linux-section\">\r\n						<div class=\"container\">\r\n							<div class=\"linux-grids\">\r\n								<div class=\"col-md-8 linux-grid\">\r\n								<h2>CMS Hosting</h2>\r\n								<ul>\r\n									<li><span>Unlimited </span> domains, email and disk space</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>1 click</span> WordPress Installation with cPanel (demo) platform</li>\r\n									<li><span>Launch  </span> your business with Rs. 1000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>\r\n								</ul>\r\n									<a href=\"#product\">view plans</a>\r\n								</div>\r\n								<div class=\"col-md-4 linux-grid1\">\r\n									<img src=\"images/cms.png\" class=\"img-responsive\" alt=\"\"/>\r\n								</div>\r\n								<div class=\"clearfix\"></div>\r\n							</div>\r\n						</div>\r\n					</div>', 1, '2020-12-14 16:55:01'),
(15, 1, 'Windows Hosting', '<div class=\"linux-section\">\r\n						<div class=\"container\">\r\n							<div class=\"linux-grids\">\r\n								<div class=\"col-md-8 linux-grid\">\r\n								<h2>Windows Hosting</h2>\r\n								<ul>\r\n									<li>Disk Space, Bandwidth and Email Addresses</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>\r\n									<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>\r\n								</ul>\r\n									<a href=\"#product\">view plans</a>\r\n								</div>\r\n								<div class=\"col-md-4 linux-grid1\">\r\n									<img src=\"images/window.png\" class=\"img-responsive\" alt=\"\"/>\r\n								</div>\r\n								<div class=\"clearfix\"></div>\r\n							</div>\r\n						</div>\r\n					</div>', 0, '2020-12-14 16:55:01'),
(16, 1, 'Wordpress Hosting', '<div class=\"linux-section\">\r\n						<div class=\"container\">\r\n							<div class=\"linux-grids\">\r\n								<div class=\"col-md-8 linux-grid\">\r\n								<h2>Wordpress Hosting</h2>\r\n								<ul>\r\n									<li><span>Unlimited </span> domains, email and disk space</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>1 click</span> WordPress Installation with cPanel (demo) platform</li>\r\n									<li><span>Launch  </span> your business with Rs. 1000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>\r\n								</ul>\r\n									<a href=\"#product\">view plans</a>\r\n								</div>\r\n								<div class=\"col-md-4 linux-grid1\">\r\n									<img src=\"images/word.png\" class=\"img-responsive\" alt=\"\"/>\r\n								</div>\r\n								<div class=\"clearfix\"></div>\r\n							</div>\r\n						</div>\r\n					</div>', 1, '2020-12-14 16:55:01'),
(21, 13, 'Standard', 'iphone.com', 1, '2020-12-15 11:48:23'),
(24, 14, 'Advanced', 'IphoneX1.com', 1, '2020-12-15 11:49:38'),
(25, 15, 'Bussiness', 'IphoneX2.com', 1, '2020-12-15 11:50:53'),
(27, 16, 'Pro', 'IphoneX3.com', 0, '2020-12-15 11:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_description`
--

CREATE TABLE `tbl_product_description` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `mon_price` float NOT NULL,
  `annual_price` float NOT NULL,
  `sku` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_description`
--

INSERT INTO `tbl_product_description` (`id`, `prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES
(3, 21, '{\"webspaces\":\"10\",\"bandwidth\":\"50\",\"domain\":\"10\",\"language\":\"PHP\",\"mailbox\":\"10\"}', 100, 1000, '#12'),
(6, 24, '{\"webspaces\":\"20\",\"bandwidth\":\"200\",\"domain\":\"20\",\"language\":\"PHP\",\"mailbox\":\"20\"}', 120, 1200, '12'),
(7, 25, '{\"webspaces\":\"25\",\"bandwidth\":\"250\",\"domain\":\"50\",\"language\":\"PHP\",\"mailbox\":\"25\"}', 200, 2000, '15'),
(9, 27, '{\"webspaces\":\"45\",\"bandwidth\":\"500\",\"domain\":\"50\",\"language\":\"PHP\",\"mailbox\":\"50\"}', 300, 3000, '20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(22) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `activation_time` datetime NOT NULL,
  `tenure` char(1) NOT NULL,
  `expiry_time` datetime NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email_approved` tinyint(1) DEFAULT 0,
  `phone_approved` tinyint(1) DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL,
  `sign_up_date` datetime DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `security_question` varchar(100) DEFAULT NULL,
  `security_answer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES
(1, 'pradeep.bishtsingh53@gmail.com', 'Pradeep Singh Bisht', '8960406682', 1, 1, 1, 1, '2020-12-10 20:08:17', '640aa1f7ae8c59546d1e4c7a90120c41', 'What is Your Best Friend Name', 'ZNMD'),
(2, 'sameerkhan@gmail.com', 'Sameer Khan', '9999999999', 0, 1, 1, 0, '2020-12-11 10:31:03', '5d0755ca4682dc4d38284c89b15aa0cf', 'What is Your Best Friend Name', 'smr'),
(6, 'shobha@gmail.com', 'Shobha', '7355035988', 0, 1, 1, 0, '2020-12-14 18:49:00', '72354bbdb706b1c47df41c886c9c99a1', 'What Was The First Book You Ever Read', 'shobha'),
(7, 'rajiv@gmail.com', 'Rajiv', '9889798189', 0, 0, 0, 0, '2020-12-14 20:00:53', '122ba0c0b14db2d86447f54fcd803bac', 'What Was The First Book You Ever Read', 'rajiv'),
(10, 'avinash@gmail.com', 'Avinash Sharma', '8234567891', 0, 0, 0, 0, '2020-12-15 13:19:34', '9333f7983b47987462531f268e661548', 'What Was The First Book You Ever Read', 'avi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_billing_add`
--

CREATE TABLE `tbl_user_billing_add` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(55) NOT NULL,
  `house_no` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` int(11) NOT NULL,
  `country` varchar(55) NOT NULL,
  `pincode` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
