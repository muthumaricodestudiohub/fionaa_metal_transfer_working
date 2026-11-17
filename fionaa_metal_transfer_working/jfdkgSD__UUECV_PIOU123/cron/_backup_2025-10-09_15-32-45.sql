

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES('1','admin@fionaagold.com','Fi@naa$321');
INSERT INTO admin VALUES('2','it.support@fionaagold.com','Fi@naa$123');
INSERT INTO admin VALUES('3','superadmin@gmail.com','Fi@naa$2026');
INSERT INTO admin VALUES('4','super2@gmail.com','fionaa@453223#1');
INSERT INTO admin VALUES('5','ordertracking3567@gmail.com','fionaa@6798@#56');



CREATE TABLE `admin_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(99) NOT NULL,
  `ip_address` varchar(99) NOT NULL,
  `auth_token` varchar(99) NOT NULL,
  `stitus` varchar(99) NOT NULL,
  `panel` varchar(99) NOT NULL,
  `date_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

INSERT INTO admin_login_log VALUES('1','fionaa.admin@gmail.com','27.107.187.146','68b304a997300','failed','Bored Monkey','2025-08-30 19:33:21.619391');
INSERT INTO admin_login_log VALUES('2','fionaa.admin@gmail.com','27.107.187.146','68b30c2088ec9','failed','Bored Monkey','2025-08-30 20:05:12.562173');
INSERT INTO admin_login_log VALUES('3','fionaa.admin@gmail.com','2409:4080:1205:9fee:217f:b8be:fdb4:9680','68b4f84c34f04','failed','Bored Monkey','2025-09-01 07:05:08.218080');
INSERT INTO admin_login_log VALUES('4','fionaa.admin@gmail.com','103.59.213.194','68b519639e38a','failed','Bored Monkey','2025-09-01 09:26:19.651312');
INSERT INTO admin_login_log VALUES('5','fionaa.admin@gmail.com','103.59.213.194','68b538177f2d3','failed','Bored Monkey','2025-09-01 11:37:19.528493');
INSERT INTO admin_login_log VALUES('6','fionaa.admin@gmail.com','2409:4080:1205:9fee:217f:b8be:fdb4:9680','68b5558d59cfd','failed','Bored Monkey','2025-09-01 13:43:01.369548');
INSERT INTO admin_login_log VALUES('7','fionaa.admin@gmail.com','103.59.213.194','68b67f1049d85','failed','Bored Monkey','2025-09-02 10:52:24.304607');
INSERT INTO admin_login_log VALUES('8','fionaa.admin@gmail.com','103.66.236.59','68b6876f726ce','failed','Bored Monkey','2025-09-02 11:28:07.470053');
INSERT INTO admin_login_log VALUES('9','fionaa.admin@gmail.com','2401:4900:5178:f7e0:559a:6c72:44fc:61cb','68b6978f144fa','failed','Bored Monkey','2025-09-02 12:36:55.085047');
INSERT INTO admin_login_log VALUES('10','fionaa.admin@gmail.com','152.59.43.77','68b71eed698b4','failed','Bored Monkey','2025-09-02 22:14:29.433810');
INSERT INTO admin_login_log VALUES('11','fionaa.admin@gmail.com','152.59.43.77','68b71eedcd73e','failed','Bored Monkey','2025-09-02 22:14:29.842936');
INSERT INTO admin_login_log VALUES('12','fionaa.admin@gmail.com','27.107.187.146','68b7d6a52eace','failed','Bored Monkey','2025-09-03 11:18:21.192948');
INSERT INTO admin_login_log VALUES('13','fionaa.admin@gmail.com','2409:4040:dce:515:b11b:4cb6:2ff0:777f','68b83aea153c1','failed','Bored Monkey','2025-09-03 18:26:10.088831');
INSERT INTO admin_login_log VALUES('14','fionaa.admin@gmail.com','103.59.213.194','68b920320335a','failed','Bored Monkey','2025-09-04 10:44:26.016675');
INSERT INTO admin_login_log VALUES('15','fionaa.admin@gmail.com','192.168.1.251','68b97de8334a3','failed','Bored Monkey','2025-09-04 17:24:16.211744');
INSERT INTO admin_login_log VALUES('16','fionaa.admin@gmail.com','192.168.1.40','68b9840f8d785','failed','Bored Monkey','2025-09-04 17:50:31.581934');
INSERT INTO admin_login_log VALUES('17','fionaa.admin@gmail.com','192.168.1.80','68ba7c572cfa8','failed','Bored Monkey','2025-09-05 11:29:51.210286');
INSERT INTO admin_login_log VALUES('18','fionaa.admin@gmail.com','192.168.1.251','68ba7e032c1b9','success','Bored Monkey','2025-09-05 11:36:59.202383');
INSERT INTO admin_login_log VALUES('19','admin@fionaagold.com','192.168.1.251','68ba8f6ef1973','failed','Bored Monkey','2025-09-05 12:51:18.989876');
INSERT INTO admin_login_log VALUES('20','admin@fionaagold.com','192.168.1.80','68ba95a7cf892','failed','Bored Monkey','2025-09-05 13:17:51.907818');
INSERT INTO admin_login_log VALUES('21','it.support@fionaagold.com','192.168.1.254','68babb59cc407','failed','Bored Monkey','2025-09-05 15:58:41.836911');
INSERT INTO admin_login_log VALUES('22','it.support@fionaagold.com','192.168.1.37','68bac2018dff2','failed','Bored Monkey','2025-09-05 16:27:05.604926');
INSERT INTO admin_login_log VALUES('23','admin@fionaagold.com','192.168.1.157','68be4b7265c16','failed','Bored Monkey','2025-09-08 08:50:18.492330');
INSERT INTO admin_login_log VALUES('24','admin@fionaagold.com','192.168.1.65','68be52316ea2e','failed','Bored Monkey','2025-09-08 09:19:05.454752');
INSERT INTO admin_login_log VALUES('25','admin@fionaagold.com','192.168.1.65','68be5877dae7b','failed','Bored Monkey','2025-09-08 09:45:51.920226');
INSERT INTO admin_login_log VALUES('26','admin@fionaagold.com','192.168.1.65','68be5ada15b55','failed','Bored Monkey','2025-09-08 09:56:02.090347');
INSERT INTO admin_login_log VALUES('27','admin@fionaagold.com','192.168.1.251','68be701da7236','failed','Bored Monkey','2025-09-08 11:26:45.686113');
INSERT INTO admin_login_log VALUES('28','admin@fionaagold.com','192.168.1.157','68be88f29bc02','failed','Bored Monkey','2025-09-08 13:12:42.639451');
INSERT INTO admin_login_log VALUES('29','admin@fionaagold.com','192.168.1.65','68bfb6c33121d','failed','Bored Monkey','2025-09-09 10:40:27.203009');
INSERT INTO admin_login_log VALUES('30','admin@fionaagold.com','192.168.1.157','68bfbfe611b72','failed','Bored Monkey','2025-09-09 11:19:26.074246');
INSERT INTO admin_login_log VALUES('31','admin@fionaagold.com','192.168.1.254','68c000bd13d12','failed','Bored Monkey','2025-09-09 15:56:05.083887');
INSERT INTO admin_login_log VALUES('32','superadmin@gmail.com','192.168.1.254','68c012168c11b','failed','Bored Monkey','2025-09-09 17:10:06.574002');
INSERT INTO admin_login_log VALUES('33','admin@fionaagold.com','192.168.1.157','68c106cfaddcd','failed','Bored Monkey','2025-09-10 10:34:15.785090');
INSERT INTO admin_login_log VALUES('34','admin@fionaagold.com','192.168.1.153','68c111d92e880','failed','Bored Monkey','2025-09-10 11:21:21.215191');
INSERT INTO admin_login_log VALUES('35','it.support@fionaagold.com','192.168.1.121','68c1207f683da','failed','Bored Monkey','2025-09-10 12:23:51.428982');
INSERT INTO admin_login_log VALUES('36','it.support@fionaagold.com','192.168.1.121','68c1341b7a0f6','failed','Bored Monkey','2025-09-10 13:47:31.562130');
INSERT INTO admin_login_log VALUES('37','it.support@fionaagold.com','192.168.1.121','68c13d24c5ad8','failed','Bored Monkey','2025-09-10 14:26:04.811177');
INSERT INTO admin_login_log VALUES('38','admin@fionaagold.com','192.168.1.33','68c395539f223','failed','Bored Monkey','2025-09-12 09:06:51.703649');
INSERT INTO admin_login_log VALUES('39','superadmin@gmail.com','192.168.1.33','68c396562fa3e','failed','Bored Monkey','2025-09-12 09:11:10.196701');
INSERT INTO admin_login_log VALUES('40','admin@fionaagold.com','192.168.1.33','68c396fe2a7fc','failed','Bored Monkey','2025-09-12 09:13:58.175590');
INSERT INTO admin_login_log VALUES('41','admin@fionaagold.com','192.168.1.251','68c50dea6e3f8','failed','Bored Monkey','2025-09-13 11:53:38.452920');
INSERT INTO admin_login_log VALUES('42','it.support@fionaagold.com','192.168.1.121','68c5462cee0f8','failed','Bored Monkey','2025-09-13 15:53:40.976718');
INSERT INTO admin_login_log VALUES('43','superadmin@gmail.com','192.168.1.33','68c5700602fc3','failed','Bored Monkey','2025-09-13 18:52:14.038574');
INSERT INTO admin_login_log VALUES('44','admin@fionaagold.com','192.168.1.157','68c7aa3e357f6','failed','Bored Monkey','2025-09-15 11:25:10.220787');
INSERT INTO admin_login_log VALUES('45','it.support@fionaagold.com','192.168.1.251','68c7bf760c177','failed','Bored Monkey','2025-09-15 12:55:42.051344');
INSERT INTO admin_login_log VALUES('46','admin@fionaagold.com','192.168.1.157','68c7dc8b1b2fe','failed','Bored Monkey','2025-09-15 14:59:47.112898');
INSERT INTO admin_login_log VALUES('47','admin@fionaagold.com','192.168.1.38','68c803ccdce05','failed','Bored Monkey','2025-09-15 17:47:16.922815');
INSERT INTO admin_login_log VALUES('48','admin@fionaagold.com','192.168.1.38','68c80418502af','failed','Bored Monkey','2025-09-15 17:48:32.330126');
INSERT INTO admin_login_log VALUES('49','admin@fionaagold.com','192.168.1.157','68c9069ee1ffc','failed','Bored Monkey','2025-09-16 12:11:34.927309');
INSERT INTO admin_login_log VALUES('50','admin@fionaagold.com','192.168.1.38','68c9580ac4e20','failed','Bored Monkey','2025-09-16 17:58:58.828506');
INSERT INTO admin_login_log VALUES('51','admin@fionaagold.com','192.168.1.38','68ca285c3540f','failed','Bored Monkey','2025-09-17 08:47:48.219857');
INSERT INTO admin_login_log VALUES('52','superadmin@gmail.com','192.168.1.38','68ca2c8093116','failed','Bored Monkey','2025-09-17 09:05:28.603903');
INSERT INTO admin_login_log VALUES('53','admin@fionaagold.com','192.168.1.251','68ca5eeb0b63f','failed','Bored Monkey','2025-09-17 12:40:35.048821');
INSERT INTO admin_login_log VALUES('54','superadmin@gmail.com','192.168.1.128','68ca69b656e86','failed','Bored Monkey','2025-09-17 13:26:38.358410');
INSERT INTO admin_login_log VALUES('55','superadmin@gmail.com','192.168.1.251','68ca7227c3026','failed','Bored Monkey','2025-09-17 14:02:39.800189');
INSERT INTO admin_login_log VALUES('56','admin@fionaagold.com','192.168.1.251','68ca80b4306ea','failed','Bored Monkey','2025-09-17 15:04:44.200050');
INSERT INTO admin_login_log VALUES('57','ordertracking3567@gmail.com','192.168.1.121','68ca9a3dc73b2','failed','Bored Monkey','2025-09-17 16:53:41.816403');
INSERT INTO admin_login_log VALUES('58','ordertracking3567@gmail.com','192.168.1.121','68ca9a5b16e37','failed','Bored Monkey','2025-09-17 16:54:11.095398');
INSERT INTO admin_login_log VALUES('59','ordertracking3567@gmail.com','192.168.1.121','68ca9a6e305e1','failed','Bored Monkey','2025-09-17 16:54:30.199306');
INSERT INTO admin_login_log VALUES('60','admin@fionaagold.com','192.168.1.121','68ca9adac2250','failed','Bored Monkey','2025-09-17 16:56:18.797013');
INSERT INTO admin_login_log VALUES('61','superadmin@gmail.com','192.168.1.121','68ca9b01bdb2f','failed','Bored Monkey','2025-09-17 16:56:57.778479');
INSERT INTO admin_login_log VALUES('62','superadmin@gmail.com','192.168.1.121','68ca9b0bc5dd5','failed','Bored Monkey','2025-09-17 16:57:07.812069');
INSERT INTO admin_login_log VALUES('63','it.support@fionaagold.com','192.168.1.121','68ca9b291124e','failed','Bored Monkey','2025-09-17 16:57:37.071915');
INSERT INTO admin_login_log VALUES('64','ordertracking3567@gmail.com','192.168.1.121','68ca9b52d2a7b','failed','Bored Monkey','2025-09-17 16:58:18.864274');
INSERT INTO admin_login_log VALUES('65','admin@fionaagold.com','192.168.1.121','68ca9ba3a9558','failed','Bored Monkey','2025-09-17 16:59:39.695075');
INSERT INTO admin_login_log VALUES('66','it.support@fionaagold.com','192.168.1.121','68ca9badbd8d2','failed','Bored Monkey','2025-09-17 16:59:49.777970');
INSERT INTO admin_login_log VALUES('67','admin@fionaagold.com','192.168.1.38','68ca9d8d21324','failed','Bored Monkey','2025-09-17 17:07:49.151606');
INSERT INTO admin_login_log VALUES('68','superadmin@gmail.com','192.168.1.38','68caa704d8712','failed','Bored Monkey','2025-09-17 17:48:12.888131');
INSERT INTO admin_login_log VALUES('69','admin@fionaagold.com','192.168.1.38','68cb7996eb382','failed','Bored Monkey','2025-09-18 08:46:39.016246');
INSERT INTO admin_login_log VALUES('70','superadmin@gmail.com','192.168.1.38','68cb79b1bf48a','failed','Bored Monkey','2025-09-18 08:47:05.785252');
INSERT INTO admin_login_log VALUES('71','it.support@fionaagold.com','192.168.1.55','68cba834c8576','failed','Bored Monkey','2025-09-18 12:05:32.822161');
INSERT INTO admin_login_log VALUES('72','it.support@fionaagold.com','192.168.1.55','68cbadc6472cc','failed','Bored Monkey','2025-09-18 12:29:18.292841');
INSERT INTO admin_login_log VALUES('73','it.support@fionaagold.com','192.168.1.69','68cbc438dd173','failed','Bored Monkey','2025-09-18 14:05:04.907188');
INSERT INTO admin_login_log VALUES('74','it.support@fionaagold.com','192.168.1.69','68cbc791dffee','failed','Bored Monkey','2025-09-18 14:19:21.918992');
INSERT INTO admin_login_log VALUES('75','admin@fionaagold.com','192.168.1.38','68cccadee5e34','failed','Bored Monkey','2025-09-19 08:45:42.943415');
INSERT INTO admin_login_log VALUES('76','superadmin@gmail.com','192.168.1.38','68cccb0b2e926','failed','Bored Monkey','2025-09-19 08:46:27.192467');
INSERT INTO admin_login_log VALUES('77','it.support@fionaagold.com','192.168.1.55','68ccd6e42cc22','failed','Bored Monkey','2025-09-19 09:37:00.184717');
INSERT INTO admin_login_log VALUES('78','it.support@fionaagold.com','192.168.1.251','68cd2f4c8b65a','failed','Bored Monkey','2025-09-19 15:54:12.572491');
INSERT INTO admin_login_log VALUES('79','admin@fionaagold.com','192.168.1.38','68ce1e870110a','failed','Bored Monkey','2025-09-20 08:54:55.005889');
INSERT INTO admin_login_log VALUES('80','it.support@fionaagold.com','192.168.1.69','68ce25ddc4f0c','failed','Bored Monkey','2025-09-20 09:26:13.813798');
INSERT INTO admin_login_log VALUES('81','it.support@fionaagold.com','192.168.1.69','68ce26145ffaa','failed','Bored Monkey','2025-09-20 09:27:08.394855');
INSERT INTO admin_login_log VALUES('82','admin@fionaagold.com','192.168.1.9','68ce32f6e5b2f','failed','Bored Monkey','2025-09-20 10:22:06.942459');
INSERT INTO admin_login_log VALUES('83','ordertracking3567@gmail.com','192.168.1.108','68ce51a862dbb','failed','Bored Monkey','2025-09-20 12:33:04.406500');
INSERT INTO admin_login_log VALUES('84','ordertracking3567@gmail.com','192.168.1.59','68ce521146afa','failed','Bored Monkey','2025-09-20 12:34:49.291066');
INSERT INTO admin_login_log VALUES('85','admin@fionaagold.com','192.168.1.38','68d139875df52','failed','Bored Monkey','2025-09-22 17:26:55.405982');
INSERT INTO admin_login_log VALUES('86','it.support@fionaagold.com','192.168.1.251','68d232fa24bcd','success','Bored Monkey','2025-09-23 11:11:14.151738');
INSERT INTO admin_login_log VALUES('87','admin@fionaagold.com','192.168.1.157','68d23eabbbcd6','failed','Bored Monkey','2025-09-23 12:01:07.832931');
INSERT INTO admin_login_log VALUES('88','admin@fionaagold.com','103.66.236.34','68d3c25ddbdd2','success','Bored Monkey','2025-09-24 15:35:17.902487');
INSERT INTO admin_login_log VALUES('89','superadmin@gmail.com','103.162.47.203','68d42d92c6f39','failed','Bored Monkey','2025-09-24 23:12:42.818013');
INSERT INTO admin_login_log VALUES('90','superadmin@gmail.com','103.59.213.194','68d4bc492d0ce','failed','Bored Monkey','2025-09-25 09:21:37.190287');
INSERT INTO admin_login_log VALUES('91','superadmin@gmail.com','27.107.187.146','68d4cef510742','failed','Bored Monkey','2025-09-25 10:41:17.068881');
INSERT INTO admin_login_log VALUES('92','superadmin@gmail.com','103.59.213.194','68d4e3e6514cd','failed','Bored Monkey','2025-09-25 12:10:38.343897');
INSERT INTO admin_login_log VALUES('93','ordertracking3567@gmail.com','103.66.236.34','68d4e41b23a0b','success','Bored Monkey','2025-09-25 12:11:31.147484');
INSERT INTO admin_login_log VALUES('94','superadmin@gmail.com','103.59.213.194','68d616be21ec3','failed','Bored Monkey','2025-09-26 09:59:50.140484');
INSERT INTO admin_login_log VALUES('95','superadmin@gmail.com','103.59.213.194','68d6248d4febb','failed','Bored Monkey','2025-09-26 10:58:45.328598');
INSERT INTO admin_login_log VALUES('96','superadmin@gmail.com','27.107.187.146','68d63598c0bd5','failed','Bored Monkey','2025-09-26 12:11:28.790904');
INSERT INTO admin_login_log VALUES('97','superadmin@gmail.com','27.107.187.146','68d776f904350','failed','Bored Monkey','2025-09-27 11:02:41.018543');
INSERT INTO admin_login_log VALUES('98','superadmin@gmail.com','27.107.187.146','68d77bd612826','failed','Bored Monkey','2025-09-27 11:23:26.077246');
INSERT INTO admin_login_log VALUES('99','superadmin@gmail.com','103.59.213.194','68d79e46ce2f2','failed','Bored Monkey','2025-09-27 13:50:22.846081');
INSERT INTO admin_login_log VALUES('100','superadmin@gmail.com','103.59.213.194','68da387a2b508','failed','Bored Monkey','2025-09-29 13:12:50.178712');
INSERT INTO admin_login_log VALUES('101','superadmin@gmail.com','103.59.213.194','68da4e2e5f391','failed','Bored Monkey','2025-09-29 14:45:26.394382');
INSERT INTO admin_login_log VALUES('102','superadmin@gmail.com','27.107.187.146','68da6e39a8eda','failed','Bored Monkey','2025-09-29 17:02:09.693515');
INSERT INTO admin_login_log VALUES('103','superadmin@gmail.com','27.107.187.146','68da7317824c4','failed','Bored Monkey','2025-09-29 17:22:55.534974');
INSERT INTO admin_login_log VALUES('104','superadmin@gmail.com','152.59.42.23','68dabe0bc795d','failed','Bored Monkey','2025-09-29 22:42:43.819117');
INSERT INTO admin_login_log VALUES('105','superadmin@gmail.com','27.107.187.146','68db5cefdb107','failed','Bored Monkey','2025-09-30 10:00:39.901245');
INSERT INTO admin_login_log VALUES('106','superadmin@gmail.com','27.107.187.146','68db65fab0d1b','failed','Bored Monkey','2025-09-30 10:39:14.725936');
INSERT INTO admin_login_log VALUES('107','superadmin@gmail.com','103.59.213.194','68db96935fbcd','failed','Bored Monkey','2025-09-30 14:06:35.400722');
INSERT INTO admin_login_log VALUES('108','superadmin@gmail.com','103.59.213.194','68dbb03e3589b','failed','Bored Monkey','2025-09-30 15:56:06.220710');
INSERT INTO admin_login_log VALUES('109','superadmin@gmail.com','27.107.187.146','68dbcecf8acd8','failed','Bored Monkey','2025-09-30 18:06:31.570023');
INSERT INTO admin_login_log VALUES('110','superadmin@gmail.com','27.107.187.146','68dbcfa5683dd','failed','Bored Monkey','2025-09-30 18:10:05.428292');
INSERT INTO admin_login_log VALUES('111','superadmin@gmail.com','27.107.187.146','68dcd0f4161cb','failed','Bored Monkey','2025-10-01 12:27:56.092289');
INSERT INTO admin_login_log VALUES('112','superadmin@gmail.com','103.59.213.194','68dce6479ac66','failed','Bored Monkey','2025-10-01 13:58:55.635656');
INSERT INTO admin_login_log VALUES('113','superadmin@gmail.com','103.59.213.194','68dcf76ae7277','failed','Bored Monkey','2025-10-01 15:12:02.949316');
INSERT INTO admin_login_log VALUES('114','superadmin@gmail.com','27.107.187.146','68dcfacecac9d','failed','Bored Monkey','2025-10-01 15:26:30.832987');
INSERT INTO admin_login_log VALUES('115','superadmin@gmail.com','27.107.187.146','68ddf382c5640','failed','Bored Monkey','2025-10-02 09:07:38.811671');
INSERT INTO admin_login_log VALUES('116','superadmin@gmail.com','103.59.213.194','68de12096790d','failed','Bored Monkey','2025-10-02 11:17:53.425915');
INSERT INTO admin_login_log VALUES('117','superadmin@gmail.com','27.107.187.146','68de149258790','failed','Bored Monkey','2025-10-02 11:28:42.372450');
INSERT INTO admin_login_log VALUES('118','superadmin@gmail.com','27.107.187.146','68de4354ef453','failed','Bored Monkey','2025-10-02 14:48:12.981755');
INSERT INTO admin_login_log VALUES('119','superadmin@gmail.com','103.59.213.194','68df46bbb4771','failed','Bored Monkey','2025-10-03 09:14:59.741011');
INSERT INTO admin_login_log VALUES('120','superadmin@gmail.com','103.59.213.194','68df53b94586a','failed','Bored Monkey','2025-10-03 10:10:25.286095');
INSERT INTO admin_login_log VALUES('121','superadmin@gmail.com','103.59.213.194','68e105de566c0','failed','Bored Monkey','2025-10-04 17:02:46.355330');
INSERT INTO admin_login_log VALUES('122','superadmin@gmail.com','103.59.213.194','68e37be5ec8d0','failed','Bored Monkey','2025-10-06 13:50:53.977186');
INSERT INTO admin_login_log VALUES('123','superadmin@gmail.com','27.107.187.146','68e4b94e35720','failed','Bored Monkey','2025-10-07 12:25:10.220337');
INSERT INTO admin_login_log VALUES('124','superadmin@gmail.com','103.59.213.194','68e4e97ae8a5e','failed','Bored Monkey','2025-10-07 15:50:42.954260');
INSERT INTO admin_login_log VALUES('125','superadmin@gmail.com','103.59.213.194','68e5ec30b1423','failed','Bored Monkey','2025-10-08 10:14:32.736094');
INSERT INTO admin_login_log VALUES('126','superadmin@gmail.com','27.107.187.146','68e5f6ddf311a','failed','Bored Monkey','2025-10-08 11:00:05.997020');
INSERT INTO admin_login_log VALUES('127','superadmin@gmail.com','27.107.187.146','68e606e4e3c32','failed','Bored Monkey','2025-10-08 12:08:28.934263');
INSERT INTO admin_login_log VALUES('128','superadmin@gmail.com','103.59.213.194','68e61d0fcd2ef','failed','Bored Monkey','2025-10-08 13:43:03.841645');
INSERT INTO admin_login_log VALUES('129','superadmin@gmail.com','27.107.187.146','68e637194517f','failed','Bored Monkey','2025-10-08 15:34:09.289301');
INSERT INTO admin_login_log VALUES('130','superadmin@gmail.com','103.59.213.194','68e644be29ffb','failed','Bored Monkey','2025-10-08 16:32:22.174289');
INSERT INTO admin_login_log VALUES('131','superadmin@gmail.com','27.107.187.146','68e64a1c9cf74','failed','Bored Monkey','2025-10-08 16:55:16.644757');
INSERT INTO admin_login_log VALUES('132','superadmin@gmail.com','27.107.187.146','68e73b9fbf8a4','failed','Bored Monkey','2025-10-09 10:05:43.786140');
INSERT INTO admin_login_log VALUES('133','superadmin@gmail.com','103.59.213.194','68e73bc586724','failed','Bored Monkey','2025-10-09 10:06:21.552503');
INSERT INTO admin_login_log VALUES('134','superadmin@gmail.com','27.107.187.146','68e74377231a0','failed','Bored Monkey','2025-10-09 10:39:11.145424');
INSERT INTO admin_login_log VALUES('135','superadmin@gmail.com','27.107.187.146','68e74fab5e59b','failed','Bored Monkey','2025-10-09 11:31:15.394769');
INSERT INTO admin_login_log VALUES('136','superadmin@gmail.com','27.107.187.146','68e74ff5ebac8','failed','Bored Monkey','2025-10-09 11:32:29.967815');
INSERT INTO admin_login_log VALUES('137','superadmin@gmail.com','27.107.187.146','68e76ef469da1','success','Bored Monkey','2025-10-09 13:44:44.435115');



CREATE TABLE `alloy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `total_weight` varchar(100) DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO alloy VALUES('16','Silver10','10','91.28','2025-09-26 19:25:58');
INSERT INTO alloy VALUES('17','Stone','','80','2025-09-29 17:58:01');
INSERT INTO alloy VALUES('18','Silver Alloy15','15','86.92','2025-10-02 09:20:39');
INSERT INTO alloy VALUES('19','Copper Alloy75','75','34.61','2025-10-02 09:21:08');



CREATE TABLE `alloy_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` varchar(10) NOT NULL,
  `alloy_id` varchar(10) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0->credit\r\n1->debit',
  `entry_id` varchar(100) DEFAULT NULL,
  `accept_status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0->pending\r\n1->success\r\n2->reject',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO alloy_history VALUES('1','37','19','100','2025-10-09 11:36:42','','','');
INSERT INTO alloy_history VALUES('2','37','18','100','2025-10-09 11:36:49','','','');
INSERT INTO alloy_history VALUES('3','37','16','100','2025-10-09 11:36:53','','','');
INSERT INTO alloy_history VALUES('4','37','17','100','2025-10-09 11:36:59','','','');
INSERT INTO alloy_history VALUES('5','37','16','8.72','2025-10-09 11:38:38','1','5','1');
INSERT INTO alloy_history VALUES('6','37','18','13.08','2025-10-09 11:38:38','1','5','1');
INSERT INTO alloy_history VALUES('7','37','19','65.39','2025-10-09 11:38:38','1','5','1');
INSERT INTO alloy_history VALUES('8','67','17','20','2025-10-09 12:27:13','','','1');



CREATE TABLE `backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sql_name` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `carat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO carat VALUES('1','22k','91.75','2025-09-28 19:17:22');
INSERT INTO carat VALUES('2','24k','100','2025-09-28 19:17:38');
INSERT INTO carat VALUES('3','18k','75.20','2025-09-28 19:18:52');
INSERT INTO carat VALUES('8','995','99.5','2025-09-30 18:54:52');
INSERT INTO carat VALUES('9','999','99.9','2025-10-02 09:10:37');
INSERT INTO carat VALUES('10','998','99.8','2025-10-02 09:10:44');
INSERT INTO carat VALUES('11','994','99.4','2025-10-02 09:10:50');



CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT '0,2,5' COMMENT '0->all order\r\n3->edit order\r\n4->delete order\r\n1->add Order\r\n2->transfer order\r\n5->Accept orders\r\n6->all Metal\r\n7->edit Metal\r\n8->delete Metal\r\n9->add Metal\r\n10->transfer Metal\r\n11->Accept Metal',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` varchar(100) NOT NULL DEFAULT '0' COMMENT '0->not admin\r\n1->admin',
  `use_gold` varchar(100) NOT NULL DEFAULT '0',
  `loss` varchar(11) NOT NULL DEFAULT '0',
  `previous_gold` varchar(100) NOT NULL DEFAULT '0',
  `melting_value` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;

INSERT INTO departments VALUES('14','Melting','10,11','2025-08-14 21:57:59','','8','','','91.75');
INSERT INTO departments VALUES('15','Tarpatta','0,1,2,3,5,10,11','2025-08-14 21:58:18','','15','35','','91.75');
INSERT INTO departments VALUES('16','Emr','0,2,5,10','2025-08-14 21:58:47','','50','2','','91.75');
INSERT INTO departments VALUES('17','Cnc','0,2,5,10','2025-08-14 21:58:57','','','','','91.75');
INSERT INTO departments VALUES('19','Manual','0,2,5,10','2025-08-14 21:59:28','','10','','','91.75');
INSERT INTO departments VALUES('20','Rhodium','0,2,5,10','2025-08-14 21:59:45','','','','','91.75');
INSERT INTO departments VALUES('21','SideLevel','0,2,5,10','2025-08-14 22:00:04','','20','','','91.75');
INSERT INTO departments VALUES('23','Filling','0,2,5,10','2025-08-14 22:00:25','','','','','91.75');
INSERT INTO departments VALUES('24','Polish','0,2,5,10','2025-08-14 22:00:33','','42','','','91.75');
INSERT INTO departments VALUES('25','Packing','0,2,5,6,10,11','2025-08-14 22:00:43','','3','','','91.75');
INSERT INTO departments VALUES('26','Enamel','0,2,5','2025-08-15 14:57:20','','','','','91.75');
INSERT INTO departments VALUES('30','Return','','2025-08-28 15:54:51','1','','','','91.75');
INSERT INTO departments VALUES('32','Loss','','2025-08-28 16:02:04','1','4.19','','','91.75');
INSERT INTO departments VALUES('33','Office','6,7,9,10,11','2025-08-29 13:38:46','','','','','91.75');
INSERT INTO departments VALUES('37','Central','10,11','2025-08-31 18:39:43','','1803','','','91.75');
INSERT INTO departments VALUES('41','Indutherm melting','10,11','2025-08-31 23:11:07','','','','','91.75');
INSERT INTO departments VALUES('51','Dispatch','2,5','2025-09-02 17:00:26','','75','','','91.75');
INSERT INTO departments VALUES('56','Components','6,10,11','2025-09-09 10:42:09','','10','','','91.75');
INSERT INTO departments VALUES('57','Turning','0,2,5,10','2025-09-12 10:10:26','','','','','91.75');
INSERT INTO departments VALUES('58','Rawa','0,2,5,10,11','2025-09-12 14:31:05','','','','','91.75');
INSERT INTO departments VALUES('59','S4','10,11','2025-09-13 16:06:31','','10','','','91.75');
INSERT INTO departments VALUES('63','Lazer','0,2,5,10,11','2025-09-18 15:00:16','','','','','91.75');
INSERT INTO departments VALUES('67','stone setting','0,2,5,6,10,11','2025-09-25 09:30:45','','','','','91.75');
INSERT INTO departments VALUES('69','Stone Out','','2025-09-29 19:26:48','','20','','','');



CREATE TABLE `loss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_department` varchar(200) NOT NULL,
  `to_department` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  `net_weight` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO loss VALUES('1','15','','835','','2025-10-09 12:15:54','766.1125');
INSERT INTO loss VALUES('2','16','','5','','2025-10-09 12:19:13','4.5875');
INSERT INTO loss VALUES('3','16','32','2','Admin transfered from book loss','2025-10-09T06:50','');
INSERT INTO loss VALUES('4','41','','2.19','','2025-10-09 12:33:42','2.0093250000001');
INSERT INTO loss VALUES('5','41','32','2.19','Admin transfered from book loss','2025-10-09T07:04','');
INSERT INTO loss VALUES('6','16','','2','','2025-10-09 12:36:23','6.4225');



CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_type` enum('user','department','admin') NOT NULL,
  `receiver_type` enum('user','department','admin') NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `metal_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `entry_id` varchar(100) DEFAULT NULL,
  `from_dept` int(11) NOT NULL,
  `to_dept` int(11) NOT NULL,
  `notes` text,
  `gold_touch` decimal(8,2) DEFAULT NULL,
  `total_weight` decimal(12,2) DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0->pending 1->success 2->reject	',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO metal_entry VALUES('1','FG001','5','37','41','-','99.50','500.00','2025-10-09 11:38:38','1');
INSERT INTO metal_entry VALUES('2','FG001','5','37','41','-','100.00','500.00','2025-10-09 11:38:38','1');



