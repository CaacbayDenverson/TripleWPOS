

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `recovery_code` varchar(6) NOT NULL,
  `secret_1` varchar(64) NOT NULL,
  `secret_2` varchar(64) NOT NULL,
  `secret_3` varchar(64) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO account VALUES("3","admin","Rumyooo","Runeterra, Summoner\'s Rifter","romeojohnorig5@gmail.com","0661087731","$2y$10$U6Jik.sN6N9CspX68WG8N.WREWSzbE5ePp9qYjJylgRjPZJ2B1WMm","uaZ0KA","","","");





CREATE TABLE `backup_invoice` (
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup_invoice VALUES("25","15","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-07-25 22:59:18","2022-05-22 13:46:37");
INSERT INTO backup_invoice VALUES("26","16","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-07-25 22:59:18","2022-05-22 13:46:49");
INSERT INTO backup_invoice VALUES("27","17","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-07-25 22:59:18","2022-05-22 14:18:16");
INSERT INTO backup_invoice VALUES("28","18","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-07-25 22:59:18","2022-05-22 14:20:13");
INSERT INTO backup_invoice VALUES("29","19","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-07-25 22:59:18","2022-05-24 22:29:02");
INSERT INTO backup_invoice VALUES("30","20","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-07-25 22:59:18","2022-05-25 14:07:27");
INSERT INTO backup_invoice VALUES("31","21","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-25 22:59:18","2022-07-25 21:53:09");





CREATE TABLE `backup_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL,
  `created_at` varchar(60) NOT NULL,
  `backup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup_product VALUES("40","Special Side Mirror","SM021","125","10","","2022-07-25 22:59:18");
INSERT INTO backup_product VALUES("41","Magic Mirror","SM0021","250","5","","2022-07-25 22:59:18");
INSERT INTO backup_product VALUES("42","Duck Honk","HRN005","150","9","","2022-07-25 22:59:18");
INSERT INTO backup_product VALUES("43","Popper","askdjaklsjd","200","22","","2022-07-25 22:59:18");





CREATE TABLE `invoice` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `cash` float NOT NULL,
  `cash_change` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO invoice VALUES("15","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-05-22 13:46:37");
INSERT INTO invoice VALUES("16","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-05-22 13:46:49");
INSERT INTO invoice VALUES("17","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-05-22 14:18:16");
INSERT INTO invoice VALUES("18","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-05-22 14:20:13");
INSERT INTO invoice VALUES("19","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-05-24 22:29:02");
INSERT INTO invoice VALUES("20","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-05-25 14:07:27");
INSERT INTO invoice VALUES("21","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-25 21:53:09");





CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

INSERT INTO product VALUES("33","Special Side Mirror","SM021","125","10");
INSERT INTO product VALUES("35","Magic Mirror","SM0021","250","5");
INSERT INTO product VALUES("37","Duck Honk","HRN005","150","9");
INSERT INTO product VALUES("39","Popper","askdjaklsjd","200","22");



