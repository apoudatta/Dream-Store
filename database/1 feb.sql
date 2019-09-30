/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.0.45-community-nt : Database - dreamstore
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dreamstore` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dreamstore`;

/*Table structure for table `admin_information` */

DROP TABLE IF EXISTS `admin_information`;

CREATE TABLE `admin_information` (
  `Admin_Name` varchar(30) default NULL,
  `Admin_Email` varchar(30) NOT NULL,
  `Admin_Password` varchar(30) default NULL,
  PRIMARY KEY  (`Admin_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_information` */

insert  into `admin_information`(`Admin_Name`,`Admin_Email`,`Admin_Password`) values ('ashik','ashik@gmail.com','123'),('bashar','bashar@gmail.com','123'),('komol','komol@gmail.com','123'),('opu','opu@gmail.com','123'),('ruma','ruma@gmail.com','123'),('sabbir','sabbir@gmail.com','123');

/*Table structure for table `cetagory_information` */

DROP TABLE IF EXISTS `cetagory_information`;

CREATE TABLE `cetagory_information` (
  `Item_Name` varchar(30) default NULL,
  `Cetagory_Name` varchar(30) default NULL,
  `Cetagory_ID` varchar(30) NOT NULL,
  PRIMARY KEY  (`Cetagory_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cetagory_information` */

insert  into `cetagory_information`(`Item_Name`,`Cetagory_Name`,`Cetagory_ID`) values ('Dress for man','Pant','Cetagory-00001'),('Dress for man','Shirt','Cetagory-00002'),('Dress for woman','Bracelet','Cetagory-00003'),('Dress for woman','salwar-kameez','Cetagory-00004'),('Dress for woman','Sharee','Cetagory-00005'),('bag-purse','Bag Purse','Cetagory-00006'),('cosmetics','perfume & bodyspray','Cetagory-00007'),('cosmetics','Skin Care','Cetagory-00008'),('gift-item','Flower Vase','Cetagory-00009'),('gift-item','Furniture','Cetagory-00010'),('gift-item','Shoe Piece','Cetagory-00011'),('Shoes Sandals','Shows for man','Cetagory-00012'),('Shoes Sandals','Shows for woman','Cetagory-00013'),('watch','Menz Watch','Cetagory-00014'),('watch','Table Clock','Cetagory-00015'),('Dress for man','Polo T Shirts','Cetagory-00016'),('Baby Kids','Baby Dress','Cetagory-00017'),('Baby Kids','New Born','Cetagory-00018'),('Baby Kids','Tiffin Box Flusk','Cetagory-00019'),('Baby Kids','Toys','Cetagory-00020');

/*Table structure for table `credit_card` */

DROP TABLE IF EXISTS `credit_card`;

CREATE TABLE `credit_card` (
  `Full_name` varchar(30) NOT NULL,
  `Account_Title` varchar(30) NOT NULL,
  `Account_Number` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Amount` varchar(30) NOT NULL,
  PRIMARY KEY  (`Account_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `credit_card` */

insert  into `credit_card`(`Full_name`,`Account_Title`,`Account_Number`,`Password`,`Amount`) values ('opu','savings','12345','123','200000');

/*Table structure for table `customer_information` */

DROP TABLE IF EXISTS `customer_information`;

CREATE TABLE `customer_information` (
  `Customer_ID` varchar(30) NOT NULL,
  `Customer_Name` varchar(30) NOT NULL,
  `Contact_No` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `customer_Address` tinytext NOT NULL,
  PRIMARY KEY  (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer_information` */

insert  into `customer_information`(`Customer_ID`,`Customer_Name`,`Contact_No`,`Email`,`Password`,`customer_Address`) values ('Customer-0001','opu','01838737333','opu@gmail.com','123','comilla'),('Customer-0002','komol','01838737333','opu@gmail.com','123','hoij'),('Customer-0003','opu','01838737333','opu@gmail.com','123','zxc'),('Customer-0004','opu','01838737333','opu@gmail.com','123','fgjhf'),('Customer-0005','opu','01838737333','opu@gmail.com','123','hjg');

/*Table structure for table `delivery_information` */

DROP TABLE IF EXISTS `delivery_information`;

CREATE TABLE `delivery_information` (
  `delivery_id` varchar(100) NOT NULL default '',
  `delivery_Date` varchar(100) NOT NULL,
  `Shipment_Type` varchar(100) NOT NULL,
  `Shipment_To` varchar(100) NOT NULL,
  `Contact_No` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Shipment_Address` varchar(100) NOT NULL,
  PRIMARY KEY  (`delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `delivery_information` */

insert  into `delivery_information`(`delivery_id`,`delivery_Date`,`Shipment_Type`,`Shipment_To`,`Contact_No`,`Email`,`Shipment_Address`) values ('Delivery-0001','29-Nov-15   05:44:39 pm','By Road','feni','01834426600','komol@gmail.com','feni'),('Delivery-0002','29-Nov-15   05:51:41 pm','By Road','hpoihi','fgnfgG','GFNGF','HHTRH'),('Delivery-0003','12-Dec-15   09:43:20 am','By Road','zxcz','sss','ayon@gmail.com','hkkj'),('Delivery-0004','12-Dec-15   10:23:22 am','By Road','fgfgj','gjgfj','fgjgfj','gfjgfj'),('Delivery-0005','12-Dec-15   10:35:24 am','By Road','dsfdsfdsf','dsfdsf','dsfdf','dsfds');

/*Table structure for table `item_information` */

DROP TABLE IF EXISTS `item_information`;

CREATE TABLE `item_information` (
  `ITEM_NAME` varchar(30) default NULL,
  `Item_ID` varchar(30) NOT NULL,
  PRIMARY KEY  (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item_information` */

insert  into `item_information`(`ITEM_NAME`,`Item_ID`) values ('Dress for man','ITEM-00001'),('Dress for woman','ITEM-00002'),('Baby Kids','ITEM-00003'),('bag-purse','ITEM-00004'),('cosmetics','ITEM-00005'),('gift-item','ITEM-00006'),('Shoes Sandals','ITEM-00007'),('Sunglasses Frame','ITEM-00008'),('watch','ITEM-00009');

/*Table structure for table `product_information` */

DROP TABLE IF EXISTS `product_information`;

CREATE TABLE `product_information` (
  `Item_Name` varchar(30) default NULL,
  `Category_Name` varchar(30) default NULL,
  `Product_ID` varchar(30) NOT NULL,
  `Product_Name` varchar(30) default NULL,
  `Product_Stock` varchar(30) default NULL,
  `Product_Details` varchar(30) default NULL,
  `Product_Price` varchar(30) default NULL,
  PRIMARY KEY  (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_information` */

insert  into `product_information`(`Item_Name`,`Category_Name`,`Product_ID`,`Product_Name`,`Product_Stock`,`Product_Details`,`Product_Price`) values ('Dress for man','Pant','Product-00001','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00002','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00003','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00004','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00005','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00006','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00007','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00008','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00009','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00010','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00011','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00012','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00013','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00014','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00015','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00016','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00017','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00018','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00019','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00020','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00021','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00022','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00023','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00024','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00025','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00026','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00027','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00028','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00029','jeans-pant','5','It is best !!!','500'),('Dress for man','Pant','Product-00030','jeans-pant','5','It is best !!!','500'),('Dress for man','Shirt','Product-00031','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00032','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00033','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00034','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00035','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00036','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00037','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00038','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00039','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00040','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00041','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00042','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00043','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00044','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00045','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00046','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00047','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00048','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00049','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00050','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00051','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00052','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00053','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00054','Full-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00055','Half-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00056','Half-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00057','Half-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00058','Half-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00059','Half-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Shirt','Product-00060','Half-sleeve casual shirt','5','It is best for you !','500'),('Dress for man','Polo T Shirts','Product-00061','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00062','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00063','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00064','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00065','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00066','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00067','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00068','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00069','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00070','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00071','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00072','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00073','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00074','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00075','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00076','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00077','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00078','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00079','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00080','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00081','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00082','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00083','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00084','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00085','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00086','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00087','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00088','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00089','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for man','Polo T Shirts','Product-00090','Stylish-gents-T-shirt','5','It is Nice !!!','150'),('Dress for woman','Bracelet','Product-00091','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00092','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00093','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00094','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00095','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00096','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00097','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00098','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00099','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00100','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00101','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00102','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00103','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00104','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00105','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00106','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00107','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00108','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00109','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00110','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00111','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00112','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00113','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00114','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00115','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00116','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00117','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00118','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00119','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','Bracelet','Product-00120','pink-stone-bracelet','5','Its Awsome !!!','200'),('Dress for woman','salwar-kameez','Product-00121','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00122','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00123','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00124','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00125','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00126','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00127','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00128','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00129','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','salwar-kameez','Product-00130','unstiched-three-piece','5','Nice product !!','1000'),('Dress for woman','Sharee','Product-00131','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00132','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00133','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00134','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00135','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00136','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00137','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00138','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00139','casual-party-sarees','5','Its beautyfull !!','700'),('Dress for woman','Sharee','Product-00140','casual-party-sarees','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00141','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00142','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00143','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00144','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00145','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00146','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00147','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00148','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00149','Kids-top-set','5','Its beautyfull !!','700'),('Baby Kids','Baby Dress','Product-00150','Kids-top-set','5','Its beautyfull !!','700');

/*Table structure for table `shopping_card` */

DROP TABLE IF EXISTS `shopping_card`;

CREATE TABLE `shopping_card` (
  `session_id` varchar(100) NOT NULL default '',
  `product_id` varchar(15) NOT NULL default '',
  `product_name` varchar(30) NOT NULL,
  `product_details` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shopping_card` */

insert  into `shopping_card`(`session_id`,`product_id`,`product_name`,`product_details`,`product_price`,`quantity`) values ('34e376d93a2ddcec04f4819e834789ef','Product-00063','Stylish-gents-T-shirt','It is Nice !!!',150,5),('34e376d93a2ddcec04f4819e834789ef','Product-00031','Full-sleeve casual shirt','It is best for you !',500,6),('34e376d93a2ddcec04f4819e834789ef','Product-00097','pink-stone-bracelet','Its Awsome !!!',200,7),('fd30a1c8b633bb6f35111f71744989b4','Product-00078','Stylish-gents-T-shirt','It is Nice !!!',150,1),('9663af67d6c9e53fd3e8bb9c88842fb5','Product-00077','Stylish-gents-T-shirt','It is Nice !!!',150,2),('98f36feac32c98dd80b1b36004e1c4c5','Product-00039','Full-sleeve casual shirt','It is best for you !',500,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
