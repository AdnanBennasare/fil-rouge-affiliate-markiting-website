-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affiliateconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `admin_Id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`admin_Id`, `phone`, `email`, `password`) VALUES
(21, '0630881970', 'ruporury@mailinator.com', '$2y$10$KTljoGCIHk2m2H6EhJ/1FOpU.EKfCugVmN8mHcXUnYN2bShyGoUd6'),
(22, '42452', '45245245', '$2y$10$rDxzCMw4AqHe1UWhPMvyG.kjvOThsXapJmxvY4w0pXQECfNI6R3Tu'),
(23, '123456789', 'nifacas@mailinator.com', '$2y$10$8J2aiI1xZv5uVg8uwl/58.QykHG3gSZklMDX996Re2XQrrVpJcT56'),
(24, '0606', 'culoraz@mailinator.com', '$2y$10$N2tgGZd8hJFujiO1QaYVgOuCn0GdhYY1dMSZ/VS0B78FQYGY9APqi');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE `affiliate` (
  `affiliate_id` int(11) NOT NULL,
  `affiliate_name` varchar(255) DEFAULT NULL,
  `affiliate_link` varchar(255) DEFAULT NULL,
  `Price` int(225) NOT NULL,
  `Product_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affiliate`
--

INSERT INTO `affiliate` (`affiliate_id`, `affiliate_name`, `affiliate_link`, `Price`, `Product_Id`) VALUES
(15, 'Zoe Madden', 'Voluptatem maxime re', 60, 18),
(16, 'Colleen Battle', 'Necessitatibus cillu', 596, 18);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(350) NOT NULL,
  `Category_Img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Category_Img`) VALUES
(5, 'gaming', 'https://www.wirerealm.com/wp-content/uploads/2017/08/the-best-gaming-gear-1024x419.jpg'),
(6, 'Electronics', 'https://www.kindpng.com/picc/m/140-1404058_electronic-goods-images-png-transparent-png.png'),
(8, 'Beauty & Care', 'https://www.usacosmetics.com/wp-content/uploads/2018/11/7-bubble-foam.jpg'),
(9, 'Sports & Fitness', 'Non iusto ut harum u'),
(10, 'Home & Kitchen', 'https://www.vanillaluxury.sg/sites/default/files/field/image/Keep%20Your%20Home%20Clean%20With%20A%20Robot%20Vacuum%20Cleaner%20%20-Banner_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(11) NOT NULL,
  `Brand` varchar(300) NOT NULL,
  `Product_Name` varchar(1000) NOT NULL,
  `Image_URL` varchar(1000) NOT NULL,
  `Date_Added` varchar(250) NOT NULL,
  `Tag` varchar(250) NOT NULL,
  `Bottom_Line` varchar(1000) NOT NULL,
  `PROS` varchar(1000) NOT NULL,
  `CONS` varchar(1000) NOT NULL,
  `Type_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Brand`, `Product_Name`, `Image_URL`, `Date_Added`, `Tag`, `Bottom_Line`, `PROS`, `CONS`, `Type_Id`) VALUES
(12, 'Expedita corrupti cmagn', 'Lacota Sullivangdgffd', 'https://media.cnn.com/api/v1/images/stellar/prod/dyson-v11-overall-lead.jpg?c=16x9&q=h_720,w_1280,c_fill', '2023-06-18', 'Incidunt id velit a', 'Omnis alias magna ma', 'Voluptas consectetur', 'Fugiat ut est conse', 12),
(13, 'A amet ipsum exerci', 'headphones y48', 'https://m.media-amazon.com/images/I/61emnvMdApS._AC_SX450_.jpg', '2023-06-10', 'Quibusdam facilis en', 'Deserunt nostrum lor', 'Velit culpa dignissi', 'Aut fugiat aut praes', 11),
(14, 'Amet quia ullamco q', 'Valera, Swiss Silent Jet Light 7500', 'https://m.media-amazon.com/images/I/614zOnnNJHL.__AC_SX300_SY300_QL70_FMwebp_.jpg', '2023-06-10', 'Cumque aut culpa ali', 'Fugiat dicta vitae ', 'Voluptate sit cumqu', 'Eaque Nam accusamus ', 13),
(15, 'Perferendis id nihil', 'aaaaaaaaaaaaaaaaa', 'https://m.media-amazon.com/images/I/61g1yQfmlwL.__AC_SX300_SY300_QL70_FMwebp_.jpg', '2023-06-15', 'Accusamus perspiciat', 'aaaaaaaaaaaaaaa', 'Assumenda qui expedi', 'Et consequat Non pl', 16),
(16, 'Ullam repellendus E', 'iphone', 'https://m.media-amazon.com/images/I/717KHGCJ6eL._AC_SX679_.jpg', '2023-06-10', 'Iure cum dolor obcae', 'Quia nobis enim atqu', 'Pariatur Ab dolorem', 'Quos laborum Quas a', 17),
(18, 'Et odit minima ut et', 'speakerio', 'https://m.media-amazon.com/images/I/811N1pHc8PL._AC_SY450_.jpg', '2023-06-10', 'Sed ut qui ut aliqua', 'Nam aut sed pariatur', 'Facere enim qui reru', 'Ut qui repellendus ', 19),
(19, 'Vero animi pariatur', 'Janna Russell', 'https://m.media-amazon.com/images/I/712T6VYeaWL._AC_SY450_.jpg', '2023-06-10', 'Aut dolorum labore c', 'Eligendi adipisicing', 'Magna consequat Dol', 'Quia eveniet et rer', 20),
(20, 'Cum tenetur ullamco ', 'Eleanor Hatfield', 'https://m.media-amazon.com/images/I/61AxFFZM-wL._AC_SX466_.jpg', '2023-06-10', 'Similique neque et a', 'Rerum occaecat conse', 'Quod voluptas iste i', 'Eiusmod reprehenderi', 21),
(21, 'Asperiores voluptas ', 'Cailin Butler', 'https://m.media-amazon.com/images/I/51Ntg5cIQOL._AC_SY450_.jpg', '2023-06-10', 'Assumenda natus ad e', 'Est placeat quae co', 'Eos occaecat eaque ', 'Voluptatem accusanti', 22),
(22, 'Recusandae Sit dele', 'Risa Sharp', 'https://m.media-amazon.com/images/I/71IePss17vS._SX466_.jpg', '2023-06-10', 'Pariatur Perferendi', 'Eveniet quis numqua', 'Mollitia dolorem non', 'Pariatur Est quidem', 16),
(23, 'Pariatur Blanditiis', 'Maisie Bryant', 'https://m.media-amazon.com/images/I/6142j7nK52L._SX466_.jpg', '2023-06-10', 'Aute omnis adipisci ', 'Laborum eiusmod ex n', 'Esse culpa occaecat ', 'Enim autem velit es', 23),
(24, 'Explicabo Qui aut q', 'Celeste Snyder', 'https://m.media-amazon.com/images/I/71qzTnadGmL._AC_SY450_.jpg', '2023-06-10', 'Fugiat voluptate sed', 'Voluptatibus hic lab', 'Alias Nam modi in la', 'Voluptatem voluptas ', 24),
(25, 'Est porro omnis eum', 'Summer Foley', 'https://m.media-amazon.com/images/I/61XzOG9rAwL._AC_SX679_.jpg', '2023-06-10', 'In sed similique del', 'Minus doloremque ut ', 'Tenetur ut eaque ess', 'Earum sapiente conse', 25),
(26, 'Rerum a perferendis ', 'Gavin Jacobs', 'https://m.media-amazon.com/images/I/61Cgm68AIgL.__AC_SY300_SX300_QL70_FMwebp_.jpg', '2023-06-10', 'Qui quam maiores vol', 'Architecto voluptati', 'Aute do voluptatum u', 'Fugiat est laborum ', 26),
(27, 'Dolor nobis dignissi', 'Anthony Osborne', 'https://m.media-amazon.com/images/I/71IywmQMCTL._AC_SY450_.jpg', '2023-06-10', 'Nisi dolore architec', 'Corrupti et nemo qu', 'Et optio officia mo', 'Quis nostrum autem q', 27),
(28, 'Possimus reprehende', 'Jena Gordon', 'https://m.media-amazon.com/images/I/81MZiFI4OlL._AC_SX466_.jpg', '2023-06-10', 'Enim accusantium eiu', 'Nam consectetur fugi', 'Fugiat dolore praese', 'Eius perferendis seq', 29),
(29, 'Doloremque beatae mi', 'Bertha Roach', 'https://m.media-amazon.com/images/I/61BeM+ErRzL._SY450_.jpg', '2023-06-11', 'Enim voluptatibus cu', 'Veniam optio labor', 'Laboriosam vel dolo', 'Dolores et irure sae', 30),
(31, 'Hic cupidatat except', 'Nomlanga Martinez', 'https://m.media-amazon.com/images/I/51jEqG3oz+L._SY450_.jpg', '2023-06-11', 'Non ut veritatis ill', 'Inventore unde in re', 'Consectetur recusan', 'Et ea cillum fugiat', 33),
(32, 'Esse assumenda asper', 'Knox Dotson', 'https://m.media-amazon.com/images/I/412G8NHeMWS._SY450_.jpg', '2023-06-11', 'Magni deleniti rem i', 'Ut qui fugiat volupt', 'Consequat Sunt dolo', 'Duis eveniet nostru', 33),
(33, 'Aspernatur perspicia', 'Ulric Mathis', 'https://m.media-amazon.com/images/I/81z56yYQDzL._SY450_.jpg', '2023-06-11', 'Dolores rerum elit ', 'Magnam harum et ut d', 'Ea explicabo Est lo', 'Quo sunt consequat', 34),
(34, 'Hic corporis eiusmod', 'Ila Workman', 'https://m.media-amazon.com/images/I/41Mw37trJhL._SX300_SY300_QL70_FMwebp_.jpg', '2023-06-11', 'Quia eum et deserunt', 'Qui cumque mollit pr', 'Voluptas dignissimos', 'Eligendi laboris nat', 35),
(35, 'Et elit porro cupid', 'Rooney Wright', 'https://m.media-amazon.com/images/I/71wM654jJoS._SY450_.jpg', '2023-06-11', 'Duis in obcaecati ut', 'Dolore debitis labor', 'Reprehenderit sint ', 'Qui voluptatem Elig', 36),
(36, 'Eiusmod qui fugiat n', 'Simon Howe', 'https://images.squarespace-cdn.com/content/v1/57b6675ecd0f68c2b34451af/1539198213390-W8RV93AVEHYGN883VG5F/StocktonHeritage_HR_-171.jpg?format=1500w', '2023-06-11', 'Velit quis dolores ', 'Est aut qui numquam ', 'Omnis modi eveniet ', 'Velit anim sed vita', 37),
(37, 'Qui qui quia enim ip', 'Ezekiel Church', 'https://m.media-amazon.com/images/I/61nUOPTw5bL._AC_SY450_.jpg', '2023-06-11', 'Duis voluptate corpo', 'Mollit assumenda cor', 'Repudiandae qui sed ', 'Animi natus optio ', 39),
(38, 'Qui debitis veniam ', 'Isaac Gilmore', 'https://m.media-amazon.com/images/I/816H0qUBupL._AC_SX522_.jpg', '2023-06-11', 'Ad unde omnis nihil ', 'Velit dolorum itaque', 'Amet illo dolores q', 'Ea fugiat aut ut as', 40),
(39, 'Et aut perferendis q', 'Chaney English', 'https://m.media-amazon.com/images/I/61v7hre83GL._AC_SY450_.jpg', '2023-06-11', 'Suscipit tenetur dol', 'Nisi cumque odio odi', 'Commodo veritatis al', 'Rerum fugiat omnis ', 41),
(40, 'Voluptates ipsum ni', 'Maxwell Chaney', 'https://m.media-amazon.com/images/I/71zXiMUgfYL._AC_SX522_.jpg', '2023-06-12', 'Eum natus provident', 'Perspiciatis delect', 'Et est quia sit lab', 'Est ullamco atque p', 18),
(41, 'Dolor accusamus elig', 'Lacey Beasley', 'https://m.media-amazon.com/images/I/61PbdBoHAWL._AC_SX522_.jpg', '2023-06-12', 'Do veniam duis lore', 'Est excepturi sit ', 'Qui odit ex sequi am', 'Omnis inventore et v', 18),
(42, 'Placeat sed aut aut', 'Barry Gillespie', 'https://m.media-amazon.com/images/I/81U06MS2NiL._AC_SX522_.jpg', '2023-06-12', 'Animi ut quos eos l', 'Quo esse labore qui', 'Quod consequatur Do', 'Ratione tempor susci', 18),
(43, 'Dolores voluptatum p', 'Gray Griffin', 'https://m.media-amazon.com/images/I/710o-USTItL._AC_SX522_.jpg', '2023-06-12', 'Beatae quibusdam ven', 'Porro dolorem aut ex', 'Quae sunt incidunt', 'Cumque ex quae eos ', 18),
(45, 'Deserunt voluptatem', 'Kirk Livingston', 'https://m.media-amazon.com/images/I/51eOztNdCkL._SX522_.jpg', '2023-06-13', 'Ut ipsum eligendi to', 'Laboriosam corporis', 'Consequatur dolore m', 'Nisi ut consectetur', 44),
(46, 'Qui iusto dolorem pr', 'Amber Dunn', 'https://m.media-amazon.com/images/I/61DbVExME8L._SX522_.jpg', '2023-06-13', 'At possimus at recu', 'Quaerat vitae blandi', 'Tempore laboris pla', 'Aspernatur porro nih', 44),
(47, 'Sit ut quis id volu', 'Dean Hill', 'https://m.media-amazon.com/images/I/51Ror8eNtTL._SX522_.jpg', '2023-06-13', 'Adipisicing quidem p', 'Possimus in cillum ', 'Tempore dolorem und', 'Ipsum consectetur no', 44),
(48, 'Officia animi aliqu', 'Flynn Key', 'https://m.media-amazon.com/images/I/81wCNXD4F0L._AC_SX569_.jpg', '2023-06-13', 'Sed consequatur dol', 'Nulla voluptas fuga', 'Voluptatem Repellen', 'Quidem sit quibusda', 41),
(49, 'Ut hic commodi repre', 'Chastity Jenkins', 'https://m.media-amazon.com/images/I/51051FiD9UL._SX522_.jpg', '2023-06-13', 'Fugit laborum offic', 'Tenetur velit ea in', 'Assumenda non sit e', 'Quidem molestias nih', 8),
(50, 'Praesentium debitis ', 'Winter Pacheco', 'https://m.media-amazon.com/images/I/81MACEI0pzL._SX425_.jpg', '2023-06-13', 'Mollitia aliqua Eaq', 'Ad inventore reprehe', 'Id occaecat molesti', 'Quasi non alias omni', 8),
(51, 'Consequatur Volupta', 'Warren Valencia', 'https://m.media-amazon.com/images/I/61M-aUE+miL._SX466_.jpg', '2023-06-13', 'Ut recusandae Aut e', 'Saepe eum soluta rer', 'Molestiae quos culpa', 'Quasi aliqua Incidu', 33);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `Type_Id` int(11) NOT NULL,
  `Type_Name` varchar(250) NOT NULL,
  `Category_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Type_Id`, `Type_Name`, `Category_ID`) VALUES
(6, 'mouse', 5),
(7, 'Keyboard', 5),
(8, 'pes 5', 5),
(10, 'pc', 5),
(11, 'headset', 6),
(12, 'vacuum', 6),
(13, 'dryer', 6),
(16, 'tv', 6),
(17, 'phones', 6),
(18, 'Fans', 6),
(19, 'Speakers', 6),
(20, 'Cameras', 6),
(21, ' Accessories & Supplies', 6),
(22, 'Glasses', 6),
(23, 'Cables', 6),
(24, 'Remotes', 6),
(25, 'Car & Vehicle Electronics', 6),
(26, 'Watches', 6),
(27, ' Office Electronics', 6),
(29, ' eBook Readers & Accessories', 6),
(30, 'Hair Removal', 8),
(33, 'Face Cream', 8),
(34, 'Hair Cream', 8),
(35, 'Makeup', 8),
(36, 'Sunscreen', 8),
(37, 'Furniture', 10),
(39, 'Vacuums', 10),
(40, 'Ceiling Fan', 10),
(41, ' Cleaning Supplies', 10),
(42, 'Pc ', 5),
(43, 'Mouse', 5),
(44, 'Playstation', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `User_Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_Email`) VALUES
(114, 'sccscd.dcs.cdc@gmail.com'),
(115, 'adnanbennasare1@gmail.com'),
(116, 'adnanbennasare@gmail.com'),
(117, 'adnanbennasare1452452@gmail.com'),
(118, 'sofian@gmail.com'),
(119, 'seelhoast030609@gmail.com'),
(120, 'adnanbennasare@gmail.com'),
(121, 'adnanbennasare@gmail.com'),
(122, 'adnanbennasare@gmail.com'),
(123, 'sccscd.dcs.cdc@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`affiliate_id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Type_Id` (`Type_Id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Type_Id`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `affiliate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `Type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD CONSTRAINT `affiliate_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `products` (`Product_Id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Type_Id`) REFERENCES `type` (`Type_Id`) ON DELETE CASCADE;

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
