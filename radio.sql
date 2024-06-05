-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2024 at 06:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radio`
--

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `principal` varchar(255) NOT NULL,
  `persona1` varchar(255) DEFAULT NULL,
  `persona2` varchar(255) DEFAULT NULL,
  `tematica` varchar(255) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`id`, `titulo`, `principal`, `persona1`, `persona2`, `tematica`, `enlace`, `fecha`) VALUES
(114, 'Acto de Recogida de Acta en la Estabilización del Personal del Ayuntamiento', 'Varios', '', '', 'Personal', 'https://drive.google.com/file/d/1CvoIOkDXra7z0QhdnJOKs4AyOw_rdOXN/view?usp=drive_link', '2023-06-30'),
(166, '30º Aniversario Visita Papa El Rocío', 'Coral Polifónica Isla Cristina', '', '', 'Religión', 'https://drive.google.com/file/d/18n7X3_FxSkeFS57OpXSV0Bm9OmTiOveZ/view?usp=drive_link', '2023-06-14'),
(167, 'Acto Día del Orgullo LGTBIQ+', 'Varios', '', '', 'Social', 'https://drive.google.com/file/d/1JWXcPuOHCHeb7rZ5rZQslaa8Tuq65_3V/view?usp=drive_link', '2023-06-28'),
(170, 'Agradecimiento a Colaboradores del CPA Isla Cristina', 'Varios', '', '', 'Mayores', 'https://drive.google.com/file/d/1K-nar47RnAldLsX6JenVDdWnW6w4_5Ik/view?usp=drive_link', '2023-06-28'),
(171, 'Camino del Rocío', 'Vuelta 2º día', '', '', 'Religión', 'https://drive.google.com/file/d/1SrRluf98J2P_HjhkAV1CAJKrUpbb4LKa/view?usp=drive_link', '2023-05-30'),
(172, 'Al Compás de Romero', 'Antonio de la Malena', '', '', 'Flamenco', 'https://drive.google.com/file/d/1Are5mfAyg07pI4C71spoGa9YJrtLhiOW/view?usp=drive_link', '2023-06-01'),
(173, 'Camino del Rocío', 'Camino 2º día ', 'Jesús Anastasio', '', 'Religión', 'https://drive.google.com/file/d/1BhgYY1ZjlJHGvK0eqxXvkfrzXBsalBMh/view?usp=drive_link', '2023-05-23'),
(175, 'Al Compás de Romero', 'Jesús Corbacho', '', '', 'Flamenco', 'https://drive.google.com/file/d/19wRIvDyK-NCutqXOyPjB562YlPY8Cl1f/view?usp=drive_link', '2023-06-22'),
(177, 'Camino del Rocío', 'Camino 3º día', 'Mari Carmen Verdún', '', 'Religión', 'https://drive.google.com/file/d/1FaKnxOZxq38Aq9s1GxK3A8vTIK859FwW/view?usp=drive_link', '2023-05-24'),
(179, 'Al Compás de Romero', 'Juan Pinilla', '', '', 'Flamenco', 'https://drive.google.com/file/d/1u6_rw-lh9WIN7Hiv8xLQ1__Jt0PqnKQX/view?usp=drive_link', '2023-06-15'),
(180, 'Camino del Rocío', 'Vuelta 3º día', 'Mari Carmen Verdún', '', 'Religión', 'https://drive.google.com/file/d/1xIFk5rhdmjFMCiOV3ujpD18Ty4uoTANM/view?usp=drive_link', '2023-05-31'),
(182, 'Al Compás de Romero', 'Manuel Vera Quincalla', '', '', 'Flamenco', 'https://drive.google.com/file/d/1NRWOY0iZng90ptqr5sBUGZNHUzG4dQLJ/view?usp=drive_link', '2023-06-08'),
(184, 'Camino del Rocío', 'Camino 4º día', 'Ana Angustias', '', 'Religión', 'https://drive.google.com/file/d/1Kcc3cGH5YtyxWBj5L5P-UDrg2swrUnRQ/view?usp=drive_link', '2023-05-25'),
(185, 'Al Compás de Romero', 'Manuela Laino', '', '', 'Flamenco', 'https://drive.google.com/file/d/1ML436gVz_UIJSLOyY4k94_3V8qPyafVX/view?usp=drive_link', '2023-06-29'),
(187, 'Camino del Rocío', 'Actos y cultos en la aldea de El Rocío', 'Raúl Fernández', '', 'Religión', 'https://drive.google.com/file/d/10jah2cmNVF_xtGsOmTFfABsn7KybqOuz/view?usp=drive_link', '2023-05-26'),
(189, 'Club de Motos La Higuerita Los Viejos Amigos', 'Álvaro Tierra', '', '', 'Deportes', 'https://drive.google.com/file/d/1LfYwM_zJx2ZqsF860uXvedhNq8PA1VTE/view?usp=drive_link', '2023-06-08'),
(190, 'Camino del Rocío', 'Entrada Hermandad del Rocío en Isla Cristina', '', '', 'Religión', 'https://drive.google.com/file/d/1mFbgabuw-AVKTGwDt837vvGx39iyJLol/view?usp=drive_link', '2023-06-01'),
(193, 'Academia Gazpacho Andaluz', 'Antonio Aguilera', '', '', 'Social', 'https://drive.google.com/file/d/184L0EwP-dCMiMbckyoI2BOCVb5WpKRzT/view?usp=drive_link', '2023-06-26'),
(195, 'Jornada Electoral', 'Secretaría Municipal', '', '', 'Política', 'https://drive.google.com/file/d/1dYM3eEuRlHJdwYWGMEAiihLsF1QymPTo/view?usp=drive_link', '2023-05-28'),
(199, 'Jornada Electoral', 'Representante Administración', '', '', 'Política', 'https://drive.google.com/file/d/1kJtPHNbSsT_s6Ogv3KapVU76TT0WG11U/view?usp=drive_link', '2023-05-28'),
(202, 'Fútbol-Dribblin', 'Campus de Verano', '', '', 'Deportes', 'https://drive.google.com/file/d/1-EuUUQ8r5v2nXiLxpByx9PfrFqxBOwtg/view?usp=drive_link', '2023-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `presentador` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `dia` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `titulo`, `presentador`, `hora`, `dia`, `descripcion`, `foto`) VALUES
(1, 'La edad no importa', 'Suso Fernández', '10:30', 'Martes', 'Un espacio divulgativo del Centro de Participación Activa de Mayores que se emite cada quince días.', 'susofernandez.jpg'),
(2, 'Las Mañanas Isleñas', 'Pepa Mari Serrano', '10:00 - 13:00', 'Lunes,Martes,Miercoles,Jueves,Viernes', 'Magazine diario con entrevistas, reportajes y directos.', 'pepamari.jpg'),
(3, 'Las Mañanas Isleñas', 'Jose Enrique', '10:00 - 13:00', 'Lunes,Martes,Miercoles,Jueves,Viernes', 'Magazine diario con entrevistas, reportajes y directos.', 'joseenrique.jpg'),
(4, 'Luz Verde', 'Carlos Ruiz', '10:30 - 11:00', 'Lunes', 'Carlos Ruíz presenta el espacio “Luz Verde”, perteneciente a la Escuela de Seguridad Vial con consejos, normativas y normas de circulación, tanto para conductores como peatones.', 'carlosruiz.jpg'),
(5, 'El Rebujito (Verano) - Carnavaleando (Invierno) - Matraca (Primavera) - Revuelo de Sevillanas ', 'Jesús Hermoso y Toni Riego', '13:00 - 14:00', 'Lunes,Martes,Miercoles,Jueves,Viernes,Sabado', 'Programa de contenidos varios según la temporada.', 'jesushermoso.jpg'),
(6, 'Las Recetas de Luzón', 'Felipe Luzón', '10:30', 'Miercoles', 'Un espacio quincenal gastronómico a base de recetas con los pescados de nuestra costa.', 'felipeluzon.jpg'),
(7, 'La Mar de Libros (Quincenal)', 'Juan Venegas', '10:30 - 11:00', 'Martes', 'Un espacio de la Biblioteca Municipal presentado por su director para dar a conocer las novedades y servicios del centro cultural. (Martes, de 10,30 a 11h, quincenal).', 'juanvenegas.jpg'),
(8, 'El Pupitre', 'Ana Calahuche', '11:00 - 11:30', 'Martes', 'Ana presenta “El Pupitre”, un espacio educativo dependiente de la Delegación Municipal de Educación.', 'anacalahuche.jpg'),
(9, 'Tus Derechos Importan (Quincenal)', 'Tere López Mingorance', '10:30 - 11:00', 'Miercoles', 'Tere es la Técnica Municipal de Sanidad y Consumo y presenta un espacio quincenal que se llama “Tus Derechos Importan”.', 'terelopez.jpg'),
(10, 'Al Compás de Romero', 'Emilio Romero', '10:30 - 11:00', 'Jueves', 'Un espacio de flamenco dirigido y presentado por un flamencólogo con años de experiencia.', 'emilioromero.jpg'),
(11, 'Deportes', 'Con el Servicio Municipal de Deportes', '10:30', 'Viernes', 'Un espacio del Servicio Municipal de Deportes con toda la información del fin de semana y días más próximos.', 'deportes.jpg'),
(12, 'Las Mañanas del Sábado', '', '10:00 - 13:00', 'Sabado', 'Un recopilatorio de los temas más destacados tratados durante toda la semana.', 'lmds.jpeg'),
(13, 'Música', 'RIC', '9:00', 'Domingo', 'Música de Domingo', 'musica.jpeg'),
(14, 'Con Ojos Ajenos', 'Alexandra Altamirano', '10:30', 'Lunes', 'Un espacio sobre la historia de Isla Cristina desde la perspectiva de alguien de fuera que nos recordará nuestros hitos más importantes o nos los descubrirá para otros.', 'alexandra.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3703;

--
-- AUTO_INCREMENT for table `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
