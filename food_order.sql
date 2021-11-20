-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 03:09 PM
-- Server version: 5.7.14
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(18, 'Kyaw Bo Lin', 'bravit.james@gmail.com', '4axiZiXJK/duA'),
(11, 'Ei Thinzar', 'pinkbearqueen@gmail.com', '4axiZiXJK/duA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE `tbl_advertisement` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`id`, `image_name`, `featured`) VALUES
(1, 'Food_order_1800fastfood.jpg', 'show'),
(2, 'Food_order_2455adv.jpg', 'show'),
(3, 'Food_order_472koreanfood.jpg', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(50) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Coffee ', 'Food_order_367_coffee.jpg', 'show', 'ok'),
(2, 'Noodle', 'Food_order_503_noodle.jpg', 'show', 'ok'),
(3, 'Smoothie', 'Food_order_318_strawberry.jpg', 'show', 'ok'),
(5, 'Toast', 'Food_order_247_toast.jpeg', 'show', 'ok'),
(6, 'Burger', 'Food_order_925_humburger.jpg', 'show', 'ok'),
(7, 'Pizza', 'Food_order_280_pizza.jpg', 'show', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(11) NOT NULL,
  `about` varchar(255) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`id`, `about`, `cost`, `date`, `status`) VALUES
(1, 'Place rent', '500000', '2021-10-01', 'Fixed Cost'),
(2, 'Raw material', '20000', '2021-10-10', 'Daily Cost'),
(5, 'tax for goverment', '3000', '2021-10-12', 'Daily Cost'),
(6, 'Car rent fee', '300000', '2021-10-09', 'Fixed Cost'),
(7, 'montly payment for service', '8500', '2021-10-18', 'Daily Cost');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `question`, `answer`, `type`) VALUES
(1, 'What does mean â€™Pre-orderâ€™ or â€™Forthcomingâ€™?', '          These are the products which arenâ€™t available for purchase yet, but you can pre-order them on Shop.\r\n           Any order will be shipped to you on the day of its official release and will reach you within the delivery time mentioned by the seller.', '1'),
(3, 'Do I have to pay any duties or taxes upon delivery of my order?', 'No. All overseas products on Shop are delivered at no additional cost to you, since the stated price at checkout includes customs fees and import duties. You are not expected to pay any additional charges.\r\n If you are asked by the customs or our logistic partner to pay duties or any other fees, or requested to present a personal ID, please contact our Customer Services for clarifications.', '1'),
(4, 'How do I join Official Stores?', 'Currently, participation in Official stores is on an "invite-only" basis, at the discretion of the Shop team based on performance. Reach out to your Key Account Manager to learn more about enlisting.', '1'),
(5, 'What safety measures has Shop taken to make sure packages are not infected?', 'Our heroes delivery agents and operations team have been instructed to wear protective gear, including gloves and masks. Our Logistics Partners have been given the same instructions. We are also making sure that packages are being disinfected at customers doorstep wherever possible.\r\n<pre>\r\n           Kyaw\r\n                    Bo\r\n                            Lin\r\n</pre>', '1'),
(6, 'Why do I see different prices for the same product?', 'Shop is a marketplace. We have a huge seller base and each one sources their product differently due to which prices vary for the same product but you can choose depending on your preference as the product quality remains the same.', '2'),
(7, 'Can I call Shop to place an order?', 'Unfortunately, our customer service representatives are unable to place an order.\r\nHowever, placing an order on Shop is really simple, and we would love for you to try it out for yourself! Simply create and account, select what you are looking for and pay!', '2'),
(8, 'I accidentally ordered duplicate items. What should I do?', 'If you have accidentally ordered duplicate items you may cancel the order if its at Payment Pending or Processing Stage.If the order status is Shipped and you are NOT able to track the order through the Consignment Number, then you are requested to contact us via live chat between 8 a.m. to 9:30 p.m.If the order status is Shipped and you are able to track the order through the Consignment Number, then you are requested to refuse the order when it is delivered to you.', '2'),
(9, 'What do I do if my order is delayed?', 'Shop always prioritizes its customers complete satisfaction and makes sure that the products reach them within the specified time limit.We sincerely apologize for the delay in the delivery of your order. Please note that the delays have been due to any of these reasons. We are trying our best to deliver products to our customers as soon as possible and assure you that your issue will be resolved as a top priority.For any further queries you can contact us on live chat between 8 am. to 9:30 pm. or email us at customer.mm@care.shop.com and wed be happy to assist you.', '3'),
(10, 'How do I track my complaint about delivery?', 'We apologize for the inconvenience that caused you to register a complaint at Shop.It takes 3 working days to respond to the complaint. If you have not heard back from our Complaint Resolution team, please contact us on live chat between 8 am to 9:30 pm.The complaint management team will be happy to assist you.', '3'),
(11, 'What are the delivery charges?', 'Delivery charges are calculated upon product quantity weight and shipping address. You have to pay delivery charges for each item.Please know that the delivery charges are visible on the final checkout page and are calculated based on the following:Number of items in the order Weight of the items Delivery Location If you include multiple items in your order, then certain caps on charges may apply depending on the category and weight.Related Articles: Can I open and check the parcel before receiving and paying the rider? Why are my items shipped separately? How do I track my order?', '3'),
(13, 'How do I pay with Wave Money?', 'You can choose "Wave money" at the payment method stage â€Œand fill the required information if you want to pay with Wave money.\r\n<br>\r\n<pre>Order Cancellation\r\nIf your order which is paid with wave money is cancelled, you will receive the <br>refund voucher code within 3 business day to your shop account once <br>your order status is changed to cancelled.<br>\r\nThe refund voucher code can also be transferred into wave money account. <br>To do so, kindly contact us via live chat and provide the voucher code and<br> the phone number of wave money account which is used to place the order. <br>Please be informed that it can take up to 3-5 business days to finish the process.</pre>', '4'),
(14, 'Which should I check when making online payment at Shop?', '<pre>\r\nWhen making an online payment at Shop, kindly note and verify the following details:<br>\r\n\r\nContact details<br>\r\nAccount details<br>\r\nExpiry Date of the card<br>\r\nCVV code of the card\r\n</pre>', '4'),
(15, 'What payment options are available at Shop?', '<pre>\r\nShop offers a variety of payment methods so that you can choose what is best for you!<br> We support the following methods of payment:<br>\r\n Cash On Delivery:<br>\r\nWith"Cash on Delivery"payments, you will pay the amount to our delivery person when your package arrives at your doorstep.<br>\r\nCredit/Debit Card (Prepayment):<br>\r\nThe"Prepayments"method of ordering is where you pay online at the time of purchase. <br>This makes the process worry free. <br>With easy"Prepayments"you can pay upfront with your trusted bank card and <br>experience effortless purchasing and refunds to the same credit/debit card.<br>\r\nYou can also choose "Wave money" at the payment method stage â€Œand<br> fill the required information if you want to pay with Wave money<br>\r\n</pre>', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) NOT NULL,
  `featured` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `msg`, `date`, `featured`) VALUES