CREATE TABLE `metal_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` varchar(100) NOT NULL,
  `to_dept` varchar(100) NOT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `from_dept` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0->pending\r\n3->waiting for accept\r\n1->success\r\n2->failed',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `touch` varchar(11) NOT NULL DEFAULT '0' COMMENT 'in percantage',
  `success_at` varchar(100) DEFAULT NULL,
  `pieces` varchar(100) DEFAULT NULL,
  `stone_weight` varchar(100) DEFAULT NULL,
  `metal_tracking_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO metal_tracking VALUES('1','1000','33','','33','1','2025-10-09 11:34:54','99.5','','','','');
INSERT INTO metal_tracking VALUES('2','1000','33','','33','1','2025-10-09 11:34:59','100','','','','');
INSERT INTO metal_tracking VALUES('3','1000','37','','33','1','2025-10-09 11:35:13','99.5','2025-10-09 11:36:08','','','1');
INSERT INTO metal_tracking VALUES('4','1000','37','','33','1','2025-10-09 11:35:13','100','2025-10-09 11:36:12','','','2');
INSERT INTO metal_tracking VALUES('5','1087.19','41','','37','1','2025-10-09 11:38:38','91.75','2025-10-09 11:38:56','','','');
INSERT INTO metal_tracking VALUES('6','1050','15','','41','1','2025-10-09 11:39:18','91.75','2025-10-09 11:39:31','','','');
INSERT INTO metal_tracking VALUES('7','800','37','Admin transfered metal from book loss','','1','2025-10-09 12:16:08','91.75','','','','');
INSERT INTO metal_tracking VALUES('8','3','37','Admin transfered metal from book loss','','1','2025-10-09 12:20:32','99.5','','','','');
INSERT INTO metal_tracking VALUES('9','35','15','','41','1','2025-10-09 12:23:41','91.75','2025-10-09 12:23:49','','','');
INSERT INTO metal_tracking VALUES('10','20','59','','15','1','2025-10-09 12:24:58','91.75','2025-10-09 12:25:06','','','');
INSERT INTO metal_tracking VALUES('11','10','67','','59','1','2025-10-09 12:26:11','91.75','2025-10-09 12:26:29','50','','');
INSERT INTO metal_tracking VALUES('12','10','56','','67','1','2025-10-09 12:27:00','91.75','2025-10-09 12:27:13','50','20','');
INSERT INTO metal_tracking VALUES('13','20','69','','56','1','2025-10-09 12:30:00','91.75','2025-10-09 12:30:00','','','');
INSERT INTO metal_tracking VALUES('14','8','14','','16','1','2025-10-09 12:35:55','91.75','2025-10-09 12:36:07','','','');



CREATE TABLE `ods` (
  `ono` int(255) NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(255) NOT NULL,
  `ots` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `uuid` varchar(99) NOT NULL,
  `status` varchar(99) DEFAULT NULL,
  `otp` varchar(100) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ono`)
) ENGINE=InnoDB AUTO_INCREMENT=1786 DEFAULT CHARSET=latin1;

