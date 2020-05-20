-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 05:11 AM
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
  `categoria` varchar(150) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `imagen`) VALUES
(1, 'Automotores', 'https://i.ibb.co/jfgnHqq/01-automotores.jpg'),
(2, 'Motos', 'https://i.ibb.co/1GkdHJx/02-motos-2.jpg'),
(3, 'Hogar', 'https://i.ibb.co/vhbgYPL/03-hogar-01.jpg'),
(4, 'Accidentes Personales', 'https://i.ibb.co/Ld4PqCq/04-accidentes-personales.jpg'),
(5, 'Vida', 'https://i.ibb.co/JFsxsfp/05-seguros-de-vida-01.jpg'),
(6, 'Agrícolas', 'https://i.ibb.co/31866Yw/06-agricolas-01.jpg');

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
(1, 'Póliza Básica Autos', 'Responsabilidad Civil\r\n', 'Esta cobertura comprende la indemnización por los daños que el asegurado, o un conductor autorizado por éste pueden ocasionarle a un tercero, por el vehículo asegurado o por la carga transportada en condiciones reglamentarias.\r\nLa responsabilidad Civil es hasta $ 10.000.000 para las categorías autos, camionetas, vehículos remolcados y casas rodantes. Para camiones, semitracciones, acoplados, maquinarias rurales, la suma asciende a $18.000.000.\r\n\r\n', 1),
(2, 'Póliza Clásica Autos', 'Responsabilidad Civil.\r\nPérdida Total por Robo y/o Hurto sin franquicia.\r\nPérdida Total por Incendio sin franquicia.\r\nGranizo.\r\nSeguro de Accidentes personales, en caso de fallecimiento, de $2.500 (por cada ocupante).\r\nAsistencia en Viaje las 24 hs.\r\nDefensa Penal. \r\nAsistencia al vehículo: Mecánica y remolque.', 'La cobertura principal consiste en asegurar los daños causados a terceros en el uso del vehículo (Responsabilidad Civil del automóvil). Cabe resaltar que todo propietario de vehículos a motor posee la obligación de contar con un seguro para poder circular.\r\nEn caso de robo y/o hurto de tu unidad, Marcin abonará el valor del vehículo asegurado hasta el 100% de la suma asegurada, sin ninguna franquicia.\r\nA la vez, el incendio total de la unidad será abonado sin ninguna franquicia a tu cargo.\r\n\r\nAsimismo, contarás con asistencia personalizada legal ante un siniestro en el cual se haya producido alguna lesión, servicio de asistencia y remolque de MAPFRE, extensión de cobertura a países limítrofes y del Mercosur, y seguro de Accidentes personales, en caso de fallecimiento, por cada ocupante.', 1),
(3, 'Poliza Granizo', 'Para los Girasoles y Maices', 'asbdhas asjfbafba jascbadofbad ajbcaioc', 6),
(4, 'Póliza Premiun Autos', 'Responsabilidad Civil hasta $10.000.000.\r\nPérdida Total por Robo y/o Hurto e Incendio sin franquicia. Destrucción Total por Accidente (Cláusula del 80%). Pérdidas parciales y/o daños Parciales sin franquicia al amparo del Robo/ Hurto Total. Pérdida Parcial por Incendio sin franquicia. Rotura de cristales del vehículo por cualquier causa. Daños parciales como consecuencia de granizo. Daños parciales por accidentes con franquicia fija del 5%. Seguro de Accidentes personales, en caso de fallecimiento, por cada ocupante de $5.000. Asistencia en viaje las 24 hs. Reposición de la unidad a 0KM, durante el primer año de cobertura antigüedad desde fecha de factura. Asistencia mecánica de urgencia y remolque.', 'Esta póliza es ideal para clientes que necesiten una cobertura amplia, todo riesgo, que los ampare ante todo tipo de imponderables para el vehículo, incluyendo daños por accidente. Consiste en asegurar los daños causados a terceros en el uso del vehículo (responsabilidad civil del automóvil). Todo propietario de vehículos a motor posee la obligación de contratar un seguro para poder circular.\r\nEn caso de robo y/o hurto del auto se abonará el valor del vehículo asegurado hasta el 100% de la suma asegurada sin ninguna franquicia. Reposición de la unidad a 0km durante el primer año de vigencia. \r\nEn caso de que el auto asegurado sufriera un robo y/o hurto total de la unidad y ésta posteriormente apareciera con daños ó faltantes, se encontrará cubierto. Por su parte, el incendio total o parcial de su unidad será abonado sin franquicia alguna.', 1),
(5, 'Póliza Básica Motos', 'Responsabilidad civil hasta $2.000.000.\r\nPérdida total por robo y/o hurto sin franquicia.\r\nAsistencia en viaje al vehículo las 24 hs.\r\nDefensa penal.', 'Este seguro esta destinado a motos a partir de 150 CC con una antiguedad máxima de 10 años, cuya cobertura ofrece Responsabilidad Civil para terceros transportados y no transportados. Además cubre pérdida total por Robo y/o Hurto sin franquicia.\r\nEs la mejor alternativa para los que priorizan la seguridad a un bajo costo. A su vez, incluye todos los servicios de asistencia al vehículo. ', 2),
(7, 'Póliza Clásica Motos', 'Responsabilidad civil hasta $6.000.000.\r\nPérdida total por robo y/o hurto sin franquicia.\r\nPérdida total por incendio.\r\nDestrucción total por accidente al 50%.\r\nAsistencia en viaje al vehículo las 24 hs.\r\nDefensa penal.', 'Este seguro es para motos a partir de 250 CC, con una antigüedad máxima de 10 años - que ofrece un alto nivel de seguridad, proporcionando tranquilidad y confianza al asegurado. \r\nAdemás,  brinda cobertura de Responsabilidad Civil para terceros transportados y no transportados, robo e incendio total y la exclusiva cláusula del 50% para la destrucción total e incluye todos los servicios de asistencia al vehículo.', 2),
(8, 'Póliza Premium Motos', 'Responsabilidad civil hasta $6.000.000. Pérdida total por robo y/o hurto sin franquicia y por incendio. Destrucción total por accidente al 80%. Pérdida parcial por robo y/o hurto e incendio sin franquicia. Daños parciales por accidente al amparo del robo y/o hurto total sin franquicia. Daños parciales por accidente.Asistencia en viaje al vehículo las 24 hs. Defensa penal. Seguro de accidentes personales para el asegurado en caso de fallecimiento', 'Este seguro es exclusivo para motos a partir de 500 CC con una antigüedad máxima de 5 años - es la póliza indicada para clientes exigentes.  Además de brindar cobertura de terceros completo, incluye daño parcial por incendio y accidente, seguro de accidentes personales para el asegurado, servicio de gestoría y reposición a 0km en caso de siniestro total durante el primer año de compra, entre otras.', 2),
(9, 'Póliza Vida Simple', 'Muerte por enfermedad o accidente.\r\nDoble Indemnización por Muerte Accidental.\r\nInvalidez Absoluta y Permanente por Accidente.', 'Es un seguro de vida que te protege en circunstancias difíciles, para que tu familia pueda afrontar el futuro sin preocupaciones.Ademas,cubre el riesgo de muerte económicamente prematura e inoportuna, amparando y manteniendo la estabilidad económica del grupo familiar. Si el asegurado llega con vida al vencimiento del contrato, éste se da por finalizado sin ninguna contraprestación por parte de Marcin. Por otro lado, si el asegurado fallece durante la vigencia del contrato, sus herederos legales o los beneficiarios designados percibirán el capital asegurado.', 5),
(10, 'Póliza Vida Plus', 'Muerte por enfermedad o accidente.\r\nMuerte accidental.\r\nInvalidez absoluta y permanente.\r\nSumas asegurables: con un capital mínimo a contratar de $ 50.000 y máximo de $ 6.000.000.', 'Es un seguro diseñado para cubrir exclusivamente necesidades de protección económica, personales o familiares. Ademas, garantiza la indemnización de un capital ante la eventualidad de fallecimiento prematuro o invalidez del asegurado. El contrato se realiza por el término de un año y se renueva de forma automática.', 5),
(11, 'Poliza Hogar ', 'incendio y robo', 'baufuacbcua ahscbaifai casuca ', 3),
(12, 'trigo', 'total', 'asdbasudasfaus', 6);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `id_planes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;

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
