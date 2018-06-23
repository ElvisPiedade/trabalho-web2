-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2018 às 18:34
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(3) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cat_id`, `nome`) VALUES
(1, 'Notebook'),
(2, 'Desktop'),
(3, 'Monitor'),
(4, 'Placa de vídeo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(60) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `preco` int(11) NOT NULL,
  `qtd` int(20) NOT NULL,
  `img_link` varchar(300) NOT NULL,
  `cat_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `qtd`, `img_link`, `cat_id`) VALUES
(21, 'Notebook Lenovo Ideapad 320 Intel® Core i7-7500u 8GB (GeForce 940MX com 2GB) 1TB Tela FULL HD 15,6\" Windows 10 - Prata', 2950, 35, 'https://images-submarino.b2w.io/produtos/01/00/item/132384/8/132384827SZ.jpg', 1),
(22, 'Notebook Dell Inspiron i15-5567-A30B Intel Core i5 8GB (AMD Radeon R7 M445 de 2GB) 1TB Tela LED 15,6\" Windows 10 - Branco', 2850, 40, 'https://images-submarino.b2w.io/produtos/01/00/item/131530/9/131530941_2SZ.jpg', 1),
(23, 'Notebook Acer A515-51G-72DB Intel Core I7 8GB (GeForce 940MX com 2GB) 1TB Tela LED 15.6\" Windows 10 - Cinza Escuro', 2852, 40, 'https://images-submarino.b2w.io/produtos/01/00/item/132620/8/132620885_2SZ.jpg', 1),
(24, 'Notebook Gamer Acer VX5-591G-54PG Intel Core i5 8GB (GeForce GTX 1050 com 4GB) 1TB Tela LED 15,6\" Windows 10 - Preto', 3589, 2, 'https://images-submarino.b2w.io/produtos/01/00/item/132134/3/132134369SZ.jpg', 1),
(25, 'Notebook Samsung Expert X23 Intel Core I5 8GB (GeForce 920MX de 2GB) 1TB Tela 15,6\'\' LED HD Windows 10 - Branco', 2353, 4, 'https://images-submarino.b2w.io/produtos/01/00/item/132193/0/132193060SZ.jpg', 1),
(26, 'Notebook Samsung Expert X23 Intel Core I5 8GB (GeForce 910M de 2GB) 1TB Tela 15,6\'\' LED HD Windows 10 - Preto', 3231, 46, 'https://images-submarino.b2w.io/produtos/01/00/item/132538/2/132538283SZ.jpg', 1),
(27, 'Notebook Ultraportátil Dell XPS-9370-M30S 8ª geração Intel Core i7 16GB 512GB UHD 13.3\" Windows 10', 10127, 2, 'https://images-submarino.b2w.io/produtos/01/00/sku/31727/9/31727961_1GG.jpg', 1),
(28, 'Notebook A515-51G-C690 Intel Core 8 I7 8GB (GeForce MX130 com 2GB) 1TB LED Full HD 15.6\" W10 - Acer', 3246, 16, 'https://images-submarino.b2w.io/produtos/01/00/item/133518/2/133518284_1GG.jpg', 1),
(29, 'Desktop AIO 24V570-C.BJ31P1 Intel Core 7 i5 4GB 1TB LED 23,8 Windows 10 com TV Digital - LG', 3100, 6, 'https://images-submarino.b2w.io/produtos/01/00/item/132384/1/132384106_1GG.jpg', 2),
(30, 'Desktop All in One 24V570-C.BJ21P1 Intel Core i3 4GB 1TB LED 23,8 Windows 10 com TV Digital - LG', 2800, 10, 'https://images-submarino.b2w.io/produtos/01/00/item/133419/7/133419753_1GG.jpg', 2),
(31, 'Samsung Odyssey Gamer - Tela 15.6\" Full HD, Intel i5 7300HQ, 16GB DDR4, HD 1TB, GeForce GTX 1050', 6253, 20, 'https://images-submarino.b2w.io/produtos/01/00/sku/31160/8/31160879_1SZ.jpg', 1),
(32, 'Notebook Ultraportátil Dell XPS-9370-M10S 8ª geração Intel Core i7 8GB 256GB FHD 13.3\" Windows 10', 8000, 20, 'https://images-submarino.b2w.io/produtos/01/00/sku/31007/3/31007366_1SZ.jpg', 1),
(33, 'Notebook Acer A515-51G-C690 Intel Core I3 4GB 1TB Tela LED 15.6\" Windows 10 - Preto', 1800, 20, 'https://images-submarino.b2w.io/produtos/01/00/item/132620/9/132620922_4SZ.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_cat` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `prod_cat` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
