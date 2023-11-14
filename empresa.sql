-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2023 a las 02:11:14
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE `categoria_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_productos`
--

INSERT INTO `categoria_productos` (`id`, `nombre`) VALUES
(1, 'Hamburgueza'),
(2, 'Pizza'),
(3, 'Acompañantes'),
(4, 'Chivitos'),
(5, 'Combos'),
(6, 'Aperitivos'),
(7, 'Bebidas'),
(9, 'Postres'),
(10, 'Parrilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`) VALUES
(1, 'BFG Burger', 'Nuestra BFG Burger es una hamburguesa gigante y deliciosa que haría justicia al icónico BFG (Big F***ing Gun) del juego. Esta hamburguesa podría tener varias capas de carne, queso, bacon y salsas especiales.', 12.99, 1),
(2, 'Archvile Burger', 'La Archvile Burger es una hamburguesa picante que te hará sentir como si estuvieras en las llamas del infierno. Incluye carne de res a la parrilla, jalapeños, cebolla morada y una salsa ardiente.', 11.99, 1),
(3, 'Cyberdemon Burger', 'La Cyberdemon Burger es una hamburguesa monstruosa que honra al temible Cyberdemon del juego. Con doble carne, queso derretido, champiñones y cebolla caramelizada.', 14.99, 1),
(4, 'DemonPizza', 'Una explosión de sabor te espera en cada bocado de nuestra DemonPizza. Con una base crujiente y una salsa picante, esta pizza está cargada de ingredientes que harían temblar a cualquier demonio. Pepperoni, jalapeños y queso derretido se combinan para crea', 14.99, 2),
(5, 'Cacodemon Pizza', 'La Cacodemon Pizza es una pizza para los amantes del picante. Con salsa de chiles infernales, pepperoni picante y pimientos rojos, esta pizza te desafiará a enfrentar el calor del infierno.', 13.99, 2),
(6, 'Doom Slayer Pizza', 'La Doom Slayer Pizza es una pizza épica que rinde homenaje al valiente protagonista del juego. Con una variedad de carnes, champiñones y una salsa especial, esta pizza es una verdadera delicia.', 15.99, 2),
(7, 'Papas Crisoles', 'Acompaña tu comida con nuestras Papas Crisoles, crujientes y doradas por fuera, tiernas por dentro. Perfectas para satisfacer tu apetito mientras enfrentas a los demonios.', 5.99, 3),
(8, 'Doom Fries', 'Las Doom Fries son unas patatas fritas extra crujientes con una mezcla especial de especias picantes. Ideales para complementar cualquier plato principal.', 8.99, 3),
(9, 'Hellfire Onion Rings', 'Nuestros Hellfire Onion Rings son anillos de cebolla fritos con un toque picante que te hará sentir el fuego del infierno. Acompañados de una salsa de queso fundido.', 6.99, 3),
(10, 'Chivito Infernal', 'El Chivito Infernal es una delicia para los amantes de la carne. Con carne de res a la parrilla, jamón, queso, lechuga y tomate, es un verdadero festín.', 13.99, 4),
(11, 'Chivito Picante', 'El Chivito Picante es una versión picante del clásico chivito. Incluye carne de res sazonada, jalapeños, cebolla morada y una salsa ardiente.', 12.99, 4),
(12, 'Chivito DOOM Slayer', 'El Chivito DOOM Slayer es un chivito épico que rinde homenaje al valiente protagonista del juego. Con carne de res, huevo frito, panceta y salsa especial, es una experiencia única.', 15.99, 4),
(13, 'Combo DOOM Slayer', 'El Combo DOOM Slayer es el combo definitivo para los fanáticos del juego. Incluye una BFG Burger, Doom Fries y una Bebida Radioactiva. ¡Prepárate para enfrentar el infierno!', 19.99, 5),
(14, 'Combo Infernal', 'El Combo Infernal es perfecto para aquellos que buscan una experiencia completa. Incluye una DemonPizza, Hellfire Onion Rings y una DemonCola. ¡Un festín demoníaco!', 22.99, 5),
(15, 'Combo Picante', 'El Combo Picante es para los amantes del picante. Incluye una Cacodemon Pizza, Chivito Picante y una Cerveza Infernal. ¡Te desafiará a enfrentar el calor!', 20.99, 5),
(16, 'Aperitivo Archvile', 'El Aperitivo Archvile es perfecto para empezar tu comida. Incluye jalapeños rellenos de queso, envueltos en bacon y asados a la perfección.', 8.99, 6),
(17, 'Doom Wings', 'Los Doom Wings son alitas de pollo picantes con una mezcla secreta de especias que te harán sentir el fuego del infierno. Acompañadas de una salsa de queso azul.', 9.99, 6),
(18, 'BFG Bites', 'Los BFG Bites son pequeños bocados de carne de res a la parrilla, envueltos en bacon y bañados en una salsa especial. Una explosión de sabores en cada bocado.', 7.99, 6),
(19, 'Bebida Radioactiva', 'Refréscate con nuestra Bebida Radioactiva. Un cóctel chispeante y ácido que iluminará tu paladar. ¡No te preocupes, no es realmente radioactiva!', 4.99, 7),
(20, 'Cerveza Infernal', 'Nuestra Cerveza Infernal es una cerveza artesanal con un toque de chiles infernales que te hará sentir el calor del infierno con cada sorbo. Perfecta para acompañar tus comidas demoníacas.', 3.99, 7),
(21, 'Poción de Salud', 'La Poción de Salud es una bebida refrescante con sabor a frutas tropicales. Te dará la energía que necesitas para enfrentar cualquier desafío demoníaco.', 2.99, 7),
(22, 'BFG (Big Flavor Gelato)', 'Nuestro BFG (Big Flavor Gelato) es un helado que te hará sentir poderoso. Sabores intensos como el chocolate negro, chiles picantes y caramelo se combinan en este delicioso postre.', 6.99, 8),
(23, 'Infierno de Postre', 'Termina tu experiencia culinaria con nuestro Infierno de Postre. Un postre extravagante con brownie caliente, helado de vainilla y salsa de caramelo. Una explosión de sabores en tu boca.', 7.99, 8),
(24, 'Doom Sundae', 'El Doom Sundae es un postre clásico con un toque demoníaco. Helado de fresa, salsa de chocolate y trozos de galleta. ¡Un placer para los sentidos!', 5.99, 8),
(25, 'Tarta de Fuego', 'La Tarta de Fuego es un postre ardiente. Tarta de chocolate con chiles picantes y crema batida. ¡Prepárate para el fuego!', 8.99, 9),
(26, 'Pastel de la Victoria', 'El Pastel de la Victoria es un homenaje a tus victorias en el juego. Pastel de vainilla con glaseado de fresa y decorado con el logo del juego.', 9.99, 9),
(27, 'Doom Donuts', 'Los Doom Donuts son donas calientes y glaseadas con un toque especial. Perfectas para acompañar tu café o tu Poción de Salud.', 4.99, 9),
(28, 'Costillas del Infierno', 'Las Costillas del Infierno son un plato contundente. Costillas de cerdo ahumadas lentamente y bañadas en salsa barbacoa casera. ¡Una verdadera delicia para los amantes de la parrilla!', 16.99, 10),
(29, 'T-Bone Slayer', 'El T-Bone Slayer es un corte de carne T-Bone a la parrilla, sazonado con hierbas y especias. Acompañado de verduras a la parrilla y puré de papas.', 19.99, 10),
(30, 'Brochetas de Fuego', 'Las Brochetas de Fuego son una opción perfecta para los amantes de la parrilla. Trozos de carne de res, pimiento y cebolla asados a la perfección y servidos con una salsa especial.', 14.99, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nom`, `correo`, `pass`, `rol`) VALUES
(1, 'Usu0', 'usuario1@gmail.com', 'usu00', 'usuario'),
(2, 'Admin1', 'admin1@gmail.com', 'admin01', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