(9, 'Hey this is a good website and amazing food,I like this.', 'October 9, 2021 at 11:05 pm', 'show'),
(10, 'What a shop website? ', 'October 9, 2021 at 11:10 pm', 'not show'),
(7, 'WOW good taste, convinence and prietty interface, thumb up.', 'October 9, 2021 at 10:32 pm', 'show'),
(6, 'This is update for customer feedback, testing is ok or not.', 'October 9, 2021 at 9:01 pm', 'show'),
(8, 'Hey this is a good website and amazing food,I like this.', 'October 9, 2021 at 10:34 pm', 'show'),
(11, 'hey this is good website and amazing food, I like this ,What a shop website? WOW good taste, convience and prietty interface, thumb up, this is update for customer feedback, testing is ok or not, hey this is a good website and amazing food, I like this.', 'October 9, 2021 at 11:21 pm', 'not show'),
(12, 'hey this is good website and amazing food, I like this ,What a shop website? WOW good taste, convience and prietty interface, thumb up, this is update for customer feedback, testing is ok or not, hey this is a good website and amazing food, I like this.', 'October 9, 2021 at 11:23 pm', 'show'),
(13, 'hey this is good website and amazing food, I like this ,What a shop website? WOW good taste, convience and prietty interface, thumb up, this is update for customer feedback, testing is ok or not, hey this is a good website and amazing food, I like this.', 'October 9, 2021 at 11:25 pm', 'show'),
(14, 'amazing I like it and thank for develop.', 'October 17, 2021 at 4:17 pm', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Spicy Noodle', 'Chewy noodles, umami-packed mushrooms, and garlicky chicken, all coated in a spicy, sweet.', '1500', 'Food_order_8596noodle small.jpg', 2, 'show', 'ok'),
(2, 'Humburger', 'This delicious vegan burger with the best homemade Thousand Island dressing is flavorful.', '1800', 'Food_order_3475humburger.jpg', 6, 'show', 'ok'),
(3, 'Mocha Coffee', 'Mocha â€“ chocolate-flavoured coffee â€“ is an indulgent treat mid-morning or after dinner.', '1500', 'Food_order_960_mocha1.jpg', 1, 'show', 'ok'),
(6, 'Pizza', 'Homemade thin crust pizza, topped off with two types of cheese, bacon, ham, and hot sausage!, Ingredients: Ham, bacon, sausage, bell pepper, tomato.', '5000', 'Food_order_8660pizza.jpg', 7, 'show', 'ok'),
(7, 'Spaghetti', 'Make your own delicious and easy Spaghetti Sauce Mix to store in your pantry for fresh tasting sauce.', '2500', 'Food_order_2864pasta.jpg', 2, 'show', 'ok'),
(8, 'Strawberry Smoothie', 'Strawberry Smoothie is creamy, refreshing, and the perfect way to satisfy your sweet tooth! It tastes just like a milkshake, but more nutritious!', '1500', 'Food_order_933strawberry.jpg', 3, 'show', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_order`
--

CREATE TABLE `tbl_food_order` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `food_title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(3) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_food_order`
--

INSERT INTO `tbl_food_order` (`id`, `customer_name`, `food_title`, `image`, `price`, `quantity`, `total`, `order_date`, `status`) VALUES
(10, 'kyaw bo lin', 'Humburger', 'Food_order_3475humburger.jpg', '1800', 1, '1800', 'November 8, 2021 at 1:07 am', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `username`, `email`, `number`, `title`, `content`, `date`, `status`) VALUES
(4, 'Ei Thinzar', 'eithinzar@gmail.com', '09772875291', 'Hey guys', 'I want to order Noodle, How can I?', 'November 3, 2021 at 1:44 am', 'new'),
(6, 'kyaw bo lin', 'kyawbolin@gmail.com', '095012990', 'Lorem ispam', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus consequatur blanditiis sunt rerum voluptates, recusandae velit quam molestias, provident ducimus quasi consectetur inventore incidunt asperiores facere iusto voluptatem ab eaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus consequatur blanditiis sunt rerum voluptates, recusandae velit quam molestias, provident ducimus quasi consectetur inventore incidunt asperiores facere iusto voluptatem ab eaque.', 'November 7, 2021 at 11:37 pm', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(24, 'kyaw bo lin', '03215444478', 'bravit.james@gmail.com', 'Yangon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profit`
--

CREATE TABLE `tbl_profit` (
  `id` int(11) NOT NULL,
  `months` varchar(50) NOT NULL,
  `sale` varchar(50) NOT NULL,
  `expense` varchar(50) NOT NULL,
  `profit` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profit`
--

INSERT INTO `tbl_profit` (`id`, `months`, `sale`, `expense`, `profit`, `year`, `status`) VALUES
(1, 'October', '32000.00', '831500.00', '-799500.00', 2021, 'Current Month'),
(4, 'September', '3000000.00', '831500.00', '2168500.00', 2021, 'Previous Month'),
(5, 'August', '2500000.00', '831500.00', '1668500.00', 2021, 'After Previous Month');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `food_title` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(3) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`id`, `customer`, `food_title`, `price`, `quantity`, `total`, `order_date`, `status`) VALUES
(1, 'Kyaw Kyaw', 'Mocha Coffee', '1500', 1, '1500', 'October 24, 2021 at 12:56 am', 'Delivered'),
(12, 'Kyaw Bo Lin', 'Mocha Coffee', '1500', 2, '3000', 'October 30, 2021 at 4:30 pm', 'Delivered'),
(13, 'Kyaw Bo Lin', 'Pizza', '5000', 1, '5000', 'October 30, 2021 at 4:30 pm', 'Delivered'),
(11, 'Kyaw Bo Lin', 'Spicy Noodle', '1500', 2, '3000', 'October 30, 2021 at 4:30 pm', 'Delivered'),
(14, 'Ei thinzar', 'Humburger', '1800', 2, '3600', 'October 30, 2021 at 4:53 pm', 'Delivered'),
(15, 'zin', 'Strawberry Smoothie', '1500', 4, '6000', 'October 30, 2021 at 5:05 pm', 'Delivered'),
(16, 'ronaldo', 'Humburger', '1800', 3, '5400', 'October 30, 2021 at 6:46 pm', 'Delivered'),
(17, 'ozil', 'Strawberry Smoothie', '1500', 3, '4500', 'October 30, 2021 at 6:53 pm', 'Delivered'),
(18, 'kyaw bo lin', 'Humburger', '1800', 1, '1800', 'November 8, 2021 at 1:07 am', 'Ordered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food_order`
--
ALTER TABLE `tbl_food_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_profit`
--
ALTER TABLE `tbl_profit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_food_order`
--
ALTER TABLE `tbl_food_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_profit`
--
ALTER TABLE `tbl_profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
