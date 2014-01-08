
--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `key_id` varchar(150) NOT NULL,
  `hash` varchar(254) NOT NULL,
  `time` varchar(40) NOT NULL,
  `ccnumber` varchar(20) DEFAULT NULL,
  `ccexp` char(4) DEFAULT NULL,
  `checkname` varchar(254) DEFAULT NULL,
  `checkaba` varchar(50) DEFAULT NULL,
  `checkaccount` varchar(60) DEFAULT NULL,
  `account_holder_type` varchar(10) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `sec_code` varchar(10) DEFAULT NULL,
  `processor_id` varchar(10) DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL,
  `tax` decimal(11,2) NOT NULL,
  `cvv` char(4) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `orderdescription` varchar(254) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `company` varchar(60) NOT NULL,
  `address1` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `orderid` varchar(25) NOT NULL,
  `transactionid` int(15) DEFAULT NULL,
  `authcode` varchar(35) DEFAULT NULL,
  `capture_transactionid` int(11) DEFAULT NULL,
  `capture` tinyint(1) DEFAULT NULL,
  `tracking_number` varchar(50) DEFAULT NULL,
  `shipping_carrier` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`),
  KEY `transactionid` (`transactionid`),
  KEY `capture` (`capture`),
  KEY `authcode` (`authcode`),
  KEY `type` (`type`),
  KEY `tracking_id` (`tracking_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `key_id`, `hash`, `time`, `ccnumber`, `ccexp`, `checkname`, `checkaba`, `checkaccount`, `account_holder_type`, `account_type`, `sec_code`, `processor_id`, `amount`, `tax`, `cvv`, `payment`, `orderdescription`, `ipaddress`, `firstname`, `lastname`, `company`, `address1`, `city`, `state`, `zip`, `country`, `phone`, `fax`, `email`, `orderid`, `transactionid`, `authcode`, `capture_transactionid`, `capture`, `tracking_number`, `shipping_carrier`) VALUES
(9, 'credit', '', '', '20140107233531', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.15', '123', 'credit card', 'box of frogs', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', '', 2119237749, '', NULL, NULL, NULL, NULL),
(10, 'sale', '449510', '69e124f9314c3b94379d48b3c6635269', '20140108150643', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.00', '123', 'credit card', '', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', '20140108100643Test', 2120031645, NULL, NULL, NULL, NULL, NULL),
(11, 'credit', '', '', '', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.00', '123', 'credit card', '', '::1', '', '', '', '', '', '', '', '', '', '', '', '20140108100643Test', 2120036138, NULL, NULL, NULL, NULL, NULL),
(12, 'sale', '', '3939f282d31444013e942b569d0ad314', '20140108154923', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'A box of frogs and marbles', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', '20140108104923Test', 2120065428, NULL, NULL, NULL, NULL, NULL),
(13, 'credit', '', '', '20140108155937', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'A box of ChaCha marbles', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha10', 2120075261, '', NULL, NULL, NULL, NULL),
(14, 'sale', '', '', '20140108160727', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'A box of doughnut eating frogs', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha11', 2120078663, '123456', NULL, NULL, NULL, NULL),
(16, 'credit', '', '', '20140108174537', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'A box of doughnut eating frogs', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', '2120078663', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'validate', '', '', '20140108182034', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '5.00', '0.35', '123', 'credit card', 'A box of doggie biscuits', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha14', 2120222631, '', NULL, NULL, NULL, NULL),
(18, 'capture', '', '', '20140108182424', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'A box of figurines.', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha5', 2120225923, '123456', NULL, 1, NULL, NULL),
(19, 'sale', '', '', '20140108182613', NULL, NULL, 'Test', '123123123', '123123123', 'personal', 'checking', NULL, NULL, '2.00', '0.14', '', 'check', 'Ice Bucket', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha7', 2120227480, '123456', NULL, NULL, NULL, NULL),
(20, 'sale', '', '', '20140108190248', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'A box of worms.', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha15', 2120257316, '123456', NULL, NULL, NULL, NULL),
(21, 'refund', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 2120262839, '', NULL, NULL, NULL, NULL),
(22, 'refund', '', '743de282d1878a1f6076d60e2ffdb7a5', '20140108191329', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '15.00', '0.75', '123', 'credit card', 'A BAD bog of bugs.', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', '20140108141329Test', 2120265249, NULL, NULL, NULL, NULL, NULL),
(23, 'sale', '', '', '20140108194243', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.55', '123', 'credit card', 'Voido Wormo', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha19', 2120290021, '123456', NULL, NULL, NULL, NULL),
(24, 'refund', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 2120290484, '', NULL, NULL, NULL, NULL),
(25, 'sale', '', '', '20140108195108', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.14', '123', 'credit card', 'Bag of bones', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha19', 2120296374, '123456', NULL, NULL, NULL, NULL),
(26, 'refund', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '2.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 2120296374, '123456', NULL, NULL, NULL, NULL),
(27, 'sale', '', '', '20140108195710', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '30.00', '2.10', '123', 'credit card', 'Fishing pole', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', 'ChaCha20', 2120301015, '123456', NULL, NULL, NULL, NULL),
(28, 'refund', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '30.00', '0.00', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 2120301414, '', NULL, NULL, NULL, NULL),
(29, 'sale', '', '13834269a253b18138f29715fe7dfd6d', '20140108201054', '4111111111111111', '1010', NULL, NULL, NULL, '', '', NULL, NULL, '120.00', '8.40', '123', 'credit card', 'Bass electric prod', '::1', 'Stephen', 'Mareches', 'SoSo', '1647 Frazier Road', 'Decatur', 'Georgia', '30033', 'United States', '4048200331', '', 'stephen@sophiasolutions.net', '20140108151054Test', 2120312786, NULL, NULL, NULL, '33478912', 'fedex');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
