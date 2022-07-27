

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO account VALUES("5","Admin","Denver Caacbay","Matain","denverkunfalcon@gmail.com","09123456789","$2y$10$SyTUC5.9m/afD7SaSnfs4OJaT9VAPVsyNGNHf8mmdL9yypKxrKIfe","0pQt7l","Falcon","triplew","bruno");





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
  `backup_code` varchar(5) NOT NULL,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup_invoice VALUES("15","0","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-07-26 20:51:59","2022-05-22 13:46:37","ZkMhi");
INSERT INTO backup_invoice VALUES("16","0","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-07-26 20:51:59","2022-05-22 13:46:49","ZkMhi");
INSERT INTO backup_invoice VALUES("17","0","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-07-26 20:51:59","2022-05-22 14:18:16","ZkMhi");
INSERT INTO backup_invoice VALUES("18","0","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-07-26 20:51:59","2022-05-22 14:20:13","ZkMhi");
INSERT INTO backup_invoice VALUES("19","0","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-07-26 20:51:59","2022-05-24 22:29:02","ZkMhi");
INSERT INTO backup_invoice VALUES("20","0","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-07-26 20:51:59","2022-05-25 14:07:27","ZkMhi");
INSERT INTO backup_invoice VALUES("21","0","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-26 20:51:59","2022-07-25 21:53:09","ZkMhi");
INSERT INTO backup_invoice VALUES("15","0","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-07-26 20:53:38","2022-05-22 13:46:37","bwCRE");
INSERT INTO backup_invoice VALUES("16","0","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-07-26 20:53:38","2022-05-22 13:46:49","bwCRE");
INSERT INTO backup_invoice VALUES("17","0","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-07-26 20:53:38","2022-05-22 14:18:16","bwCRE");
INSERT INTO backup_invoice VALUES("18","0","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-07-26 20:53:38","2022-05-22 14:20:13","bwCRE");
INSERT INTO backup_invoice VALUES("19","0","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-07-26 20:53:38","2022-05-24 22:29:02","bwCRE");
INSERT INTO backup_invoice VALUES("20","0","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-07-26 20:53:38","2022-05-25 14:07:27","bwCRE");
INSERT INTO backup_invoice VALUES("21","0","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-26 20:53:38","2022-07-25 21:53:09","bwCRE");
INSERT INTO backup_invoice VALUES("15","0","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-07-26 20:54:26","2022-05-22 13:46:37","Tqc2t");
INSERT INTO backup_invoice VALUES("16","0","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-07-26 20:54:26","2022-05-22 13:46:49","Tqc2t");
INSERT INTO backup_invoice VALUES("17","0","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-07-26 20:54:26","2022-05-22 14:18:16","Tqc2t");
INSERT INTO backup_invoice VALUES("18","0","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-07-26 20:54:26","2022-05-22 14:20:13","Tqc2t");
INSERT INTO backup_invoice VALUES("19","0","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-07-26 20:54:26","2022-05-24 22:29:02","Tqc2t");
INSERT INTO backup_invoice VALUES("20","0","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-07-26 20:54:26","2022-05-25 14:07:27","Tqc2t");
INSERT INTO backup_invoice VALUES("21","0","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-26 20:54:26","2022-07-25 21:53:09","Tqc2t");
INSERT INTO backup_invoice VALUES("15","0","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-07-26 20:54:36","2022-05-22 13:46:37","uNo49");
INSERT INTO backup_invoice VALUES("16","0","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-07-26 20:54:36","2022-05-22 13:46:49","uNo49");
INSERT INTO backup_invoice VALUES("17","0","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-07-26 20:54:36","2022-05-22 14:18:16","uNo49");
INSERT INTO backup_invoice VALUES("18","0","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-07-26 20:54:36","2022-05-22 14:20:13","uNo49");
INSERT INTO backup_invoice VALUES("19","0","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-07-26 20:54:36","2022-05-24 22:29:02","uNo49");
INSERT INTO backup_invoice VALUES("20","0","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-07-26 20:54:36","2022-05-25 14:07:27","uNo49");
INSERT INTO backup_invoice VALUES("21","0","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-26 20:54:36","2022-07-25 21:53:09","uNo49");
INSERT INTO backup_invoice VALUES("15","0","0","Test P120 2 pc(s), Product Name P100 1 pc(s)","340","350","10","2022-07-26 21:37:31","2022-05-22 13:46:37","DFIdt");
INSERT INTO backup_invoice VALUES("16","0","0","Product Name P100 1 pc(s), Test P120 2 pc(s)","340","350","10","2022-07-26 21:37:31","2022-05-22 13:46:49","DFIdt");
INSERT INTO backup_invoice VALUES("17","0","0","Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)","475","500","25","2022-07-26 21:37:31","2022-05-22 14:18:16","DFIdt");
INSERT INTO backup_invoice VALUES("18","0","0","Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)","750","1000","250","2022-07-26 21:37:31","2022-05-22 14:20:13","DFIdt");
INSERT INTO backup_invoice VALUES("19","0","0","Special Side Mirror P125 5 pc(s)","625","700","75","2022-07-26 21:37:31","2022-05-24 22:29:02","DFIdt");
INSERT INTO backup_invoice VALUES("20","0","0","Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)","275","300","25","2022-07-26 21:37:31","2022-05-25 14:07:27","DFIdt");
INSERT INTO backup_invoice VALUES("21","0","0","Popper P200 42 pc(s)","8400","10000","1600","2022-07-26 21:37:31","2022-07-25 21:53:09","DFIdt");





