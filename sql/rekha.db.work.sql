
CREATE INDEX recordItems
ON `record_items` (record_id); 


CREATE TABLE `migrate_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT, 
  `Date` date DEFAULT NULL,
  `RefNo` varchar(50) DEFAULT NULL,
  `MemberName` varchar(100) DEFAULT NULL, 
  `MemberNo` varchar(50) DEFAULT NULL,
  `MemberPay` varchar(50) DEFAULT NULL,
  `Type` varchar(150) DEFAULT NULL,
  `MemberCompany` varchar(100) DEFAULT NULL,
  `PaymentBy` varchar(100) DEFAULT NULL,
  `BatchNo` varchar(50) DEFAULT NULL,
  `ReceiptNo` varchar(30) DEFAULT NULL,  
  `ChequeNo` varchar(100) DEFAULT NULL,
  `PaymentDescription` varchar(250) DEFAULT NULL,  
  `RenewalYear` varchar(150) DEFAULT NULL, 
  `SubTotal` int(11) unsigned NOT NULL,  
  `Totaltax` FLOAT(11) unsigned NOT NULL, 
  `Total` FLOAT(11) unsigned NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
