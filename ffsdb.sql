-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 11:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ffsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `Cat_ID` int(11) NOT NULL,
  `Cat_Name` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kategorijos`
--

INSERT INTO `kategorijos` (`Cat_ID`, `Cat_Name`) VALUES
(1, 'Vaisiai ir daržovės'),
(2, 'Duonos gaminiai'),
(3, 'Pieno produktai, kiaušiniai ir sūris'),
(4, 'Mėsa ir žuvys');

-- --------------------------------------------------------

--
-- Table structure for table `produktas`
--

CREATE TABLE `produktas` (
  `Product_ID` int(11) NOT NULL,
  `Product_Price` char(20) COLLATE utf8_bin NOT NULL,
  `Product_Name` varchar(45) COLLATE utf8_bin NOT NULL,
  `Product_Desc` varchar(250) COLLATE utf8_bin NOT NULL,
  `Product_Rating` int(5) NOT NULL,
  `Product_Photo` varchar(128) COLLATE utf8_bin NOT NULL,
  `Shop_Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `Shop_Place` varchar(150) COLLATE utf8_bin NOT NULL,
  `cat_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produktas`
--

INSERT INTO `produktas` (`Product_ID`, `Product_Price`, `Product_Name`, `Product_Desc`, `Product_Rating`, `Product_Photo`, `Shop_Name`, `Shop_Place`, `cat_ID`) VALUES
(8, '0,99 &#8364/kg', 'Bananai', 'Bananai', 5, '448871.png', '\"Rimi\"', 'Žirmūnų g. 64', 1),
(9, '1,99 &#8364/kg', 'Mandarinai', 'Mandarinai', 5, '738019.png', '\"Rimi\"', 'Žirmūnų g. 64', 1),
(10, '0,39 &#8364/kg', 'Morkos', 'Morkos', 5, '613603.png', '\"Rimi\"', 'Žirmūnų g. 64', 1),
(16, '4,19 &#8364/kg', 'Smulkinta jautiena su kiauliena 1 kg', 'Jautiena (50 %), kiauliena (50 %)', 5, '558825.png', '\"Rimi\"', 'Žirmūnų g. 64', 4),
(20, '0,69 &#8364', 'Ciabatta su baziliku', 'CIABATTA pasižymi traškia plutele, ypatingu lengvumu, purumu ir viduje esančiais oro burbuliukais paliktais pėdsakais. Jaučiamas lengvas baziliko skonis.', 5, '227975.png', '\"Rimi\"', 'Žirmūnų g. 64', 2),
(21, '0,85 &#8364', 'Rokiškio NAMINIS pienas', 'Natūralus pienas ir jo gaminiai yra ypač vertingi ir naudingi sveikatai. Tai pagrindinis baltymų ir kalcio šaltinis.', 5, '67704.png', '\"Rimi\"', 'Žirmūnų g. 64', 3),
(22, '2,19 &#8364', 'Saldžios grietinėlės sviestas DVARO', 'Gaminamas unikalia technologija, tik iš šviežios saldžios grietinėlės, todėl išsiskiria turtingu skoniu, lengviau tepamas. Atitinka aukÅ¡Äiausius pasaulinius sviesto standartus.', 5, '257656.png', '\"Rimi\"', 'Žirmūnų g. 64', 3),
(23, '0,50 &#8364', 'Glaistytas varškės sūrelis URIGA', 'Varškė— 62%, glaistas 20% (cukrus, augaliniai riebalai (palmių branduolių, palmių), mažesnio riebumo kakavos milteliai 17%, kvapiosios medžiagos, emulsiklis rapsų lecitinas), cukrus, kvapioji medžiaga vanilinas ', 5, '162764.png', '\"Rimi\"', 'Žirmūnų g. 64', 3),
(24, '1,79 &#8364', 'Saulėgrąžų duona', 'Forminė duona su saulėgrąžomis', 5, '59167.png', '\"Rimi\"', 'Žirmūnų g. 64', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reitingas`
--

CREATE TABLE `reitingas` (
  `ID` int(11) NOT NULL,
  `prekePasirinkt` int(11) NOT NULL,
  `prekeReitingas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reitingas`
--

INSERT INTO `reitingas` (`ID`, `prekePasirinkt`, `prekeReitingas`) VALUES
(26, 8, 5),
(27, 8, 2),
(28, 21, 4),
(29, 21, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `produktas`
--
ALTER TABLE `produktas`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `reitingas`
--
ALTER TABLE `reitingas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `Cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produktas`
--
ALTER TABLE `produktas`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reitingas`
--
ALTER TABLE `reitingas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