CREATE TABLE `backup_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL,
  `created_at` varchar(60) NOT NULL,
  `backup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `backup_code` varchar(5) NOT NULL,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup_product VALUES("40","Special Side Mirror","SM021","125","10","","2022-07-25 22:59:18","");
INSERT INTO backup_product VALUES("41","Magic Mirror","SM0021","250","5","","2022-07-25 22:59:18","");
INSERT INTO backup_product VALUES("42","Duck Honk","HRN005","150","9","","2022-07-25 22:59:18","");
INSERT INTO backup_product VALUES("43","Popper","askdjaklsjd","200","22","","2022-07-25 22:59:18","");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 19:55:03","Atu5N");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 19:55:03","dz6FV");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 19:55:03","MSG0P");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 19:55:03","4rmwL");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 19:55:48","vHdIB");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 19:55:48","4TRX8");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 19:55:48","C35o0");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 19:55:48","6XKVS");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:01:43","sMHmD");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:01:43","y7sVY");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:01:43","exEC5");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:01:43","Tj1EA");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:02:50","zEaCR");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:02:50","pE1wl");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:02:50","MXnFP");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:02:50","j7y02");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:09:59","zyPx7");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:09:59","tT3e8");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:09:59","qLbiK");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:09:59","p04bd");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:11:27","xuyBs");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:11:27","9rvUS");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:11:27","vz8ew");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:11:27","F3uXp");
INSERT INTO backup_product VALUES("33","Special Side Mirror","1595","125","10","","2022-07-26 20:13:19","1595");
INSERT INTO backup_product VALUES("35","Magic Mirror","6422","250","5","","2022-07-26 20:13:19","6422");
INSERT INTO backup_product VALUES("37","Duck Honk","1349","150","9","","2022-07-26 20:13:19","1349");
INSERT INTO backup_product VALUES("39","Popper","5845","200","22","","2022-07-26 20:13:19","5845");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:17:49","MbYK2");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:17:49","MbYK2");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:17:49","MbYK2");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:17:49","MbYK2");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:18:00","RY1kL");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:18:00","RY1kL");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:18:00","RY1kL");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:18:00","RY1kL");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:20:41","rB4Yu");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:20:41","rB4Yu");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:20:41","rB4Yu");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:20:41","rB4Yu");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:26:40","");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:26:40","");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:26:40","");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:26:40","");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:26:56","HVCmh");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:26:56","HVCmh");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:26:56","HVCmh");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:26:56","HVCmh");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:27:35","amsFh");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:27:35","amsFh");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:27:35","amsFh");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:27:35","amsFh");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:30:58","EGQdM");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:30:58","EGQdM");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:30:58","EGQdM");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:30:58","EGQdM");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:32:23","pmOeC");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:32:23","pmOeC");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:32:23","pmOeC");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:32:23","pmOeC");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:32:48","bexoy");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:32:48","bexoy");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:32:48","bexoy");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:32:48","bexoy");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:34:32","XWo1v");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:34:32","XWo1v");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:34:32","XWo1v");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:34:32","XWo1v");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:37:05","ytvAM");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:37:05","ytvAM");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:37:05","ytvAM");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:37:05","ytvAM");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:45:30","0KYEx");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:45:30","0KYEx");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:45:30","0KYEx");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:45:30","0KYEx");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:45:41","tAc7d");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:45:41","tAc7d");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:45:41","tAc7d");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:45:41","tAc7d");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:45:50","zv7uE");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:45:50","zv7uE");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:45:50","zv7uE");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:45:50","zv7uE");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:51:59","7xp1U");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:51:59","7xp1U");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:51:59","7xp1U");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:51:59","7xp1U");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:53:38","TFlqJ");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:53:38","TFlqJ");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:53:38","TFlqJ");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:53:38","TFlqJ");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:54:26","SDi7u");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:54:26","SDi7u");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:54:26","SDi7u");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:54:26","SDi7u");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 20:54:36","Pa5Jo");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 20:54:36","Pa5Jo");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 20:54:36","Pa5Jo");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 20:54:36","Pa5Jo");
INSERT INTO backup_product VALUES("33","Special Side Mirror","SM021","125","10","","2022-07-26 21:37:31","3BYV4");
INSERT INTO backup_product VALUES("35","Magic Mirror","SM0021","250","5","","2022-07-26 21:37:31","3BYV4");
INSERT INTO backup_product VALUES("37","Duck Honk","HRN005","150","9","","2022-07-26 21:37:31","3BYV4");
INSERT INTO backup_product VALUES("39","Popper","askdjaklsjd","200","22","","2022-07-26 21:37:31","3BYV4");





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



