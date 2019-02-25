--
-- Database: `php_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Fashion', '2014-06-01 00:35:07', '2019-02-25 01:48:17'),
(2, 'Electronics', '2014-06-01 00:35:07', '2014-05-30 09:34:33'),
(3, 'Motors', '2014-06-01 00:35:07', '2014-05-30 09:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,6) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES
(1, 'LG P880 4X HD', 'The most awesome model of 2019!', '336.150000', 3, '2014-06-01 01:12:26', '2019-02-25 01:35:17'),
(2, 'Electronics', 'The most awesome phone of 2013!', '299.000000', 2, '2014-06-01 01:12:26', '2019-02-25 01:45:40'),
(3, 'Motors', 'The most awesome model of 2019!', '336.150000', 3, '2014-06-01 01:12:26', '2019-02-25 01:46:30'),
(6, 'Bench Shirt', 'The best shirt!', '29.000000', 1, '2014-06-01 01:12:26', '2014-05-30 18:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', '399.000000', 2, '2014-06-01 01:13:45', '2014-05-30 18:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', '259.000000', 2, '2014-06-01 01:14:13', '2014-05-30 18:14:08'),
(9, 'Spalding Watch', 'My sports watch.', '199.000000', 1, '2014-06-01 01:18:36', '2014-05-30 18:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', '300.000000', 2, '2014-06-06 17:10:01', '2014-06-05 10:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', '100.000000', 2, '2014-06-06 17:11:04', '2014-06-05 10:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', '60.000000', 1, '2014-06-06 17:12:21', '2014-06-05 10:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', '70.000000', 1, '2014-06-06 17:12:59', '2014-06-05 10:12:49'),
(25, 'Abercrombie Allen Anew Shirt', 'Awesome new shirt!', '999.000000', 1, '2014-11-22 18:42:13', '2014-11-21 11:42:13'),
(26, 'Another product', 'Awesome product!', '555.000000', 2, '2014-11-22 19:07:34', '2014-11-21 12:07:34'),
(27, 'Bag', 'Awesome bag for you!', '999.000000', 1, '2014-12-04 21:11:36', '2014-12-03 14:11:36'),
(28, 'Wallet', 'You can absolutely use this one!', '799.000000', 1, '2014-12-04 21:12:03', '2014-12-03 14:12:03'),
(30, 'Wal-mart Shirt', '', '555.000000', 2, '2014-12-13 00:52:29', '2014-12-11 17:52:29'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', '333.000000', 1, '2014-12-13 00:52:54', '2014-12-11 17:52:54'),
(32, 'Washing Machine Model PTRR', 'Some new product.', '999.000000', 1, '2015-01-08 22:44:15', '2015-01-07 15:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `pwd`, `created`, `modified`) VALUES
(1, 'Test Human', 'test@example.com', '', '$2y$12$Rl6E2PXRxyxPhXss/ZhAxe76.ovMP5h42qUXVBrin/VfbTs1f5Xsm', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


