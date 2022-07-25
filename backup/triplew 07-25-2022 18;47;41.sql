

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `recovery_code` varchar(6) NOT NULL,
  `secret_1` varchar(64) NOT NULL,
  `secret_2` varchar(64) NOT NULL,
  `secret_3` varchar(64) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO account VALUES("1","admin","Amir El Amari","10 Matiyaga Street, Barangay Kabo, Maryville Village, Batangas City 4200","09999999999","$2y$10$eoan1AWXgI2LR3U2.13zqeiZq0Bzn2uU9HmSJpD.jE.5xbTKQXVG2","mn7thS","Rose","2001","Dog");





CREATE TABLE `backup_invoice` (
  `backup_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `cash` float NOT NULL,
  `cash_change` float NOT NULL,
  `backup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `backup_product` (
  `backup_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL,
  `created_at` varchar(60) NOT NULL,
  `backup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `invoice` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `cash` float NOT NULL,
  `cash_change` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO invoice VALUES("15","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-05-22 13:46:37");
INSERT INTO invoice VALUES("16","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-05-22 13:46:49");
INSERT INTO invoice VALUES("17","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-05-22 14:18:16");
INSERT INTO invoice VALUES("18","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-05-22 14:20:13");
INSERT INTO invoice VALUES("19","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-05-24 22:29:02");
INSERT INTO invoice VALUES("20","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-05-25 14:07:27");





CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

INSERT INTO product VALUES("33","Special Side Mirror","SM021","125","10");
INSERT INTO product VALUES("35","Magic Mirror","SM0021","250","5");
INSERT INTO product VALUES("37","Duck Honk","HRN005","150","9");



