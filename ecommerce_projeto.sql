-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2024 às 09:45
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Banco de dados: `ecommerce_projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `products_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `c_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Homens', ' Latest and best outfits for men'),
(2, 'Mulheres', ' Latest and best outfits for women'),
(3, 'Crianças', ' Latest and best outfits for kids');

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(50) NOT NULL,
  `customer_address` varchar(400) NOT NULL,
  `customer_contact` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_address`, `customer_contact`, `customer_image`, `customer_ip`) VALUES
(32, 'Wagner', 'wagnergamerfortnite@gmail.com', '123456', 'Luanda', '24940822206', 'Imagem WhatsApp 2024-11-14 às 21.21.18_eb8ac8acv.jpg', 0),
(33, 'Higino', 'higinofilipe123@gmail.com', '12345678', 'Shopritepalanca', '94082220611', 'B&W Tee Shirt.jpg', 0),
(34, 'Pedro', 'waguito02@gmail.com', '123456', 'Kapolo 2', '95082220676', 'banner-2.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`order_id`, `order_qty`, `order_price`, `c_id`, `date`) VALUES
(1, 1, 22000, 33, '2024-12-02 14:45:48'),
(2, 3, 66000, 32, '2024-12-02 15:03:37'),
(3, 6, 132000, 32, '2024-12-05 15:08:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `products_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`products_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_price`, `product_keywords`, `product_desc`) VALUES
(25, 2, 1, '2024-12-02 14:34:32', 'Camisola Oficial Fed. Angolana Futebol', '23AG114VM.png', '23AG114VM1.png', 22000, 'camisola', ''),
(27, 2, 1, '2024-12-02 14:41:55', 'nike', 'af1.2.png', 'af1.png', 22000, 'nike', ''),
(28, 4, 2, '2024-12-02 14:43:04', 'NIKE', 'blackheels.jpg', 'blackheels.jpg', 22000, 'nike', ''),
(29, 1, 2, '2024-12-02 14:51:47', 'Casaco Castanho', 'brown-jacket.jpg', 'brown-jacket.jpg', 34000, 'Casaco', ''),
(30, 2, 1, '2024-12-02 15:04:21', 'Nike', 'B&W Tee Shirt.jpg', 'B&W Tee Shirt.jpg', 22000, 'Camisola', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Casacos\r\n', 'Good quality custom made and casual wear jackets'),
(2, 'Camisolas', 'Good and easy stuff designed Tee-Shirt '),
(3, 'Calças', 'High Quality Denim and Leather Jeans'),
(4, 'Sapatos', 'Good quality and soft sole shoes with good endurance'),
(5, 'Brinquedos', 'Cool customized and colorful brinquedos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_heading` varchar(100) NOT NULL,
  `slide_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_heading`, `slide_text`) VALUES
(1, 'Slide 1', 'slide_1.jpg', 'Desconto de Natal', 'Entre para a moda, fique para o estilo.'),
(2, 'Slide 2', 'slide_2.jpg', 'Aproveite a Black Friday', 'Aqui você encontra simplesmente tudo que você precisa.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`products_id`);

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índices para tabela `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Índices para tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Índices para tabela `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

