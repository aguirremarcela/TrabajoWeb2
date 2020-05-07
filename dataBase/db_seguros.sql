-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 03:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_seguros`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `categoria` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Automotores'),
(2, 'Motos'),
(3, 'Hogar'),
(4, 'Accidentes Personales'),
(5, 'Vida'),
(6, 'Agrícolas');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `id_planes` int(10) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `cobertura` text NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id_planes`, `plan`, `cobertura`, `descripcion`, `id_categoria_fk`) VALUES
(1, 'Póliza Básica', 'Responsabilidad Civil\r\n', 'Esta cobertura comprende la indemnización por los daños que el asegurado, o un conductor autorizado por éste, pueden ocasionarle a un tercero, por el vehículo asegurado o por la carga transportada en condiciones reglamentarias.\r\nResponsabilidad Civil es hasta $ 10.000.000 para las categorías autos, camionetas, vehículos remolcados y casas rodantes. Para camiones, semitracciones, acoplados, maquinarias rurales, la suma asciende a $18.000.000.\r\n\r\n', 1),
(2, 'Póliza Clásica', 'Responsabilidad Civil.\r\nPérdida Total por Robo y/o Hurto sin franquicia.\r\nPérdida Total por Incendio sin franquicia.\r\nGranizo.\r\nSeguro de Accidentes personales, en caso de fallecimiento, de $2.500 (por cada ocupante).\r\nAsistencia en Viaje las 24 hs.\r\nDefensa Penal. \r\nAsistencia al vehículo: Mecánica', 'La cobertura principal consiste en asegurar los daños causados a terceros en el uso del vehículo (Responsabilidad Civil del automóvil). Cabe resaltar que todo propietario de vehículos a motor posee la obligación de contar con un seguro para poder circular.\r\nEn caso de robo y/o hurto de tu unidad, MARTA abonará el valor del vehículo asegurado hasta el 100% de la suma asegurada, sin ninguna franquicia.\r\nA la vez, el incendio total de la unidad será abonado sin ninguna franquicia a tu cargo.\r\n\r\nAsimismo, contarás con asistencia personalizada legal ante un siniestro en el cual se haya producido alguna lesión, servicio de asistencia y remolque de MAPFRE, extensión de cobertura a países limítrofes y del Mercosur, y seguro de Accidentes personales, en caso de fallecimiento, por cada ocupante.', 1),
(3, 'Poliza Granizo', 'Para los Girasoles y Maices', 'asbdhas asjfbafba jascbadofbad ajbcaioc', 6),
(4, 'Póliza Premiun', '• Responsabilidad Civil hasta $10.000.000.\r\n• Pérdida Total por Robo y/o Hurto sin franquicia.\r\n• Pérdida Total por Incendio sin franquicia.\r\n• Destrucción Total por Accidente (Cláusula del 80%).\r\n• Pérdidas parciales y/o daños Parciales sin franquicia al amparo del Robo/ Hurto Total.\r\n• Pérdida Parcial por Incendio sin franquicia.\r\n• Rotura de cristales del vehículo por cualquier causa.\r\n• Daños parciales como consecuencia de granizo.\r\n• Daños parciales por accidentes con franquicia fija del 5%.\r\n• Seguro de Accidentes personales, en caso de fallecimiento, por cada ocupante de $5.000.\r\n• Asistencia en viaje las 24 hs.\r\n• Reposición de la unidad a 0KM. durante el primer año de cobertura antigüedad desde fecha de factura.\r\n• Asistencia mecánica de urgencia y remolque.', 'Esta póliza es ideal para clientes que necesiten una cobertura amplia, todo riesgo, que los ampare ante todo tipo de imponderables para el vehículo, incluyendo daños por accidente. Consiste en asegurar los daños causados a terceros en el uso del vehículo (responsabilidad civil del automóvil). Todo propietario de vehículos a motor posee la obligación de contratar un seguro para poder circular.\r\nEn caso de robo y/o hurto del auto se abonará el valor del vehículo asegurado hasta el 100% de la suma asegurada sin ninguna franquicia. Reposición de la unidad a 0km durante el primer año de vigencia. \r\nEn caso de que el auto asegurado sufriera un robo y/o hurto total de la unidad y ésta posteriormente apareciera con daños ó faltantes, se encontrará cubierto. Por su parte, el incendio total o parcial de su unidad será abonado sin franquicia alguna.', 1),
(5, 'Póliza Básica  ', '• Responsabilidad civil hasta $2.000.000.\r\n• Pérdida total por robo y/o hurto sin franquicia.\r\n• Asistencia en viaje al vehículo las 24 hs.\r\n• Defensa penal.', 'Este seguro esta destinado a motos a partir de 150 CC con una antiguedad máxima de 10 años, cuya cobertura ofrece Responsabilidad Civil para terceros transportados y no transportados. Además cubre pérdida total por Robo y/o Hurto sin franquicia.\r\n \r\nEs la mejor alternativa para los que priorizan la seguridad a un bajo costo. A su vez, incluye todos los servicios de asistencia al vehículo. ', 2),
(7, 'Póliza Clásica', 'Responsabilidad civil hasta $6.000.000.\r\nPérdida total por robo y/o hurto sin franquicia.\r\nPérdida total por incendio.\r\nDestrucción total por accidente al 50%.\r\nAsistencia en viaje al vehículo las 24 hs.\r\nDefensa penal.', 'Este seguro es para motos a partir de 250 CC, con una antigüedad máxima de 10 años - que ofrece un alto nivel de seguridad, proporcionando tranquilidad y confianza al asegurado. \r\nAdemás,  brinda cobertura de Responsabilidad Civil para terceros transportados y no transportados, robo e incendio total y la exclusiva cláusula del 50% para la destrucción total e incluye todos los servicios de asistencia al vehículo.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_planes`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id_planes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `planes_ibfk_1` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