INSERT INTO ods VALUES('1','','983390','FG00100','68b457850e931','verified','983390','2025-08-31 19:39:09');
INSERT INTO ods VALUES('2','','453633','FG001','68b457b03937c','verified','453633','2025-08-31 19:39:52');
INSERT INTO ods VALUES('3','','341792','FG010','68b457cfdb42c','verified','341792','2025-08-31 19:40:23');
INSERT INTO ods VALUES('4','','778709','FG005','68b457db1b5bd','verified','778709','2025-08-31 19:40:35');
INSERT INTO ods VALUES('5','','712712','003','68b4580904e03','verified','712712','2025-08-31 19:41:21');
INSERT INTO ods VALUES('6','','883726','FG001','68b468b212f26','verified','883726','2025-08-31 20:52:26');
INSERT INTO ods VALUES('7','','924260','FG005','68b48be735754','verified','924260','2025-08-31 23:22:39');
INSERT INTO ods VALUES('8','','117112','FG00100','68b4ff1d3384f','verified','117112','2025-09-01 07:34:13');
INSERT INTO ods VALUES('9','','410411','FG00100','68b538cb24eb8','verified','410411','2025-09-01 11:40:19');
INSERT INTO ods VALUES('10','','962713','FG099','68b56e68b8258','verified','962713','2025-09-01 15:29:04');
INSERT INTO ods VALUES('11','','629411','FG065','68b56f33421d0','verified','629411','2025-09-01 15:32:27');
INSERT INTO ods VALUES('12','','785313','FG099','68b56f6656bab','verified','785313','2025-09-01 15:33:18');
INSERT INTO ods VALUES('13','','875835','FG0065','68b56f8b5b992','verified','875835','2025-09-01 15:33:55');
INSERT INTO ods VALUES('14','','623931','FG065','68b56fb611160','verified','623931','2025-09-01 15:34:38');
INSERT INTO ods VALUES('15','','260013','FG137','68b5718754bd7','verified','260013','2025-09-01 15:42:23');
INSERT INTO ods VALUES('16','','485653','FG065','68b571aa77ba3','verified','485653','2025-09-01 15:42:58');
INSERT INTO ods VALUES('17','','827764','FG137','68b5724b45896','verified','827764','2025-09-01 15:45:39');
INSERT INTO ods VALUES('18','','441505','FG099','68b572b5c4316','verified','441505','2025-09-01 15:47:25');
INSERT INTO ods VALUES('19','','782578','FG101','68b58eed40318','verified','782578','2025-09-01 17:47:49');
INSERT INTO ods VALUES('20','','750480','FG065','68b58f9217696','verified','750480','2025-09-01 17:50:34');
INSERT INTO ods VALUES('21','','112096','FG101','68b58fc5b1056','verified','112096','2025-09-01 17:51:25');
INSERT INTO ods VALUES('22','','560394','FG065','68b58fe499951','verified','560394','2025-09-01 17:51:56');
INSERT INTO ods VALUES('23','','311916','FG070','68b593dc844a5','verified','311916','2025-09-01 18:08:52');
INSERT INTO ods VALUES('24','','615442','FG137','68b594f8d423b','verified','615442','2025-09-01 18:13:36');
INSERT INTO ods VALUES('25','','686286','FG137','68b5951d8cc84','verified','686286','2025-09-01 18:14:13');
INSERT INTO ods VALUES('26','','776469','FG065','68b5955712d0f','verified','776469','2025-09-01 18:15:11');
INSERT INTO ods VALUES('27','','669934','FG101','68b59803d6dbd','verified','669934','2025-09-01 18:26:35');
INSERT INTO ods VALUES('28','','270309','FG065','68b59f7eeb978','verified','270309','2025-09-01 18:58:30');
INSERT INTO ods VALUES('29','','653942','FG101','68b5a2ac263dc','verified','653942','2025-09-01 19:12:04');
INSERT INTO ods VALUES('30','','411712','FG001','68b5a2d58fbe5','verified','411712','2025-09-01 19:12:45');
INSERT INTO ods VALUES('31','','756150','FG101','68b5a346e3c27','verified','756150','2025-09-01 19:14:38');
INSERT INTO ods VALUES('32','','233380','FG001','68b5a36d48eab','verified','233380','2025-09-01 19:15:17');
INSERT INTO ods VALUES('33','','143773','FG001','68b5a3b416fc1','verified','143773','2025-09-01 19:16:28');
INSERT INTO ods VALUES('34','','917588','FG137','68b5a3de97ee0','verified','917588','2025-09-01 19:17:10');
INSERT INTO ods VALUES('35','','102163','FG001','68b5a41e566e7','verified','102163','2025-09-01 19:18:14');
INSERT INTO ods VALUES('36','','165810','995','68b682f4e52c1','verified','165810','2025-09-02 11:09:00');
INSERT INTO ods VALUES('37','','242581','FG101','68b68401150e0','verified','242581','2025-09-02 11:13:29');
INSERT INTO ods VALUES('38','','367953','995','68b684adb105d','verified','367953','2025-09-02 11:16:21');
INSERT INTO ods VALUES('39','','768149','100','68b684c3213f2','verified','768149','2025-09-02 11:16:43');
INSERT INTO ods VALUES('40','','491027','FG101','68b684d92bac8','verified','491027','2025-09-02 11:17:05');
INSERT INTO ods VALUES('41','','354288','995','68b68543d1568','verified','354288','2025-09-02 11:18:51');
INSERT INTO ods VALUES('42','','612142','FG137','68b685bbcdaa4','verified','612142','2025-09-02 11:20:51');
INSERT INTO ods VALUES('43','','402519','995','68b685d28c679','verified','402519','2025-09-02 11:21:14');
INSERT INTO ods VALUES('44','','167014','FG137','68b686ba97f18','verified','167014','2025-09-02 11:25:06');
INSERT INTO ods VALUES('45','','210443','995','68b687144542b','verified','210443','2025-09-02 11:26:36');
INSERT INTO ods VALUES('46','','616524','FG137','68b687364b35d','verified','616524','2025-09-02 11:27:10');
INSERT INTO ods VALUES('47','0000000000','150026','100','68b6888447189','verified','','2025-09-02 11:32:44');
INSERT INTO ods VALUES('48','0000000000','376679','100','68b688bbf0c0d','verified','','2025-09-02 11:33:39');
INSERT INTO ods VALUES('49','0000000000','383838','995','68b688cab4a37','verified','','2025-09-02 11:33:54');
INSERT INTO ods VALUES('50','0000000000','302026','FG070','68b688d532a2a','verified','','2025-09-02 11:34:05');
INSERT INTO ods VALUES('51','0000000000','156382','FG137','68b688de540ed','verified','','2025-09-02 11:34:14');
INSERT INTO ods VALUES('52','','562943','FG137','68b690f35394a','verified','562943','2025-09-02 12:08:43');
INSERT INTO ods VALUES('53','','191184','FG101','68b6912c35503','verified','191184','2025-09-02 12:09:40');
INSERT INTO ods VALUES('54','','307460','FG101','68b6915ee66a9','verified','307460','2025-09-02 12:10:30');
INSERT INTO ods VALUES('55','0000000000','452173','100','68b691757a383','verified','','2025-09-02 12:10:53');
INSERT INTO ods VALUES('56','0000000000','957230','FG101','68b6918ed89c9','verified','','2025-09-02 12:11:18');
INSERT INTO ods VALUES('57','','137616','100','68b69207d69d9','verified','137616','2025-09-02 12:13:19');
INSERT INTO ods VALUES('58','','376668','995','68b69214a60cc','verified','376668','2025-09-02 12:13:32');
INSERT INTO ods VALUES('59','','510465','FG101','68b6922aa3537','verified','510465','2025-09-02 12:13:54');
INSERT INTO ods VALUES('60','','212599','995','68b6924aca2e7','verified','212599','2025-09-02 12:14:26');
INSERT INTO ods VALUES('61','0000000000','860482','FG137','68b6934d600b7','verified','','2025-09-02 12:18:45');
INSERT INTO ods VALUES('62','0000000000','812804','995','68b6935fe3474','verified','','2025-09-02 12:19:03');
INSERT INTO ods VALUES('63','0000000000','887381','FG101','68b69693a9ed0','verified','','2025-09-02 12:32:43');
INSERT INTO ods VALUES('64','0000000000','250479','100','68b69798ce541','verified','','2025-09-02 12:37:04');
INSERT INTO ods VALUES('65','0000000000','620396','FG137','68b697a50a86d','verified','','2025-09-02 12:37:17');
INSERT INTO ods VALUES('66','0000000000','377849','FG101','68b6985193cbf','verified','','2025-09-02 12:40:09');
INSERT INTO ods VALUES('67','','422847','995','68b698a6552a6','verified','422847','2025-09-02 12:41:34');
INSERT INTO ods VALUES('68','0000000000','171332','FG101','68b69aa1c985f','verified','','2025-09-02 12:50:01');
INSERT INTO ods VALUES('69','0000000000','824912','FG137','68b69abc6bebd','verified','','2025-09-02 12:50:28');
INSERT INTO ods VALUES('70','0000000000','604683','FG137','68b69b3748010','verified','','2025-09-02 12:52:31');
INSERT INTO ods VALUES('71','0000000000','976834','FG101','68b69d4d82268','verified','','2025-09-02 13:01:25');
INSERT INTO ods VALUES('72','0000000000','707763','FG137','68b69d9b358ad','verified','','2025-09-02 13:02:43');
INSERT INTO ods VALUES('73','','494797','995','68b69ea36a8d0','verified','494797','2025-09-02 13:07:07');
INSERT INTO ods VALUES('74','','718348','FG137','68b69ec497ad8','verified','718348','2025-09-02 13:07:40');
INSERT INTO ods VALUES('75','','362598','995','68b69ed420acd','verified','362598','2025-09-02 13:07:56');
INSERT INTO ods VALUES('76','','204314','FG137','68b69ef6614d1','verified','204314','2025-09-02 13:08:30');
INSERT INTO ods VALUES('77','0000000000','848365','100','68b69fb1a0108','verified','','2025-09-02 13:11:37');
INSERT INTO ods VALUES('78','7894561230','505861','FG010','68b6a0c8eccde','verified','','2025-09-02 13:16:16');
INSERT INTO ods VALUES('79','0000000000','158689','FG137','68b6a1de9fc1e','verified','','2025-09-02 13:20:54');
INSERT INTO ods VALUES('80','9987562432','807036','FG002','68b6a3d3a8feb','verified','','2025-09-02 13:29:15');
INSERT INTO ods VALUES('81','0000000000','565039','FG101','68b6c209b921a','verified','','2025-09-02 15:38:09');
INSERT INTO ods VALUES('82','0000000000','746878','995','68b6c255919d7','verified','','2025-09-02 15:39:25');
INSERT INTO ods VALUES('83','0000000000','910841','100','68b6c265e05f9','verified','','2025-09-02 15:39:41');
INSERT INTO ods VALUES('84','0000000000','973072','FG101','68b6c27bcb3e2','verified','','2025-09-02 15:40:03');
INSERT INTO ods VALUES('85','0000000000','824844','Alloy','68b6c3a2a971e','verified','','2025-09-02 15:44:58');
INSERT INTO ods VALUES('86','0000000000','312311','100','68b6c3e4df734','verified','','2025-09-02 15:46:04');
INSERT INTO ods VALUES('87','0000000000','993351','995','68b6c3ff5e351','verified','','2025-09-02 15:46:31');
INSERT INTO ods VALUES('88','','294423','FG137','68b6c41e94347','verified','294423','2025-09-02 15:47:02');
INSERT INTO ods VALUES('89','0000000000','639958','Tarpatta','68b6c4dd02d92','verified','','2025-09-02 15:50:13');
INSERT INTO ods VALUES('90','7894561230','698240','FG0012','68b6c97c9f1ef','verified','','2025-09-02 16:09:56');
INSERT INTO ods VALUES('91','9987562432','727398','FG002','68b6c9976f1cb','verified','','2025-09-02 16:10:23');
INSERT INTO ods VALUES('92','0000000000','115405','003','68b6c9e749326','verified','','2025-09-02 16:11:43');
INSERT INTO ods VALUES('93','0000000000','748677','SideLevel','68b6ca31e43ec','verified','','2025-09-02 16:12:57');
INSERT INTO ods VALUES('94','0000000000','745949','Polisj','68b6cbdfa9e7a','verified','','2025-09-02 16:20:07');
INSERT INTO ods VALUES('95','0000000000','570406','Packing','68b6cc9e58af2','verified','','2025-09-02 16:23:18');
INSERT INTO ods VALUES('96','0000000000','732647','FG101','68b6cdfb3a364','verified','','2025-09-02 16:29:07');
INSERT INTO ods VALUES('97','0000000000','288287','SideLevel','68b6cff48ee63','verified','','2025-09-02 16:37:32');
INSERT INTO ods VALUES('98','0000000000','122268','92R','68b6d0ba595c3','verified','','2025-09-02 16:40:50');
INSERT INTO ods VALUES('99','0000000000','949427','Packing','68b6d3985ac47','verified','','2025-09-02 16:53:04');
INSERT INTO ods VALUES('100','0000000000','638599','Manual','68b6d4e56610c','verified','','2025-09-02 16:58:37');
INSERT INTO ods VALUES('101','0000000000','139205','Packing','68b6d51522f34','verified','','2025-09-02 16:59:25');
INSERT INTO ods VALUES('102','0000000000','529805','Dispatch','68b6d572043e8','verified','','2025-09-02 17:00:58');
INSERT INTO ods VALUES('103','0000000000','521218','Manual','68b6d585526c3','verified','','2025-09-02 17:01:17');
INSERT INTO ods VALUES('104','0000000000','524479','Packing','68b6d593a61bd','verified','','2025-09-02 17:01:31');
INSERT INTO ods VALUES('105','0000000000','727123','Dispatch','68b6d5ce9fc26','verified','','2025-09-02 17:02:30');
INSERT INTO ods VALUES('106','0000000000','285515','100','68b6d7db0f4d3','verified','','2025-09-02 17:11:15');
INSERT INTO ods VALUES('107','0000000000','546551','Tarpatta','68b6d80acd204','verified','','2025-09-02 17:12:02');
INSERT INTO ods VALUES('108','0000000000','928635','Packing','68b6dae608254','verified','','2025-09-02 17:24:14');
INSERT INTO ods VALUES('109','0000000000','264913','Tarpatta','68b6dc7c7b154','verified','','2025-09-02 17:31:00');
INSERT INTO ods VALUES('110','0000000000','536627','Packing','68b6dd293bb9f','verified','','2025-09-02 17:33:53');
INSERT INTO ods VALUES('111','0000000000','372126','Dispatch','68b6ddd13fefc','verified','','2025-09-02 17:36:41');
INSERT INTO ods VALUES('112','0000000000','852669','Packing','68b6dde566c0d','verified','','2025-09-02 17:37:01');
INSERT INTO ods VALUES('113','0000000000','465813','FG101','68b6e2496ca43','verified','','2025-09-02 17:55:45');
INSERT INTO ods VALUES('114','0000000000','706802','Dispatch','68b6e270bfa9b','verified','','2025-09-02 17:56:24');
INSERT INTO ods VALUES('115','0000000000','949015','Polish','68b7db966ff1c','verified','','2025-09-03 11:39:26');
INSERT INTO ods VALUES('116','0000000000','148717','FG101','68b8267211174','verified','','2025-09-03 16:58:50');
INSERT INTO ods VALUES('117','0000000000','255772','995','68b826e77dadd','verified','','2025-09-03 17:00:47');
INSERT INTO ods VALUES('118','0000000000','958830','100','68b826fbb5d27','verified','','2025-09-03 17:01:07');
INSERT INTO ods VALUES('119','0000000000','528960','FG101','68b8271d828d7','verified','','2025-09-03 17:01:41');
INSERT INTO ods VALUES('120','0000000000','152732','Alloy','68b8279da13de','verified','','2025-09-03 17:03:49');
INSERT INTO ods VALUES('121','0000000000','217216','995','68b827cce20b9','verified','','2025-09-03 17:04:36');
INSERT INTO ods VALUES('122','0000000000','328428','FG137','68b827f503005','verified','','2025-09-03 17:05:17');
INSERT INTO ods VALUES('123','0000000000','509362','Tarpatta','68b8286eb0169','verified','','2025-09-03 17:07:18');
INSERT INTO ods VALUES('124','0000000000','504229','Manual','68b82af10ff06','verified','','2025-09-03 17:18:01');
INSERT INTO ods VALUES('125','0000000000','285646','SideLevel','68b82b09266f1','verified','','2025-09-03 17:18:25');
INSERT INTO ods VALUES('126','0000000000','410668','Tarpatta','68b82b18d68ff','verified','','2025-09-03 17:18:40');
INSERT INTO ods VALUES('127','0000000000','448560','Manual','68b82b8a976c0','verified','','2025-09-03 17:20:34');
INSERT INTO ods VALUES('128','0000000000','758687','Polish','68b82bd5445ac','verified','','2025-09-03 17:21:49');
INSERT INTO ods VALUES('129','0000000000','216082','92R','68b82bfe697cc','verified','','2025-09-03 17:22:30');
INSERT INTO ods VALUES('130','0000000000','389646','Packing','68b82c1030f2e','verified','','2025-09-03 17:22:48');
INSERT INTO ods VALUES('131','0000000000','314745','Dispatch','68b82c595205b','verified','','2025-09-03 17:24:01');
INSERT INTO ods VALUES('132','0000000000','295421','Tarpatta','68b82cafbe9c8','verified','','2025-09-03 17:25:27');
INSERT INTO ods VALUES('133','0000000000','312283','SideLevel','68b82cd073115','verified','','2025-09-03 17:26:00');
INSERT INTO ods VALUES('134','0000000000','767609','SideLevel','68b922eb51f2a','verified','','2025-09-04 10:56:03');
INSERT INTO ods VALUES('135','','703372','995','68b94c672a04f','verified','703372','2025-09-04 13:53:03');
INSERT INTO ods VALUES('136','','133686','995','68b94d01bf327','verified','133686','2025-09-04 13:55:37');
INSERT INTO ods VALUES('137','','421885','995','68b97cdb31f50','verified','421885','2025-09-04 17:19:47');
INSERT INTO ods VALUES('138','','277095','FG010','68b97e1948967','verified','277095','2025-09-04 17:25:05');
INSERT INTO ods VALUES('139','','236917','995','68b9820350d72','verified','236917','2025-09-04 17:41:47');
INSERT INTO ods VALUES('140','','938123','995','68ba79fa8f5d7','verified','938123','2025-09-05 11:19:46');
INSERT INTO ods VALUES('141','','794848','Manual','68ba7a4adc1a3','verified','794848','2025-09-05 11:21:06');
INSERT INTO ods VALUES('142','0000000000','980527','Polish','68ba7e51d80d4','verified','','2025-09-05 11:38:17');
INSERT INTO ods VALUES('143','0000000000','963548','Manual','68ba7e5aeeebf','verified','','2025-09-05 11:38:26');
INSERT INTO ods VALUES('144','0000000000','841776','Packing','68ba7e6002bd0','verified','','2025-09-05 11:38:32');
INSERT INTO ods VALUES('145','0000000000','819516','92R','68ba7e880ca72','verified','','2025-09-05 11:39:12');
INSERT INTO ods VALUES('146','','222263','SideLevel','68ba7f09565d1','verified','222263','2025-09-05 11:41:21');
INSERT INTO ods VALUES('147','','546844','Packing','68ba8398c6a62','verified','546844','2025-09-05 12:00:48');
INSERT INTO ods VALUES('148','','752201','FG137','68ba83b78ceb5','verified','752201','2025-09-05 12:01:19');
INSERT INTO ods VALUES('149','','546651','995','68ba851db2e4b','verified','546651','2025-09-05 12:07:17');
INSERT INTO ods VALUES('150','0000000000','954907','Polish','68ba861043609','verified','','2025-09-05 12:11:20');
INSERT INTO ods VALUES('151','0000000000','254357','Packing','68ba88eba7459','verified','','2025-09-05 12:23:31');
INSERT INTO ods VALUES('152','0000000000','788816','Dispatch','68ba890fb65b1','verified','','2025-09-05 12:24:07');
INSERT INTO ods VALUES('153','0000000000','398338','Dispatch','68ba95c8d4bd0','verified','','2025-09-05 13:18:24');
INSERT INTO ods VALUES('154','','971532','995','68bab2772e80f','verified','971532','2025-09-05 15:20:47');
INSERT INTO ods VALUES('155','','202586','995','68bab282a1f5a','verified','202586','2025-09-05 15:20:58');
INSERT INTO ods VALUES('156','0000000000','311556','FG101','68bac3db18c49','verified','','2025-09-05 16:34:59');
INSERT INTO ods VALUES('157','','459745','FG101','68bac40e9f7f4','verified','459745','2025-09-05 16:35:50');
INSERT INTO ods VALUES('158','0000000000','884287','FG101','68bacc5ae5362','verified','','2025-09-05 17:11:14');
INSERT INTO ods VALUES('159','','869669','995','68bad0134bb47','verified','869669','2025-09-05 17:27:07');
INSERT INTO ods VALUES('160','','649557','100','68bad06914bcd','verified','649557','2025-09-05 17:28:33');
INSERT INTO ods VALUES('161','','160629','FG099','68bad09b09f62','verified','160629','2025-09-05 17:29:23');
INSERT INTO ods VALUES('162','0000000000','676591','FG091','68bad7508cfce','verified','','2025-09-05 17:58:00');
INSERT INTO ods VALUES('163','0000000000','802095','Pairing','68bad89ce6756','verified','','2025-09-05 18:03:32');
INSERT INTO ods VALUES('164','0000000000','446887','FG091','68bad8ab61c75','verified','','2025-09-05 18:03:47');
INSERT INTO ods VALUES('165','0000000000','815244','FG091','68be4ba546f65','verified','','2025-09-08 08:51:09');
INSERT INTO ods VALUES('166','0000000000','729395','FG160','68be4c31a19e7','verified','','2025-09-08 08:53:29');
INSERT INTO ods VALUES('167','0000000000','561694','Pairing','68be4cf25a38f','verified','','2025-09-08 08:56:42');
INSERT INTO ods VALUES('168','0000000000','552039','FG099','68be4d3f424f4','verified','','2025-09-08 08:57:59');
INSERT INTO ods VALUES('169','0000000000','336238','Pairing','68be4d594c28e','verified','','2025-09-08 08:58:25');
INSERT INTO ods VALUES('170','0000000000','681325','FG146','68be4d736a32f','verified','','2025-09-08 08:58:51');
INSERT INTO ods VALUES('171','0000000000','237577','92R','68be4e241faa5','verified','','2025-09-08 09:01:48');
INSERT INTO ods VALUES('172','0000000000','617519','Pairing','68be4e4d86522','verified','','2025-09-08 09:02:29');
INSERT INTO ods VALUES('173','0000000000','749934','FG160','68be4e5e994df','verified','','2025-09-08 09:02:46');
INSERT INTO ods VALUES('174','0000000000','185974','FG146','68be4ea937c20','verified','','2025-09-08 09:04:01');
INSERT INTO ods VALUES('175','0000000000','556102','Pairing','68be4ec0acaf7','verified','','2025-09-08 09:04:24');
INSERT INTO ods VALUES('176','0000000000','877671','FG160','68be4ef6b2c5d','verified','','2025-09-08 09:05:18');
INSERT INTO ods VALUES('177','0000000000','152417','Pairing','68be4f0fa186e','verified','','2025-09-08 09:05:43');
INSERT INTO ods VALUES('178','7894561230','860706','FG010','68be5017d54f4','verified','','2025-09-08 09:10:07');
INSERT INTO ods VALUES('179','0000000000','883077','FG101','68be58cd9d9c8','verified','','2025-09-08 09:47:17');
INSERT INTO ods VALUES('180','','645636','FG101','68be591c7879d','verified','645636','2025-09-08 09:48:36');
INSERT INTO ods VALUES('181','0000000000','256853','92R','68be5e1e14273','verified','','2025-09-08 10:09:58');
INSERT INTO ods VALUES('182','0000000000','190080','100','68be5e3547162','verified','','2025-09-08 10:10:21');
INSERT INTO ods VALUES('183','0000000000','610508','995','68be5e4131530','verified','','2025-09-08 10:10:33');
INSERT INTO ods VALUES('184','0000000000','120392','FG101','68be5e5067ee7','verified','','2025-09-08 10:10:48');
INSERT INTO ods VALUES('185','0000000000','304531','998','68be61cf75a89','verified','','2025-09-08 10:25:43');
INSERT INTO ods VALUES('186','0000000000','741319','100','68be61de4c0e5','verified','','2025-09-08 10:25:58');
INSERT INTO ods VALUES('187','0000000000','412926','998','68be61ea0c7fb','verified','','2025-09-08 10:26:10');
INSERT INTO ods VALUES('188','0000000000','641545','FG101','68be6dfc901c4','verified','','2025-09-08 11:17:40');
INSERT INTO ods VALUES('189','0000000000','558049','Tag','68be6fdcc227c','verified','','2025-09-08 11:25:40');
INSERT INTO ods VALUES('190','0000000000','551739','FG101','68be700b1f8a1','verified','','2025-09-08 11:26:27');
INSERT INTO ods VALUES('191','0000000000','922751','Tarpatta','68be7c8f9d40d','verified','','2025-09-08 12:19:51');
INSERT INTO ods VALUES('192','7894561230','145976','FG010','68be7cafc6425','verified','','2025-09-08 12:20:23');
INSERT INTO ods VALUES('193','0000000000','136937','Tarpatta','68be7cbf3fc59','verified','','2025-09-08 12:20:39');
INSERT INTO ods VALUES('194','','506187','Fg091','68be82b9097a8','verified','506187','2025-09-08 12:46:09');
INSERT INTO ods VALUES('195','','208770','pairing','68be84b9aa1aa','verified','208770','2025-09-08 12:54:41');
INSERT INTO ods VALUES('196','0000000000','675123','FG146','68be891967c89','verified','','2025-09-08 13:13:21');
INSERT INTO ods VALUES('197','0000000000','780482','92R','68be899aec4a5','verified','','2025-09-08 13:15:30');
INSERT INTO ods VALUES('198','0000000000','337776','FG160','68be89abf283d','verified','','2025-09-08 13:15:47');
INSERT INTO ods VALUES('199','0000000000','704517','Pairing','68beaef640d78','verified','','2025-09-08 15:54:54');
INSERT INTO ods VALUES('200','','826513','FG101','68beba2191dd6','verified','826513','2025-09-08 16:42:33');
INSERT INTO ods VALUES('201','','521734','Fg091','68bfb33b2f686','verified','521734','2025-09-09 10:25:23');
INSERT INTO ods VALUES('202','0000000000','924937','FG160','68bfb6e9a1f1b','verified','','2025-09-09 10:41:05');
INSERT INTO ods VALUES('203','','326231','995','68bfb9cceb13c','verified','326231','2025-09-09 10:53:24');
INSERT INTO ods VALUES('204','','741955','100','68bfba5f20fb6','verified','741955','2025-09-09 10:55:51');
INSERT INTO ods VALUES('205','','426775','92R','68bfbab2ae22d','verified','426775','2025-09-09 10:57:14');
INSERT INTO ods VALUES('206','','493576','COMPONENTS','68bfbaef0bad2','verified','493576','2025-09-09 10:58:15');
INSERT INTO ods VALUES('207','','379886','pairing','68bfbb384c189','verified','379886','2025-09-09 10:59:28');
INSERT INTO ods VALUES('208','0000000000','500609','Tag','68bfc1022b302','verified','','2025-09-09 11:24:10');
INSERT INTO ods VALUES('209','0000000000','703233','FG146','68bfc3503a743','verified','','2025-09-09 11:34:00');
INSERT INTO ods VALUES('210','0000000000','874653','100','68bfc3bb83771','verified','','2025-09-09 11:35:47');
INSERT INTO ods VALUES('211','','618559','FG099','68bfc5710d3a1','verified','618559','2025-09-09 11:43:05');
INSERT INTO ods VALUES('212','','554778','pairing','68bfca0bb9649','verified','554778','2025-09-09 12:02:43');
INSERT INTO ods VALUES('213','','821740','FG146','68bff95277922','verified','821740','2025-09-09 15:24:26');
INSERT INTO ods VALUES('214','','245859','995','68c0144385c84','verified','245859','2025-09-09 17:19:23');
INSERT INTO ods VALUES('215','','166380','100','68c014569a2bd','verified','166380','2025-09-09 17:19:42');
INSERT INTO ods VALUES('216','','492788','995','68c0f56c62472','verified','492788','2025-09-10 09:20:04');
INSERT INTO ods VALUES('217','','320694','100','68c0f841f0f15','verified','320694','2025-09-10 09:32:09');
INSERT INTO ods VALUES('218','','902738','100','68c0fc991baf3','verified','902738','2025-09-10 09:50:41');
INSERT INTO ods VALUES('219','','937453','995','68c0fcb941beb','verified','937453','2025-09-10 09:51:13');
INSERT INTO ods VALUES('220','','448264','COMPONENTS','68c0fce3beea5','verified','448264','2025-09-10 09:51:55');
INSERT INTO ods VALUES('221','','662722','92r','68c0fcf66cd38','verified','662722','2025-09-10 09:52:14');
INSERT INTO ods VALUES('222','','997518','Fg091','68c1016e694f7','verified','997518','2025-09-10 10:11:18');
INSERT INTO ods VALUES('223','0000000000','989932','FG146','68c106f6c2e76','verified','','2025-09-10 10:34:54');
INSERT INTO ods VALUES('224','0000000000','408864','Dispatch','68c10836d5f7a','verified','','2025-09-10 10:40:14');
INSERT INTO ods VALUES('225','0000000000','612212','Tarpatta','68c10a7d71a4c','verified','','2025-09-10 10:49:57');
INSERT INTO ods VALUES('226','','373550','pairing','68c117107bab8','verified','373550','2025-09-10 11:43:36');
INSERT INTO ods VALUES('227','0000000000','246302','Polish','68c1206aec285','verified','','2025-09-10 12:23:30');
INSERT INTO ods VALUES('228','0000000000','298668','995','68c120a71585b','verified','','2025-09-10 12:24:31');
INSERT INTO ods VALUES('229','','693307','FG160','68c1388ca2397','verified','693307','2025-09-10 14:06:28');
INSERT INTO ods VALUES('230','','169604','FG001','68c139788edff','verified','169604','2025-09-10 14:10:24');
INSERT INTO ods VALUES('231','','285734','FG160','68c1398d5af24','verified','285734','2025-09-10 14:10:45');
INSERT INTO ods VALUES('232','0000000000','988834','FG101','68c13a7a0fa37','verified','','2025-09-10 14:14:42');
INSERT INTO ods VALUES('233','','628428','FG001','68c13a9d0bf5f','verified','628428','2025-09-10 14:15:17');
INSERT INTO ods VALUES('234','','482251','FG137','68c13ae2490e7','verified','482251','2025-09-10 14:16:26');
INSERT INTO ods VALUES('235','','225265','FG001','68c13b0f407bc','verified','225265','2025-09-10 14:17:11');
INSERT INTO ods VALUES('236','','588774','FG137','68c13b26c919e','verified','588774','2025-09-10 14:17:34');
INSERT INTO ods VALUES('237','','593577','FG001','68c13b4b149f0','verified','593577','2025-09-10 14:18:11');
INSERT INTO ods VALUES('238','','681402','FG137','68c13b8d269a9','verified','681402','2025-09-10 14:19:17');
INSERT INTO ods VALUES('239','','543984','FG010','68c13baab8ee0','verified','543984','2025-09-10 14:19:46');
INSERT INTO ods VALUES('240','','266830','003','68c13c08cdeb2','verified','266830','2025-09-10 14:21:20');
INSERT INTO ods VALUES('241','','379448','FG010','68c13c4125d33','verified','379448','2025-09-10 14:22:17');
INSERT INTO ods VALUES('242','','826037','FG001','68c13c6828de4','verified','826037','2025-09-10 14:22:56');
INSERT INTO ods VALUES('243','','375570','003','68c13c76c4fd3','verified','375570','2025-09-10 14:23:10');
INSERT INTO ods VALUES('244','','193437','FG010','68c13c9e5081a','verified','193437','2025-09-10 14:23:50');
INSERT INTO ods VALUES('245','','693814','FG001','68c13ccfb36e4','verified','693814','2025-09-10 14:24:39');
INSERT INTO ods VALUES('246','','552378','efionaa','68c13cec5113c','verified','552378','2025-09-10 14:25:08');
INSERT INTO ods VALUES('247','','432608','Alloy','68c13d3e6956e','verified','432608','2025-09-10 14:26:30');
INSERT INTO ods VALUES('248','','407842','003','68c13d998808e','verified','407842','2025-09-10 14:28:01');
INSERT INTO ods VALUES('249','0000000000','486149','FG137','68c161cc4ae61','verified','','2025-09-10 17:02:28');
INSERT INTO ods VALUES('250','0000000000','821529','FG101','68c161f9e06bf','verified','','2025-09-10 17:03:13');
INSERT INTO ods VALUES('251','0000000000','384114','FG101','68c170e0938ca','verified','','2025-09-10 18:06:48');
INSERT INTO ods VALUES('252','000','835501','rhodium','68c1712b69ddc','verified','','2025-09-10 18:08:03');
INSERT INTO ods VALUES('253','0000000000','887491','FG099','68c244ce02331','verified','','2025-09-11 09:11:02');
INSERT INTO ods VALUES('254','','465273','FG001','68c250dc60085','verified','465273','2025-09-11 10:02:28');
INSERT INTO ods VALUES('255','7894561230','887021','FG001','68c252d2b1657','verified','','2025-09-11 10:10:50');
INSERT INTO ods VALUES('256','','287304','100','68c25541194ad','verified','287304','2025-09-11 10:21:13');
INSERT INTO ods VALUES('257','','301133','995','68c2558aae408','verified','301133','2025-09-11 10:22:26');
INSERT INTO ods VALUES('258','','188243','FG160','68c256810c0f3','verified','188243','2025-09-11 10:26:33');
INSERT INTO ods VALUES('259','','502892','FG146','68c25693a32ff','verified','502892','2025-09-11 10:26:51');
INSERT INTO ods VALUES('260','','292660','FG001','68c256e63b3ec','verified','292660','2025-09-11 10:28:14');
INSERT INTO ods VALUES('261','','412218','FG160','68c2570a25d12','verified','412218','2025-09-11 10:28:50');
INSERT INTO ods VALUES('262','','141108','FG001','68c257347f9d8','verified','141108','2025-09-11 10:29:32');
INSERT INTO ods VALUES('263','','998555','efionaa','68c2575f3d1cc','verified','998555','2025-09-11 10:30:15');
INSERT INTO ods VALUES('264','','198681','FG010','68c25795598d5','verified','198681','2025-09-11 10:31:09');
INSERT INTO ods VALUES('265','','907630','FG160','68c257aab5e18','verified','907630','2025-09-11 10:31:30');
INSERT INTO ods VALUES('266','7894561230','988196','FG010','68c258b970900','verified','','2025-09-11 10:36:01');
INSERT INTO ods VALUES('267','','301947','003','68c259928ca9f','verified','301947','2025-09-11 10:39:38');
INSERT INTO ods VALUES('268','0000000000','737670','FG137','68c267160aaa3','verified','','2025-09-11 11:37:18');
INSERT INTO ods VALUES('269','0000000000','114887','FG146','68c2674647bcc','verified','','2025-09-11 11:38:06');
INSERT INTO ods VALUES('270','0000000000','373109','FG099','68c26795b8360','verified','','2025-09-11 11:39:25');
INSERT INTO ods VALUES('271','7894561230','510023','FG001','68c26816c830a','verified','','2025-09-11 11:41:34');
INSERT INTO ods VALUES('272','0000000000','527638','FG146','68c26833b14cc','verified','','2025-09-11 11:42:03');
INSERT INTO ods VALUES('273','7894561230','628585','FG001','68c2688aed1e9','verified','','2025-09-11 11:43:30');
INSERT INTO ods VALUES('274','0000000000','904611','FG146','68c269aa72dfd','verified','','2025-09-11 11:48:18');
INSERT INTO ods VALUES('275','','569871','995','68c26a51c796a','verified','569871','2025-09-11 11:51:05');
INSERT INTO ods VALUES('276','','128257','995','68c26b400644d','verified','128257','2025-09-11 11:55:04');
INSERT INTO ods VALUES('277','0000000000','683291','FG091','68c26c4ccb4af','verified','','2025-09-11 11:59:32');
INSERT INTO ods VALUES('278','7894561230','726488','FG001','68c26ccb6a13d','verified','','2025-09-11 12:01:39');
INSERT INTO ods VALUES('279','','968282','FG101','68c26d42f0935','verified','968282','2025-09-11 12:03:38');
INSERT INTO ods VALUES('280','7894561230','274154','FG010','68c26d4f29fe4','verified','','2025-09-11 12:03:51');
INSERT INTO ods VALUES('281','0000000000','506705','Manual','68c26d9a85950','verified','','2025-09-11 12:05:06');
INSERT INTO ods VALUES('282','7894561230','528370','FG010','68c26e3998d07','verified','','2025-09-11 12:07:45');
INSERT INTO ods VALUES('283','0000000000','272691','Manual','68c26e53645a6','verified','','2025-09-11 12:08:11');
INSERT INTO ods VALUES('284','7894561230','997288','FG010','68c26e5dc7d1b','verified','','2025-09-11 12:08:21');
INSERT INTO ods VALUES('285','0000000000','402179','Manual','68c26e7a3f07e','verified','','2025-09-11 12:08:50');
INSERT INTO ods VALUES('286','7894561230','843570','FG010','68c26eae65500','verified','','2025-09-11 12:09:42');
INSERT INTO ods VALUES('287','0000000000','756264','FG099','68c26ed771566','verified','','2025-09-11 12:10:23');
INSERT INTO ods VALUES('288','0000000000','505370','FG137','68c26f3fc8d8e','verified','','2025-09-11 12:12:07');
INSERT INTO ods VALUES('289','0000000000','350601','FG146','68c2701aaff6d','verified','','2025-09-11 12:15:46');
INSERT INTO ods VALUES('290','0000000000','250101','995','68c270433d073','verified','','2025-09-11 12:16:27');
INSERT INTO ods VALUES('291','0000000000','221706','FG146','68c27050dd02e','verified','','2025-09-11 12:16:40');
INSERT INTO ods VALUES('292','0000000000','462660','100','68c270704bc8f','verified','','2025-09-11 12:17:12');
INSERT INTO ods VALUES('293','7894561230','692870','FG001','68c27473094ec','verified','','2025-09-11 12:34:19');
INSERT INTO ods VALUES('294','0000000000','515249','995','68c277c10d977','verified','','2025-09-11 12:48:25');
INSERT INTO ods VALUES('295','0000000000','822866','FG099','68c2786eddc7e','verified','','2025-09-11 12:51:18');
INSERT INTO ods VALUES('296','','753876','FG099','68c2938e8ce46','verified','753876','2025-09-11 14:47:02');
INSERT INTO ods VALUES('297','','341137','pairing','68c29915a4c1a','verified','341137','2025-09-11 15:10:37');
INSERT INTO ods VALUES('298','','226306','100','68c29920daa97','verified','226306','2025-09-11 15:10:48');
INSERT INTO ods VALUES('299','','396799','995','68c2992d7da6b','verified','396799','2025-09-11 15:11:01');
INSERT INTO ods VALUES('300','','436000','pairing','68c29934a2be1','verified','436000','2025-09-11 15:11:08');
INSERT INTO ods VALUES('301','','388065','FG146','68c29ea401d4a','verified','388065','2025-09-11 15:34:20');
INSERT INTO ods VALUES('302','','462282','pairing','68c2ca32a0116','verified','462282','2025-09-11 18:40:10');
INSERT INTO ods VALUES('303','0000000000','707353','FG160','68c39754292ae','verified','','2025-09-12 09:15:24');
INSERT INTO ods VALUES('304','0000000000','352113','FG099','68c39b32b75db','verified','','2025-09-12 09:31:54');
INSERT INTO ods VALUES('305','','175396','995','68c39c3fb738d','verified','175396','2025-09-12 09:36:23');
INSERT INTO ods VALUES('306','','530670','100','68c39c4963372','verified','530670','2025-09-12 09:36:33');
INSERT INTO ods VALUES('307','','615805','100','68c39d9a266fc','verified','615805','2025-09-12 09:42:10');
INSERT INTO ods VALUES('308','','193346','995','68c39da880fa9','verified','193346','2025-09-12 09:42:24');
INSERT INTO ods VALUES('309','','876318','003','68c39f9d34416','verified','876318','2025-09-12 09:50:45');
INSERT INTO ods VALUES('310','','233052','003','68c39fd451af2','verified','233052','2025-09-12 09:51:40');
INSERT INTO ods VALUES('311','','649854','995','68c3a049aecb2','verified','649854','2025-09-12 09:53:37');
INSERT INTO ods VALUES('312','','429611','92R','68c3a15f39274','verified','429611','2025-09-12 09:58:15');
INSERT INTO ods VALUES('313','0000000000','293928','FG137','68c3a185cae47','verified','','2025-09-12 09:58:53');
INSERT INTO ods VALUES('314','','749812','FG010','68c3a1af375db','verified','749812','2025-09-12 09:59:35');
INSERT INTO ods VALUES('315','0000000000','855066','995','68c3a1dbe1888','verified','','2025-09-12 10:00:19');
INSERT INTO ods VALUES('316','0000000000','208809','100','68c3a1f55b098','verified','','2025-09-12 10:00:45');
INSERT INTO ods VALUES('317','0000000000','486193','92R','68c3a26237b70','verified','','2025-09-12 10:02:34');
INSERT INTO ods VALUES('318','0000000000','471452','FG099','68c3a2bbacccd','verified','','2025-09-12 10:04:03');
INSERT INTO ods VALUES('319','0000000000','605051','Alloy','68c3a32cad118','verified','','2025-09-12 10:05:56');
INSERT INTO ods VALUES('320','0000000000','891427','FG137','68c3a3409cb1c','verified','','2025-09-12 10:06:16');
INSERT INTO ods VALUES('321','0000000000','370934','FG137','68c3a3c0e0a12','verified','','2025-09-12 10:08:24');
INSERT INTO ods VALUES('322','','361611','Fg091','68c3a3fc5cbf2','verified','361611','2025-09-12 10:09:24');
INSERT INTO ods VALUES('323','','135556','FG137','68c3a5f041b80','verified','135556','2025-09-12 10:17:44');
INSERT INTO ods VALUES('324','0000000000','593031','100','68c3a97025046','verified','','2025-09-12 10:32:40');
INSERT INTO ods VALUES('325','0000000000','600409','995','68c3a9b27fb27','verified','','2025-09-12 10:33:46');
INSERT INTO ods VALUES('326','0000000000','602099','FG099','68c3a9ba0940b','verified','','2025-09-12 10:33:54');
INSERT INTO ods VALUES('327','0000000000','219768','92R','68c3a9d450834','verified','','2025-09-12 10:34:20');
INSERT INTO ods VALUES('328','0000000000','452858','92R','68c3a9ef8de2f','verified','','2025-09-12 10:34:47');
INSERT INTO ods VALUES('329','000','818020','efionaa','68c3aa253d1b6','verified','','2025-09-12 10:35:41');
INSERT INTO ods VALUES('330','','294024','003','68c3ab52eefb4','verified','294024','2025-09-12 10:40:42');
INSERT INTO ods VALUES('331','0000000000','727532','SideLevel','68c3b9e888187','verified','','2025-09-12 11:42:56');
INSERT INTO ods VALUES('332','','366114','SideLevel','68c3ba43cec76','verified','366114','2025-09-12 11:44:27');
INSERT INTO ods VALUES('333','','177161','SideLevel','68c3bbf2ee09f','verified','177161','2025-09-12 11:51:38');
INSERT INTO ods VALUES('334','','665597','pairing','68c3bee31d629','verified','665597','2025-09-12 12:04:11');
INSERT INTO ods VALUES('335','','875825','995','68c3c1ad2442a','verified','875825','2025-09-12 12:16:05');
INSERT INTO ods VALUES('336','0000000000','426226','FG137','68c3c27aac1f7','verified','','2025-09-12 12:19:30');
INSERT INTO ods VALUES('337','000','118434','efionaa','68c3c29f14810','verified','','2025-09-12 12:20:07');
INSERT INTO ods VALUES('338','','902757','SideLevel','68c3ceaf3b19b','verified','902757','2025-09-12 13:11:35');
INSERT INTO ods VALUES('339','0000000000','293680','FG099','68c3d01598765','verified','','2025-09-12 13:17:33');
INSERT INTO ods VALUES('340','','280982','pairing','68c3d4bed6216','verified','280982','2025-09-12 13:37:26');
INSERT INTO ods VALUES('341','','427855','Manual','68c3d5798e154','verified','427855','2025-09-12 13:40:33');
INSERT INTO ods VALUES('342','0000000000','182535','Pairing','68c3d58e999ac','verified','','2025-09-12 13:40:54');
INSERT INTO ods VALUES('343','0000000000','647343','Tag','68c3d5c5a511d','verified','','2025-09-12 13:41:49');
INSERT INTO ods VALUES('344','0000000000','809005','Pairing','68c3d5e6bba35','verified','','2025-09-12 13:42:22');
INSERT INTO ods VALUES('345','','823234','FG032','68c3e23092371','verified','','2025-09-12 14:34:48');
INSERT INTO ods VALUES('346','','857068','FG032','68c3e2d34e639','verified','857068','2025-09-12 14:37:31');
INSERT INTO ods VALUES('347','0000000000','294962','FG101','68c3e35c21c55','verified','','2025-09-12 14:39:48');
INSERT INTO ods VALUES('348','','747616','FG137','68c3e7ea06212','verified','747616','2025-09-12 14:59:14');
INSERT INTO ods VALUES('349','','835602','FG137','68c3e833b288b','verified','835602','2025-09-12 15:00:27');
INSERT INTO ods VALUES('350','','766976','Rawa','68c3ef779d887','verified','','2025-09-12 15:31:27');
INSERT INTO ods VALUES('351','7894561230','804576','FG010','68c3f343a1cec','verified','','2025-09-12 15:47:39');
INSERT INTO ods VALUES('352','','393458','FG137','68c3f9ff4f63a','verified','393458','2025-09-12 16:16:23');
INSERT INTO ods VALUES('353','7894561230','201803','FG010','68c4055f4075b','verified','','2025-09-12 17:04:55');
INSERT INTO ods VALUES('354','','363049','FG010','68c4e4e83fa3c','verified','363049','2025-09-13 08:58:40');
INSERT INTO ods VALUES('355','','714938','003','68c4e763e9985','verified','714938','2025-09-13 09:09:15');
INSERT INTO ods VALUES('356','','701966','FG032','68c4e769b59ad','verified','701966','2025-09-13 09:09:21');
INSERT INTO ods VALUES('357','','417323','Sidelevel','68c4e790a29d7','verified','417323','2025-09-13 09:10:00');
INSERT INTO ods VALUES('358','','886092','995','68c4eb6d81b1d','verified','886092','2025-09-13 09:26:29');
INSERT INTO ods VALUES('359','','832061','100','68c4eb770777b','verified','832061','2025-09-13 09:26:39');
INSERT INTO ods VALUES('360','','454698','pairing','68c4eb80f00ed','verified','454698','2025-09-13 09:26:48');
INSERT INTO ods VALUES('361','','993972','pairing','68c4ec208dca3','verified','993972','2025-09-13 09:29:28');
INSERT INTO ods VALUES('362','','759257','Fg091','68c504eba4169','verified','759257','2025-09-13 11:15:15');
INSERT INTO ods VALUES('363','','130996','efionaa','68c506fdde278','verified','130996','2025-09-13 11:24:05');
INSERT INTO ods VALUES('364','','925627','FG010','68c5073c94101','verified','925627','2025-09-13 11:25:08');
INSERT INTO ods VALUES('365','0000000000','493104','FG101','68c50a3f2e7cd','verified','','2025-09-13 11:37:59');
INSERT INTO ods VALUES('366','','362683','FG137','68c52780656b7','verified','362683','2025-09-13 13:42:48');
INSERT INTO ods VALUES('367','7894561230','975643','FG010','68c52cec88800','verified','','2025-09-13 14:05:56');
INSERT INTO ods VALUES('368','0000000000','864833','FG137','68c52f5fbb1e0','verified','','2025-09-13 14:16:23');
INSERT INTO ods VALUES('369','7894561230','976022','FG010','68c52f7b7d468','verified','','2025-09-13 14:16:51');
INSERT INTO ods VALUES('370','0000000000','703570','FG137','68c52f89c6365','verified','','2025-09-13 14:17:05');
INSERT INTO ods VALUES('371','7894561230','145930','FG010','68c52f9f43465','verified','','2025-09-13 14:17:27');
INSERT INTO ods VALUES('372','0000000000','323551','FG137','68c52fa8d95e6','verified','','2025-09-13 14:17:36');
INSERT INTO ods VALUES('373','','885599','995','68c53811e31ba','verified','885599','2025-09-13 14:53:29');
INSERT INTO ods VALUES('374','','564369','pairing','68c5383a47dac','verified','564369','2025-09-13 14:54:10');
INSERT INTO ods VALUES('375','','880981','92R','68c5384f68291','verified','880981','2025-09-13 14:54:31');
INSERT INTO ods VALUES('376','7894561230','539806','FG010','68c53fa36fa5c','verified','','2025-09-13 15:25:47');
INSERT INTO ods VALUES('377','','798392','pairing','68c5412956f91','verified','798392','2025-09-13 15:32:17');
INSERT INTO ods VALUES('378','0000000000','947389','FG137','68c542899ee04','verified','','2025-09-13 15:38:09');
INSERT INTO ods VALUES('379','7894561230','760386','FG010','68c5429fd2874','verified','','2025-09-13 15:38:31');
INSERT INTO ods VALUES('380','0000000000','502094','FG146','68c549f367b89','verified','','2025-09-13 16:09:47');
INSERT INTO ods VALUES('381','7894561230','311915','FG010','68c54e297fa24','verified','','2025-09-13 16:27:45');
INSERT INTO ods VALUES('382','7894561230','432665','FG0011','68c54ea97c1d6','verified','','2025-09-13 16:29:53');
INSERT INTO ods VALUES('383','7894561230','519528','FG010','68c54ef56a284','verified','','2025-09-13 16:31:09');
INSERT INTO ods VALUES('384','7894561230','741489','FG0011','68c54f9de2801','verified','','2025-09-13 16:33:57');
INSERT INTO ods VALUES('385','0000000000','123883','FG099','68c54ff190d5b','verified','','2025-09-13 16:35:21');
INSERT INTO ods VALUES('386','7894561230','444319','FG010','68c551500da50','verified','','2025-09-13 16:41:12');
INSERT INTO ods VALUES('387','0000000000','758210','FG099','68c5549c07dc1','verified','','2025-09-13 16:55:16');
INSERT INTO ods VALUES('388','7894561230','898289','FG010','68c5556ddac81','verified','','2025-09-13 16:58:45');
INSERT INTO ods VALUES('389','0000000000','983557','FG099','68c555b4d3ce0','verified','','2025-09-13 16:59:56');
INSERT INTO ods VALUES('390','7894561230','917165','FG010','68c555c789071','verified','','2025-09-13 17:00:15');
INSERT INTO ods VALUES('391','7894561230','173101','FG010','68c557f1af490','verified','','2025-09-13 17:09:29');
INSERT INTO ods VALUES('392','7894561230','319757','FG0011','68c55825f0744','verified','','2025-09-13 17:10:21');
INSERT INTO ods VALUES('393','0000000000','185088','FG099','68c5587ae4759','verified','','2025-09-13 17:11:46');
INSERT INTO ods VALUES('394','7894561230','554080','FG0011','68c55915e7e85','verified','','2025-09-13 17:14:21');
INSERT INTO ods VALUES('395','7894561230','128888','FG010','68c559f40431e','verified','','2025-09-13 17:18:04');
INSERT INTO ods VALUES('396','0000000000','820634','FG099','68c55a2f093fa','verified','','2025-09-13 17:19:03');
INSERT INTO ods VALUES('397','7894561230','162569','FG010','68c55b15b29c3','verified','','2025-09-13 17:22:53');
INSERT INTO ods VALUES('398','0000000000','579948','FG099','68c55ec6ba130','verified','','2025-09-13 17:38:38');
INSERT INTO ods VALUES('399','0000000000','812008','FG099','68c55ed3b231a','verified','','2025-09-13 17:38:51');
INSERT INTO ods VALUES('400','0000000000','140732','FG099','68c5702bb4a0a','verified','','2025-09-13 18:52:51');
INSERT INTO ods VALUES('401','7894561230','866989','FG0011','68c5703fa6e6e','verified','','2025-09-13 18:53:11');
INSERT INTO ods VALUES('402','0000000000','637793','FG099','68c57059ee92d','verified','','2025-09-13 18:53:37');
INSERT INTO ods VALUES('403','','114862','FG010','68c789f37f90f','verified','114862','2025-09-15 09:07:23');
INSERT INTO ods VALUES('404','','616051','FG032','68c78caa485e5','verified','616051','2025-09-15 09:18:58');
INSERT INTO ods VALUES('405','','488983','FG099','68c78e80b9bc1','verified','488983','2025-09-15 09:26:48');
INSERT INTO ods VALUES('406','','720307','998','68c793f9c8ecf','verified','720307','2025-09-15 09:50:09');
INSERT INTO ods VALUES('407','','683917','92R','68c7940c00156','verified','683917','2025-09-15 09:50:28');
INSERT INTO ods VALUES('408','','275285','FG099','68c795939edee','verified','275285','2025-09-15 09:56:59');
INSERT INTO ods VALUES('409','','634786','FG099','68c795dfdbfbf','verified','634786','2025-09-15 09:58:15');
INSERT INTO ods VALUES('410','','474253','FG099','68c7960a7265d','verified','474253','2025-09-15 09:58:58');
INSERT INTO ods VALUES('411','','166795','FG099','68c7964975326','verified','166795','2025-09-15 10:00:01');
INSERT INTO ods VALUES('412','','703056','FG099','68c79683e5627','verified','703056','2025-09-15 10:00:59');
INSERT INTO ods VALUES('413','','204377','FG101','68c7969c9cd9c','verified','204377','2025-09-15 10:01:24');
INSERT INTO ods VALUES('414','','564350','100','68c79a3ccc5af','verified','564350','2025-09-15 10:16:52');
INSERT INTO ods VALUES('415','','856857','Sidelevel','68c79b2001e7d','verified','856857','2025-09-15 10:20:40');
INSERT INTO ods VALUES('416','','285656','Fg091','68c79d7e90150','verified','285656','2025-09-15 10:30:46');
INSERT INTO ods VALUES('417','','512362','995','68c79e04903bd','verified','512362','2025-09-15 10:33:00');
INSERT INTO ods VALUES('418','','869177','pairing','68c79ed9ca0e4','verified','869177','2025-09-15 10:36:33');
INSERT INTO ods VALUES('419','','474316','100','68c79eeb3bae3','verified','474316','2025-09-15 10:36:51');
INSERT INTO ods VALUES('420','7894561230','871544','FG010','68c7a8c2b707b','verified','','2025-09-15 11:18:50');
INSERT INTO ods VALUES('421','7894561230','282827','FG010','68c7a90839a9a','verified','','2025-09-15 11:20:00');
INSERT INTO ods VALUES('422','000','973029','rhodium','68c7a93cb00a2','verified','','2025-09-15 11:20:52');
INSERT INTO ods VALUES('423','7894561230','488134','FG010','68c7aa21dcf3f','verified','','2025-09-15 11:24:41');
INSERT INTO ods VALUES('424','0000000000','661399','FG160','68c7aa6b7f38b','verified','','2025-09-15 11:25:55');
INSERT INTO ods VALUES('425','7894561230','513483','FG010','68c7aad23b633','verified','','2025-09-15 11:27:38');
INSERT INTO ods VALUES('426','7894561230','203239','FG0011','68c7ab274c076','verified','','2025-09-15 11:29:03');
INSERT INTO ods VALUES('427','0000000','520891','Manual','68c7ab7a45c71','verified','','2025-09-15 11:30:26');
INSERT INTO ods VALUES('428','11','339326','ENAMEL','68c7b3e1c1a9c','verified','','2025-09-15 12:06:17');
INSERT INTO ods VALUES('429','7894561230','129356','FG010','68c7b4107569d','verified','','2025-09-15 12:07:04');
INSERT INTO ods VALUES('430','11','321757','ENAMEL','68c7b4767a2fc','verified','','2025-09-15 12:08:46');
INSERT INTO ods VALUES('431','7894561230','788919','FG0011','68c7b52f3080e','verified','','2025-09-15 12:11:51');
INSERT INTO ods VALUES('432','7894561230','596233','FG010','68c7b656c2a89','verified','','2025-09-15 12:16:46');
INSERT INTO ods VALUES('433','7894561230','256079','FG0011','68c7b69cbe4f7','verified','','2025-09-15 12:17:56');
INSERT INTO ods VALUES('434','0000000000','818107','FG099','68c7b71f0ba48','verified','','2025-09-15 12:20:07');
INSERT INTO ods VALUES('435','','473891','92R','68c7bbb9c4f58','verified','473891','2025-09-15 12:39:45');
INSERT INTO ods VALUES('436','','359511','pairing','68c7bbdd1a0aa','verified','359511','2025-09-15 12:40:21');
INSERT INTO ods VALUES('437','','408471','FG099','68c7bdaf60a01','verified','408471','2025-09-15 12:48:07');
INSERT INTO ods VALUES('438','','975614','FG160','68c7bf5ac9650','verified','975614','2025-09-15 12:55:14');
INSERT INTO ods VALUES('439','0000000000','697316','FG099','68c7bf66d1210','verified','','2025-09-15 12:55:26');
INSERT INTO ods VALUES('440','0000000000','190563','FG101','68c7c185e738f','verified','','2025-09-15 13:04:29');
INSERT INTO ods VALUES('441','7894561230','513961','FG010','68c7ca4f26fc6','verified','','2025-09-15 13:41:59');
INSERT INTO ods VALUES('442','7894561230','833945','FG0011','68c7cd7b587b7','verified','','2025-09-15 13:55:31');
INSERT INTO ods VALUES('443','7894561230','578805','FG010','68c7cd90473d6','verified','','2025-09-15 13:55:52');
INSERT INTO ods VALUES('444','7894561230','878149','FG0011','68c7d4fe69253','verified','','2025-09-15 14:27:34');
INSERT INTO ods VALUES('445','7894561230','588880','FG010','68c7d6014321f','verified','','2025-09-15 14:31:53');
INSERT INTO ods VALUES('446','','477595','FG010','68c7d6f2bb1a7','verified','477595','2025-09-15 14:35:54');
INSERT INTO ods VALUES('447','0000000000','501738','FG101','68c7d8a2b71de','verified','','2025-09-15 14:43:06');
INSERT INTO ods VALUES('448','0000000000','289611','FG160','68c7d8aaf2d49','verified','','2025-09-15 14:43:14');
INSERT INTO ods VALUES('449','7894561230','142448','FG010','68c7d99c858bd','verified','','2025-09-15 14:47:16');
INSERT INTO ods VALUES('450','','954034','FG032','68c7dd05817aa','verified','','2025-09-15 15:01:49');
INSERT INTO ods VALUES('451','','399696','FG099','68c7dd130a9f6','verified','','2025-09-15 15:02:03');
INSERT INTO ods VALUES('452','7894561230','730595','FG010','68c7dd24add0a','verified','','2025-09-15 15:02:20');
INSERT INTO ods VALUES('453','0000000000','891601','Tag','68c7dd9d57704','verified','','2025-09-15 15:04:21');
INSERT INTO ods VALUES('454','0000000000','607797','FG101','68c7ddfc11d06','verified','','2025-09-15 15:05:56');
INSERT INTO ods VALUES('455','0000000000','345724','FG091','68c7de6603f17','verified','','2025-09-15 15:07:42');
INSERT INTO ods VALUES('456','0000000000','974175','FG101','68c7dea802d94','verified','','2025-09-15 15:08:48');
INSERT INTO ods VALUES('457','7894561230','374412','FG001','68c7df229ec8c','verified','','2025-09-15 15:10:50');
INSERT INTO ods VALUES('458','0000000000','312409','FG101','68c7df46a2dd9','verified','','2025-09-15 15:11:26');
INSERT INTO ods VALUES('459','0000000000','721043','FG137','68c7e1173f1ec','verified','','2025-09-15 15:19:11');
INSERT INTO ods VALUES('460','7894561230','789725','FG010','68c7e12f1355c','verified','','2025-09-15 15:19:35');
INSERT INTO ods VALUES('461','','661348','FG101','68c7e16b9f694','verified','661348','2025-09-15 15:20:35');
INSERT INTO ods VALUES('462','7894561230','720528','FG010','68c7e38953394','verified','','2025-09-15 15:29:37');
INSERT INTO ods VALUES('463','7894561230','369031','FG010','68c7e549d4370','verified','','2025-09-15 15:37:05');
INSERT INTO ods VALUES('464','','746700','FG032','68c7e6807acd3','verified','','2025-09-15 15:42:16');
INSERT INTO ods VALUES('465','0000000000','805094','FG146','68c7e68870dab','verified','','2025-09-15 15:42:24');
INSERT INTO ods VALUES('466','0000000','773551','Manual','68c7e695ead03','verified','','2025-09-15 15:42:37');
INSERT INTO ods VALUES('467','','541050','FG146','68c7e7fd30c55','verified','541050','2025-09-15 15:48:37');
INSERT INTO ods VALUES('468','','711677','FG146','68c7ea0190db5','verified','711677','2025-09-15 15:57:13');
INSERT INTO ods VALUES('469','','888260','pairing','68c7f058013e1','verified','888260','2025-09-15 16:24:16');
INSERT INTO ods VALUES('470','0000000000','250047','003','68c7f2d693a51','verified','','2025-09-15 16:34:54');
INSERT INTO ods VALUES('471','7894561230','823837','FG010','68c7f34cc0858','verified','','2025-09-15 16:36:52');
INSERT INTO ods VALUES('472','0000000000','352897','FG091','68c7f3a384fef','verified','','2025-09-15 16:38:19');
INSERT INTO ods VALUES('473','11','551497','ENAMEL','68c7f4787750a','verified','','2025-09-15 16:41:52');
INSERT INTO ods VALUES('474','','896507','92R','68c7f566bd4a2','verified','896507','2025-09-15 16:45:50');
INSERT INTO ods VALUES('475','','926202','COMPONENTS','68c7f5d191811','verified','926202','2025-09-15 16:47:37');
INSERT INTO ods VALUES('476','','165526','pairing','68c7f60ebf5d5','verified','165526','2025-09-15 16:48:38');
INSERT INTO ods VALUES('477','0000000000','221152','004','68c7f7a4076b9','verified','','2025-09-15 16:55:24');
INSERT INTO ods VALUES('478','0000000000','902706','SideLevel','68c7f8ba3af4a','verified','','2025-09-15 17:00:02');
INSERT INTO ods VALUES('479','11','502471','ENAMEL','68c7f908ba792','verified','','2025-09-15 17:01:20');
INSERT INTO ods VALUES('480','11','196889','ENAMEL','68c7f9e3bc6a0','verified','','2025-09-15 17:04:59');
INSERT INTO ods VALUES('481','','526548','FG099','68c7f9fc5c682','verified','','2025-09-15 17:05:24');
INSERT INTO ods VALUES('482','','595881','FG099','68c7fa80f3d41','verified','','2025-09-15 17:07:36');
INSERT INTO ods VALUES('483','11','671824','ENAMEL','68c7fb643c31c','verified','','2025-09-15 17:11:24');
INSERT INTO ods VALUES('484','','317783','FG099','68c7fb88bc968','verified','','2025-09-15 17:12:00');
INSERT INTO ods VALUES('485','11','342078','ENAMEL','68c7fcdcd22c3','verified','','2025-09-15 17:17:40');
INSERT INTO ods VALUES('486','11','719554','ENAMEL','68c7fd6b6fdb2','verified','','2025-09-15 17:20:03');
INSERT INTO ods VALUES('487','7894561230','190334','FG010','68c801580a5c0','verified','','2025-09-15 17:36:48');
INSERT INTO ods VALUES('488','0000000000','606598','003','68c8048d68148','verified','','2025-09-15 17:50:29');
INSERT INTO ods VALUES('489','0000000000','381786','003','68c80751a378f','verified','','2025-09-15 18:02:17');
INSERT INTO ods VALUES('490','000','226087','rhodium','68c8130a5607f','verified','','2025-09-15 18:52:18');
INSERT INTO ods VALUES('491','','367489','FG010','68c8d423be9fc','verified','367489','2025-09-16 08:36:11');
INSERT INTO ods VALUES('492','','384542','FG032','68c8df2875a25','verified','384542','2025-09-16 09:23:12');
INSERT INTO ods VALUES('493','','247379','FG137','68c8e38ca3935','verified','247379','2025-09-16 09:41:56');
INSERT INTO ods VALUES('494','000','372683','efionaa','68c8e4c5efdfa','verified','','2025-09-16 09:47:09');
INSERT INTO ods VALUES('495','0000000000','763938','FG101','68c8e4cfd7a46','verified','','2025-09-16 09:47:19');
INSERT INTO ods VALUES('496','7894561230','395808','FG010','68c8e4dbb677a','verified','','2025-09-16 09:47:31');
INSERT INTO ods VALUES('497','11','934013','ENAMEL','68c8e511088cb','verified','','2025-09-16 09:48:25');
INSERT INTO ods VALUES('498','0000000000','349893','Packing','68c8e5c22e9c8','verified','','2025-09-16 09:51:22');
INSERT INTO ods VALUES('499','7894561230','409615','FG010','68c8e5ce2c810','verified','','2025-09-16 09:51:34');
INSERT INTO ods VALUES('500','','138830','100','68c8f27b55506','verified','138830','2025-09-16 10:45:39');
INSERT INTO ods VALUES('501','','691451','995','68c8f2ca2b828','verified','691451','2025-09-16 10:46:58');
INSERT INTO ods VALUES('502','','608512','Fg091','68c8f519f1351','verified','608512','2025-09-16 10:56:49');
INSERT INTO ods VALUES('503','','282623','Sidelevel ','68c8f5809c5c0','verified','282623','2025-09-16 10:58:32');
INSERT INTO ods VALUES('504','','647326','FG032','68c8f7dd3eedd','verified','647326','2025-09-16 11:08:37');
INSERT INTO ods VALUES('505','7894561230','158586','FG010','68c8fd703ab81','verified','','2025-09-16 11:32:24');
INSERT INTO ods VALUES('506','0000000000','196186','FG091','68c8ffd185ca5','verified','','2025-09-16 11:42:33');
INSERT INTO ods VALUES('507','','403345','FG099','68c90061dbffb','verified','','2025-09-16 11:44:57');
INSERT INTO ods VALUES('508','7894561230','959936','FG010','68c901a1b7098','verified','','2025-09-16 11:50:17');
INSERT INTO ods VALUES('509','','536031','pairing','68c90d389033b','verified','536031','2025-09-16 12:39:44');
INSERT INTO ods VALUES('510','','473785','Fg091','68c90f1295337','verified','473785','2025-09-16 12:47:38');
INSERT INTO ods VALUES('511','11','728106','ENAMEL','68c9105c0bf97','verified','','2025-09-16 12:53:08');
INSERT INTO ods VALUES('512','7894561230','889519','FG010','68c91067efabb','verified','','2025-09-16 12:53:19');
INSERT INTO ods VALUES('513','','397341','FG010','68c929bdc773c','verified','397341','2025-09-16 14:41:25');
INSERT INTO ods VALUES('514','7894561230','160097','FG010','68c93c6c23780','verified','','2025-09-16 16:01:08');
INSERT INTO ods VALUES('515','','757439','FG010','68c93c8c69001','verified','757439','2025-09-16 16:01:40');
INSERT INTO ods VALUES('516','7894561230','904661','FG001','68c93cf519232','verified','','2025-09-16 16:03:25');
INSERT INTO ods VALUES('517','0000000000','715782','FG101','68c93da7d6bf7','verified','','2025-09-16 16:06:23');
INSERT INTO ods VALUES('518','0000000000','234337','FG101','68c93e5a3481b','verified','','2025-09-16 16:09:22');
INSERT INTO ods VALUES('519','7894561230','611356','FG001','68c9476b8f9b7','verified','','2025-09-16 16:48:03');
INSERT INTO ods VALUES('520','0000000000','836820','FG101','68c94778d4909','verified','','2025-09-16 16:48:16');
INSERT INTO ods VALUES('521','7894561230','449203','FG001','68c94a78f363c','verified','','2025-09-16 17:01:04');
INSERT INTO ods VALUES('522','7894561230','940905','FG010','68c94fdf88f64','verified','','2025-09-16 17:24:07');
INSERT INTO ods VALUES('523','7894561230','187353','FG001','68c95050db01a','verified','','2025-09-16 17:26:00');
INSERT INTO ods VALUES('524','11','675723','ENAMEL','68c953e72f512','verified','','2025-09-16 17:41:19');
INSERT INTO ods VALUES('525','7894561230','442983','FG010','68c95400e3483','verified','','2025-09-16 17:41:44');
INSERT INTO ods VALUES('526','0000000000','708810','SideLevel','68c9581f78b3e','verified','','2025-09-16 17:59:19');
INSERT INTO ods VALUES('527','000','235617','efionaa','68c95ad5276f8','verified','','2025-09-16 18:10:53');
INSERT INTO ods VALUES('528','0000000000','232704','FG137','68c95aec4ce0e','verified','','2025-09-16 18:11:16');
INSERT INTO ods VALUES('529','7894561230','971444','FG010','68c9604e7ae83','verified','','2025-09-16 18:34:14');
INSERT INTO ods VALUES('530','','940607','FG010','68ca2538cf960','verified','940607','2025-09-17 08:34:24');
INSERT INTO ods VALUES('531','0000000000','115657','995','68ca2b30f14fb','verified','','2025-09-17 08:59:52');
INSERT INTO ods VALUES('532','000','654918','rhodium','68ca2bfdabedd','verified','','2025-09-17 09:03:17');
INSERT INTO ods VALUES('533','0000000000','141748','FG091','68ca2c11d66b7','verified','','2025-09-17 09:03:37');
INSERT INTO ods VALUES('534','123454','583111','FG1000','68ca2c7b127fd','verified','','2025-09-17 09:05:23');
INSERT INTO ods VALUES('535','123454','454968','FG1000','68ca2ce075b86','verified','','2025-09-17 09:07:04');
INSERT INTO ods VALUES('536','123454','998016','FG1000','68ca2f811a64c','verified','','2025-09-17 09:18:17');
INSERT INTO ods VALUES('537','7894561230','756124','FG010','68ca3fd8550bb','verified','','2025-09-17 10:28:00');
INSERT INTO ods VALUES('538','','940202','FG010','68ca4cb47a818','verified','940202','2025-09-17 11:22:52');
INSERT INTO ods VALUES('539','','746518','FG032','68ca56a886d14','verified','746518','2025-09-17 12:05:20');
INSERT INTO ods VALUES('540','','232188','995','68ca61fa36353','verified','232188','2025-09-17 12:53:38');
INSERT INTO ods VALUES('541','11','188106','ENAMEL','68ca6715ae5e1','verified','','2025-09-17 13:15:25');
INSERT INTO ods VALUES('542','','970323','FG032','68ca6720344d4','verified','','2025-09-17 13:15:36');
INSERT INTO ods VALUES('543','7894561230','166497','FG010','68ca67721dfc9','verified','','2025-09-17 13:16:58');
INSERT INTO ods VALUES('544','0000000000','716865','995','68ca69f72afd6','verified','','2025-09-17 13:27:43');
INSERT INTO ods VALUES('545','0000000000','137883','FG101','68ca6cb86549c','verified','','2025-09-17 13:39:28');
INSERT INTO ods VALUES('546','','323356','ENAMEL','68ca6e8c3a5dd','verified','323356','2025-09-17 13:47:16');
INSERT INTO ods VALUES('547','7894561230','627588','FG010','68ca8bebb7847','verified','','2025-09-17 15:52:35');
INSERT INTO ods VALUES('548','','143997','Sidelevel ','68ca8fbd5ccec','verified','143997','2025-09-17 16:08:53');
INSERT INTO ods VALUES('549','0000000000','252201','FG101','68ca9bddb724e','verified','','2025-09-17 17:00:37');
INSERT INTO ods VALUES('550','0000000000','944448','995','68ca9dca0fe97','verified','','2025-09-17 17:08:50');
INSERT INTO ods VALUES('551','','610596','995','68ca9f3d8920f','verified','610596','2025-09-17 17:15:01');
INSERT INTO ods VALUES('552','0000000000','569061','998','68caa0779b6ea','verified','','2025-09-17 17:20:15');
INSERT INTO ods VALUES('553','0000000000','702411','995','68caa088c7695','verified','','2025-09-17 17:20:32');
INSERT INTO ods VALUES('554','0000000000','585176','92R','68caa0ee5d481','verified','','2025-09-17 17:22:14');
INSERT INTO ods VALUES('555','0000000000','221014','FG137','68caa193828d2','verified','','2025-09-17 17:24:59');
INSERT INTO ods VALUES('556','0000000000','136573','92R','68caa1a902eff','verified','','2025-09-17 17:25:21');
INSERT INTO ods VALUES('557','0000000000','348815','FG137','68caa1c3b280c','verified','','2025-09-17 17:25:47');
INSERT INTO ods VALUES('558','7894561230','605909','FG010','68caa2271b799','verified','','2025-09-17 17:27:27');
INSERT INTO ods VALUES('559','0000000000','528037','003','68caa2d038fe2','verified','','2025-09-17 17:30:16');
INSERT INTO ods VALUES('560','000','999029','efionaa','68caa2f99b18c','verified','','2025-09-17 17:30:57');
INSERT INTO ods VALUES('561','0000000000','424536','92R','68caa33033103','verified','','2025-09-17 17:31:52');
INSERT INTO ods VALUES('562','7894561230','557230','FG010','68caa3ae85dc9','verified','','2025-09-17 17:33:58');
INSERT INTO ods VALUES('563','','674969','FG099','68caa3dc42ed0','verified','','2025-09-17 17:34:44');
INSERT INTO ods VALUES('564','7894561230','399933','FG0011','68caa4090664c','verified','','2025-09-17 17:35:29');
INSERT INTO ods VALUES('565','0000000000','307829','003','68caa48f57bdf','verified','','2025-09-17 17:37:43');
INSERT INTO ods VALUES('566','7894561230','204804','FG010','68caa4b0c18c5','verified','','2025-09-17 17:38:16');
INSERT INTO ods VALUES('567','0000000000','779170','003','68caa55c41f8b','verified','','2025-09-17 17:41:08');
INSERT INTO ods VALUES('568','0000000000','590241','003','68caa721c468f','verified','','2025-09-17 17:48:41');
INSERT INTO ods VALUES('569','7894561230','568472','FG001','68caa89aef83a','verified','','2025-09-17 17:54:58');
INSERT INTO ods VALUES('570','0000000000','912086','998','68cb7d608441a','verified','','2025-09-18 09:02:48');
INSERT INTO ods VALUES('571','0000000000','160559','003','68cb7d7c65aa7','verified','','2025-09-18 09:03:16');
INSERT INTO ods VALUES('572','','509146','FG032','68cb7d9153f77','verified','509146','2025-09-18 09:03:37');
INSERT INTO ods VALUES('573','','221956','FG010','68cb7d9e59229','verified','221956','2025-09-18 09:03:50');
INSERT INTO ods VALUES('574','0000000000','886017','998','68cb7daa6e587','verified','','2025-09-18 09:04:02');
INSERT INTO ods VALUES('575','0000000000','328741','003','68cb7dceeb8b5','verified','','2025-09-18 09:04:38');
INSERT INTO ods VALUES('576','0000000000','993257','003','68cb7de12feb6','verified','','2025-09-18 09:04:57');
INSERT INTO ods VALUES('577','0000000000','507989','998','68cb7de97439e','verified','','2025-09-18 09:05:05');
INSERT INTO ods VALUES('578','0000000000','229316','FG137','68cb7e04469a2','verified','','2025-09-18 09:05:32');
INSERT INTO ods VALUES('579','7894561230','981219','FG010','68cb7e18aeff1','verified','','2025-09-18 09:05:52');
INSERT INTO ods VALUES('580','7894561230','495301','FG010','68cb7f15a41b3','verified','','2025-09-18 09:10:05');
INSERT INTO ods VALUES('581','','701191','FG010','68cb7fc05c87d','verified','701191','2025-09-18 09:12:56');
INSERT INTO ods VALUES('582','0000000000','691150','FG137','68cb8047102d7','verified','','2025-09-18 09:15:11');
INSERT INTO ods VALUES('583','7894561230','611332','FG010','68cb8065abb6b','verified','','2025-09-18 09:15:41');
INSERT INTO ods VALUES('584','0000000000','371858','995','68cb82d3d2212','verified','','2025-09-18 09:26:03');
INSERT INTO ods VALUES('585','7894561230','778164','FG010','68cb82f4e37c7','verified','','2025-09-18 09:26:36');
INSERT INTO ods VALUES('586','','715022','003','68cb8ce8c4f26','verified','715022','2025-09-18 10:09:04');
INSERT INTO ods VALUES('587','0000000','987990','Manual','68cb92313fecc','verified','','2025-09-18 10:31:37');
INSERT INTO ods VALUES('588','0000000000','558960','SideLevel','68cb92c93fd18','verified','','2025-09-18 10:34:09');
INSERT INTO ods VALUES('589','0000000','452709','Manual','68cb92f340cf5','verified','','2025-09-18 10:34:51');
INSERT INTO ods VALUES('590','0000000000','563810','995','68cb937ad4c2f','verified','','2025-09-18 10:37:06');
INSERT INTO ods VALUES('591','0000000000','472248','100','68cb939d3af59','verified','','2025-09-18 10:37:41');
INSERT INTO ods VALUES('592','0000000000','877973','Alloy','68cb93f6bb619','verified','','2025-09-18 10:39:10');
INSERT INTO ods VALUES('593','0000000000','895073','995','68cb9413ea10f','verified','','2025-09-18 10:39:39');
INSERT INTO ods VALUES('594','0000000000','692623','100','68cb944846792','verified','','2025-09-18 10:40:32');
INSERT INTO ods VALUES('595','0000000000','148973','Alloy','68cb946270600','verified','','2025-09-18 10:40:58');
INSERT INTO ods VALUES('596','7894561230','959682','FG001','68cb9481ed1c8','verified','','2025-09-18 10:41:29');
INSERT INTO ods VALUES('597','0000000000','243562','92R','68cb950018a97','verified','','2025-09-18 10:43:36');
INSERT INTO ods VALUES('598','7894561230','432289','FG001','68cb954a73768','verified','','2025-09-18 10:44:50');
INSERT INTO ods VALUES('599','0000000000','830280','995','68cb95d7b1c09','verified','','2025-09-18 10:47:11');
INSERT INTO ods VALUES('600','0000000000','448965','995','68cb962205db6','verified','','2025-09-18 10:48:26');
INSERT INTO ods VALUES('601','7894561230','496705','FG001','68cb9640be160','verified','','2025-09-18 10:48:56');
INSERT INTO ods VALUES('602','0000000000','323498','100','68cb965491e19','verified','','2025-09-18 10:49:16');
INSERT INTO ods VALUES('603','7894561230','380395','FG001','68cb97ac5b1d4','verified','','2025-09-18 10:55:00');
INSERT INTO ods VALUES('604','0000000000','309916','100','68cb97dd85c4c','verified','','2025-09-18 10:55:49');
INSERT INTO ods VALUES('605','7894561230','261335','FG001','68cb981d70119','verified','','2025-09-18 10:56:53');
INSERT INTO ods VALUES('606','0000000000','607727','92R','68cb98406a8ac','verified','','2025-09-18 10:57:28');
INSERT INTO ods VALUES('607','7894561230','617260','FG001','68cb986da5b20','verified','','2025-09-18 10:58:13');
INSERT INTO ods VALUES('608','0000000000','450102','FG137','68cb98cc9ce28','verified','','2025-09-18 10:59:48');
INSERT INTO ods VALUES('609','0000000000','534345','Alloy','68cb9a09c7d71','verified','','2025-09-18 11:05:05');
INSERT INTO ods VALUES('610','0000000000','500926','FG137','68cb9a1b1f34e','verified','','2025-09-18 11:05:23');
INSERT INTO ods VALUES('611','7894561230','113111','FG010','68cba3765cbc1','verified','','2025-09-18 11:45:18');
INSERT INTO ods VALUES('612','','490145','003','68cba5228926b','verified','490145','2025-09-18 11:52:26');
INSERT INTO ods VALUES('613','','109877','Fg091','68cba52c3601e','verified','109877','2025-09-18 11:52:36');
INSERT INTO ods VALUES('614','7894561230','456516','FG001','68cbb5dc99502','verified','','2025-09-18 13:03:48');
INSERT INTO ods VALUES('615','','596570','FG099','68cbb60ed3789','verified','','2025-09-18 13:04:38');
INSERT INTO ods VALUES('616','','457465','sidelevel','68cbb86c0c98b','verified','457465','2025-09-18 13:14:44');
INSERT INTO ods VALUES('617','','297255','FG010','68cbbc6faf6fb','verified','297255','2025-09-18 13:31:51');
INSERT INTO ods VALUES('618','0000000000','281892','Polish','68cbc0644f1fe','verified','','2025-09-18 13:48:44');
INSERT INTO ods VALUES('619','0000000000','997833','SideLevel','68cbc09b1a114','verified','','2025-09-18 13:49:39');
INSERT INTO ods VALUES('620','','393889','Polish','68cbc126eb43f','verified','393889','2025-09-18 13:51:58');
INSERT INTO ods VALUES('621','000','151642','rhodium','68cbc2c9794fd','verified','','2025-09-18 13:58:57');
INSERT INTO ods VALUES('622','11','808392','ENAMEL','68cbc445aa7d4','verified','','2025-09-18 14:05:17');
INSERT INTO ods VALUES('623','0000000000','266459','Polish','68cbc4a4b6927','verified','','2025-09-18 14:06:52');
INSERT INTO ods VALUES('624','0000000000','606122','Packing','68cbc5109fd4b','verified','','2025-09-18 14:08:40');
INSERT INTO ods VALUES('625','0000000000','785253','Packing','68cbc55695b4e','verified','','2025-09-18 14:09:50');
INSERT INTO ods VALUES('626','','873119','rhodium','68cbc6abc2fa6','verified','873119','2025-09-18 14:15:31');
INSERT INTO ods VALUES('627','','828982','FG099','68cbc7d0869ed','verified','','2025-09-18 14:20:24');
INSERT INTO ods VALUES('628','0000000','438206','Manual','68cbc86b3cd27','verified','','2025-09-18 14:22:59');
INSERT INTO ods VALUES('629','','146546','Polish','68cbca5b27c56','verified','146546','2025-09-18 14:31:15');
INSERT INTO ods VALUES('630','','903602','Rawa','68cbcd283f4f5','verified','','2025-09-18 14:43:12');
INSERT INTO ods VALUES('631','7894561230','590985','FG001','68cbce16be7e2','verified','','2025-09-18 14:47:10');
INSERT INTO ods VALUES('632','7894561230','872091','FG010','68cbce30e39eb','verified','','2025-09-18 14:47:36');
INSERT INTO ods VALUES('633','7894561230','938012','FG001','68cbce3d41bf9','verified','','2025-09-18 14:47:49');
INSERT INTO ods VALUES('634','11','615073','ENAMEL','68cbce7d53232','verified','','2025-09-18 14:48:53');
INSERT INTO ods VALUES('635','','345095','Rawa','68cbced32265b','verified','','2025-09-18 14:50:19');
INSERT INTO ods VALUES('636','0000000000','566338','Enamel LR','68cbcf8a0c006','verified','','2025-09-18 14:53:22');
INSERT INTO ods VALUES('637','','406109','laser','68cbd1a344408','verified','406109','2025-09-18 15:02:19');
INSERT INTO ods VALUES('638','','258827','laser','68cbd1cf3d2bd','verified','258827','2025-09-18 15:03:03');
INSERT INTO ods VALUES('639','0000000000','180161','Enamel LR','68cbd1e7a27f3','verified','','2025-09-18 15:03:27');
INSERT INTO ods VALUES('640','0000000','932970','Manual','68cbd20242cac','verified','','2025-09-18 15:03:54');
INSERT INTO ods VALUES('641','0000000000','148350','Polish','68cbd414e6523','verified','','2025-09-18 15:12:44');
INSERT INTO ods VALUES('642','0000000000','703135','995','68cbd4cb23439','verified','','2025-09-18 15:15:47');
INSERT INTO ods VALUES('643','0000000000','285381','92R','68cbd53aa3281','verified','','2025-09-18 15:17:38');
INSERT INTO ods VALUES('644','7894561230','218512','FG001','68cbd5606631c','verified','','2025-09-18 15:18:16');
INSERT INTO ods VALUES('645','000','651778','rhodium','68cbd56e48986','verified','','2025-09-18 15:18:30');
INSERT INTO ods VALUES('646','','251314','laser','68cbd5dd5b5bb','verified','251314','2025-09-18 15:20:21');
INSERT INTO ods VALUES('647','','709224','laser','68cbd5fe692f5','verified','709224','2025-09-18 15:20:54');
INSERT INTO ods VALUES('648','','495354','laser','68cbd60db3ed3','verified','495354','2025-09-18 15:21:09');
INSERT INTO ods VALUES('649','0000000','795933','Manual','68cbd6c52f8f4','verified','','2025-09-18 15:24:13');
INSERT INTO ods VALUES('650','','276954','laser','68cbd75f75a49','verified','276954','2025-09-18 15:26:47');
INSERT INTO ods VALUES('651','0000000','876170','Manual','68cbd796e28d4','verified','','2025-09-18 15:27:42');
INSERT INTO ods VALUES('652','0000000000','321262','SideLevel','68cbd83395ef0','verified','','2025-09-18 15:30:19');
INSERT INTO ods VALUES('653','7894561230','571861','FG010','68cbd892c48ff','verified','','2025-09-18 15:31:54');
INSERT INTO ods VALUES('654','0000000000','472951','SideLevel','68cbd98449212','verified','','2025-09-18 15:35:56');
INSERT INTO ods VALUES('655','0000000000','452969','FG137','68cbdad925b20','verified','','2025-09-18 15:41:37');
INSERT INTO ods VALUES('656','7894561230','642215','FG001','68cbdb2641f9b','verified','','2025-09-18 15:42:54');
INSERT INTO ods VALUES('657','0000000000','563208','Alloy','68cbdb73deda3','verified','','2025-09-18 15:44:11');
INSERT INTO ods VALUES('658','7894561230','515643','FG001','68cbdb8f94cfb','verified','','2025-09-18 15:44:39');
INSERT INTO ods VALUES('659','0000000000','913024','FG137','68cbdb9b0e9f2','verified','','2025-09-18 15:44:51');
INSERT INTO ods VALUES('660','','905079','FG137','68cbdbdadf1e6','verified','905079','2025-09-18 15:45:54');
INSERT INTO ods VALUES('661','','495206','FG137','68cbdc2f037fa','verified','495206','2025-09-18 15:47:19');
INSERT INTO ods VALUES('662','7894561230','943009','FG010','68cbde27642cb','verified','','2025-09-18 15:55:43');
INSERT INTO ods VALUES('663','0000000','885172','Manual','68cbe1989ddc5','verified','','2025-09-18 16:10:24');
INSERT INTO ods VALUES('664','7894561230','757776','FG010','68cbe33a3ca44','verified','','2025-09-18 16:17:22');
INSERT INTO ods VALUES('665','','582244','FG137','68cbe3c2bdc8c','verified','582244','2025-09-18 16:19:38');
INSERT INTO ods VALUES('666','','829543','FG032','68cbe4141b48c','verified','','2025-09-18 16:21:00');
INSERT INTO ods VALUES('667','000','120212','rhodium','68cbe422a36be','verified','','2025-09-18 16:21:14');
INSERT INTO ods VALUES('668','0000000','578679','Manual','68cbe42c99c31','verified','','2025-09-18 16:21:24');
INSERT INTO ods VALUES('669','0000000000','837477','Polish','68cbe459600a3','verified','','2025-09-18 16:22:09');
INSERT INTO ods VALUES('670','0000000000','871660','003','68cbe472f19f5','verified','','2025-09-18 16:22:34');
INSERT INTO ods VALUES('671','98745627','617690','laser','68cbe92baf6ea','verified','','2025-09-18 16:42:43');
INSERT INTO ods VALUES('672','0000000','573515','Manual','68cbe9cf7c8d3','verified','','2025-09-18 16:45:27');
INSERT INTO ods VALUES('673','','874066','laser','68cbea7ae4f4b','verified','874066','2025-09-18 16:48:18');
INSERT INTO ods VALUES('674','0000000000','138917','FG137','68cbeb086e238','verified','','2025-09-18 16:50:40');
INSERT INTO ods VALUES('675','','367904','FG137','68cbeb86f271d','verified','367904','2025-09-18 16:52:46');
INSERT INTO ods VALUES('676','','651564','laser','68cbedd569bcd','verified','651564','2025-09-18 17:02:37');
INSERT INTO ods VALUES('677','','565235','FG137','68cbf19736b36','verified','565235','2025-09-18 17:18:39');
INSERT INTO ods VALUES('678','7894561230','820353','FG010','68cbf1aa5482f','verified','','2025-09-18 17:18:58');
INSERT INTO ods VALUES('679','0000000000','453091','003','68cbf1bbf1ae9','verified','','2025-09-18 17:19:15');
INSERT INTO ods VALUES('680','0000000','286261','Manual','68cbf1cdd39cd','verified','','2025-09-18 17:19:33');
INSERT INTO ods VALUES('681','7894561230','275405','FG010','68cbf7cee0f32','verified','','2025-09-18 17:45:10');
INSERT INTO ods VALUES('682','0000000000','429627','003','68cbf7edefdd6','verified','','2025-09-18 17:45:41');
INSERT INTO ods VALUES('683','7894561230','970672','FG010','68cbf8ad7dc1f','verified','','2025-09-18 17:48:53');
INSERT INTO ods VALUES('684','0000000000','401856','Alloy','68cbfa691f468','verified','','2025-09-18 17:56:17');
INSERT INTO ods VALUES('685','','212386','FG010','68ccc7df5d7fa','verified','212386','2025-09-19 08:32:55');
INSERT INTO ods VALUES('686','','436192','FG010','68ccc7fd081f8','verified','436192','2025-09-19 08:33:25');
INSERT INTO ods VALUES('687','7894561230','450548','FG010','68cccb3633f5e','verified','','2025-09-19 08:47:10');
INSERT INTO ods VALUES('688','7894561230','171379','FG001','68cccb53b7a61','verified','','2025-09-19 08:47:39');
INSERT INTO ods VALUES('689','0000000000','730539','Dummy','68cccb9fd20b4','verified','','2025-09-19 08:48:55');
INSERT INTO ods VALUES('690','7894561230','778187','FG010','68cccc1d4670e','verified','','2025-09-19 08:51:01');
INSERT INTO ods VALUES('691','0000000000','295393','Dummy','68cccc70edb90','verified','','2025-09-19 08:52:24');
INSERT INTO ods VALUES('692','','417429','laser','68cccce2318c9','verified','417429','2025-09-19 08:54:18');
INSERT INTO ods VALUES('693','0000000000','513405','FG137','68ccccff436a5','verified','','2025-09-19 08:54:47');
INSERT INTO ods VALUES('694','0000000000','736788','Dummy','68cccdca89d37','verified','','2025-09-19 08:58:10');
INSERT INTO ods VALUES('695','','596512','FG032','68ccce7036d91','verified','596512','2025-09-19 09:00:56');
INSERT INTO ods VALUES('696','0000000000','326630','995','68ccce73228ae','verified','','2025-09-19 09:00:59');
INSERT INTO ods VALUES('697','0000000000','387308','100','68ccce7c09f22','verified','','2025-09-19 09:01:08');
INSERT INTO ods VALUES('698','0000000000','670434','Dummy','68ccd08af1e03','verified','','2025-09-19 09:09:54');
INSERT INTO ods VALUES('699','0000000000','393862','92R','68ccd0dd95ee1','verified','','2025-09-19 09:11:17');
INSERT INTO ods VALUES('700','0000000000','466348','Alloy','68ccd0ee3acda','verified','','2025-09-19 09:11:34');
INSERT INTO ods VALUES('701','','942268','100','68ccd221f2b74','verified','942268','2025-09-19 09:16:41');
INSERT INTO ods VALUES('702','0000000000','976202','Dummy','68ccd3aab8c3a','verified','','2025-09-19 09:23:14');
INSERT INTO ods VALUES('703','0000000000','952372','92R','68ccd3ecc023e','verified','','2025-09-19 09:24:20');
INSERT INTO ods VALUES('704','','118967','100','68ccd489c54be','verified','118967','2025-09-19 09:26:57');
INSERT INTO ods VALUES('705','','941934','995','68ccd495c9282','verified','941934','2025-09-19 09:27:09');
INSERT INTO ods VALUES('706','0000000000','910892','Dummy','68ccd4ad20116','verified','','2025-09-19 09:27:33');
INSERT INTO ods VALUES('707','','241877','100','68ccd4b92c160','verified','241877','2025-09-19 09:27:45');
INSERT INTO ods VALUES('708','','955998','995','68ccd4e3f30f0','verified','955998','2025-09-19 09:28:27');
INSERT INTO ods VALUES('709','0000000000','507454','92R','68ccd4ef81335','verified','','2025-09-19 09:28:39');
INSERT INTO ods VALUES('710','','551040','995','68ccd5ad7d263','verified','551040','2025-09-19 09:31:49');
INSERT INTO ods VALUES('711','0000000000','156653','FG101','68ccd5cd41989','verified','','2025-09-19 09:32:21');
INSERT INTO ods VALUES('712','','602059','003','68ccd6336bcee','verified','602059','2025-09-19 09:34:03');
INSERT INTO ods VALUES('713','','892337','100','68ccd6887a160','verified','892337','2025-09-19 09:35:28');
INSERT INTO ods VALUES('714','','162782','FG137','68ccd6a29ae21','verified','162782','2025-09-19 09:35:54');
INSERT INTO ods VALUES('715','','172010','995','68ccd6a6284f1','verified','172010','2025-09-19 09:35:58');
INSERT INTO ods VALUES('716','0000000000','753467','995','68ccd6f285ab3','verified','','2025-09-19 09:37:14');
INSERT INTO ods VALUES('717','','586186','995','68ccd6fe508ca','verified','586186','2025-09-19 09:37:26');
INSERT INTO ods VALUES('718','0000000000','606529','SideLevel','68ccd7a3a1ed1','verified','','2025-09-19 09:40:11');
INSERT INTO ods VALUES('719','0000000','722389','Manual','68ccd7b50524e','verified','','2025-09-19 09:40:29');
INSERT INTO ods VALUES('720','','689051','FG099','68ccd7bd65633','verified','','2025-09-19 09:40:37');
INSERT INTO ods VALUES('721','0000000000','615527','SideLevel','68ccd841a4be7','verified','','2025-09-19 09:42:49');
INSERT INTO ods VALUES('722','0000000','603083','Manual','68ccd87b995a2','verified','','2025-09-19 09:43:47');
INSERT INTO ods VALUES('723','','638043','FG099','68ccd89197bb5','verified','','2025-09-19 09:44:09');
INSERT INTO ods VALUES('724','0000000000','457419','Dummy','68ccd931aa460','verified','','2025-09-19 09:46:49');
INSERT INTO ods VALUES('725','','343865','92r','68ccd953a1d5a','verified','343865','2025-09-19 09:47:23');
INSERT INTO ods VALUES('726','','780592','100','68ccd95965539','verified','780592','2025-09-19 09:47:29');
INSERT INTO ods VALUES('727','','414474','FG099','68ccda0f62973','verified','414474','2025-09-19 09:50:31');
INSERT INTO ods VALUES('728','','213461','92r','68ccda1748510','verified','213461','2025-09-19 09:50:39');
INSERT INTO ods VALUES('729','0000000000','454434','92R','68ccda3767ff2','verified','','2025-09-19 09:51:11');
INSERT INTO ods VALUES('730','','277252','92r','68ccda4ab8658','verified','277252','2025-09-19 09:51:30');
INSERT INTO ods VALUES('731','0000000000','576670','92R','68ccdbc5274dc','verified','','2025-09-19 09:57:49');
INSERT INTO ods VALUES('732','0000000000','677858','FG101','68ccdc7e84100','verified','','2025-09-19 10:00:54');
INSERT INTO ods VALUES('733','0000000000','589017','995','68ccdcceca48c','verified','','2025-09-19 10:02:14');
INSERT INTO ods VALUES('734','','620991','995','68ccdceeb891d','verified','620991','2025-09-19 10:02:46');
INSERT INTO ods VALUES('735','','473329','FG010','68ccdd7b41809','verified','473329','2025-09-19 10:05:07');
INSERT INTO ods VALUES('736','','917022','100','68ccdd96b8b60','verified','917022','2025-09-19 10:05:34');
INSERT INTO ods VALUES('737','0000000000','305539','92R','68ccddfef2a05','verified','','2025-09-19 10:07:18');
INSERT INTO ods VALUES('738','','184860','995','68ccde01165fc','verified','184860','2025-09-19 10:07:21');
INSERT INTO ods VALUES('739','0000000000','759932','FG101','68ccde3b56af0','verified','','2025-09-19 10:08:19');
INSERT INTO ods VALUES('740','','982417','100','68ccdefe76bcc','verified','982417','2025-09-19 10:11:34');
INSERT INTO ods VALUES('741','','721347','995','68ccdf5e73a3d','verified','721347','2025-09-19 10:13:10');
INSERT INTO ods VALUES('742','','704701','995','68cce03363f10','verified','704701','2025-09-19 10:16:43');
INSERT INTO ods VALUES('743','','249185','100','68cce06e2e9c2','verified','249185','2025-09-19 10:17:42');
INSERT INTO ods VALUES('744','','289707','995','68cce0ac5e93e','verified','289707','2025-09-19 10:18:44');
INSERT INTO ods VALUES('745','','364855','995','68cce1069ba33','verified','364855','2025-09-19 10:20:14');
INSERT INTO ods VALUES('746','','460024','100','68cce1402e65e','verified','460024','2025-09-19 10:21:12');
INSERT INTO ods VALUES('747','','182516','995','68cce151941df','verified','182516','2025-09-19 10:21:29');
INSERT INTO ods VALUES('748','','798160','995','68cce15e7448d','verified','798160','2025-09-19 10:21:42');
INSERT INTO ods VALUES('749','','378969','100','68cce16d2e389','verified','378969','2025-09-19 10:21:57');
INSERT INTO ods VALUES('750','','439970','995','68cce1727cb64','verified','439970','2025-09-19 10:22:02');
INSERT INTO ods VALUES('751','','225991','92r','68cce1c29bef6','verified','225991','2025-09-19 10:23:22');
INSERT INTO ods VALUES('752','','607577','92r','68cce24e229d9','verified','607577','2025-09-19 10:25:42');
INSERT INTO ods VALUES('753','0000000000','715018','995','68cce25282420','verified','','2025-09-19 10:25:46');
INSERT INTO ods VALUES('754','','569923','995','68cce254a52eb','verified','569923','2025-09-19 10:25:48');
INSERT INTO ods VALUES('755','','616047','100','68cce2599856d','verified','616047','2025-09-19 10:25:53');
INSERT INTO ods VALUES('756','','365075','92r','68cce26eac46c','verified','365075','2025-09-19 10:26:14');
INSERT INTO ods VALUES('757','0000000000','731827','100','68cce2d9314cf','verified','','2025-09-19 10:28:01');
INSERT INTO ods VALUES('758','0000000000','818808','92R','68cce33a516a2','verified','','2025-09-19 10:29:38');
INSERT INTO ods VALUES('759','','340810','100','68cce39320568','verified','340810','2025-09-19 10:31:07');
INSERT INTO ods VALUES('760','0000000000','738529','Alloy','68cce3b9357c7','verified','','2025-09-19 10:31:45');
INSERT INTO ods VALUES('761','','728045','92r','68cce3d92b665','verified','728045','2025-09-19 10:32:17');
INSERT INTO ods VALUES('762','','399385','995','68cce3e670a56','verified','399385','2025-09-19 10:32:30');
INSERT INTO ods VALUES('763','0000000000','812950','FG137','68cce429e1502','verified','','2025-09-19 10:33:37');
INSERT INTO ods VALUES('764','','411832','FG137','68cce45d41cbf','verified','411832','2025-09-19 10:34:29');
INSERT INTO ods VALUES('765','','606678','FG137','68cce4c41070c','verified','606678','2025-09-19 10:36:12');
INSERT INTO ods VALUES('766','','342553','100','68cce5ad9ac21','verified','342553','2025-09-19 10:40:05');
INSERT INTO ods VALUES('767','','502913','92r','68cce6929f720','verified','502913','2025-09-19 10:43:54');
INSERT INTO ods VALUES('768','7894561230','856572','FG010','68cce73a61c0b','verified','','2025-09-19 10:46:42');
INSERT INTO ods VALUES('769','','271016','92r','68cce767d490f','verified','271016','2025-09-19 10:47:27');
INSERT INTO ods VALUES('770','0000000000','262831','75R','68cce937e5fee','verified','','2025-09-19 10:55:11');
INSERT INTO ods VALUES('771','','226439','995','68ccea3257d34','verified','226439','2025-09-19 10:59:22');
INSERT INTO ods VALUES('772','','822002','100','68ccea5aa30d5','verified','822002','2025-09-19 11:00:02');
INSERT INTO ods VALUES('773','','963748','995','68ccea71c8a42','verified','963748','2025-09-19 11:00:25');
INSERT INTO ods VALUES('774','','810671','995','68cceacee8d9f','verified','810671','2025-09-19 11:01:58');
INSERT INTO ods VALUES('775','','894690','pairing','68cceef80c5f3','verified','894690','2025-09-19 11:19:44');
INSERT INTO ods VALUES('776','','715849','92R','68ccf12fd990a','verified','715849','2025-09-19 11:29:11');
INSERT INTO ods VALUES('777','','567814','92R','68ccf13612b5b','verified','567814','2025-09-19 11:29:18');
INSERT INTO ods VALUES('778','','477845','92R','68ccf1be455c7','verified','477845','2025-09-19 11:31:34');
INSERT INTO ods VALUES('779','','233244','FG137','68ccf323164d5','verified','233244','2025-09-19 11:37:31');
INSERT INTO ods VALUES('780','','864528','FG137','68ccf49bd413b','verified','864528','2025-09-19 11:43:47');
INSERT INTO ods VALUES('781','','447768','FG137','68ccf4d6d7826','verified','447768','2025-09-19 11:44:46');
INSERT INTO ods VALUES('782','','739267','laser','68ccf54c9a296','verified','739267','2025-09-19 11:46:44');
INSERT INTO ods VALUES('783','','431507','003','68ccf6e45eb93','verified','431507','2025-09-19 11:53:32');
INSERT INTO ods VALUES('784','','871334','92R','68ccf7d405b1f','verified','871334','2025-09-19 11:57:32');
INSERT INTO ods VALUES('785','0000000000','998204','75R','68ccf85368fee','verified','','2025-09-19 11:59:39');
INSERT INTO ods VALUES('786','0000000000','902459','995','68ccf882c915f','verified','','2025-09-19 12:00:26');
INSERT INTO ods VALUES('787','0000000000','802893','Alloy','68ccf89d1d3e7','verified','','2025-09-19 12:00:53');
INSERT INTO ods VALUES('788','','316871','laser','68ccf8f256ad5','verified','316871','2025-09-19 12:02:18');
INSERT INTO ods VALUES('789','','784353','92R','68ccfc8e018f9','verified','784353','2025-09-19 12:17:42');
INSERT INTO ods VALUES('790','0000000000','499051','995','68cd014d7b671','verified','','2025-09-19 12:37:57');
INSERT INTO ods VALUES('791','0000000000','622793','100','68cd019a3893c','verified','','2025-09-19 12:39:14');
INSERT INTO ods VALUES('792','0000000000','604158','Alloy','68cd01c043120','verified','','2025-09-19 12:39:52');
INSERT INTO ods VALUES('793','000','259094','efionaa','68cd01e547007','verified','','2025-09-19 12:40:29');
INSERT INTO ods VALUES('794','','308996','92R','68cd04186caa2','verified','308996','2025-09-19 12:49:52');
INSERT INTO ods VALUES('795','','122104','efionaa','68cd067bc5086','verified','122104','2025-09-19 13:00:03');
INSERT INTO ods VALUES('796','','742248','efionaa','68cd075203c1f','verified','742248','2025-09-19 13:03:38');
INSERT INTO ods VALUES('797','','887440','FG137','68cd07585e3a8','verified','887440','2025-09-19 13:03:44');
INSERT INTO ods VALUES('798','','707285','Manual','68cd07dd5a80f','verified','707285','2025-09-19 13:05:57');
INSERT INTO ods VALUES('799','','669452','efionaa','68cd0ac149fcb','verified','669452','2025-09-19 13:18:17');
INSERT INTO ods VALUES('800','','971385','FG137','68cd0b31d3d0f','verified','971385','2025-09-19 13:20:09');
INSERT INTO ods VALUES('801','','867973','efionaa','68cd0c60a99bc','verified','867973','2025-09-19 13:25:12');
INSERT INTO ods VALUES('802','','873302','92R','68cd1147e3cfd','verified','873302','2025-09-19 13:46:07');
INSERT INTO ods VALUES('803','','416604','92R','68cd176ec35f7','verified','416604','2025-09-19 14:12:22');
INSERT INTO ods VALUES('804','','103864','laser','68cd1df34952c','verified','103864','2025-09-19 14:40:11');
INSERT INTO ods VALUES('805','','581183','FG137','68cd20983db5e','verified','581183','2025-09-19 14:51:28');
INSERT INTO ods VALUES('806','','393274','92R','68cd20aa1c55b','verified','393274','2025-09-19 14:51:46');
INSERT INTO ods VALUES('807','','782341','efionaa','68cd226a8b78b','verified','782341','2025-09-19 14:59:14');
INSERT INTO ods VALUES('808','','562696','FG137','68cd22d484ea1','verified','562696','2025-09-19 15:01:00');
INSERT INTO ods VALUES('809','','538871','92R','68cd22f548bf3','verified','538871','2025-09-19 15:01:33');
INSERT INTO ods VALUES('810','000','505055','rhodium','68cd2410d1238','verified','','2025-09-19 15:06:16');
INSERT INTO ods VALUES('811','','615624','FG137','68cd241f71ddb','verified','615624','2025-09-19 15:06:31');
INSERT INTO ods VALUES('812','000','486775','rhodium','68cd247c4b281','verified','','2025-09-19 15:08:04');
INSERT INTO ods VALUES('813','','364933','92R','68cd24d5a3e2d','verified','364933','2025-09-19 15:09:33');
INSERT INTO ods VALUES('814','','223859','92R','68cd24de8654c','verified','223859','2025-09-19 15:09:42');
INSERT INTO ods VALUES('815','','879017','92R','68cd24e51c38e','verified','879017','2025-09-19 15:09:49');
INSERT INTO ods VALUES('816','','523078','92R','68cd2522b3800','verified','523078','2025-09-19 15:10:50');
INSERT INTO ods VALUES('817','','236628','92R','68cd2538ea61e','verified','236628','2025-09-19 15:11:12');
INSERT INTO ods VALUES('818','','588498','92R','68cd25e8cdd23','verified','588498','2025-09-19 15:14:08');
INSERT INTO ods VALUES('819','','686400','pairing','68cd25f19822c','verified','686400','2025-09-19 15:14:17');
INSERT INTO ods VALUES('820','','700891','995','68cd25f8a6be0','verified','700891','2025-09-19 15:14:24');
INSERT INTO ods VALUES('821','','468380','COMPONENTS','68cd25ff1959a','verified','468380','2025-09-19 15:14:31');
INSERT INTO ods VALUES('822','','685968','92r','68cd26d108b16','verified','685968','2025-09-19 15:18:01');
INSERT INTO ods VALUES('823','','799063','003','68cd277809946','verified','799063','2025-09-19 15:20:48');
INSERT INTO ods VALUES('824','','992111','rhodium','68cd2783efcc4','verified','992111','2025-09-19 15:20:59');
INSERT INTO ods VALUES('825','','620534','FG137','68cd27c752429','verified','620534','2025-09-19 15:22:07');
INSERT INTO ods VALUES('826','','633306','92r','68cd29ba8f76b','verified','633306','2025-09-19 15:30:26');
INSERT INTO ods VALUES('827','','703356','efionaa','68cd29c1a8068','verified','703356','2025-09-19 15:30:33');
INSERT INTO ods VALUES('828','','447614','FG137','68cd29ea26368','verified','447614','2025-09-19 15:31:14');
INSERT INTO ods VALUES('829','0000000000','579223','SideLevel','68cd2a6715ed5','verified','','2025-09-19 15:33:19');
INSERT INTO ods VALUES('830','0000000','995219','Manual','68cd2b22248b1','verified','','2025-09-19 15:36:26');
INSERT INTO ods VALUES('831','','647235','rhodium','68cd2b73e6aab','verified','647235','2025-09-19 15:37:47');
INSERT INTO ods VALUES('832','','315391','FG032','68cd2b748db49','verified','','2025-09-19 15:37:48');
INSERT INTO ods VALUES('833','0000000000','237224','FG146','68cd2b8509a74','verified','','2025-09-19 15:38:05');
INSERT INTO ods VALUES('834','','185074','rhodium','68cd2ba128b13','verified','185074','2025-09-19 15:38:33');
INSERT INTO ods VALUES('835','0000000000','394559','92R','68cd2c31c209c','verified','','2025-09-19 15:40:57');
INSERT INTO ods VALUES('836','','267341','FG146','68cd2e0bb8955','verified','267341','2025-09-19 15:48:51');
INSERT INTO ods VALUES('837','0000000000','803291','SideLevel','68cd2e40b5050','verified','','2025-09-19 15:49:44');
INSERT INTO ods VALUES('838','','589635','FG137','68cd2f485d4df','verified','589635','2025-09-19 15:54:08');
INSERT INTO ods VALUES('839','0000000000','467269','SideLevel','68cd2f6d5cc6c','verified','','2025-09-19 15:54:45');
INSERT INTO ods VALUES('840','0000000000','286722','100','68cd2fb023183','verified','','2025-09-19 15:55:52');
INSERT INTO ods VALUES('841','0000000000','792313','Alloy','68cd2fd79e45c','verified','','2025-09-19 15:56:31');
INSERT INTO ods VALUES('842','0000000000','748167','92R','68cd2ffabb04d','verified','','2025-09-19 15:57:06');
INSERT INTO ods VALUES('843','0000000000','673175','FG137','68cd302e6aa5f','verified','','2025-09-19 15:57:58');
INSERT INTO ods VALUES('844','0000000000','415933','995','68cd3048b61aa','verified','','2025-09-19 15:58:24');
INSERT INTO ods VALUES('845','0000000000','831674','995','68cd306f036c3','verified','','2025-09-19 15:59:03');
INSERT INTO ods VALUES('846','0000000000','543978','FG137','68cd307983280','verified','','2025-09-19 15:59:13');
INSERT INTO ods VALUES('847','0000000000','888404','995','68cd311793fa5','verified','','2025-09-19 16:01:51');
INSERT INTO ods VALUES('848','0000000000','793512','FG137','68cd3167d62ef','verified','','2025-09-19 16:03:11');
INSERT INTO ods VALUES('849','7894561230','608005','FG010','68cd39ebb027e','verified','','2025-09-19 16:39:31');
INSERT INTO ods VALUES('850','','732346','rhodium','68cd427013c0c','verified','732346','2025-09-19 17:15:52');
INSERT INTO ods VALUES('851','','679961','laser','68cd42a6d694b','verified','679961','2025-09-19 17:16:46');
INSERT INTO ods VALUES('852','','811484','100','68cd477ebff2d','verified','811484','2025-09-19 17:37:26');
INSERT INTO ods VALUES('853','','607076','92r','68cd478de1c2e','verified','607076','2025-09-19 17:37:41');
INSERT INTO ods VALUES('854','0000000000','982231','FG137','68cd4cb4a1b44','verified','','2025-09-19 17:59:40');
INSERT INTO ods VALUES('855','0000000000','476033','003','68cd4cff64243','verified','','2025-09-19 18:00:55');
INSERT INTO ods VALUES('856','0000000000','902129','FG137','68cd4de524c09','verified','','2025-09-19 18:04:45');
INSERT INTO ods VALUES('857','0000000000','771684','003','68cd4e5aa89b9','verified','','2025-09-19 18:06:42');
INSERT INTO ods VALUES('858','0000000000','686295','SideLevel','68cd4fa751e89','verified','','2025-09-19 18:12:15');
INSERT INTO ods VALUES('859','','499767','FG099','68cd4fd75c7fa','verified','','2025-09-19 18:13:03');
INSERT INTO ods VALUES('860','0000000000','893476','SideLevel','68cd505cb7b96','verified','','2025-09-19 18:15:16');
INSERT INTO ods VALUES('861','0000000000','437272','SideLevel','68cd507f7d68b','verified','','2025-09-19 18:15:51');
INSERT INTO ods VALUES('862','','940230','FG099','68cd509bac224','verified','','2025-09-19 18:16:19');
INSERT INTO ods VALUES('863','0000000000','921250','SideLevel','68cd50f009f60','verified','','2025-09-19 18:17:44');
INSERT INTO ods VALUES('864','','965889','FG099','68cd512c1c8e2','verified','','2025-09-19 18:18:44');
INSERT INTO ods VALUES('865','0000000','261884','Manual','68cd52d3d275d','verified','','2025-09-19 18:25:47');
INSERT INTO ods VALUES('866','0000000000','321435','004','68cd52f5613a2','verified','','2025-09-19 18:26:21');
INSERT INTO ods VALUES('867','0000000000','961264','003','68cd53b908dff','verified','','2025-09-19 18:29:37');
INSERT INTO ods VALUES('868','','396967','100','68cd53e2d51f5','verified','396967','2025-09-19 18:30:18');
INSERT INTO ods VALUES('869','','310776','FG010','68ce184f1e5da','verified','310776','2025-09-20 08:28:23');
INSERT INTO ods VALUES('870','','955693','FG010','68ce187bac141','verified','955693','2025-09-20 08:29:07');
INSERT INTO ods VALUES('871','','146159','FG010','68ce18be46750','verified','146159','2025-09-20 08:30:14');
INSERT INTO ods VALUES('872','','666879','003','68ce1a0e52c27','verified','666879','2025-09-20 08:35:50');
INSERT INTO ods VALUES('873','','331919','rhodium','68ce1a7ec5b7c','verified','331919','2025-09-20 08:37:42');
INSERT INTO ods VALUES('874','','753280','FG010','68ce1c0becdb1','verified','753280','2025-09-20 08:44:19');
INSERT INTO ods VALUES('875','','919120','FG010','68ce1c1b21e90','verified','919120','2025-09-20 08:44:35');
INSERT INTO ods VALUES('876','','714041','FG010','68ce1c3071d0f','verified','714041','2025-09-20 08:44:56');
INSERT INTO ods VALUES('877','','140955','003','68ce1e000fc5e','verified','140955','2025-09-20 08:52:40');
INSERT INTO ods VALUES('878','7894561230','551444','FG010','68ce1e8e234e8','verified','','2025-09-20 08:55:02');
INSERT INTO ods VALUES('879','0000000000','786525','Pairing','68ce1edb66db0','verified','','2025-09-20 08:56:19');
INSERT INTO ods VALUES('880','','519691','rhodium','68ce20a8bb185','verified','519691','2025-09-20 09:04:00');
INSERT INTO ods VALUES('881','','391641','FG137','68ce20fe6d076','verified','391641','2025-09-20 09:05:26');
INSERT INTO ods VALUES('882','0000000000','217605','003','68ce21b109e75','verified','','2025-09-20 09:08:25');
INSERT INTO ods VALUES('883','','549037','100','68ce226f537b0','verified','549037','2025-09-20 09:11:35');
INSERT INTO ods VALUES('884','','508938','FG032','68ce2280c4ec4','verified','508938','2025-09-20 09:11:52');
INSERT INTO ods VALUES('885','0000000000','199962','92R','68ce229216c2b','verified','','2025-09-20 09:12:10');
INSERT INTO ods VALUES('886','0000000000','506981','003','68ce22b0dfbfc','verified','','2025-09-20 09:12:40');
INSERT INTO ods VALUES('887','','765883','FG032','68ce24127369c','verified','','2025-09-20 09:18:34');
INSERT INTO ods VALUES('888','','334111','rhodium','68ce241be2667','verified','334111','2025-09-20 09:18:43');
INSERT INTO ods VALUES('889','','783846','rhodium','68ce241bf06b5','verified','783846','2025-09-20 09:18:43');
INSERT INTO ods VALUES('890','','416769','92r','68ce263609091','verified','416769','2025-09-20 09:27:42');
INSERT INTO ods VALUES('891','','812547','filling','68ce266ad5e87','verified','812547','2025-09-20 09:28:34');
INSERT INTO ods VALUES('892','','382065','filling','68ce26b7a71ae','verified','382065','2025-09-20 09:29:51');
INSERT INTO ods VALUES('893','','384612','100','68ce27746c32e','verified','384612','2025-09-20 09:33:00');
INSERT INTO ods VALUES('894','','749112','995','68ce2790eef08','verified','749112','2025-09-20 09:33:28');
INSERT INTO ods VALUES('895','','337202','100','68ce279ad5a77','verified','337202','2025-09-20 09:33:38');
INSERT INTO ods VALUES('896','','415281','995','68ce27af89358','verified','415281','2025-09-20 09:33:59');
INSERT INTO ods VALUES('897','','110450','100','68ce27e4c97fd','verified','110450','2025-09-20 09:34:52');
INSERT INTO ods VALUES('898','','953331','92r','68ce29ab22950','verified','953331','2025-09-20 09:42:27');
INSERT INTO ods VALUES('899','','561902','100','68ce29b4cdc03','verified','561902','2025-09-20 09:42:36');
INSERT INTO ods VALUES('900','','666167','995','68ce29bf23afb','verified','666167','2025-09-20 09:42:47');
INSERT INTO ods VALUES('901','0000000000','686797','003','68ce2a6197832','verified','','2025-09-20 09:45:29');
INSERT INTO ods VALUES('902','','729805','100','68ce2a7c70d51','verified','729805','2025-09-20 09:45:56');
INSERT INTO ods VALUES('903','0000000000','818072','FG101','68ce2abe45e83','verified','','2025-09-20 09:47:02');
INSERT INTO ods VALUES('904','','168560','Rawa','68ce2b20093d4','verified','168560','2025-09-20 09:48:40');
INSERT INTO ods VALUES('905','','926315','FG099','68ce2b529dd27','verified','','2025-09-20 09:49:30');
INSERT INTO ods VALUES('906','0000000000','697112','SideLevel','68ce2c670b7f8','verified','','2025-09-20 09:54:07');
INSERT INTO ods VALUES('907','','290303','Fg091','68ce2c69c48dc','verified','290303','2025-09-20 09:54:09');
INSERT INTO ods VALUES('908','0000000000','860909','SideLevel','68ce2c7455df6','verified','','2025-09-20 09:54:20');
INSERT INTO ods VALUES('909','','655144','995','68ce2cf227fc3','verified','655144','2025-09-20 09:56:26');
INSERT INTO ods VALUES('910','','299195','92r','68ce2d4369360','verified','299195','2025-09-20 09:57:47');
INSERT INTO ods VALUES('911','0000000000','332265','100','68ce2d8221cd7','verified','','2025-09-20 09:58:50');
INSERT INTO ods VALUES('912','','657081','995','68ce2dff240f9','verified','657081','2025-09-20 10:00:55');
INSERT INTO ods VALUES('913','','841248','92r','68ce2e072cefb','verified','841248','2025-09-20 10:01:03');
INSERT INTO ods VALUES('914','0000000000','371148','Unaccounted','68ce2e1a72a0e','verified','','2025-09-20 10:01:22');
INSERT INTO ods VALUES('915','','825711','995','68ce2f046efb2','verified','825711','2025-09-20 10:05:16');
INSERT INTO ods VALUES('916','0000000','655416','Manual','68ce2f18c2f83','verified','','2025-09-20 10:05:36');
INSERT INTO ods VALUES('917','','764705','92r','68ce2f358a411','verified','764705','2025-09-20 10:06:05');
INSERT INTO ods VALUES('918','6373999','794481','Filling','68ce2fa393640','verified','','2025-09-20 10:07:55');
INSERT INTO ods VALUES('919','6373999','781200','Filling','68ce2fb90b2e2','verified','','2025-09-20 10:08:17');
INSERT INTO ods VALUES('920','0000000000','588827','SideLevel','68ce2fbee074e','verified','','2025-09-20 10:08:22');
INSERT INTO ods VALUES('921','0000000000','400927','003','68ce2ffcb6b4c','verified','','2025-09-20 10:09:24');
INSERT INTO ods VALUES('922','0000000000','354978','SideLevel','68ce303adb94f','verified','','2025-09-20 10:10:26');
INSERT INTO ods VALUES('923','0000000000','793422','003','68ce3189d84c7','verified','','2025-09-20 10:16:01');
INSERT INTO ods VALUES('924','','379273','003','68ce323e69b90','verified','379273','2025-09-20 10:19:02');
INSERT INTO ods VALUES('925','','460849','FG146','68ce323f6874d','verified','460849','2025-09-20 10:19:03');
INSERT INTO ods VALUES('926','','509674','FG137','68ce32edef262','verified','509674','2025-09-20 10:21:57');
INSERT INTO ods VALUES('927','0000000000','631073','FG137','68ce32ff88a26','verified','','2025-09-20 10:22:15');
INSERT INTO ods VALUES('928','0000000000','729940','SideLevel','68ce33181ffb4','verified','','2025-09-20 10:22:40');
INSERT INTO ods VALUES('929','','133843','FG032','68ce3322de342','verified','','2025-09-20 10:22:50');
INSERT INTO ods VALUES('930','','348743','FG137','68ce335488a66','verified','348743','2025-09-20 10:23:40');
INSERT INTO ods VALUES('931','0000000000','697544','003','68ce33b01eacf','verified','','2025-09-20 10:25:12');
INSERT INTO ods VALUES('932','','571826','FG032','68ce33ff6a23b','verified','','2025-09-20 10:26:31');
INSERT INTO ods VALUES('933','0000000000','770066','995','68ce3428c2da0','verified','','2025-09-20 10:27:12');
INSERT INTO ods VALUES('934','0000000000','936037','Packing','68ce3435b43f1','verified','','2025-09-20 10:27:25');
INSERT INTO ods VALUES('935','0000000000','751519','100','68ce345ce64a9','verified','','2025-09-20 10:28:04');
INSERT INTO ods VALUES('936','0000000000','838698','92R','68ce347015cc9','verified','','2025-09-20 10:28:24');
INSERT INTO ods VALUES('937','0000000000','643807','Alloy','68ce34caa3c48','verified','','2025-09-20 10:29:54');
INSERT INTO ods VALUES('938','0000000000','425506','FG137','68ce351a5d2d1','verified','','2025-09-20 10:31:14');
INSERT INTO ods VALUES('939','0000000000','662091','995','68ce358f2866a','verified','','2025-09-20 10:33:11');
INSERT INTO ods VALUES('940','0000000000','285864','100','68ce35a6a5ae4','verified','','2025-09-20 10:33:34');
INSERT INTO ods VALUES('941','0000000000','673168','92R','68ce35cce54f0','verified','','2025-09-20 10:34:12');
INSERT INTO ods VALUES('942','0000000000','834820','FG137','68ce35d5aeb3a','verified','','2025-09-20 10:34:21');
INSERT INTO ods VALUES('943','0000000000','671912','Alloy','68ce363b1e289','verified','','2025-09-20 10:36:03');
INSERT INTO ods VALUES('944','0000000000','847996','995','68ce368a9b203','verified','','2025-09-20 10:37:22');
INSERT INTO ods VALUES('945','','738089','filling','68ce36fe8dc0c','verified','738089','2025-09-20 10:39:18');
INSERT INTO ods VALUES('946','0000000000','722424','100','68ce37058ad34','verified','','2025-09-20 10:39:25');
INSERT INTO ods VALUES('947','0000000000','347680','92R','68ce377b6b9dc','verified','','2025-09-20 10:41:23');
INSERT INTO ods VALUES('948','0000000000','423423','Alloy','68ce37de46f42','verified','','2025-09-20 10:43:02');
INSERT INTO ods VALUES('949','7894561230','298202','FG001','68ce383e8844b','verified','','2025-09-20 10:44:38');
INSERT INTO ods VALUES('950','0000000000','934144','92R','68ce398c59825','verified','','2025-09-20 10:50:12');
INSERT INTO ods VALUES('951','7894561230','873115','FG001','68ce3a39e1429','verified','','2025-09-20 10:53:05');
INSERT INTO ods VALUES('952','0000000000','446423','FG137','68ce3b55ab632','verified','','2025-09-20 10:57:49');
INSERT INTO ods VALUES('953','','552765','FG137','68ce3b879d89f','verified','552765','2025-09-20 10:58:39');
INSERT INTO ods VALUES('954','','552979','laser','68ce43a48e5dd','verified','552979','2025-09-20 11:33:16');
INSERT INTO ods VALUES('955','','561197','FG137','68ce43fbca830','verified','561197','2025-09-20 11:34:43');
INSERT INTO ods VALUES('956','','458056','COMPONENTS','68ce44d687d81','verified','458056','2025-09-20 11:38:22');
INSERT INTO ods VALUES('957','','676052','FG137','68ce455d80c1b','verified','676052','2025-09-20 11:40:37');
INSERT INTO ods VALUES('958','','273630','92r','68ce48066db7b','verified','273630','2025-09-20 11:51:58');
INSERT INTO ods VALUES('959','0000000000','908176','FG137','68ce4a6e06c87','verified','','2025-09-20 12:02:14');
INSERT INTO ods VALUES('960','0000000000','723609','FG137','68ce4ab4a7c06','verified','','2025-09-20 12:03:24');
INSERT INTO ods VALUES('961','','771098','filling','68ce4b2398115','verified','771098','2025-09-20 12:05:15');
INSERT INTO ods VALUES('962','000','866933','rhodium','68ce4c1b96c3e','verified','','2025-09-20 12:09:23');
INSERT INTO ods VALUES('963','6373999','618299','Filling','68ce4d84905fa','verified','','2025-09-20 12:15:24');
INSERT INTO ods VALUES('964','6373999','293496','Filling','68ce50552b8dd','verified','','2025-09-20 12:27:25');
INSERT INTO ods VALUES('965','','730738','FG137','68ce50819fd31','verified','730738','2025-09-20 12:28:09');
INSERT INTO ods VALUES('966','0000000000','742601','FG137','68ce523abb289','verified','','2025-09-20 12:35:30');
INSERT INTO ods VALUES('967','','315166','Rawa','68ce5435d97e6','verified','','2025-09-20 12:43:57');
INSERT INTO ods VALUES('968','','731582','Rawa','68ce55d5114e8','verified','','2025-09-20 12:50:53');
INSERT INTO ods VALUES('969','','686971','FG137','68ce56977e6cd','verified','686971','2025-09-20 12:54:07');
INSERT INTO ods VALUES('970','','751979','Rawa','68ce5a9e08018','verified','','2025-09-20 13:11:18');
INSERT INTO ods VALUES('971','7894561230','806351','FG010','68ce5f4e36163','verified','','2025-09-20 13:31:18');
INSERT INTO ods VALUES('972','','967943','pairing','68ce629ea3117','verified','967943','2025-09-20 13:45:26');
INSERT INTO ods VALUES('973','6373999','703366','Filling','68ce62ec5f847','verified','','2025-09-20 13:46:44');
INSERT INTO ods VALUES('974','','204724','FG032','68ce6c54c091a','verified','204724','2025-09-20 14:26:52');
INSERT INTO ods VALUES('975','','995114','100','68ce6fb13431b','verified','995114','2025-09-20 14:41:13');
INSERT INTO ods VALUES('976','','332908','pairing','68ce6fbca6f86','verified','332908','2025-09-20 14:41:24');
INSERT INTO ods VALUES('977','','401846','92r','68ce6fcb030e6','verified','401846','2025-09-20 14:41:39');
INSERT INTO ods VALUES('978','','625417','100','68ce70614282e','verified','625417','2025-09-20 14:44:09');
INSERT INTO ods VALUES('979','','579927','92r','68ce70d4bbcfb','verified','579927','2025-09-20 14:46:04');
INSERT INTO ods VALUES('980','','843215','100','68ce71433907e','verified','843215','2025-09-20 14:47:55');
INSERT INTO ods VALUES('981','','392828','100','68ce717d148ad','verified','392828','2025-09-20 14:48:53');
INSERT INTO ods VALUES('982','','994470','92r','68ce71ad0f88e','verified','994470','2025-09-20 14:49:41');
INSERT INTO ods VALUES('983','6373999','176925','Filling','68ce77982770f','verified','','2025-09-20 15:14:56');
INSERT INTO ods VALUES('984','0000000000','716147','995','68ce791034033','verified','','2025-09-20 15:21:12');
INSERT INTO ods VALUES('985','0000000000','868359','100','68ce791a85058','verified','','2025-09-20 15:21:22');
INSERT INTO ods VALUES('986','0000000000','148846','92R','68ce7948e582c','verified','','2025-09-20 15:22:08');
INSERT INTO ods VALUES('987','0000000000','670267','Alloy','68ce798c17594','verified','','2025-09-20 15:23:16');
INSERT INTO ods VALUES('988','','503629','FG137','68ce799cf10fe','verified','503629','2025-09-20 15:23:32');
INSERT INTO ods VALUES('989','7894561230','476808','FG001','68ce79a5152a6','verified','','2025-09-20 15:23:41');
INSERT INTO ods VALUES('990','','858518','FG137','68ce7bba8c77c','verified','858518','2025-09-20 15:32:34');
INSERT INTO ods VALUES('991','','932586','laser','68ce7e454fe3e','verified','932586','2025-09-20 15:43:25');
INSERT INTO ods VALUES('992','','460526','FG137','68ce81f717368','verified','460526','2025-09-20 15:59:11');
INSERT INTO ods VALUES('993','','601929','FG001','68ce8384be4c6','verified','601929','2025-09-20 16:05:48');
INSERT INTO ods VALUES('994','','199012','FG137','68ce83c516e0d','verified','199012','2025-09-20 16:06:53');
INSERT INTO ods VALUES('995','','992051','FG137','68ce84f651bdf','verified','992051','2025-09-20 16:11:58');
INSERT INTO ods VALUES('996','0000000000','258183','FG137','68ce86de2dab1','verified','','2025-09-20 16:20:06');
INSERT INTO ods VALUES('997','0000000000','601771','100','68ce884dab049','verified','','2025-09-20 16:26:13');
INSERT INTO ods VALUES('998','7894561230','825027','FG001','68ce886f978d2','verified','','2025-09-20 16:26:47');
INSERT INTO ods VALUES('999','','204725','pairing','68ce898b1fcee','verified','204725','2025-09-20 16:31:31');
INSERT INTO ods VALUES('1000','','386301','rhodium','68ce8d052ab3a','verified','386301','2025-09-20 16:46:21');
INSERT INTO ods VALUES('1001','','115320','FG137','68ce9145863e6','verified','115320','2025-09-20 17:04:29');
INSERT INTO ods VALUES('1002','','326259','FG146','68ce92fd58019','verified','326259','2025-09-20 17:11:49');
INSERT INTO ods VALUES('1003','','975211','FG146','68ce92fd60bc9','verified','975211','2025-09-20 17:11:49');
INSERT INTO ods VALUES('1004','','815335','998','68ce93eaa43af','verified','815335','2025-09-20 17:15:46');
INSERT INTO ods VALUES('1005','','583668','rhodium','68ce97fc02e3b','verified','583668','2025-09-20 17:33:08');
INSERT INTO ods VALUES('1006','','548528','100','68ce992fd67b1','verified','548528','2025-09-20 17:38:15');
INSERT INTO ods VALUES('1007','','571618','rhodium','68ce9af806c50','verified','571618','2025-09-20 17:45:52');
INSERT INTO ods VALUES('1008','','971692','003','68d0ccef4485b','verified','971692','2025-09-22 09:43:35');
INSERT INTO ods VALUES('1009','','564865','FG137','68d0cd4128132','verified','564865','2025-09-22 09:44:57');
INSERT INTO ods VALUES('1010','','286156','rhodium','68d0ce8dccd8b','verified','286156','2025-09-22 09:50:29');
INSERT INTO ods VALUES('1011','','859537','FG146','68d0cef54f07a','verified','859537','2025-09-22 09:52:13');
INSERT INTO ods VALUES('1012','','115037','FG146','68d0cef554eb4','verified','115037','2025-09-22 09:52:13');
INSERT INTO ods VALUES('1013','','776493','FG032','68d0cf2dbbd93','verified','776493','2025-09-22 09:53:09');
INSERT INTO ods VALUES('1014','','909976','filling','68d0d028670d0','verified','909976','2025-09-22 09:57:20');
INSERT INTO ods VALUES('1015','','116486','92R','68d0d17ca46c7','verified','116486','2025-09-22 10:03:00');
INSERT INTO ods VALUES('1016','','153394','FG010','68d0d4af3ed83','verified','153394','2025-09-22 10:16:39');
INSERT INTO ods VALUES('1017','','280822','FG010','68d0d509cb3fc','verified','280822','2025-09-22 10:18:09');
INSERT INTO ods VALUES('1018','','623818','FG137','68d0d815d71b6','verified','623818','2025-09-22 10:31:09');
INSERT INTO ods VALUES('1019','','336171','FG137','68d0db8eb2a0e','verified','336171','2025-09-22 10:45:58');
INSERT INTO ods VALUES('1020','','898603','FG032','68d0e5fe1ffbe','verified','898603','2025-09-22 11:30:30');
INSERT INTO ods VALUES('1021','','576082','003','68d0e9d28b218','verified','576082','2025-09-22 11:46:50');
INSERT INTO ods VALUES('1022','','407739','FG137','68d0eb3c01e0d','verified','407739','2025-09-22 11:52:52');
INSERT INTO ods VALUES('1023','6373999','305472','Filling','68d0ee3867994','verified','','2025-09-22 12:05:36');
INSERT INTO ods VALUES('1024','','183860','FG010','68d0ee6817464','verified','183860','2025-09-22 12:06:24');
INSERT INTO ods VALUES('1025','','224164','pairing','68d0f28b77741','verified','224164','2025-09-22 12:24:03');
INSERT INTO ods VALUES('1026','','178218','FG032','68d11279ead69','verified','178218','2025-09-22 14:40:17');
INSERT INTO ods VALUES('1027','','783875','FG032','68d1203ec11f1','verified','783875','2025-09-22 15:39:02');
INSERT INTO ods VALUES('1028','','441897','laser','68d1264d0b9b2','verified','441897','2025-09-22 16:04:53');
INSERT INTO ods VALUES('1029','','803652','rhodium','68d12d5f44db3','verified','803652','2025-09-22 16:35:03');
INSERT INTO ods VALUES('1030','6373999','587717','Filling','68d139f8d1e82','verified','','2025-09-22 17:28:48');
INSERT INTO ods VALUES('1031','0000000','492569','Manual','68d13b6523a57','verified','','2025-09-22 17:34:53');
INSERT INTO ods VALUES('1032','0000000000','283844','Packing','68d13be5e665a','verified','','2025-09-22 17:37:01');
INSERT INTO ods VALUES('1033','0000000','961245','Manual','68d13bf4b4689','verified','','2025-09-22 17:37:16');
INSERT INTO ods VALUES('1034','6373999','624854','Filling','68d13c411ac5e','verified','','2025-09-22 17:38:33');
INSERT INTO ods VALUES('1035','','767363','100','68d13db1b419d','verified','767363','2025-09-22 17:44:41');
INSERT INTO ods VALUES('1036','','864188','995','68d13dd8bc651','verified','864188','2025-09-22 17:45:20');
INSERT INTO ods VALUES('1037','','399582','FG010','68d20defad4a2','verified','399582','2025-09-23 08:33:11');
INSERT INTO ods VALUES('1038','','267847','003','68d2146433830','verified','267847','2025-09-23 09:00:44');
INSERT INTO ods VALUES('1039','','528165','FG032','68d215079f492','verified','528165','2025-09-23 09:03:27');
INSERT INTO ods VALUES('1040','','837223','rhodium','68d2188d2acfb','verified','837223','2025-09-23 09:18:29');
INSERT INTO ods VALUES('1041','6373999','591640','Filling','68d218ad05891','verified','','2025-09-23 09:19:01');
INSERT INTO ods VALUES('1042','','357122','Fg091','68d22d6563d20','verified','357122','2025-09-23 10:47:25');
INSERT INTO ods VALUES('1043','7894561230','609338','FG010','68d233013aca9','verified','','2025-09-23 11:11:21');
INSERT INTO ods VALUES('1044','','606345','pairing','68d2360a85393','verified','606345','2025-09-23 11:24:18');
INSERT INTO ods VALUES('1045','','624187','FG137','68d23a0e7ddad','verified','624187','2025-09-23 11:41:26');
INSERT INTO ods VALUES('1046','0000000000','194763','003','68d23a884258f','verified','','2025-09-23 11:43:28');
INSERT INTO ods VALUES('1047','7894561230','713453','FG0011','68d23ae26f30b','verified','','2025-09-23 11:44:58');
INSERT INTO ods VALUES('1048','7894561230','983505','FG001','68d23ee8a7e48','verified','','2025-09-23 12:02:08');
INSERT INTO ods VALUES('1049','0000000000','637974','FG101','68d23faa431c3','verified','','2025-09-23 12:05:22');
INSERT INTO ods VALUES('1050','','190963','FG099','68d240cb53b3c','verified','','2025-09-23 12:10:11');
INSERT INTO ods VALUES('1051','7894561230','382731','FG001','68d241196f0ff','verified','','2025-09-23 12:11:29');
INSERT INTO ods VALUES('1052','0000000000','665418','003','68d241dbb2a0c','verified','','2025-09-23 12:14:43');
INSERT INTO ods VALUES('1053','','852313','FG137','68d242ec44ee6','verified','852313','2025-09-23 12:19:16');
INSERT INTO ods VALUES('1054','000','267958','efionaa','68d24399e1080','verified','','2025-09-23 12:22:09');
INSERT INTO ods VALUES('1055','9677447081','302780','indutherm','68d24430dc217','verified','','2025-09-23 12:24:40');
INSERT INTO ods VALUES('1056','9677447081','408825','indutherm','68d2443e65dfb','verified','','2025-09-23 12:24:54');
INSERT INTO ods VALUES('1057','9677447081','369925','melting','68d2444466c77','verified','','2025-09-23 12:25:00');
INSERT INTO ods VALUES('1058','0000000000','827159','tpk','68d24491bed34','verified','','2025-09-23 12:26:17');
INSERT INTO ods VALUES('1059','7894561230','133382','FG0011','68d245168f02d','verified','','2025-09-23 12:28:30');
INSERT INTO ods VALUES('1060','','392957','rhodium','68d24bc619923','verified','392957','2025-09-23 12:57:02');
INSERT INTO ods VALUES('1061','0000000000','351478','003','68d2627c3e2da','verified','','2025-09-23 14:33:56');
INSERT INTO ods VALUES('1062','7894561230','910727','FG010','68d262c58c2ab','verified','','2025-09-23 14:35:09');
INSERT INTO ods VALUES('1063','','630424','FG099','68d262d604a8e','verified','','2025-09-23 14:35:26');
INSERT INTO ods VALUES('1064','7894561230','987911','FG010','68d262ffd3819','verified','','2025-09-23 14:36:07');
INSERT INTO ods VALUES('1065','7894561230','808436','FG001','68d2631657584','verified','','2025-09-23 14:36:30');
INSERT INTO ods VALUES('1066','0000000000','797353','FG101','68d263528f059','verified','','2025-09-23 14:37:30');
INSERT INTO ods VALUES('1067','9677447081','593734','melting','68d263a886035','verified','','2025-09-23 14:38:56');
INSERT INTO ods VALUES('1068','7894561230','369292','FG010','68d263b8c3e4f','verified','','2025-09-23 14:39:12');
INSERT INTO ods VALUES('1069','9677447081','595817','melting','68d263ce934b3','verified','','2025-09-23 14:39:34');
INSERT INTO ods VALUES('1070','7894561230','483856','FG010','68d263ff0d928','verified','','2025-09-23 14:40:23');
INSERT INTO ods VALUES('1071','','199884','rhodium','68d26b6497847','verified','199884','2025-09-23 15:11:56');
INSERT INTO ods VALUES('1072','','482436','rhodium','68d365c17113b','verified','482436','2025-09-24 09:00:09');
INSERT INTO ods VALUES('1073','','775275','FG032','68d366bb235b2','verified','775275','2025-09-24 09:04:19');
INSERT INTO ods VALUES('1074','','432007','003','68d3670d16fb7','verified','432007','2025-09-24 09:05:41');
INSERT INTO ods VALUES('1075','9677447081','330083','melting','68d3a09027743','verified','','2025-09-24 13:11:04');
INSERT INTO ods VALUES('1076','7894561230','559778','FG010','68d3a0b2ea9d6','verified','','2025-09-24 13:11:38');
INSERT INTO ods VALUES('1077','9677447081','761721','indutherm','68d3a0e3f207c','verified','','2025-09-24 13:12:27');
INSERT INTO ods VALUES('1078','7894561230','159452','FG0011','68d3a1286d3f3','verified','','2025-09-24 13:13:36');
INSERT INTO ods VALUES('1079','','764121','FG010','68d3a69b0a49d','verified','764121','2025-09-24 13:36:51');
INSERT INTO ods VALUES('1080','','971969','FG001','68d3b39b01d71','verified','971969','2025-09-24 14:32:19');
INSERT INTO ods VALUES('1081','','536175','FG001','68d3b7223bfeb','verified','536175','2025-09-24 14:47:22');
INSERT INTO ods VALUES('1082','','238294','FG010','68d3bc9cdc712','verified','238294','2025-09-24 15:10:44');
INSERT INTO ods VALUES('1083','','616494','ENAMEL','68d3c9d46225c','verified','616494','2025-09-24 16:07:08');
INSERT INTO ods VALUES('1084','9677447081','376142','indutherm','68d3f582072e5','verified','','2025-09-24 19:13:30');
INSERT INTO ods VALUES('1085','0000000000','301194','Unaccounted','68d3f58908e7a','verified','','2025-09-24 19:13:37');
INSERT INTO ods VALUES('1086','7894561230','995118','FG001','68d4127f02e0e','verified','','2025-09-24 21:17:11');
INSERT INTO ods VALUES('1087','9677447081','531382','indutherm','68d42e1362d57','verified','','2025-09-24 23:14:51');
INSERT INTO ods VALUES('1088','7894561230','123494','FG001','68d4bc7e8710a','verified','','2025-09-25 09:22:30');
INSERT INTO ods VALUES('1089','0000000000','522058','FG146','68d4bcfe69589','verified','','2025-09-25 09:24:38');
INSERT INTO ods VALUES('1090','7894561230','369259','FG001','68d4bd638c076','verified','','2025-09-25 09:26:19');
INSERT INTO ods VALUES('1091','0000000000','302304','FG101','68d4bd70b082b','verified','','2025-09-25 09:26:32');
INSERT INTO ods VALUES('1092','97845612','891991','stoneset','68d4beb95c905','verified','','2025-09-25 09:32:01');
INSERT INTO ods VALUES('1093','7894561230','579466','FG001','68d4bfc1b3eac','verified','','2025-09-25 09:36:25');
INSERT INTO ods VALUES('1094','0000000000','571173','FG101','68d4c1cf0382d','verified','','2025-09-25 09:45:11');
INSERT INTO ods VALUES('1095','0000000000','499704','FG101','68d4c297ddde5','verified','','2025-09-25 09:48:31');
INSERT INTO ods VALUES('1096','7894561230','128984','FG001','68d4c37f4bc2e','verified','','2025-09-25 09:52:23');
INSERT INTO ods VALUES('1097','9677447081','604734','indutherm','68d4c555551c8','verified','','2025-09-25 10:00:13');
INSERT INTO ods VALUES('1098','9677447081','245481','indutherm','68d4caf4350cd','verified','','2025-09-25 10:24:12');
INSERT INTO ods VALUES('1099','0000000000','162815','FG101','68d4cf3f6fc0c','verified','','2025-09-25 10:42:31');
INSERT INTO ods VALUES('1100','7894561230','713981','FG001','68d4d09e7efaa','verified','','2025-09-25 10:48:22');
INSERT INTO ods VALUES('1101','','378813','s1234','68d4d5739fa46','verified','378813','2025-09-25 11:08:59');
INSERT INTO ods VALUES('1102','0000000000','643410','FG101','68d4d7184bd42','verified','','2025-09-25 11:16:00');
INSERT INTO ods VALUES('1103','7894561230','694794','FG001','68d4d92919edc','verified','','2025-09-25 11:24:49');
INSERT INTO ods VALUES('1104','0000000000','805968','FG101','68d4e1f98b6fb','verified','','2025-09-25 12:02:25');
INSERT INTO ods VALUES('1105','0000000000','471242','FG101','68d4e4626bbc2','verified','','2025-09-25 12:12:42');
INSERT INTO ods VALUES('1106','7894561230','638622','FG001','68d4e53db2246','verified','','2025-09-25 12:16:21');
INSERT INTO ods VALUES('1107','9677447081','852782','indutherm','68d4e5ae314cd','verified','','2025-09-25 12:18:14');
INSERT INTO ods VALUES('1108','9677447081','234350','melting','68d4e5c6cd8ba','verified','','2025-09-25 12:18:38');
INSERT INTO ods VALUES('1109','7894561230','708731','FG001','68d4e66abc253','verified','','2025-09-25 12:21:22');
INSERT INTO ods VALUES('1110','7894561230','823346','FG010','68d4e68ee452d','verified','','2025-09-25 12:21:58');
INSERT INTO ods VALUES('1111','0000000000','636903','Polish','68d4e6c1abf38','verified','','2025-09-25 12:22:49');
INSERT INTO ods VALUES('1112','7894561230','271989','FG001','68d4e6edb7221','verified','','2025-09-25 12:23:33');
INSERT INTO ods VALUES('1113','9677447081','958940','indutherm','68d4e7848445a','verified','','2025-09-25 12:26:04');
INSERT INTO ods VALUES('1114','7894561230','920549','FG001','68d4e7a14d403','verified','','2025-09-25 12:26:33');
INSERT INTO ods VALUES('1115','9677447081','452048','indutherm','68d4e7cfb749a','verified','','2025-09-25 12:27:19');
INSERT INTO ods VALUES('1116','9677447081','641587','indutherm','68d4e80744e73','verified','','2025-09-25 12:28:15');
INSERT INTO ods VALUES('1117','7894561230','468748','FG001','68d4e887e0b03','verified','','2025-09-25 12:30:23');
INSERT INTO ods VALUES('1118','7894561230','757769','FG001','68d4e92271664','verified','','2025-09-25 12:32:58');
INSERT INTO ods VALUES('1119','7894561230','882266','FG001','68d4e9233910d','verified','','2025-09-25 12:32:59');
INSERT INTO ods VALUES('1120','7894561230','799186','FG001','68d4e924048e3','verified','','2025-09-25 12:33:00');
INSERT INTO ods VALUES('1121','7894561230','319197','FG001','68d4e924be142','verified','','2025-09-25 12:33:00');
INSERT INTO ods VALUES('1122','7894561230','634718','FG001','68d4e9260e59a','verified','','2025-09-25 12:33:02');
INSERT INTO ods VALUES('1123','7894561230','536306','FG001','68d4e92682f18','verified','','2025-09-25 12:33:02');
INSERT INTO ods VALUES('1124','0000000000','730971','FG101','68d4e9ca79560','verified','','2025-09-25 12:35:46');
INSERT INTO ods VALUES('1125','7894561230','680746','FG001','68d4e9ea31d03','verified','','2025-09-25 12:36:18');
INSERT INTO ods VALUES('1126','0000000000','874842','FG101','68d4ea4c584ae','verified','','2025-09-25 12:37:56');
INSERT INTO ods VALUES('1127','7894561230','686092','FG001','68d4ea65ed0c6','verified','','2025-09-25 12:38:21');
INSERT INTO ods VALUES('1128','','762148','Rawa','68d4ed9cf389e','verified','','2025-09-25 12:52:04');
INSERT INTO ods VALUES('1129','7894561230','690868','FG001','68d4edf36f6e6','verified','','2025-09-25 12:53:31');
INSERT INTO ods VALUES('1130','1234567890','189359','s1234','68d4efb466c95','verified','','2025-09-25 13:01:00');
INSERT INTO ods VALUES('1131','97845612','278870','stoneset','68d4f156b3a6e','verified','','2025-09-25 13:07:58');
INSERT INTO ods VALUES('1132','7894561230','858776','FG001','68d4fab38d20d','verified','','2025-09-25 13:47:55');
INSERT INTO ods VALUES('1133','9677447081','781879','indutherm','68d4fd56700af','verified','','2025-09-25 13:59:10');
INSERT INTO ods VALUES('1134','7894561230','383351','FG001','68d4fd67dd0de','verified','','2025-09-25 13:59:27');
INSERT INTO ods VALUES('1135','9677447081','978518','indutherm','68d4fd9143d11','verified','','2025-09-25 14:00:09');
INSERT INTO ods VALUES('1136','7894561230','447540','FG001','68d4fdabc52c6','verified','','2025-09-25 14:00:35');
INSERT INTO ods VALUES('1137','9677447081','473622','indutherm','68d4fdbf47841','verified','','2025-09-25 14:00:55');
INSERT INTO ods VALUES('1138','9677447081','419990','indutherm','68d508689a161','verified','','2025-09-25 14:46:24');
INSERT INTO ods VALUES('1139','7894561230','900769','FG001','68d5087d6fcc9','verified','','2025-09-25 14:46:45');
INSERT INTO ods VALUES('1140','0000000000','531413','FG101','68d509495390a','verified','','2025-09-25 14:50:09');
INSERT INTO ods VALUES('1141','7894561230','493332','FG001','68d5097f1a284','verified','','2025-09-25 14:51:03');
INSERT INTO ods VALUES('1142','7894561230','506495','FG001','68d50ab3d351f','verified','','2025-09-25 14:56:11');
INSERT INTO ods VALUES('1143','9677447081','933710','indutherm','68d50b0f5c4ab','verified','','2025-09-25 14:57:43');
INSERT INTO ods VALUES('1144','7894561230','608057','FG001','68d50b4a79272','verified','','2025-09-25 14:58:42');
INSERT INTO ods VALUES('1145','7894561230','788573','FG001','68d5256d881d5','verified','','2025-09-25 16:50:13');
INSERT INTO ods VALUES('1146','0000000000','768588','FG101','68d525892b062','verified','','2025-09-25 16:50:41');
INSERT INTO ods VALUES('1147','7894561230','327198','FG001','68d525a315452','verified','','2025-09-25 16:51:07');
INSERT INTO ods VALUES('1148','7894561230','907718','FG001','68d5271d0a82f','verified','','2025-09-25 16:57:25');
INSERT INTO ods VALUES('1149','0000000000','922274','FG101','68d5272fd15b9','verified','','2025-09-25 16:57:43');
INSERT INTO ods VALUES('1150','7894561230','712693','FG001','68d5274ef145d','verified','','2025-09-25 16:58:14');
INSERT INTO ods VALUES('1151','0000000000','731530','FG101','68d52764f3ebe','verified','','2025-09-25 16:58:36');
INSERT INTO ods VALUES('1152','7894561230','829971','FG001','68d52775df508','verified','','2025-09-25 16:58:53');
INSERT INTO ods VALUES('1153','7894561230','721704','FG001','68d527ba7863b','verified','','2025-09-25 17:00:02');
INSERT INTO ods VALUES('1154','7894561230','187709','FG001','68d527beece2e','verified','','2025-09-25 17:00:06');
INSERT INTO ods VALUES('1155','0000000000','887658','FG101','68d5284612770','verified','','2025-09-25 17:02:22');
INSERT INTO ods VALUES('1156','7894561230','423933','FG001','68d52876ae53d','verified','','2025-09-25 17:03:10');
INSERT INTO ods VALUES('1157','0000000000','819023','FG101','68d528b2310e2','verified','','2025-09-25 17:04:10');
INSERT INTO ods VALUES('1158','7894561230','964574','FG001','68d529fceb5a1','verified','','2025-09-25 17:09:40');
INSERT INTO ods VALUES('1159','9677447081','590537','indutherm','68d52bc9666de','verified','','2025-09-25 17:17:21');
INSERT INTO ods VALUES('1160','7894561230','255507','FG001','68d52bff8916f','verified','','2025-09-25 17:18:15');
INSERT INTO ods VALUES('1161','0000000000','578487','FG101','68d52c8ebe4b2','verified','','2025-09-25 17:20:38');
INSERT INTO ods VALUES('1162','7894561230','264418','FG001','68d52de5953da','verified','','2025-09-25 17:26:21');
INSERT INTO ods VALUES('1163','9677447081','775494','indutherm','68d52ff31a836','verified','','2025-09-25 17:35:07');
INSERT INTO ods VALUES('1164','7894561230','996286','FG001','68d5301c0cb8d','verified','','2025-09-25 17:35:48');
INSERT INTO ods VALUES('1165','0000000000','547433','FG101','68d5307e184fd','verified','','2025-09-25 17:37:26');
INSERT INTO ods VALUES('1166','7894561230','501415','FG001','68d5309d4657f','verified','','2025-09-25 17:37:57');
INSERT INTO ods VALUES('1167','9677447081','977833','indutherm','68d530db0fd3a','verified','','2025-09-25 17:38:59');
INSERT INTO ods VALUES('1168','7894561230','541213','FG001','68d53129609b6','verified','','2025-09-25 17:40:17');
INSERT INTO ods VALUES('1169','9677447081','547406','indutherm','68d5317f78eaa','verified','','2025-09-25 17:41:43');
INSERT INTO ods VALUES('1170','7894561230','318808','FG010','68d531a5f0173','verified','','2025-09-25 17:42:21');
INSERT INTO ods VALUES('1171','0000000000','703035','FG146','68d531e322874','verified','','2025-09-25 17:43:23');
INSERT INTO ods VALUES('1172','97845612','548676','stoneset','68d53225d0708','verified','','2025-09-25 17:44:29');
INSERT INTO ods VALUES('1173','0000000000','143446','Components','68d53307b968a','verified','','2025-09-25 17:48:15');
INSERT INTO ods VALUES('1174','98745627','693710','laser','68d5355aa7139','verified','','2025-09-25 17:58:10');
INSERT INTO ods VALUES('1175','7894561230','617745','FG001','68d535da04aec','verified','','2025-09-25 18:00:18');
INSERT INTO ods VALUES('1176','97845612','255241','stoneset','68d53e24c98b0','verified','','2025-09-25 18:35:40');
INSERT INTO ods VALUES('1177','9677447081','556507','melting','68d541f3bf846','verified','','2025-09-25 18:51:55');
INSERT INTO ods VALUES('1178','9677447081','460967','indutherm','68d542a58248b','verified','','2025-09-25 18:54:53');
INSERT INTO ods VALUES('1179','7894561230','621632','FG010','68d542cfe1eb7','verified','','2025-09-25 18:55:35');
INSERT INTO ods VALUES('1180','98745627','688774','laser','68d54380436f6','verified','','2025-09-25 18:58:32');
INSERT INTO ods VALUES('1181','0000000000','728987','Components','68d5440181639','verified','','2025-09-25 19:00:41');
INSERT INTO ods VALUES('1182','0000000000','662169','FG101','68d6181fc4635','verified','','2025-09-26 10:05:43');
INSERT INTO ods VALUES('1183','7894561230','410594','FG001','68d6188b3ba70','verified','','2025-09-26 10:07:31');
INSERT INTO ods VALUES('1184','9677447081','421119','indutherm','68d619545e1d7','verified','','2025-09-26 10:10:52');
INSERT INTO ods VALUES('1185','7894561230','340484','FG001','68d6198189163','verified','','2025-09-26 10:11:37');
INSERT INTO ods VALUES('1186','09967238516','199384','office','68d62ee19e54e','verified','','2025-09-26 11:42:49');
INSERT INTO ods VALUES('1187','09967238516','434055','FG001','68d62f7c4f57e','verified','','2025-09-26 11:45:24');
INSERT INTO ods VALUES('1188','09967238516','482986','office','68d630735e838','verified','','2025-09-26 11:49:31');
INSERT INTO ods VALUES('1189','09967238516','581245','FG001','68d630e8c52b9','verified','','2025-09-26 11:51:28');
INSERT INTO ods VALUES('1190','09967238516','716633','FG001','68d6312087bba','verified','','2025-09-26 11:52:24');
INSERT INTO ods VALUES('1191','09967238516','480020','office','68d632d14d976','verified','','2025-09-26 11:59:37');
INSERT INTO ods VALUES('1192','9967238516','555121','Components','68d638864212d','verified','','2025-09-26 12:23:58');
INSERT INTO ods VALUES('1193','09967238516','333272','office','68d639819730a','verified','','2025-09-26 12:28:09');
INSERT INTO ods VALUES('1194','09967238516','310262','office','68d639cbc9f9f','verified','','2025-09-26 12:29:23');
INSERT INTO ods VALUES('1195','9967238516','339379','Components','68d639e815491','verified','','2025-09-26 12:29:52');
INSERT INTO ods VALUES('1196','9967238516','232916','Components','68d63a11f0869','verified','','2025-09-26 12:30:33');
INSERT INTO ods VALUES('1197','09967238516','186487','office','68d63a2306de7','verified','','2025-09-26 12:30:51');
INSERT INTO ods VALUES('1198','09967238516','340094','office','68d63a83b707b','verified','','2025-09-26 12:32:27');
INSERT INTO ods VALUES('1199','9967238516','932527','Components','68d640d35ca9b','verified','','2025-09-26 12:59:23');
INSERT INTO ods VALUES('1200','9967238516','540277','stoneset','68d646fb80504','verified','','2025-09-26 13:25:39');
INSERT INTO ods VALUES('1201','09967238516','603354','s4','68d64738f29d3','verified','','2025-09-26 13:26:40');
INSERT INTO ods VALUES('1202','09967238516','120745','FG001','68d647695a7b5','verified','','2025-09-26 13:27:29');
INSERT INTO ods VALUES('1203','09967238516','699389','office','68d64cb113bd0','verified','','2025-09-26 13:50:01');
INSERT INTO ods VALUES('1204','09967238516','781449','FG001','68d64d656823f','verified','','2025-09-26 13:53:01');
INSERT INTO ods VALUES('1205','9967238516','840784','melting','68d65419a080a','verified','','2025-09-26 14:21:37');
INSERT INTO ods VALUES('1206','09967238516','406152','FG001','68d6543b5426a','verified','','2025-09-26 14:22:11');
INSERT INTO ods VALUES('1207','09967238516','489701','office','68d6555c6fe05','verified','','2025-09-26 14:27:00');
INSERT INTO ods VALUES('1208','09967238516','615806','office','68d664e41c333','verified','','2025-09-26 15:33:16');
INSERT INTO ods VALUES('1209','09967238516','392726','FG001','68d664f5ec5c0','verified','','2025-09-26 15:33:33');
INSERT INTO ods VALUES('1210','09967238516','146024','office','68d665cc72d0e','verified','','2025-09-26 15:37:08');
INSERT INTO ods VALUES('1211','09967238516','602643','FG001','68d665dc367f0','verified','','2025-09-26 15:37:24');
INSERT INTO ods VALUES('1212','09967238516','815032','office','68d66618855f7','verified','','2025-09-26 15:38:24');
INSERT INTO ods VALUES('1213','09967238516','694599','FG001','68d66628683c1','verified','','2025-09-26 15:38:40');
INSERT INTO ods VALUES('1214','09967238516','927064','FG001','68d6772b0f3ce','verified','','2025-09-26 16:51:15');
INSERT INTO ods VALUES('1215','9967238516','923420','melting','68d6799b2bfd9','verified','','2025-09-26 17:01:39');
INSERT INTO ods VALUES('1216','09967238516','225569','Manual','68d687c70d298','verified','','2025-09-26 18:02:07');
INSERT INTO ods VALUES('1217','9967238516','364581','melting','68d68da79db3b','verified','','2025-09-26 18:27:11');
INSERT INTO ods VALUES('1218','09967238516','182053','FG001','68d68db6351c1','verified','','2025-09-26 18:27:26');
INSERT INTO ods VALUES('1219','09967238516','419124','FG001','68d6934e4ab18','verified','','2025-09-26 18:51:18');
INSERT INTO ods VALUES('1220','9967238516','345953','melting','68d69926cce52','verified','','2025-09-26 19:16:14');
INSERT INTO ods VALUES('1221','09967238516','145733','FG001','68d69932e84c6','verified','','2025-09-26 19:16:26');
INSERT INTO ods VALUES('1222','09967238516','600985','office','68d69984b6f0c','verified','','2025-09-26 19:17:48');
INSERT INTO ods VALUES('1223','09967238516','608648','FG001','68d69a4b2cc47','verified','','2025-09-26 19:21:07');
INSERT INTO ods VALUES('1224','9967238516','450599','melting','68d69cebbccfd','verified','','2025-09-26 19:32:19');
INSERT INTO ods VALUES('1225','09967238516','913809','FG001','68d69deb15fcf','verified','','2025-09-26 19:36:35');
INSERT INTO ods VALUES('1226','9967238516','302288','melting','68d69e6d09c54','verified','','2025-09-26 19:38:45');
INSERT INTO ods VALUES('1227','09967238516','342732','FG001','68d69e846cd96','verified','','2025-09-26 19:39:08');
INSERT INTO ods VALUES('1228','9967238516','175328','melting','68d69f3379b85','verified','','2025-09-26 19:42:03');
INSERT INTO ods VALUES('1229','09967238516','813673','FG001','68d6a0390de58','verified','','2025-09-26 19:46:25');
INSERT INTO ods VALUES('1230','9967238516','874292','melting','68d6a08c59bf1','verified','','2025-09-26 19:47:48');
INSERT INTO ods VALUES('1231','09967238516','772544','FG001','68d6a1303b3f0','verified','','2025-09-26 19:50:32');
INSERT INTO ods VALUES('1232','9967238516','796992','melting','68d6a169c657d','verified','','2025-09-26 19:51:29');
INSERT INTO ods VALUES('1233','09967238516','355588','FG001','68d6a2aa6059d','verified','','2025-09-26 19:56:50');
INSERT INTO ods VALUES('1234','9967238516','120776','melting','68d6b2c1b6fca','verified','','2025-09-26 21:05:29');
INSERT INTO ods VALUES('1235','09967238516','634793','FG001','68d6b3bb98fe2','verified','','2025-09-26 21:09:39');
INSERT INTO ods VALUES('1236','09967238516','451761','tarpatta','68d6eb15c09c4','verified','','2025-09-27 01:05:49');
INSERT INTO ods VALUES('1237','09967238516','593234','office','68d7752f9cf29','verified','','2025-09-27 10:55:03');
INSERT INTO ods VALUES('1238','09967238516','836385','FG001','68d775a66812d','verified','','2025-09-27 10:57:02');
INSERT INTO ods VALUES('1239','09967238516','377632','FG001','68d7761cecfa6','verified','','2025-09-27 10:59:00');
INSERT INTO ods VALUES('1240','09967238516','331191','office','68d77706b5ce9','verified','','2025-09-27 11:02:54');
INSERT INTO ods VALUES('1241','09967238516','895416','FG001','68d7773e4e248','verified','','2025-09-27 11:03:50');
INSERT INTO ods VALUES('1242','9967238516','524514','indutherm','68d77847f17b1','verified','','2025-09-27 11:08:15');
INSERT INTO ods VALUES('1243','09967238516','665692','FG001','68d77857c825c','verified','','2025-09-27 11:08:31');
INSERT INTO ods VALUES('1244','9967238516','563866','indutherm','68d778e8ee122','verified','','2025-09-27 11:10:56');
INSERT INTO ods VALUES('1245','09967238516','579491','FG001','68d779031fa54','verified','','2025-09-27 11:11:23');
INSERT INTO ods VALUES('1246','09967238516','545573','FG001','68d77be7b3ef5','verified','','2025-09-27 11:23:43');
INSERT INTO ods VALUES('1247','09967238516','392757','office','68d77bf5c5abb','verified','','2025-09-27 11:23:57');
INSERT INTO ods VALUES('1248','09967238516','404360','FG001','68d77c18f0dbc','verified','','2025-09-27 11:24:32');
INSERT INTO ods VALUES('1249','09967238516','807573','FG001','68d77c45ebc84','verified','','2025-09-27 11:25:17');
INSERT INTO ods VALUES('1250','9967238516','149981','indutherm','68d77c8294a31','verified','','2025-09-27 11:26:18');
INSERT INTO ods VALUES('1251','09967238516','891639','FG001','68d77ca8ac5a1','verified','','2025-09-27 11:26:56');
INSERT INTO ods VALUES('1252','09967238516','758993','FG001','68d7855160739','verified','','2025-09-27 12:03:53');
INSERT INTO ods VALUES('1253','09967238516','773337','FG001','68d78a245da7b','verified','','2025-09-27 12:24:28');
INSERT INTO ods VALUES('1254','09967238516','295402','office','68d78cf3af37e','verified','','2025-09-27 12:36:27');
INSERT INTO ods VALUES('1255','09967238516','815680','FG001','68d78f93eff44','verified','','2025-09-27 12:47:39');
INSERT INTO ods VALUES('1256','9967238516','853148','melting','68d790980234d','verified','','2025-09-27 12:52:00');
INSERT INTO ods VALUES('1257','09967238516','585016','FG001','68d790b678b70','verified','','2025-09-27 12:52:30');
INSERT INTO ods VALUES('1258','9967238516','187565','melting','68d7929ccfaf5','verified','','2025-09-27 13:00:36');
INSERT INTO ods VALUES('1259','09967238516','846540','FG001','68d7936a65db3','verified','','2025-09-27 13:04:02');
INSERT INTO ods VALUES('1260','9967238516','308819','melting','68d7937ebcf5b','verified','','2025-09-27 13:04:22');
INSERT INTO ods VALUES('1261','09967238516','784066','FG001','68d79396a24e5','verified','','2025-09-27 13:04:46');
INSERT INTO ods VALUES('1262','9967238516','448810','melting','68d793bc290ad','verified','','2025-09-27 13:05:24');
INSERT INTO ods VALUES('1263','09967238516','592552','tarpatta','68d794687a825','verified','','2025-09-27 13:08:16');
INSERT INTO ods VALUES('1264','09967238516','247856','emrrohit','68d795541db49','verified','','2025-09-27 13:12:12');
INSERT INTO ods VALUES('1265','09967238516','238726','FG001','68d79e632c918','verified','','2025-09-27 13:50:51');
INSERT INTO ods VALUES('1266','9967238516','779561','indutherm','68d79eeb9d325','verified','','2025-09-27 13:53:07');
INSERT INTO ods VALUES('1267','09967238516','442307','FG001','68d79f104a210','verified','','2025-09-27 13:53:44');
INSERT INTO ods VALUES('1268','09967238516','304764','FG001','68d7d1ca2c346','verified','','2025-09-27 17:30:10');
INSERT INTO ods VALUES('1269','09967238516','451707','FG001','68d928ad6282f','verified','','2025-09-28 17:53:09');
INSERT INTO ods VALUES('1270','09967238516','374022','tarpatta','68d9297e8c6f1','verified','','2025-09-28 17:56:38');
INSERT INTO ods VALUES('1271','09967238516','738788','s4','68d9463be50a7','verified','','2025-09-28 19:59:15');
INSERT INTO ods VALUES('1272','09967238516','524279','tarpatta','68d9580b2d854','verified','','2025-09-28 21:15:15');
INSERT INTO ods VALUES('1273','09967238516','247753','tarpatta','68da369c20530','verified','','2025-09-29 13:04:52');
INSERT INTO ods VALUES('1274','09967238516','136184','office','68da395483526','verified','','2025-09-29 13:16:28');
INSERT INTO ods VALUES('1275','09967238516','117887','FG001','68da3a1bf0c8a','verified','','2025-09-29 13:19:47');
INSERT INTO ods VALUES('1276','09967238516','452762','office','68da3a2e30f35','verified','','2025-09-29 13:20:06');
INSERT INTO ods VALUES('1277','09967238516','585035','FG001','68da3a37b3992','verified','','2025-09-29 13:20:15');
INSERT INTO ods VALUES('1278','09967238516','139986','tarpatta','68da408cc5304','verified','','2025-09-29 13:47:16');
INSERT INTO ods VALUES('1279','9967238516','160051','stoneset','68da47001810f','verified','','2025-09-29 14:14:48');
INSERT INTO ods VALUES('1280','09967238516','174707','office','68da4e7431ffd','verified','','2025-09-29 14:46:36');
INSERT INTO ods VALUES('1281','09967238516','706301','office','68da4ea8837fa','verified','','2025-09-29 14:47:28');
INSERT INTO ods VALUES('1282','09967238516','561449','FG001','68da4ebfe5c1d','verified','','2025-09-29 14:47:51');
INSERT INTO ods VALUES('1283','09967238516','484536','office','68da5010140e9','verified','','2025-09-29 14:53:28');
INSERT INTO ods VALUES('1284','09967238516','510638','FG001','68da5048916f5','verified','','2025-09-29 14:54:24');
INSERT INTO ods VALUES('1285','9967238516','480373','indutherm','68da5490396c7','verified','','2025-09-29 15:12:40');
INSERT INTO ods VALUES('1286','09967238516','534717','FG001','68da54a964797','verified','','2025-09-29 15:13:05');
INSERT INTO ods VALUES('1287','09967238516','548081','office','68da54ed4147c','verified','','2025-09-29 15:14:13');
INSERT INTO ods VALUES('1288','09967238516','457564','FG001','68da552bb0ef3','verified','','2025-09-29 15:15:15');
INSERT INTO ods VALUES('1289','9967238516','613564','indutherm','68da562297dc6','verified','','2025-09-29 15:19:22');
INSERT INTO ods VALUES('1290','09967238516','379234','FG001','68da563065c9e','verified','','2025-09-29 15:19:36');
INSERT INTO ods VALUES('1291','9967238516','922033','indutherm','68da56a8a2f0e','verified','','2025-09-29 15:21:36');
INSERT INTO ods VALUES('1292','09967238516','419217','FG001','68da56da4cc57','verified','','2025-09-29 15:22:26');
INSERT INTO ods VALUES('1293','9967238516','841921','indutherm','68da571cc5fa4','verified','','2025-09-29 15:23:32');
INSERT INTO ods VALUES('1294','09967238516','916500','FG001','68da57616be1a','verified','','2025-09-29 15:24:41');
INSERT INTO ods VALUES('1295','9967238516','482850','indutherm','68da578d1c163','verified','','2025-09-29 15:25:25');
INSERT INTO ods VALUES('1296','09967238516','315476','tarpatta','68da57f8c9b97','verified','','2025-09-29 15:27:12');
INSERT INTO ods VALUES('1297','09967238516','532486','Manual','68da5933a04a7','verified','','2025-09-29 15:32:27');
INSERT INTO ods VALUES('1298','09967238516','944831','cnc','68da595822d51','verified','','2025-09-29 15:33:04');
INSERT INTO ods VALUES('1299','09967238516','915293','FG001','68da59922edce','verified','','2025-09-29 15:34:02');
INSERT INTO ods VALUES('1300','09967238516','265951','Polish','68da59bc1d5df','verified','','2025-09-29 15:34:44');
INSERT INTO ods VALUES('1301','09967238516','953733','office','68da59d85c86d','verified','','2025-09-29 15:35:12');
INSERT INTO ods VALUES('1302','09967238516','241793','Polish','68da5a16a6549','verified','','2025-09-29 15:36:14');
INSERT INTO ods VALUES('1303','09967238516','198563','Packing','68da5a6563ad9','verified','','2025-09-29 15:37:33');
INSERT INTO ods VALUES('1304','09967238516','148445','Dispatch','68da5b1545914','verified','','2025-09-29 15:40:29');
INSERT INTO ods VALUES('1305','09967238516','980506','Packing','68da5bab133d9','verified','','2025-09-29 15:42:59');
INSERT INTO ods VALUES('1306','09967238516','741039','Dispatch','68da5c167616a','verified','','2025-09-29 15:44:46');
INSERT INTO ods VALUES('1307','09967238516','921964','Packing','68da5c3bcc647','verified','','2025-09-29 15:45:23');
INSERT INTO ods VALUES('1308','09967238516','270867','office','68da5edc2b02d','verified','','2025-09-29 15:56:36');
INSERT INTO ods VALUES('1309','09967238516','808102','FG001','68da5f08ec76a','verified','','2025-09-29 15:57:20');
INSERT INTO ods VALUES('1310','09967238516','157012','FG001','68da619d735cc','verified','','2025-09-29 16:08:21');
INSERT INTO ods VALUES('1311','09967238516','689827','office','68da6e487beb2','verified','','2025-09-29 17:02:24');
INSERT INTO ods VALUES('1312','09967238516','324511','FG001','68da6e8d44c34','verified','','2025-09-29 17:03:33');
INSERT INTO ods VALUES('1313','9967238516','761810','indutherm','68da6ffc861d8','verified','','2025-09-29 17:09:40');
INSERT INTO ods VALUES('1314','09967238516','827509','tarpatta','68da70debe9fd','verified','','2025-09-29 17:13:26');
INSERT INTO ods VALUES('1315','0000000000','800834','92R','68da70ee244f5','verified','','2025-09-29 17:13:42');
INSERT INTO ods VALUES('1316','09967238516','969718','FG001','68da71168c557','verified','','2025-09-29 17:14:22');
INSERT INTO ods VALUES('1317','0000000000','481041','92R','68da71b22b0d0','verified','','2025-09-29 17:16:58');
INSERT INTO ods VALUES('1318','09967238516','611984','FG001','68da71c7e477e','verified','','2025-09-29 17:17:19');
INSERT INTO ods VALUES('1319','9967238516','485114','stoneset','68da750b525cd','verified','','2025-09-29 17:31:15');
INSERT INTO ods VALUES('1320','09967238516','454133','s4','68da7545ebc95','verified','','2025-09-29 17:32:13');
INSERT INTO ods VALUES('1321','9967238516','289961','Components','68da7558c8e93','verified','','2025-09-29 17:32:32');
INSERT INTO ods VALUES('1322','09967238516','763724','office','68da772677021','verified','','2025-09-29 17:40:14');
INSERT INTO ods VALUES('1323','09967238516','769879','FG001','68da7744e0ac8','verified','','2025-09-29 17:40:44');
INSERT INTO ods VALUES('1324','9967238516','721665','indutherm','68da7785873ee','verified','','2025-09-29 17:41:49');
INSERT INTO ods VALUES('1325','09967238516','674674','s4','68da779f87fc5','verified','','2025-09-29 17:42:15');
INSERT INTO ods VALUES('1326','9967238516','233971','stoneset','68da77df2c6bc','verified','','2025-09-29 17:43:19');
INSERT INTO ods VALUES('1327','9967238516','993291','Components','68da7857f352f','verified','','2025-09-29 17:45:19');
INSERT INTO ods VALUES('1328','9967238516','736817','laser','68da78f85b154','verified','','2025-09-29 17:48:00');
INSERT INTO ods VALUES('1329','09967238516','381299','Packing','68da79fdd77bb','verified','','2025-09-29 17:52:21');
INSERT INTO ods VALUES('1330','9967238516','572123','laser','68da7a178131f','verified','','2025-09-29 17:52:47');
INSERT INTO ods VALUES('1331','09967238516','738644','Packing','68da7a59c1cfc','verified','','2025-09-29 17:53:53');
INSERT INTO ods VALUES('1332','09967238516','918016','s4','68da7a8e84a0e','verified','','2025-09-29 17:54:46');
INSERT INTO ods VALUES('1333','9967238516','564598','stoneset','68da7a9726542','verified','','2025-09-29 17:54:55');
INSERT INTO ods VALUES('1334','09967238516','167631','FG001','68da7ae2c79ee','verified','','2025-09-29 17:56:10');
INSERT INTO ods VALUES('1335','9967238516','452777','stoneset','68da7d295acbe','verified','','2025-09-29 18:05:53');
INSERT INTO ods VALUES('1336','09967238516','964146','FG001','68da7d7a3dd6b','verified','','2025-09-29 18:07:14');
INSERT INTO ods VALUES('1337','09967238516','578496','Packing','68da7d9ab5359','verified','','2025-09-29 18:07:46');
INSERT INTO ods VALUES('1338','9967238516','875359','stoneset','68da7dc946ad1','verified','','2025-09-29 18:08:33');
INSERT INTO ods VALUES('1339','9967238516','140646','Components','68da7e1933d62','verified','','2025-09-29 18:09:53');
INSERT INTO ods VALUES('1340','9967238516','975115','stoneset','68da7e274fcae','verified','','2025-09-29 18:10:07');
INSERT INTO ods VALUES('1341','09967238516','536992','FG001','68da7e610543f','verified','','2025-09-29 18:11:05');
INSERT INTO ods VALUES('1342','09967238516','229834','Packing','68da7f14dc288','verified','','2025-09-29 18:14:04');
INSERT INTO ods VALUES('1343','9967238516','173921','stoneset','68da7fc3a1d86','verified','','2025-09-29 18:16:59');
INSERT INTO ods VALUES('1344','09967238516','794567','FG001','68da808ae71a8','verified','','2025-09-29 18:20:18');
INSERT INTO ods VALUES('1345','9967238516','746610','stoneset','68da8273d6fe4','verified','','2025-09-29 18:28:27');
INSERT INTO ods VALUES('1346','9967238516','388519','Components','68da85e610227','verified','','2025-09-29 18:43:10');
INSERT INTO ods VALUES('1347','9967238516','905011','stoneset','68da8da840542','verified','','2025-09-29 19:16:16');
INSERT INTO ods VALUES('1348','1234567888','651631','test12345','68da8f37e5e9d','verified','','2025-09-29 19:22:55');
INSERT INTO ods VALUES('1349','09967238516','134464','tarpatta','68da8f4c9c56f','verified','','2025-09-29 19:23:16');
INSERT INTO ods VALUES('1350','1234565432','264550','sot123','68da905216a46','verified','','2025-09-29 19:27:38');
INSERT INTO ods VALUES('1351','9967238516','529873','stoneset','68da912974a46','verified','','2025-09-29 19:31:13');
INSERT INTO ods VALUES('1352','09967238516','290048','office','68dabe4f3def5','verified','','2025-09-29 22:43:51');
INSERT INTO ods VALUES('1353','09967238516','820967','office','68db5d31bb9ed','verified','','2025-09-30 10:01:45');
INSERT INTO ods VALUES('1354','09967238516','365670','FG001','68db5e165fb2d','verified','','2025-09-30 10:05:34');
INSERT INTO ods VALUES('1355','09967238516','560965','FG001','68db5e322af44','verified','','2025-09-30 10:06:02');
INSERT INTO ods VALUES('1356','09967238516','229484','office','68db5edfb0098','verified','','2025-09-30 10:08:55');
INSERT INTO ods VALUES('1357','09967238516','651074','office','68db5f385fb6b','verified','','2025-09-30 10:10:24');
INSERT INTO ods VALUES('1358','09967238516','577062','office','68db5fa293d6a','verified','','2025-09-30 10:12:10');
INSERT INTO ods VALUES('1359','09967238516','856253','FG001','68db5fd49b0e5','verified','','2025-09-30 10:13:00');
INSERT INTO ods VALUES('1360','09967238516','641180','office','68db60057af13','verified','','2025-09-30 10:13:49');
INSERT INTO ods VALUES('1361','09967238516','519496','office','68db618c3bcff','verified','','2025-09-30 10:20:20');
INSERT INTO ods VALUES('1362','09967238516','183813','FG001','68db619242792','verified','','2025-09-30 10:20:26');
INSERT INTO ods VALUES('1363','09967238516','331357','FG001','68db61b77a365','verified','','2025-09-30 10:21:03');
INSERT INTO ods VALUES('1364','09967238516','273533','office','68db61f2cd139','verified','','2025-09-30 10:22:02');
INSERT INTO ods VALUES('1365','09967238516','172060','FG001','68db623c089db','verified','','2025-09-30 10:23:16');
INSERT INTO ods VALUES('1366','1234567888','701643','test12345','68db65dc20ac7','verified','','2025-09-30 10:38:44');
INSERT INTO ods VALUES('1367','1234567888','899549','test12345','68db65ecd4f66','verified','','2025-09-30 10:39:00');
INSERT INTO ods VALUES('1368','09967238516','215678','office','68db663fc829c','verified','','2025-09-30 10:40:23');
INSERT INTO ods VALUES('1369','09967238516','388618','office','68db66c6ecbbb','verified','','2025-09-30 10:42:38');
INSERT INTO ods VALUES('1370','09967238516','396549','FG001','68db698c8ec08','verified','','2025-09-30 10:54:28');
INSERT INTO ods VALUES('1371','09967238516','862250','FG001','68db69dde0e31','verified','','2025-09-30 10:55:49');
INSERT INTO ods VALUES('1372','09967238516','960704','office','68db896090e46','verified','','2025-09-30 13:10:16');
INSERT INTO ods VALUES('1373','09967238516','447865','office','68db8dec96771','verified','','2025-09-30 13:29:40');
INSERT INTO ods VALUES('1374','09967238516','461367','FG001','68db8e72ae82b','verified','','2025-09-30 13:31:54');
INSERT INTO ods VALUES('1375','09967238516','471349','office','68dba4fc48cac','verified','','2025-09-30 15:08:04');
INSERT INTO ods VALUES('1376','09967238516','406103','FG001','68dba532439b8','verified','','2025-09-30 15:08:58');
INSERT INTO ods VALUES('1377','09967238516','653364','office','68dba619624ec','verified','','2025-09-30 15:12:49');
INSERT INTO ods VALUES('1378','09967238516','667988','office','68dbaa1e6e13a','verified','','2025-09-30 15:29:58');
INSERT INTO ods VALUES('1379','09967238516','552153','office','68dbb050b3ca8','verified','','2025-09-30 15:56:24');
INSERT INTO ods VALUES('1380','09967238516','443647','FG001','68dbb076e6100','verified','','2025-09-30 15:57:02');
INSERT INTO ods VALUES('1381','09967238516','464112','office','68dbb09a09f07','verified','','2025-09-30 15:57:38');
INSERT INTO ods VALUES('1382','09967238516','965540','FG001','68dbb0d02b975','verified','','2025-09-30 15:58:32');
INSERT INTO ods VALUES('1383','9967238516','314988','stoneset','68dbb10285aad','verified','','2025-09-30 15:59:22');
INSERT INTO ods VALUES('1384','09967238516','970620','FG001','68dbb112a075a','verified','','2025-09-30 15:59:38');
INSERT INTO ods VALUES('1385','9967238516','550826','indutherm','68dbb16886aea','verified','','2025-09-30 16:01:04');
INSERT INTO ods VALUES('1386','09967238516','279793','FG001','68dbb17d66ca9','verified','','2025-09-30 16:01:25');
INSERT INTO ods VALUES('1387','9967238516','952182','indutherm','68dbb1957cd8c','verified','','2025-09-30 16:01:49');
INSERT INTO ods VALUES('1388','09967238516','271087','tarpatta','68dbb1bd98fde','verified','','2025-09-30 16:02:29');
INSERT INTO ods VALUES('1389','09967238516','318719','s4','68dbb1e0d6ebc','verified','','2025-09-30 16:03:04');
INSERT INTO ods VALUES('1390','9967238516','837061','stoneset','68dbb209a6f49','verified','','2025-09-30 16:03:45');
INSERT INTO ods VALUES('1391','9967238516','173786','Components','68dbb27e2c134','verified','','2025-09-30 16:05:42');
INSERT INTO ods VALUES('1392','9967238516','422241','stoneset','68dbb326189a2','verified','','2025-09-30 16:08:30');
INSERT INTO ods VALUES('1393','09967238516','840959','s4','68dbb54da598f','verified','','2025-09-30 16:17:41');
INSERT INTO ods VALUES('1394','9967238516','882017','stoneset','68dbb58a9b3a2','verified','','2025-09-30 16:18:42');
INSERT INTO ods VALUES('1395','09967238516','850317','s4','68dbb5a0c367f','verified','','2025-09-30 16:19:04');
INSERT INTO ods VALUES('1396','9967238516','940530','stoneset','68dbb63f5eeef','verified','','2025-09-30 16:21:43');
INSERT INTO ods VALUES('1397','9967238516','457585','Components','68dbb7c6f3317','verified','','2025-09-30 16:28:14');
INSERT INTO ods VALUES('1398','9967238516','670398','stoneset','68dbba33c76e0','verified','','2025-09-30 16:38:35');
INSERT INTO ods VALUES('1399','09967238516','736891','s4','68dbba997aa80','verified','','2025-09-30 16:40:17');
INSERT INTO ods VALUES('1400','9967238516','538654','stoneset','68dbbac9bb397','verified','','2025-09-30 16:41:05');
INSERT INTO ods VALUES('1401','9967238516','324901','stoneset','68dbbbc888e6a','verified','','2025-09-30 16:45:20');
INSERT INTO ods VALUES('1402','09967238516','527170','office','68dbbdca2e9de','verified','','2025-09-30 16:53:54');
INSERT INTO ods VALUES('1403','09967238516','389588','FG001','68dbbf0c6523f','verified','','2025-09-30 16:59:16');
INSERT INTO ods VALUES('1404','09967238516','261820','office','68dbbf5b4a16c','verified','','2025-09-30 17:00:35');
INSERT INTO ods VALUES('1405','09967238516','794006','FG001','68dbbfbee9b57','verified','','2025-09-30 17:02:14');
INSERT INTO ods VALUES('1406','09967238516','281127','office','68dbbfdb43c5f','verified','','2025-09-30 17:02:43');
INSERT INTO ods VALUES('1407','09967238516','524774','FG001','68dbbff4a20f9','verified','','2025-09-30 17:03:08');
INSERT INTO ods VALUES('1408','9967238516','859188','Components','68dbc0c126e84','verified','','2025-09-30 17:06:33');
INSERT INTO ods VALUES('1409','9967238516','618612','indutherm','68dbc0f2d65b3','verified','','2025-09-30 17:07:22');
INSERT INTO ods VALUES('1410','09967238516','742654','tarpatta','68dbc1272a2cd','verified','','2025-09-30 17:08:15');
INSERT INTO ods VALUES('1411','9967238516','954507','stoneset','68dbc1ba1c7f8','verified','','2025-09-30 17:10:42');
INSERT INTO ods VALUES('1412','9967238516','964750','ENAMEL','68dbc255c1ef1','verified','','2025-09-30 17:13:17');
INSERT INTO ods VALUES('1413','09967238516','700568','tarpatta','68dbc261a2e95','verified','','2025-09-30 17:13:29');
INSERT INTO ods VALUES('1414','09967238516','823015','tarpatta','68dbc26f03494','verified','','2025-09-30 17:13:43');
INSERT INTO ods VALUES('1415','9967238516','531962','ENAMEL','68dbc2b5b557a','verified','','2025-09-30 17:14:53');
INSERT INTO ods VALUES('1416','09967238516','370817','tarpatta','68dbc300035c3','verified','','2025-09-30 17:16:08');
INSERT INTO ods VALUES('1417','9967238516','928865','ENAMEL','68dbc35d8d8a1','verified','','2025-09-30 17:17:41');
INSERT INTO ods VALUES('1418','09967238516','571817','tarpatta','68dbc3b609846','verified','','2025-09-30 17:19:10');
INSERT INTO ods VALUES('1419','09967238516','294344','tarpatta','68dbc3df11cff','verified','','2025-09-30 17:19:51');
INSERT INTO ods VALUES('1420','9967238516','909821','ENAMEL','68dbc3ed45e29','verified','','2025-09-30 17:20:05');
INSERT INTO ods VALUES('1421','09967238516','561860','tarpatta','68dbc43fb978f','verified','','2025-09-30 17:21:27');
INSERT INTO ods VALUES('1422','9967238516','307327','laser','68dbc4519cfcb','verified','','2025-09-30 17:21:45');
INSERT INTO ods VALUES('1423','09967238516','642407','tarpatta','68dbc4665f612','verified','','2025-09-30 17:22:06');
INSERT INTO ods VALUES('1424','09967238516','222589','tarpatta','68dbc4acd4b45','verified','','2025-09-30 17:23:16');
INSERT INTO ods VALUES('1425','9967238516','923827','ENAMEL','68dbc4cc1b5f1','verified','','2025-09-30 17:23:48');
INSERT INTO ods VALUES('1426','9967238516','257343','ENAMEL','68dbc6ede7cb2','verified','','2025-09-30 17:32:53');
INSERT INTO ods VALUES('1427','09967238516','811716','Packing','68dbc7a866ef8','verified','','2025-09-30 17:36:00');
INSERT INTO ods VALUES('1428','09967238516','882230','Packing','68dbc7b3ca2bd','verified','','2025-09-30 17:36:11');
INSERT INTO ods VALUES('1429','09967238516','822789','Packing','68dbc7cea6400','verified','','2025-09-30 17:36:38');
INSERT INTO ods VALUES('1430','09967238516','713217','Packing','68dbc7d41c870','verified','','2025-09-30 17:36:44');
INSERT INTO ods VALUES('1431','09967238516','850190','Packing','68dbc7d87b75c','verified','','2025-09-30 17:36:48');
INSERT INTO ods VALUES('1432','09967238516','239499','tarpatta','68dbc7df0a819','verified','','2025-09-30 17:36:55');
INSERT INTO ods VALUES('1433','09967238516','158208','tarpatta','68dbc7ee3af8a','verified','','2025-09-30 17:37:10');
INSERT INTO ods VALUES('1434','09967238516','223189','Packing','68dbc81e6daba','verified','','2025-09-30 17:37:58');
INSERT INTO ods VALUES('1435','09967238516','200062','office','68dbc8411314b','verified','','2025-09-30 17:38:33');
INSERT INTO ods VALUES('1436','09967238516','403728','FG001','68dbc87939b8b','verified','','2025-09-30 17:39:29');
INSERT INTO ods VALUES('1437','9967238516','604445','indutherm','68dbc98372de7','verified','','2025-09-30 17:43:55');
INSERT INTO ods VALUES('1438','09967238516','581867','tarpatta','68dbc99b52313','verified','','2025-09-30 17:44:19');
INSERT INTO ods VALUES('1439','09967238516','931109','tarpatta','68dbc99ea8c43','verified','','2025-09-30 17:44:22');
INSERT INTO ods VALUES('1440','9967238516','410288','indutherm','68dbc9accd7f9','verified','','2025-09-30 17:44:36');
INSERT INTO ods VALUES('1441','09967238516','967586','tarpatta','68dbca0c281f2','verified','','2025-09-30 17:46:12');
INSERT INTO ods VALUES('1442','09967238516','320855','tarpatta','68dbca29dbbe3','verified','','2025-09-30 17:46:41');
INSERT INTO ods VALUES('1443','09967238516','899869','tarpatta','68dbcb0e52b9a','verified','','2025-09-30 17:50:30');
INSERT INTO ods VALUES('1444','09967238516','826583','emrrohit','68dbcb86da7d7','verified','','2025-09-30 17:52:30');
INSERT INTO ods VALUES('1445','09967238516','557604','tarpatta','68dbcce013f88','verified','','2025-09-30 17:58:16');
INSERT INTO ods VALUES('1446','9967238516','543523','ENAMEL','68dbcd0f62f89','verified','','2025-09-30 17:59:03');
INSERT INTO ods VALUES('1447','09967238516','321224','FG001','68dbcf1b91185','verified','','2025-09-30 18:07:47');
INSERT INTO ods VALUES('1448','9967238516','481159','indutherm','68dbcf54bd02b','verified','','2025-09-30 18:08:44');
INSERT INTO ods VALUES('1449','9967238516','422670','ENAMEL','68dbd07001e49','verified','','2025-09-30 18:13:28');
INSERT INTO ods VALUES('1450','09967238516','286411','FG001','68dbd131a8f1f','verified','','2025-09-30 18:16:41');
INSERT INTO ods VALUES('1451','9967238516','801233','ENAMEL','68dbd20886cb0','verified','','2025-09-30 18:20:16');
INSERT INTO ods VALUES('1452','09967238516','826306','FG001','68dbd20d247e4','verified','','2025-09-30 18:20:21');
INSERT INTO ods VALUES('1453','9967238516','134614','ENAMEL','68dbd2922a113','verified','','2025-09-30 18:22:34');
INSERT INTO ods VALUES('1454','09967238516','789195','Packing','68dbd416b503e','verified','','2025-09-30 18:29:02');
INSERT INTO ods VALUES('1455','09967238516','661557','FG001','68dbd4244b66c','verified','','2025-09-30 18:29:16');
INSERT INTO ods VALUES('1456','9967238516','709159','ENAMEL','68dbd4e1ef505','verified','','2025-09-30 18:32:25');
INSERT INTO ods VALUES('1457','9967238516','161647','ENAMEL','68dbd7e41b59b','verified','','2025-09-30 18:45:16');
INSERT INTO ods VALUES('1458','09967238516','812134','Packing','68dbd808c9c8b','verified','','2025-09-30 18:45:52');
INSERT INTO ods VALUES('1459','09967238516','739903','Packing','68dbd88853aa9','verified','','2025-09-30 18:48:00');
INSERT INTO ods VALUES('1460','09967238516','214524','Packing','68dbd8a7eb47f','verified','','2025-09-30 18:48:31');
INSERT INTO ods VALUES('1461','9967238516','911910','ENAMEL','68dbd8e9cbc4d','verified','','2025-09-30 18:49:37');
INSERT INTO ods VALUES('1462','09967238516','532383','Packing','68dbd90307f1a','verified','','2025-09-30 18:50:03');
INSERT INTO ods VALUES('1463','9967238516','509959','ENAMEL','68dbd91027af1','verified','','2025-09-30 18:50:16');
INSERT INTO ods VALUES('1464','09967238516','151171','FG001','68dbd9285b61e','verified','','2025-09-30 18:50:40');
INSERT INTO ods VALUES('1465','09967238516','295125','office','68dbd9a36b856','verified','','2025-09-30 18:52:43');
INSERT INTO ods VALUES('1466','09967238516','496996','FG001','68dbd9cedc463','verified','','2025-09-30 18:53:26');
INSERT INTO ods VALUES('1467','09967238516','705034','office','68dbda7214733','verified','','2025-09-30 18:56:10');
INSERT INTO ods VALUES('1468','09967238516','348376','office','68dcd5adcaff2','verified','','2025-10-01 12:48:05');
INSERT INTO ods VALUES('1469','09967238516','732272','FG001','68dcd644ab257','verified','','2025-10-01 12:50:36');
INSERT INTO ods VALUES('1470','09967238516','460086','office','68dcd6d3426d8','verified','','2025-10-01 12:52:59');
INSERT INTO ods VALUES('1471','09967238516','227554','FG001','68dcd6e9552e0','verified','','2025-10-01 12:53:21');
INSERT INTO ods VALUES('1472','09967238516','427223','office','68dce6876c034','verified','','2025-10-01 13:59:59');
INSERT INTO ods VALUES('1473','09967238516','513290','FG001','68dce700d36df','verified','','2025-10-01 14:02:00');
INSERT INTO ods VALUES('1474','9967238516','240216','indutherm','68dce78fa8ef8','verified','','2025-10-01 14:04:23');
INSERT INTO ods VALUES('1475','09967238516','121521','tarpatta','68dce7d74398a','verified','','2025-10-01 14:05:35');
INSERT INTO ods VALUES('1476','9967238516','821768','ENAMEL','68dce84870a05','verified','','2025-10-01 14:07:28');
INSERT INTO ods VALUES('1477','09967238516','778099','Packing','68dce880c4d0c','verified','','2025-10-01 14:08:24');
INSERT INTO ods VALUES('1478','9967238516','355021','ENAMEL','68dce88c25cee','verified','','2025-10-01 14:08:36');
INSERT INTO ods VALUES('1479','09967238516','904030','Packing','68dce894e8802','verified','','2025-10-01 14:08:44');
INSERT INTO ods VALUES('1480','1234565432','125549','sot123','68dce9430e7fd','verified','','2025-10-01 14:11:39');
INSERT INTO ods VALUES('1481','09967238516','942084','Packing','68dce98e59604','verified','','2025-10-01 14:12:54');
INSERT INTO ods VALUES('1482','09967238516','816467','Packing','68dcf3c3da995','verified','','2025-10-01 14:56:27');
INSERT INTO ods VALUES('1483','09967238516','467456','tarpatta','68dcf77d35053','verified','','2025-10-01 15:12:21');
INSERT INTO ods VALUES('1484','09967238516','535987','s4','68dcf79610546','verified','','2025-10-01 15:12:46');
INSERT INTO ods VALUES('1485','9967238516','908937','stoneset','68dcf7b57e8c6','verified','','2025-10-01 15:13:17');
INSERT INTO ods VALUES('1486','9967238516','356250','Components','68dcf800807a0','verified','','2025-10-01 15:14:32');
INSERT INTO ods VALUES('1487','9967238516','277621','stoneset','68dcf93edb460','verified','','2025-10-01 15:19:50');
INSERT INTO ods VALUES('1488','09967238516','129720','FG001','68dcfad5f2414','verified','','2025-10-01 15:26:37');
INSERT INTO ods VALUES('1489','09967238516','166352','office','68dd015b1775a','verified','','2025-10-01 15:54:27');
INSERT INTO ods VALUES('1490','09967238516','499513','FG001','68dd01ad3a5bc','verified','','2025-10-01 15:55:49');
INSERT INTO ods VALUES('1491','9967238516','863381','indutherm','68dd026f8327f','verified','','2025-10-01 15:59:03');
INSERT INTO ods VALUES('1492','09967238516','379607','tarpatta','68dd029cb7d4e','verified','','2025-10-01 15:59:48');
INSERT INTO ods VALUES('1493','9967238516','530497','ENAMEL','68dd03590faab','verified','','2025-10-01 16:02:57');
INSERT INTO ods VALUES('1494','09967238516','128953','Polish','68dd03a4b3cc9','verified','','2025-10-01 16:04:12');
INSERT INTO ods VALUES('1495','9967238516','188805','ENAMEL','68dd03b529552','verified','','2025-10-01 16:04:29');
INSERT INTO ods VALUES('1496','9967238516','227748','laser','68dd03c7f3f00','verified','','2025-10-01 16:04:47');
INSERT INTO ods VALUES('1497','09967238516','841244','tarpatta','68dd03d76cbe4','verified','','2025-10-01 16:05:03');
INSERT INTO ods VALUES('1498','09967238516','426014','s4','68dd03f30c100','verified','','2025-10-01 16:05:31');
INSERT INTO ods VALUES('1499','9967238516','763502','stoneset','68dd042497e12','verified','','2025-10-01 16:06:20');
INSERT INTO ods VALUES('1500','9967238516','858837','Components','68dd047f4b5e2','verified','','2025-10-01 16:07:51');
INSERT INTO ods VALUES('1501','09967238516','652244','FG001','68dd04f86d47d','verified','','2025-10-01 16:09:52');
INSERT INTO ods VALUES('1502','9967238516','792164','Components','68dd0521f2773','verified','','2025-10-01 16:10:33');
INSERT INTO ods VALUES('1503','9967238516','466680','laser','68dd0568201bf','verified','','2025-10-01 16:11:44');
INSERT INTO ods VALUES('1504','09967238516','810168','Packing','68dd060a349f5','verified','','2025-10-01 16:14:26');
INSERT INTO ods VALUES('1505','9967238516','855608','laser','68dd061576442','verified','','2025-10-01 16:14:37');
INSERT INTO ods VALUES('1506','09967238516','864441','FG001','68dd06873354c','verified','','2025-10-01 16:16:31');
INSERT INTO ods VALUES('1507','09967238516','936173','Packing','68dd08bc919b3','verified','','2025-10-01 16:25:56');
INSERT INTO ods VALUES('1508','09967238516','114244','office','68ddf39243030','verified','','2025-10-02 09:07:54');
INSERT INTO ods VALUES('1509','09967238516','353337','office','68ddf3de568bb','verified','','2025-10-02 09:09:10');
INSERT INTO ods VALUES('1510','09967238516','896793','FG001','68ddf3f769346','verified','','2025-10-02 09:09:35');
INSERT INTO ods VALUES('1511','09967238516','194206','office','68ddf45159b3a','verified','','2025-10-02 09:11:05');
INSERT INTO ods VALUES('1512','09967238516','352078','FG001','68ddf48f2799d','verified','','2025-10-02 09:12:07');
INSERT INTO ods VALUES('1513','9967238516','198180','indutherm','68ddfaa1700c1','verified','','2025-10-02 09:38:01');
INSERT INTO ods VALUES('1514','09967238516','654758','tarpatta','68ddfabf30149','verified','','2025-10-02 09:38:31');
INSERT INTO ods VALUES('1515','09967238516','551892','Packing','68ddfaea68e49','verified','','2025-10-02 09:39:14');
INSERT INTO ods VALUES('1516','09967238516','596664','tarpatta','68ddfb08d6831','verified','','2025-10-02 09:39:44');
INSERT INTO ods VALUES('1517','09967238516','488416','Packing','68ddfb2b10300','verified','','2025-10-02 09:40:19');
INSERT INTO ods VALUES('1518','9967238516','967048','laser','68ddfb49434b2','verified','','2025-10-02 09:40:49');
INSERT INTO ods VALUES('1519','1234565432','984312','sot123','68ddfb5f64884','verified','','2025-10-02 09:41:11');
INSERT INTO ods VALUES('1520','09967238516','750044','tarpatta','68ddfb64264a3','verified','','2025-10-02 09:41:16');
INSERT INTO ods VALUES('1521','09967238516','833144','s4','68ddfb7ac0fc6','verified','','2025-10-02 09:41:38');
INSERT INTO ods VALUES('1522','9967238516','438335','stoneset','68ddfbd059a76','verified','','2025-10-02 09:43:04');
INSERT INTO ods VALUES('1523','9967238516','642786','laser','68ddfc174399c','verified','','2025-10-02 09:44:15');
INSERT INTO ods VALUES('1524','9967238516','530953','stoneset','68de12a0802d7','verified','','2025-10-02 11:20:24');
INSERT INTO ods VALUES('1525','9967238516','299333','Components','68de12ca1fe54','verified','','2025-10-02 11:21:06');
INSERT INTO ods VALUES('1526','9967238516','794697','Components','68de1455b2668','verified','','2025-10-02 11:27:41');
INSERT INTO ods VALUES('1527','09967238516','194954','s4','68de1465134e3','verified','','2025-10-02 11:27:57');
INSERT INTO ods VALUES('1528','09967238516','120535','cnc','68de1466dd2df','verified','','2025-10-02 11:27:58');
INSERT INTO ods VALUES('1529','9967238516','485736','stoneset','68de147d53763','verified','','2025-10-02 11:28:21');
INSERT INTO ods VALUES('1530','9967238516','316900','stoneset','68de14af9dafa','verified','','2025-10-02 11:29:11');
INSERT INTO ods VALUES('1531','9967238516','997485','Components','68de14c890ffc','verified','','2025-10-02 11:29:36');
INSERT INTO ods VALUES('1532','9967238516','567114','ENAMEL','68de161894904','verified','','2025-10-02 11:35:12');
INSERT INTO ods VALUES('1533','1234565432','177857','sot123','68de16497fcff','verified','','2025-10-02 11:36:01');
INSERT INTO ods VALUES('1534','09967238516','156368','FG001','68de1663b0904','verified','','2025-10-02 11:36:27');
INSERT INTO ods VALUES('1535','9967238516','116970','laser','68de16873abec','verified','','2025-10-02 11:37:03');
INSERT INTO ods VALUES('1536','09967238516','469666','Polish','68de16f64dfb9','verified','','2025-10-02 11:38:54');
INSERT INTO ods VALUES('1537','09967238516','293845','Polish','68de17c41d73c','verified','','2025-10-02 11:42:20');
INSERT INTO ods VALUES('1538','9967238516','508000','indutherm','68de180e7cf64','verified','','2025-10-02 11:43:34');
INSERT INTO ods VALUES('1539','09967238516','118972','Polish','68de181885fcb','verified','','2025-10-02 11:43:44');
INSERT INTO ods VALUES('1540','09967238516','407285','Packing','68de184e97e97','verified','','2025-10-02 11:44:38');
INSERT INTO ods VALUES('1541','09967238516','886209','Packing','68de18c83b725','verified','','2025-10-02 11:46:40');
INSERT INTO ods VALUES('1542','1234565432','606728','sot123','68de19a158cf2','verified','','2025-10-02 11:50:17');
INSERT INTO ods VALUES('1543','9967238516','995135','stoneset','68de19b431697','verified','','2025-10-02 11:50:36');
INSERT INTO ods VALUES('1544','09967238516','524077','tarpatta','68de446169973','verified','','2025-10-02 14:52:41');
INSERT INTO ods VALUES('1545','1234565432','814763','sot123','68de49d4eb15a','verified','','2025-10-02 15:15:56');
INSERT INTO ods VALUES('1546','9967238516','429402','stoneset','68de52dc96b4f','verified','','2025-10-02 15:54:28');
INSERT INTO ods VALUES('1547','9967238516','121360','Components','68de54aa5228c','verified','','2025-10-02 16:02:10');
INSERT INTO ods VALUES('1548','09967238516','768193','Polish','68de54c893a65','verified','','2025-10-02 16:02:40');
INSERT INTO ods VALUES('1549','09967238516','347853','tarpatta','68de558442056','verified','','2025-10-02 16:05:48');
INSERT INTO ods VALUES('1550','09967238516','965457','office','68de59341eac8','verified','','2025-10-02 16:21:32');
INSERT INTO ods VALUES('1551','09967238516','285415','tarpatta','68de59ca2bbf4','verified','','2025-10-02 16:24:02');
INSERT INTO ods VALUES('1552','09967238516','200324','Packing','68df46db001e7','verified','','2025-10-03 09:15:31');
INSERT INTO ods VALUES('1553','9967238516','606361','laser','68df47121f663','verified','','2025-10-03 09:16:26');
INSERT INTO ods VALUES('1554','09967238516','169128','tarpatta','68df479ce5142','verified','','2025-10-03 09:18:44');
INSERT INTO ods VALUES('1555','9967238516','198211','stoneset','68df4809f1655','verified','','2025-10-03 09:20:33');
INSERT INTO ods VALUES('1556','1234565432','235599','sot123','68df48166cec6','verified','','2025-10-03 09:20:46');
INSERT INTO ods VALUES('1557','09967238516','838512','tarpatta','68df482299c6b','verified','','2025-10-03 09:20:58');
INSERT INTO ods VALUES('1558','9967238516','913718','stoneset','68df483a49015','verified','','2025-10-03 09:21:22');
INSERT INTO ods VALUES('1559','09967238516','418217','tarpatta','68df48521c813','verified','','2025-10-03 09:21:46');
INSERT INTO ods VALUES('1560','9967238516','988336','stoneset','68df487cb69bb','verified','','2025-10-03 09:22:28');
INSERT INTO ods VALUES('1561','09967238516','714888','Packing','68df48ec004d8','verified','','2025-10-03 09:24:20');
INSERT INTO ods VALUES('1562','09967238516','818220','Dispatch','68df492cb86e6','verified','','2025-10-03 09:25:24');
INSERT INTO ods VALUES('1563','09967238516','717411','office','68df6b08286e5','verified','','2025-10-03 11:49:52');
INSERT INTO ods VALUES('1564','9967238516','970489','Components','68df9f935d1de','verified','','2025-10-03 15:34:03');
INSERT INTO ods VALUES('1565','1234565432','981831','sot123','68df9fbe9e655','verified','','2025-10-03 15:34:46');
INSERT INTO ods VALUES('1566','09967238516','844462','Packing','68dfa0154258e','verified','','2025-10-03 15:36:13');
INSERT INTO ods VALUES('1567','9967238516','809651','Components','68dfa287df94d','verified','','2025-10-03 15:46:39');
INSERT INTO ods VALUES('1568','09967238516','422933','office','68e1063b3288b','verified','','2025-10-04 17:04:19');
INSERT INTO ods VALUES('1569','09967238516','227554','FG001','68e1066f7f02a','verified','','2025-10-04 17:05:11');
INSERT INTO ods VALUES('1570','9967238516','908792','indutherm','68e106e18ac53','verified','','2025-10-04 17:07:05');
INSERT INTO ods VALUES('1571','09967238516','976980','tarpatta','68e10713f0e88','verified','','2025-10-04 17:07:55');
INSERT INTO ods VALUES('1572','09967238516','953160','Manual','68e1079503feb','verified','','2025-10-04 17:10:05');
INSERT INTO ods VALUES('1573','09967238516','765337','emrrohit','68e1083f0b9cf','verified','','2025-10-04 17:12:55');
INSERT INTO ods VALUES('1574','09967238516','909934','Manual','68e10851bdcaa','verified','','2025-10-04 17:13:13');
INSERT INTO ods VALUES('1575','9967238516','381230','Components','68e3ac8e35b8d','verified','','2025-10-06 17:18:30');
INSERT INTO ods VALUES('1576','1234565432','406453','sot123','68e3adcac3335','verified','','2025-10-06 17:23:46');
INSERT INTO ods VALUES('1577','9967238516','772974','Components','68e3aea043659','verified','','2025-10-06 17:27:20');
INSERT INTO ods VALUES('1578','09967238516','417714','office','68e482dc7e02e','verified','','2025-10-07 08:32:52');
INSERT INTO ods VALUES('1579','09967238516','455076','FG001','68e487adde6a4','verified','','2025-10-07 08:53:25');
INSERT INTO ods VALUES('1580','09967238516','447037','office','68e487d6538a5','verified','','2025-10-07 08:54:06');
INSERT INTO ods VALUES('1581','09967238516','253320','FG001','68e488f0e4c30','verified','','2025-10-07 08:58:48');
INSERT INTO ods VALUES('1582','9967238516','994210','melting','68e48ca7d0c3b','verified','','2025-10-07 09:14:39');
INSERT INTO ods VALUES('1583','09967238516','500227','FG001','68e48cebe6b75','verified','','2025-10-07 09:15:47');
INSERT INTO ods VALUES('1584','9967238516','612898','melting','68e48e6029eb3','verified','','2025-10-07 09:22:00');
INSERT INTO ods VALUES('1585','09967238516','175172','tarpatta','68e48efbb8586','verified','','2025-10-07 09:24:35');
INSERT INTO ods VALUES('1586','09967238516','582978','emrrohit','68e4921964fd5','verified','','2025-10-07 09:37:53');
INSERT INTO ods VALUES('1587','09967238516','954387','s4','68e4924c39aac','verified','','2025-10-07 09:38:44');
INSERT INTO ods VALUES('1588','9967238516','293306','melting','68e492750f339','verified','','2025-10-07 09:39:25');
INSERT INTO ods VALUES('1589','09967238516','258730','FG001','68e492b448594','verified','','2025-10-07 09:40:28');
INSERT INTO ods VALUES('1590','9967238516','710582','melting','68e4930275e3d','verified','','2025-10-07 09:41:46');
INSERT INTO ods VALUES('1591','09967238516','607708','s4','68e4933d164a3','verified','','2025-10-07 09:42:45');
INSERT INTO ods VALUES('1592','1234565432','564280','sot123','68e494015435e','verified','','2025-10-07 09:46:01');
INSERT INTO ods VALUES('1593','9967238516','641529','stoneset','68e49409004ea','verified','','2025-10-07 09:46:09');
INSERT INTO ods VALUES('1594','','494404','Components','68e4951011744','verified','494404','2025-10-07 09:50:32');
INSERT INTO ods VALUES('1595','9967238516','195456','laser','68e4971d700af','verified','','2025-10-07 09:59:17');
INSERT INTO ods VALUES('1596','9967238516','225049','laser','68e497b692c8e','verified','','2025-10-07 10:01:50');
INSERT INTO ods VALUES('1597','9967238516','887395','Components','68e497c08dd89','verified','','2025-10-07 10:02:00');
INSERT INTO ods VALUES('1598','9967238516','647540','stoneset','68e497c97c4d5','verified','','2025-10-07 10:02:09');
INSERT INTO ods VALUES('1599','9967238516','374902','laser','68e49974b2ec0','verified','','2025-10-07 10:09:16');
INSERT INTO ods VALUES('1600','9967238516','733381','ENAMEL','68e499d8e4035','verified','','2025-10-07 10:10:56');
INSERT INTO ods VALUES('1601','09967238516','545062','emrrohit','68e499eaec96d','verified','','2025-10-07 10:11:14');
INSERT INTO ods VALUES('1602','9967238516','291683','ENAMEL','68e49a11c3f24','verified','','2025-10-07 10:11:53');
INSERT INTO ods VALUES('1603','09967238516','736121','Packing','68e49a5da6f64','verified','','2025-10-07 10:13:09');
INSERT INTO ods VALUES('1604','9967238516','515277','ENAMEL','68e49a93e8a40','verified','','2025-10-07 10:14:03');
INSERT INTO ods VALUES('1605','09967238516','244273','Packing','68e49ac2b6b8e','verified','','2025-10-07 10:14:50');
INSERT INTO ods VALUES('1606','09967238516','875472','Dispatch','68e49affd4605','verified','','2025-10-07 10:15:51');
INSERT INTO ods VALUES('1607','09967238516','268434','Packing','68e49b1019724','verified','','2025-10-07 10:16:08');
INSERT INTO ods VALUES('1608','09967238516','940683','Packing','68e4ab9924419','verified','','2025-10-07 11:26:41');
INSERT INTO ods VALUES('1609','9967238516','530328','melting','68e4ae2f01b1d','verified','','2025-10-07 11:37:43');
INSERT INTO ods VALUES('1610','09967238516','438601','FG001','68e4b1ac287cb','verified','','2025-10-07 11:52:36');
INSERT INTO ods VALUES('1611','9967238516','262573','melting','68e4b7768633f','verified','','2025-10-07 12:17:18');
INSERT INTO ods VALUES('1612','9967238516','301322','Components','68e4b7c67457b','verified','','2025-10-07 12:18:38');
INSERT INTO ods VALUES('1613','09967238516','693745','office','68e4ba23a5b5e','verified','','2025-10-07 12:28:43');
INSERT INTO ods VALUES('1614','09967238516','628255','FG001','68e4bacba655a','verified','','2025-10-07 12:31:31');
INSERT INTO ods VALUES('1615','9967238516','999388','indutherm','68e4bc93891ab','verified','','2025-10-07 12:39:07');
INSERT INTO ods VALUES('1616','09967238516','865056','tarpatta','68e4c4abc49a6','verified','','2025-10-07 13:13:39');
INSERT INTO ods VALUES('1617','09967238516','964378','SideLevel','68e4c71e030bf','verified','','2025-10-07 13:24:06');
INSERT INTO ods VALUES('1618','9967238516','944828','Filling','68e4c7b45e538','verified','','2025-10-07 13:26:36');
INSERT INTO ods VALUES('1619','9967238516','697166','stoneset','68e4c804138eb','verified','','2025-10-07 13:27:56');
INSERT INTO ods VALUES('1620','1234565432','213983','sot123','68e4cdb897189','verified','','2025-10-07 13:52:16');
INSERT INTO ods VALUES('1621','09967238516','470404','tarpatta','68e4cddce194b','verified','','2025-10-07 13:52:52');
INSERT INTO ods VALUES('1622','09967238516','507576','s4','68e4cdf8efff3','verified','','2025-10-07 13:53:20');
INSERT INTO ods VALUES('1623','9967238516','395432','stoneset','68e4ce33bbf77','verified','','2025-10-07 13:54:19');
INSERT INTO ods VALUES('1624','9967238516','792860','Components','68e4ce9f5c853','verified','','2025-10-07 13:56:07');
INSERT INTO ods VALUES('1625','09967238516','173174','Manual','68e4cef5e8127','verified','','2025-10-07 13:57:33');
INSERT INTO ods VALUES('1626','9967238516','277533','laser','68e4cf381a49e','verified','','2025-10-07 13:58:40');
INSERT INTO ods VALUES('1627','09967238516','180817','Polish','68e4cfa1932f2','verified','','2025-10-07 14:00:25');
INSERT INTO ods VALUES('1628','09967238516','305151','Packing','68e4cff7e995b','verified','','2025-10-07 14:01:51');
INSERT INTO ods VALUES('1629','09967238516','967904','office','68e4ea362a8d0','verified','','2025-10-07 15:53:50');
INSERT INTO ods VALUES('1630','09967238516','447202','FG001','68e4ea779e804','verified','','2025-10-07 15:54:55');
INSERT INTO ods VALUES('1631','9967238516','746023','indutherm','68e4eb29864c1','verified','','2025-10-07 15:57:53');
INSERT INTO ods VALUES('1632','09967238516','241830','FG001','68e4eb4c0b50c','verified','','2025-10-07 15:58:28');
INSERT INTO ods VALUES('1633','9967238516','613599','melting','68e4eb9216856','verified','','2025-10-07 15:59:38');
INSERT INTO ods VALUES('1634','09967238516','796056','FG001','68e4ebb509922','verified','','2025-10-07 16:00:13');
INSERT INTO ods VALUES('1635','9967238516','960734','melting','68e4ebe79df0f','verified','','2025-10-07 16:01:03');
INSERT INTO ods VALUES('1636','09967238516','602718','FG001','68e4ebf4d6f34','verified','','2025-10-07 16:01:16');
INSERT INTO ods VALUES('1637','9967238516','840127','indutherm','68e4ec329379a','verified','','2025-10-07 16:02:18');
INSERT INTO ods VALUES('1638','09967238516','916912','tarpatta','68e4ec6f06111','verified','','2025-10-07 16:03:19');
INSERT INTO ods VALUES('1639','09967238516','782397','emrrohit','68e4ecdaa7937','verified','','2025-10-07 16:05:06');
INSERT INTO ods VALUES('1640','09967238516','797870','tarpatta','68e4ed91c1fc9','verified','','2025-10-07 16:08:09');
INSERT INTO ods VALUES('1641','09967238516','596225','emrrohit','68e4ef335aab9','verified','','2025-10-07 16:15:07');
INSERT INTO ods VALUES('1642','09967238516','791294','office','68e4f0f41b178','verified','','2025-10-07 16:22:36');
INSERT INTO ods VALUES('1643','09967238516','726991','FG001','68e4f139149ee','verified','','2025-10-07 16:23:45');
INSERT INTO ods VALUES('1644','9967238516','575883','indutherm','68e4f293117e6','verified','','2025-10-07 16:29:31');
INSERT INTO ods VALUES('1645','09967238516','607061','tarpatta','68e4f2e75b98b','verified','','2025-10-07 16:30:55');
INSERT INTO ods VALUES('1646','9967238516','579740','stoneset','68e4f348ca109','verified','','2025-10-07 16:32:32');
INSERT INTO ods VALUES('1647','09967238516','485686','tarpatta','68e4f351b2a40','verified','','2025-10-07 16:32:41');
INSERT INTO ods VALUES('1648','9967238516','828777','stoneset','68e4f3833bf0e','verified','','2025-10-07 16:33:31');
INSERT INTO ods VALUES('1649','09967238516','293600','tarpatta','68e4f5395d0d7','verified','','2025-10-07 16:40:49');
INSERT INTO ods VALUES('1650','09967238516','460808','s4','68e4f55094a3a','verified','','2025-10-07 16:41:12');
INSERT INTO ods VALUES('1651','09967238516','879713','tarpatta','68e4f55b37ea7','verified','','2025-10-07 16:41:23');
INSERT INTO ods VALUES('1652','09967238516','537138','s4','68e4f5616155b','verified','','2025-10-07 16:41:29');
INSERT INTO ods VALUES('1653','9967238516','498357','stoneset','68e4f642ed3cf','verified','','2025-10-07 16:45:14');
INSERT INTO ods VALUES('1654','9967238516','282511','laser','68e4f6697b38b','verified','','2025-10-07 16:45:53');
INSERT INTO ods VALUES('1655','9967238516','890297','stoneset','68e4f67c9bff1','verified','','2025-10-07 16:46:12');
INSERT INTO ods VALUES('1656','9967238516','342701','Components','68e4f6b581963','verified','','2025-10-07 16:47:09');
INSERT INTO ods VALUES('1657','9967238516','726246','laser','68e4f735daf97','verified','','2025-10-07 16:49:17');
INSERT INTO ods VALUES('1658','09967238516','279888','Packing','68e4f80c727c2','verified','','2025-10-07 16:52:52');
INSERT INTO ods VALUES('1659','9967238516','402132','laser','68e4f815e3f6b','verified','','2025-10-07 16:53:01');
INSERT INTO ods VALUES('1660','09967238516','921575','Packing','68e4f81b9b380','verified','','2025-10-07 16:53:07');
INSERT INTO ods VALUES('1661','09967238516','229655','Dispatch','68e4f8b75b60a','verified','','2025-10-07 16:55:43');
INSERT INTO ods VALUES('1662','09967238516','457665','tarpatta','68e4fa8d04824','verified','','2025-10-07 17:03:33');
INSERT INTO ods VALUES('1663','9967238516','897006','indutherm','68e4fa9b64486','verified','','2025-10-07 17:03:47');
INSERT INTO ods VALUES('1664','09967238516','180206','s4','68e4faaebe18e','verified','','2025-10-07 17:04:06');
INSERT INTO ods VALUES('1665','9967238516','926589','stoneset','68e4fac5c99e0','verified','','2025-10-07 17:04:29');
INSERT INTO ods VALUES('1666','9967238516','412326','Components','68e4fb0e2548e','verified','','2025-10-07 17:05:42');
INSERT INTO ods VALUES('1667','09967238516','744514','office','68e4fc6d86d72','verified','','2025-10-07 17:11:33');
INSERT INTO ods VALUES('1668','09967238516','178813','FG001','68e4fc8377fd2','verified','','2025-10-07 17:11:55');
INSERT INTO ods VALUES('1669','09967238516','120693','office','68e4fc8a03234','verified','','2025-10-07 17:12:02');
INSERT INTO ods VALUES('1670','09967238516','544102','FG001','68e4fc97dbb7c','verified','','2025-10-07 17:12:15');
INSERT INTO ods VALUES('1671','9967238516','386170','indutherm','68e4fd1f7675b','verified','','2025-10-07 17:14:31');
INSERT INTO ods VALUES('1672','09967238516','539501','FG001','68e4fd3a14fa5','verified','','2025-10-07 17:14:58');
INSERT INTO ods VALUES('1673','9967238516','227793','indutherm','68e4fd7a8c4ae','verified','','2025-10-07 17:16:02');
INSERT INTO ods VALUES('1674','09967238516','493126','FG001','68e4fdaedac58','verified','','2025-10-07 17:16:54');
INSERT INTO ods VALUES('1675','9967238516','976588','indutherm','68e4fdc564087','verified','','2025-10-07 17:17:17');
INSERT INTO ods VALUES('1676','09967238516','416524','FG001','68e4fdd212eb9','verified','','2025-10-07 17:17:30');
INSERT INTO ods VALUES('1677','9967238516','431716','indutherm','68e4fe00dc94b','verified','','2025-10-07 17:18:16');
INSERT INTO ods VALUES('1678','09967238516','743800','FG001','68e4fe09b496a','verified','','2025-10-07 17:18:25');
INSERT INTO ods VALUES('1679','9967238516','901016','indutherm','68e4fe9c74673','verified','','2025-10-07 17:20:52');
INSERT INTO ods VALUES('1680','09967238516','370680','FG001','68e4feaaf130c','verified','','2025-10-07 17:21:06');
INSERT INTO ods VALUES('1681','9967238516','154372','indutherm','68e4ffcb22850','verified','','2025-10-07 17:25:55');
INSERT INTO ods VALUES('1682','09967238516','534104','FG001','68e4ffd31ede1','verified','','2025-10-07 17:26:03');
INSERT INTO ods VALUES('1683','9967238516','887413','indutherm','68e500246face','verified','','2025-10-07 17:27:24');
INSERT INTO ods VALUES('1684','09967238516','186637','s4','68e50043df249','verified','','2025-10-07 17:27:55');
INSERT INTO ods VALUES('1685','9967238516','987237','stoneset','68e500b2182a2','verified','','2025-10-07 17:29:46');
INSERT INTO ods VALUES('1686','09967238516','363727','FG001','68e500c17984b','verified','','2025-10-07 17:30:01');
INSERT INTO ods VALUES('1687','9967238516','819576','stoneset','68e500d197323','verified','','2025-10-07 17:30:17');
INSERT INTO ods VALUES('1688','9967238516','225094','Components','68e500ea1ce82','verified','','2025-10-07 17:30:42');
INSERT INTO ods VALUES('1689','9967238516','190400','laser','68e5014b1163c','verified','','2025-10-07 17:32:19');
INSERT INTO ods VALUES('1690','9967238516','467518','laser','68e5016a09c8a','verified','','2025-10-07 17:32:50');
INSERT INTO ods VALUES('1691','09967238516','252973','Dispatch','68e502249c456','verified','','2025-10-07 17:35:56');
INSERT INTO ods VALUES('1692','09967238516','976333','office','68e5ddf11111b','verified','','2025-10-08 09:13:45');
INSERT INTO ods VALUES('1693','09967238516','487634','FG001','68e5de13a4da9','verified','','2025-10-08 09:14:19');
INSERT INTO ods VALUES('1694','9967238516','116198','indutherm','68e5de9edbf75','verified','','2025-10-08 09:16:38');
INSERT INTO ods VALUES('1695','09967238516','383371','tarpatta','68e5deb70fa54','verified','','2025-10-08 09:17:03');
INSERT INTO ods VALUES('1696','09967238516','447942','emrrohit','68e5df04bfb50','verified','','2025-10-08 09:18:20');
INSERT INTO ods VALUES('1697','9967238516','147667','Filling','68e5df2b8de91','verified','','2025-10-08 09:18:59');
INSERT INTO ods VALUES('1698','9967238516','157336','rhodium','68e5df529f036','verified','','2025-10-08 09:19:38');
INSERT INTO ods VALUES('1699','09967238516','379600','Manual','68e5df7035a3d','verified','','2025-10-08 09:20:08');
INSERT INTO ods VALUES('1700','09967238516','499441','turning','68e5dfa39537f','verified','','2025-10-08 09:20:59');
INSERT INTO ods VALUES('1701','9967238516','769441','Filling','68e5dfcfe8a02','verified','','2025-10-08 09:21:43');
INSERT INTO ods VALUES('1702','09967238516','373268','Polish','68e5e109da41a','verified','','2025-10-08 09:26:57');
INSERT INTO ods VALUES('1703','09967238516','759916','Packing','68e5e1300fc7f','verified','','2025-10-08 09:27:36');
INSERT INTO ods VALUES('1704','09967238516','831221','Dispatch','68e5e164a334c','verified','','2025-10-08 09:28:28');
INSERT INTO ods VALUES('1705','09967238516','919755','FG001','68e5e28925992','verified','','2025-10-08 09:33:21');
INSERT INTO ods VALUES('1706','09967238516','837957','tarpatta','68e5e297572e1','verified','','2025-10-08 09:33:35');
INSERT INTO ods VALUES('1707','09967238516','823243','s4','68e5e2de0547f','verified','','2025-10-08 09:34:46');
INSERT INTO ods VALUES('1708','9967238516','567293','stoneset','68e5e36ce102f','verified','','2025-10-08 09:37:08');
INSERT INTO ods VALUES('1709','09967238516','604540','office','68e5ecb1e85b9','verified','','2025-10-08 10:16:41');
INSERT INTO ods VALUES('1710','09967238516','907825','FG001','68e5ecc5061c9','verified','','2025-10-08 10:17:01');
INSERT INTO ods VALUES('1711','9967238516','449375','indutherm','68e5ed016f922','verified','','2025-10-08 10:18:01');
INSERT INTO ods VALUES('1712','09967238516','903846','tarpatta','68e5ed1d6a367','verified','','2025-10-08 10:18:29');
INSERT INTO ods VALUES('1713','09967238516','629365','s4','68e5ed96408a0','verified','','2025-10-08 10:20:30');
INSERT INTO ods VALUES('1714','9967238516','742490','stoneset','68e5edb16d690','verified','','2025-10-08 10:20:57');
INSERT INTO ods VALUES('1715','09967238516','545663','FG001','68e5edc59199d','verified','','2025-10-08 10:21:17');
INSERT INTO ods VALUES('1716','9967238516','973825','stoneset','68e5edd91020c','verified','','2025-10-08 10:21:37');
INSERT INTO ods VALUES('1717','9967238516','440397','Components','68e5edf2482ed','verified','','2025-10-08 10:22:02');
INSERT INTO ods VALUES('1718','9967238516','951792','laser','68e5ee64461c9','verified','','2025-10-08 10:23:56');
INSERT INTO ods VALUES('1719','9967238516','691776','ENAMEL','68e5ee6b6eaf0','verified','','2025-10-08 10:24:03');
INSERT INTO ods VALUES('1720','09967238516','512346','tarpatta','68e5eeb85b90f','verified','','2025-10-08 10:25:20');
INSERT INTO ods VALUES('1721','9967238516','742232','Components','68e5ef6517c25','verified','','2025-10-08 10:28:13');
INSERT INTO ods VALUES('1722','9967238516','265499','laser','68e5ef77ab297','verified','','2025-10-08 10:28:31');
INSERT INTO ods VALUES('1723','09967238516','660118','Packing','68e5efe4959ba','verified','','2025-10-08 10:30:20');
INSERT INTO ods VALUES('1724','09967238516','396436','Packing','68e5f08204ee9','verified','','2025-10-08 10:32:58');
INSERT INTO ods VALUES('1725','09967238516','546095','Dispatch','68e5f0957f6ad','verified','','2025-10-08 10:33:17');
INSERT INTO ods VALUES('1726','9967238516','545132','ENAMEL','68e5f14246cbc','verified','','2025-10-08 10:36:10');
INSERT INTO ods VALUES('1727','09967238516','589886','Packing','68e5f15683f27','verified','','2025-10-08 10:36:30');
INSERT INTO ods VALUES('1728','09967238516','699703','Dispatch','68e5f16fec1d3','verified','','2025-10-08 10:36:55');
INSERT INTO ods VALUES('1729','09967238516','579889','Packing','68e5f1ab97a9b','verified','','2025-10-08 10:37:55');
INSERT INTO ods VALUES('1730','09967238516','997399','tarpatta','68e5f232715c5','verified','','2025-10-08 10:40:10');
INSERT INTO ods VALUES('1731','09967238516','616303','FG001','68e5f295a0955','verified','','2025-10-08 10:41:49');
INSERT INTO ods VALUES('1732','09967238516','895275','office','68e60df79729a','verified','','2025-10-08 12:38:39');
INSERT INTO ods VALUES('1733','09967238516','896956','FG001','68e60e0dc0c77','verified','','2025-10-08 12:39:01');
INSERT INTO ods VALUES('1734','9967238516','521600','indutherm','68e60e6b3a750','verified','','2025-10-08 12:40:35');
INSERT INTO ods VALUES('1735','09967238516','274185','tarpatta','68e60e9805ea5','verified','','2025-10-08 12:41:20');
INSERT INTO ods VALUES('1736','09967238516','834948','s4','68e60f215fa13','verified','','2025-10-08 12:43:37');
INSERT INTO ods VALUES('1737','9967238516','362066','stoneset','68e60f4c1f33a','verified','','2025-10-08 12:44:20');
INSERT INTO ods VALUES('1738','9967238516','840946','Components','68e60f7090ac6','verified','','2025-10-08 12:44:56');
INSERT INTO ods VALUES('1739','09967238516','944687','tarpatta','68e6126f8428f','verified','','2025-10-08 12:57:43');
INSERT INTO ods VALUES('1740','9967238516','122868','laser','68e6128cd026d','verified','','2025-10-08 12:58:12');
INSERT INTO ods VALUES('1741','09967238516','404299','office','68e63c0579f35','verified','','2025-10-08 15:55:09');
INSERT INTO ods VALUES('1742','09967238516','233413','office','68e644c7df639','verified','','2025-10-08 16:32:31');
INSERT INTO ods VALUES('1743','09967238516','821454','FG001','68e644e7245f9','verified','','2025-10-08 16:33:03');
INSERT INTO ods VALUES('1744','9967238516','465060','indutherm','68e6451d95422','verified','','2025-10-08 16:33:57');
INSERT INTO ods VALUES('1745','09967238516','327112','tarpatta','68e6454226082','verified','','2025-10-08 16:34:34');
INSERT INTO ods VALUES('1746','09967238516','853400','s4','68e645bbcda4e','verified','','2025-10-08 16:36:35');
INSERT INTO ods VALUES('1747','09967238516','651065','s4','68e645d9c6810','verified','','2025-10-08 16:37:05');
INSERT INTO ods VALUES('1748','9967238516','474001','stoneset','68e645f0e241b','verified','','2025-10-08 16:37:28');
INSERT INTO ods VALUES('1749','9967238516','529937','Components','68e6465828dfe','verified','','2025-10-08 16:39:12');
INSERT INTO ods VALUES('1750','9967238516','200341','laser','68e64710652c1','verified','','2025-10-08 16:42:16');
INSERT INTO ods VALUES('1751','09967238516','701167','Dispatch','68e64937a0114','verified','','2025-10-08 16:51:27');
INSERT INTO ods VALUES('1752','09967238516','511829','Dispatch','68e649cbf403a','verified','','2025-10-08 16:53:55');
INSERT INTO ods VALUES('1753','09967238516','278050','FG001','68e68f768f038','verified','','2025-10-08 21:51:10');
INSERT INTO ods VALUES('1754','9967238516','422354','stoneset','68e68fce7d60d','verified','','2025-10-08 21:52:38');
INSERT INTO ods VALUES('1755','09967238516','471783','FG001','68e691dc2bc38','verified','','2025-10-08 22:01:24');
INSERT INTO ods VALUES('1756','9967238516','196911','melting','68e69336c60a3','verified','','2025-10-08 22:07:10');
INSERT INTO ods VALUES('1757','09967238516','970994','tarpatta','68e6938db6919','verified','','2025-10-08 22:08:37');
INSERT INTO ods VALUES('1758','9967238516','974188','stoneset','68e694115b080','verified','','2025-10-08 22:10:49');
INSERT INTO ods VALUES('1759','09967238516','470732','office','68e7507308091','verified','','2025-10-09 11:34:35');
INSERT INTO ods VALUES('1760','09967238516','829887','FG001','68e750ca267f4','verified','','2025-10-09 11:36:02');
INSERT INTO ods VALUES('1761','9967238516','774034','indutherm','68e75171e40f7','verified','','2025-10-09 11:38:49');
INSERT INTO ods VALUES('1762','09967238516','428604','tarpatta','68e7519719c32','verified','','2025-10-09 11:39:27');
INSERT INTO ods VALUES('1763','09967238516','113405','SideLevel','68e7526a7dd3f','verified','','2025-10-09 11:42:58');
INSERT INTO ods VALUES('1764','09967238516','764713','emrrohit','68e7527e0b588','verified','','2025-10-09 11:43:18');
INSERT INTO ods VALUES('1765','09967238516','295727','Manual','68e7528f789e7','verified','','2025-10-09 11:43:35');
INSERT INTO ods VALUES('1766','09967238516','760016','SideLevel','68e753509379d','verified','','2025-10-09 11:46:48');
INSERT INTO ods VALUES('1767','9967238516','206720','stoneset','68e75396185a9','verified','','2025-10-09 11:47:58');
INSERT INTO ods VALUES('1768','09967238516','680418','Polish','68e754a9556ac','verified','','2025-10-09 11:52:33');
INSERT INTO ods VALUES('1769','09967238516','566853','Packing','68e755125ff4a','verified','','2025-10-09 11:54:18');
INSERT INTO ods VALUES('1770','09967238516','555110','Dispatch','68e755a49cd31','verified','','2025-10-09 11:56:44');
INSERT INTO ods VALUES('1771','09967238516','744612','Manual','68e758f0047eb','verified','','2025-10-09 12:10:48');
INSERT INTO ods VALUES('1772','9967238516','985684','stoneset','68e75916e5119','verified','','2025-10-09 12:11:26');
INSERT INTO ods VALUES('1773','09967238516','720653','Polish','68e75970e77ec','verified','','2025-10-09 12:12:56');
INSERT INTO ods VALUES('1774','09967238516','206811','Packing','68e759c664076','verified','','2025-10-09 12:14:22');
INSERT INTO ods VALUES('1775','09967238516','397935','FG001','68e75a42553af','verified','','2025-10-09 12:16:26');
INSERT INTO ods VALUES('1776','09967238516','781518','Polish','68e75a664639b','verified','','2025-10-09 12:17:02');
INSERT INTO ods VALUES('1777','09967238516','548551','emrrohit','68e75a7b1d69b','verified','','2025-10-09 12:17:23');
INSERT INTO ods VALUES('1778','9967238516','878381','stoneset','68e75b94300bb','verified','','2025-10-09 12:22:04');
INSERT INTO ods VALUES('1779','9967238516','998271','indutherm','68e75be7b98f2','verified','','2025-10-09 12:23:27');
INSERT INTO ods VALUES('1780','09967238516','428611','tarpatta','68e75bf98d2d6','verified','','2025-10-09 12:23:45');
INSERT INTO ods VALUES('1781','09967238516','225616','s4','68e75c47eab05','verified','','2025-10-09 12:25:03');
INSERT INTO ods VALUES('1782','9967238516','401497','stoneset','68e75c942b5b4','verified','','2025-10-09 12:26:20');
INSERT INTO ods VALUES('1783','9967238516','594205','Components','68e75cc21e511','verified','','2025-10-09 12:27:06');
INSERT INTO ods VALUES('1784','09967238516','478961','emrrohit','68e75e8f1ac89','verified','','2025-10-09 12:34:47');
INSERT INTO ods VALUES('1785','9967238516','367563','melting','68e75edb4ddc1','verified','','2025-10-09 12:36:03');



