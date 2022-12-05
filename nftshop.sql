-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Gru 2022, 16:23
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `nftshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `owned`
--

CREATE TABLE `owned` (
  `owned_id` int(11) NOT NULL,
  `owned_name` varchar(20) NOT NULL,
  `owned_price` varchar(20) NOT NULL,
  `owned_image` varchar(20) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `owned`
--

INSERT INTO `owned` (`owned_id`, `owned_name`, `owned_price`, `owned_image`, `owner_id`) VALUES
(3, '#1971', '70.69', '1971.png', 2),
(4, '#1971', '70.69', '1971.png', 2),
(5, '#524', '4.21', '524.png', 2),
(6, '#1971', '70.69', '1971.png', 6),
(7, '#1971', '70.69', '1971.png', 2),
(8, '#4306', '74.8', '4306.png', 2),
(9, '#2825', '74.99', '2825.png', 2),
(10, '#7873', '73.76', '7873.png', 2),
(11, '#7292', '69.69', '7292.png', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`) VALUES
(1, '#524', 4.21, '524.png'),
(2, '#1971', 70.69, '1971.png'),
(3, '#4306', 74.8, '4306.png'),
(4, '#7292', 69.69, '7292.png'),
(5, '#7873', 73.76, '7873.png'),
(6, '#2825', 74.99, '2825.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(42) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_fname`, `user_lname`) VALUES
(2, 'pablo', '123', 'pawel.polakiewicz1@gmail.com', 'Pablo', 'Perlson'),
(5, 'maxiiu', 'pablopablo', 'xdxdxd@gmail.com', 'max', 'sduder'),
(6, 'siusiak', '123', 'siurek@gmail.com', 'Siurek', 'Duzy');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `owned`
--
ALTER TABLE `owned`
  ADD PRIMARY KEY (`owned_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `owned`
--
ALTER TABLE `owned`
  MODIFY `owned_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