CREATE TABLE `order_tracking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `to_dept` varchar(10) NOT NULL,
  `transferred_by` varchar(100) NOT NULL,
  `notes` text,
  `transferred_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_dept` varchar(100) NOT NULL DEFAULT '0',
  `status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0->pending\r\n1->success\r\n2->failed',
  `success_at` varchar(100) DEFAULT NULL,
  `weight` varchar(100) NOT NULL DEFAULT '0',
  `date` varchar(100) NOT NULL DEFAULT '0',
  `gold_touch` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO order_tracking VALUES('1','1','19','tarpatta','','2025-10-09 11:40:49','15','1','2025-10-09 11:43:38','50.00','','91.75');
INSERT INTO order_tracking VALUES('2','3','16','tarpatta','','2025-10-09 11:41:13','15','1','2025-10-09 11:43:21','65.00','','91.75');
INSERT INTO order_tracking VALUES('3','2','21','tarpatta','','2025-10-09 11:42:43','15','1','2025-10-09 11:43:02','100.00','','91.75');
INSERT INTO order_tracking VALUES('4','2','67','SideLevel','','2025-10-09 11:47:37','21','1','2025-10-09 11:48:05','80','','91.75');
INSERT INTO order_tracking VALUES('5','2','24','stoneset','','2025-10-09 11:52:26','67','1','2025-10-09 11:52:41','80','','91.75');
INSERT INTO order_tracking VALUES('6','2','25','Polish','','2025-10-09 11:54:07','24','1','2025-10-09 11:54:28','78','','91.75');
INSERT INTO order_tracking VALUES('7','2','51','Packing','','2025-10-09 11:56:32','25','1','2025-10-09 11:56:52','75','','91.75');
INSERT INTO order_tracking VALUES('8','1','67','Manual','','2025-10-09 12:11:18','19','1','2025-10-09 12:11:32','40','','91.75');
INSERT INTO order_tracking VALUES('9','1','24','stoneset','','2025-10-09 12:12:37','67','1','2025-10-09 12:13:06','40','','91.75');
INSERT INTO order_tracking VALUES('10','1','25','Polish','','2025-10-09 12:14:11','24','','','35','','91.75');
INSERT INTO order_tracking VALUES('11','3','30','16','','2025-10-09 12:18:24','16','1','','60','2025-10-09 12:18:24','91.75');
INSERT INTO order_tracking VALUES('12','3','16','Admin','Return','2025-10-09 12:19:41','30','1','2025-10-09 12:19:41','60','2025-10-09 12:19:41','91.75');
INSERT INTO order_tracking VALUES('13','3','30','16','','2025-10-09 12:35:21','16','1','','50','2025-10-09 12:35:21','91.75');
INSERT INTO order_tracking VALUES('14','3','16','Admin','Return','2025-10-09 12:36:28','30','1','2025-10-09 12:36:28','50','2025-10-09 12:36:28','91.75');



CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `gold_weight` decimal(10,2) NOT NULL,
  `current_dept` int(10) unsigned NOT NULL,
  `description` text,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `previous_dept` varchar(11) NOT NULL DEFAULT '0',
  `tag_weight` varchar(100) NOT NULL DEFAULT '0',
  `gold_touch` varchar(11) DEFAULT NULL,
  `stone_weight` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO orders VALUES('1','140972-8','tarpatta','50.00','24','2','success','2025-10-09 11:39:50','','.500','91.75','5');
INSERT INTO orders VALUES('2','140909-1','tarpatta','100.00','51','4','success','2025-10-09 11:40:01','','.500','91.75','10');
INSERT INTO orders VALUES('3','140972-5','tarpatta','65.00','16','2','success','2025-10-09 11:40:15','','.500','91.75','');



CREATE TABLE `unit` (
  `un_id` int(11) NOT NULL AUTO_INCREMENT,
  `un_name` varchar(10) NOT NULL,
  PRIMARY KEY (`un_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO unit VALUES('1','KG');
INSERT INTO unit VALUES('2','GM');
INSERT INTO unit VALUES('3','Piece');
INSERT INTO unit VALUES('4','Dozen');



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','admin','user') DEFAULT 'user',
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES('17','Distribution','FG001','09967238516','Fgpl@123','user','37','2025-08-18 11:57:45');
INSERT INTO users VALUES('38','NAZIR','SideLevel','09967238516','Fgpl@123','user','21','2025-09-02 16:12:39');
INSERT INTO users VALUES('40','Shradhha','Packing','09967238516','Fgpl@123','user','25','2025-09-02 16:23:10');
INSERT INTO users VALUES('42','Jeetubhai','Manual','09967238516','Fgpl@123','user','19','2025-09-02 16:57:33');
INSERT INTO users VALUES('43','Polish','Polish','09967238516','Fgpl@123','user','24','2025-09-02 16:57:58');
INSERT INTO users VALUES('44','Dispatch','Dispatch','09967238516','Fgpl@123','user','51','2025-09-02 17:00:52');
INSERT INTO users VALUES('52','Components','Components','9967238516','Fgpl@123','user','56','2025-09-09 10:42:34');
INSERT INTO users VALUES('53','Rhodium','rhodium','9967238516','Fgpl@123','user','20','2025-09-10 13:49:35');
INSERT INTO users VALUES('55','Rawa','Rawa','9967238516','Fgpl@123','user','58','2025-09-12 14:30:44');
INSERT INTO users VALUES('56','ENAMEL','ENAMEL','9967238516','Fgpl@123','user','26','2025-09-15 12:06:13');
INSERT INTO users VALUES('59','Ranjit','laser','9967238516','Fgpl@123','user','63','2025-09-18 15:01:26');
INSERT INTO users VALUES('63','Bikash','Filling','9967238516','Fgpl@123','user','23','2025-09-20 09:28:12');
INSERT INTO users VALUES('65','Akash','indutherm','9967238516','Fgpl@123','user','41','2025-09-23 12:23:51');
INSERT INTO users VALUES('66','Anil Gansoni','melting','9967238516','Fgpl@123','user','14','2025-09-23 12:24:34');
INSERT INTO users VALUES('67','kalaiyarasan','stoneset','9967238516','Fgpl@123','user','67','2025-09-25 09:31:40');
INSERT INTO users VALUES('69','Rohit','emrrohit','09967238516','Fgpl@123','user','16','2025-09-26 11:08:25');
INSERT INTO users VALUES('70','Sapna Bhalekar','office','09967238516','Fgpl@123','user','33','2025-09-26 11:09:18');
INSERT INTO users VALUES('71','Rajendra','turning','09967238516','Fgpl@123','user','57','2025-09-26 11:09:52');
INSERT INTO users VALUES('72','Raja','tarpatta','09967238516','Fgpl@123','user','15','2025-09-26 11:10:32');
INSERT INTO users VALUES('73','Rohul','s4','09967238516','Fgpl@123','user','59','2025-09-26 11:11:00');
INSERT INTO users VALUES('74','mandar','cnc','09967238516','Fgpl@123','user','17','2025-09-26 11:11:46');
INSERT INTO users VALUES('76','test','test12345','1234567888','1','user','30','2025-09-29 19:20:45');
INSERT INTO users VALUES('77','stone out','sot123','1234565432','1','user','69','2025-09-29 19:27:27');

