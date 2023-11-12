-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/11/2023 às 15:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecom_store`
--
create database `ecom_store`;
use `ecom_store`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us - Our Story', '\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,\r\n', 'Rhone was the collective vision of a small group of weekday warriors. For years, we were frustrated by the lack of activewear designed for men and wanted something better. With that in mind, we set out to design premium apparel that is made for motion and engineered to endure.\r\n\r\nAdvanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every product tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.\r\n\r\nBeyond our product offering, Rhone is founded on principles of progress and integrity. Just as we aim to become better as a company, we invite men everywhere to raise the bar and join us as we move Forever Forward.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Administrator', 'admin@mail.com', 'Password@123', 'user-profile-min.png', '7777775500', 'Morocco', 'Front-End Developer', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bundle_product_relation`
--

CREATE TABLE `bundle_product_relation` (
  `rel_id` int(10) NOT NULL,
  `rel_title` varchar(255) NOT NULL,
  `product_id` int(10) NOT NULL,
  `bundle_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(2, 'Infantojuvenil', 'não', 'pngwing.com.png'),
(3, 'Infantil', 'sim', 'kidslg.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'Adaplay@mail.com', 'Fale Conosco', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(9, 31, 'Pinguim', '200', 'ADAPLAY', 30, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(2, 'user', 'user@ave.com', '123', 'United State', 'New York', '0092334566931', 'new york', 'user.jpg', '::1', ''),
(3, 'Demo Customer', 'demo@customer.com', 'Password123', 'DemoCountry', 'DemoCity', '700000000', 'DemoAddress', 'sample_image.jpg', '::1', ''),
(4, 'Thomas', 'thomas@demo.com', 'Password123', 'One Country', 'One City', '777777777', '111 Address', 'sample_img360.png', '::1', '1427053935'),
(5, 'Fracis', 'test@customer.com', 'Password123', 'US', 'Demo City', '780000000', '112 Bleck Street', 'userav-min.png', '::1', '1634138674'),
(6, 'Sample Customer', 'customer@mail.com', 'Password123', 'Sample Country', 'Sample City', '7800000000', 'Sample Address', 'user-icn-min.png', '::1', '174829126'),
(8, 'Guilherme', 'Alex@gmail.com', '123', '', '', '(11) 4002-8922', '4', 'download (6).jpg', '::1', ''),
(9, 'Guilherme', 'guilhermebarreto072@gmail.com', '123', '12', '12', '(11) 4002-8922', '3', 'download (6).jpg', '::1', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(2, 'Laratec', 'sim', '307957405_156424830365050_8502602063558353003_n.png'),
(3, 'Adaptabilities', 'sim', 'isla_500x500.50570380_h8r4outo.png'),
(4, 'Fisher-Price', 'não', '4.png'),
(5, 'Lego', 'não', '1.png'),
(7, 'Bandai Namco', 'não', '3.png'),
(8, 'Funko', 'não', '9.png'),
(11, 'Mattel', 'sim', '7.png'),
(12, 'Hasbro', 'sim', '11.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `message_clients`
--

CREATE TABLE `message_clients` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `assunto` varchar(220) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(8, 1835758347, 480, 'Bank Code', 1012125550, 66500, '09-14-2021'),
(9, 1144520, 480, 'Bank Code', 1025000020, 66990, '09-14-2021'),
(10, 2145000000, 480, 'Bank Code', 2147483647, 66580, '09-14-2021'),
(20, 858195683, 100, 'Bank Code', 1400256000, 47850, '09-13-2021'),
(21, 2138906686, 120, 'Bank Code', 1455000020, 202020, '09-13-2021'),
(22, 2138906686, 120, 'Bank Code', 1450000020, 202020, '09-15-2021'),
(23, 361540113, 180, 'Western Union', 1470000020, 12001, '09-15-2021'),
(24, 361540113, 180, 'UBL/Omni', 1258886650, 200, '09-15-2021'),
(25, 901707655, 245, 'Western Union', 1200002588, 88850, '09-15-2021'),
(26, 12131313, 0, 'UBL/Omni', 121, 0, '2023-09-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`) VALUES
(25, 4, 3, 2, '2023-11-10 05:13:26', 'Casal Legal - Léo e Lu', 'leo-e-lu', 'casal-legal-brinquedo-artesanal-brincanto.png', 'boneca-lu-brinquedo-adaptado-brincanto.webp', 'bonecos-adaptados-estimulo-criancas-com-deficiencia-visual.webp', 90, 70, '\r\n\r\n\r\n\r\nCasal Legal Leo e Lu, desenvolvida para interagir com a criança com deficiência visual, estimula noção do esquema corporal, conscientização sobre as partes do corpo e sobre suas posições, percepção tátil, discriminação de diferentes texturas. Bonequinhos revestidos de tecido macio, de cor branca, leves e agradáveis ao tato, representando uma menina e um menino. As pernas e os braços são soltos e presos com velcro, a boneca tem cabelo loiro e comprido, preso nas laterais do rosto com laços de fita. Boneca está com vestido amarelo, fechado com velcro nas costas e avental de tecido xadrez preto e branco. Nos pés, dois laços de fita vermelha. O boneco está vestido com macacão amarelo tendo na frente um bolso xadrez preto e branco. Sob o macacão, uma camisa do mesmo tecido xadrez preto e branco, fechada nas costas com velcro.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\nPeso: Não aplicável |\r\nDimensões: Não aplicável |\r\nOpções: Boneca de pano Lu, Casal legal – Leo e Lu\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\nNão disponível.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Leo e Lu', 'Presente', 'product'),
(26, 4, 2, 2, '2023-11-10 05:13:40', 'Dama Adaptado ', 'dama-adaptado-preto', 'tabuleiro-de-dama-laratec-1.png', '2xg.jpg', 'jogo-de-dama-adaptado-para-deficientes-visuais.png', 135, 110, '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCom o jogo de xadrez adaptado você conseguirá desenvolver várias habilidades como: pensamento lógico, planejamento, concentração e atenção, imaginação, criatividade, paciência e autocontrole.\r\nEspecificações\r\n\r\nTabuleiro em MDF (nas opções “dobrável” ou “inteiriço”) com base em veludo. As casas possuem furo central para encaixe das peças, sendo as casas claras (casas baixas) com rebaixamento em relação às casas escuras (casas altas).\r\n\r\nNos modelos de tabuleiros com braile, as bordas verticais e horizontais do tabuleiro possuem escritas (números nas bordas verticais e letras nas bordas horizontais) em tinta de baixo relevo e em braile.\r\n\r\nAs peças são nas cores brancas e pretas, ambas com pino de metal em sua base. As peças pretas possuem um pino em sua extremidade superior para diferenciação tátil.\r\n\r\nO tabuleiro vem acomodado em bolsa na cor preta ou azul marinho de lona acolchoada com alças. As peças são acomodadas separadamente em bolsas menores (mesmo material e cores da bolsa principal) de modo que podem ser guardadas juntas ao tabuleiro.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nBaralho Braille - Naipe Extra Gigante: – Produto desenvolvido especialmente para deficientes visuais, sendo eles cegos ou com baixa visão. Utiliza o sistema Braille. – Contando com toda a qualidade da Shopping do Braille, o Baralho Naipe Extra Gigante é perfeito para quem procura a oportunidade de tornar seus jogos de cartas mais inclusivos e acessíveis para todos. – Esse baralho possui uma cor de verso.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nPeso: Não aplicável | Dimensões: Não aplicável | Tamanho Do Tabuleiro - 30 x 30 cm, 40 x 40 cm | Tipo De Tabuleiro	- Dobrável, Inteiriço | Bordas Do Tabuleiro - Com marcações em braille e tinta, Lisas sem marcações.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/watch?v=pPV48vyi7eY\" frameborder=\"0\" allowfullscreen></iframe>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Dama Adaptado', 'Oferta', 'product'),
(27, 4, 2, 2, '2023-11-10 05:13:48', 'Xadrez Adaptado', 'xadrez-adaptado', 'Xadrez.png', 'MicrosoftTeams-image.png', 'Pessoas.png', 268, 235, '\r\n\r\n\r\n\r\n\r\nCom o jogo de xadrez adaptado você conseguirá desenvolver várias habilidades como: pensamento lógico, planejamento, concentração e atenção, imaginação, criatividade, paciência e autocontrole.\r\nEspecificações\r\n\r\nTabuleiro em MDF (nas opções “dobrável” ou “inteiriço”) com base em veludo. As casas possuem furo central para encaixe das peças, sendo as casas claras (casas baixas) com rebaixamento em relação às casas escuras (casas altas).\r\n\r\nNos modelos de tabuleiros com braile, as bordas verticais e horizontais do tabuleiro possuem escritas (números nas bordas verticais e letras nas bordas horizontais) em tinta de baixo relevo e em braile.\r\n\r\nAs peças são nas cores brancas e pretas, ambas com pino de metal em sua base. As peças pretas possuem um pino em sua extremidade superior para diferenciação tátil.\r\n\r\nO tabuleiro vem acomodado em bolsa na cor preta ou azul marinho de lona acolchoada com alças. As peças são acomodadas separadamente em bolsas menores (mesmo material e cores da bolsa principal) de modo que podem ser guardadas juntas ao tabuleiro.\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\nPeso: Não aplicável | Dimensões: Não aplicável | Tamanho Do Tabuleiro: 30 x 30 cm, 40 x 40 cm | Tipo De Tabuleiro:	Dobrável, Inteiriço | Bordas Do Tabuleiro: Com marcações em braille e tinta, Lisas sem marcações.\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\nVídeo Indisponível.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Xadrez adaptado', 'Oferta', 'product'),
(28, 4, 2, 2, '2023-11-10 05:13:55', 'Trilha Adaptado', 'jogo-trilha-adaptada', 'jogo-de-trilha-adaptado-para-pessoas-com-deficiencia-visual.png', 'trilha.png', 'Trilha-tabuleiro-2-600x600-1.jpg', 140, 120, '\r\n\r\n\r\n\r\nO Jogo de Trilha adaptado é um jogo do tipo estratégico com deslocamento das peças sobre as trilhas. O Jogo de Trilha adaptado possui trilhas em alto relevo e peças com marcações táteis, tornando o jogo acessível para pessoas com deficiência visual.\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\nPeso: 1068 g | Dimensões: 33 × 37 × 5 cm.\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Trilha Adaptado', 'Presente', 'product'),
(29, 4, 2, 2, '2023-11-10 05:14:02', 'Bola com Guizo', 'bola-com-guizo', 'bola1.png', 'bola2.png', 'bola3.png', 80, 65, '\r\n\r\nA Bola com guizo é uma bola adaptada com um guizo na parte interna da bola, possibilitando que o usuário localize a bola através do som emitido pelo guizo, tornando-a acessível para pessoas com deficiência visual.\r\n\r\n', '\r\n\r\nPeso: Não aplicável | Dimensões: Não aplicável\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Bola Sensorial', 'Presente', 'product'),
(30, 4, 4, 2, '2023-11-10 03:02:02', 'Dominó Adaptado', 'domino-adaptado', 'domino1.png', 'domino2.png', 'IMG_2257.JPG', 200, 140, 'O Jogo de Dominó adaptado é um jogo de dominó com marcações táteis em suas peças, tornando-o acessível para pessoas com deficiência visual. O Jogo de Dominó adaptado é um jogo muito divertido, que pode ser jogado por até 04 jogadores.', 'Tabuleiro em formato retangular de 35,5cm x 34,5cm x 0,9cm (largura x comprimento x espessura), confeccionado em MDF. Dentro do tabuleiro, há cavidades de 0,3cm de profundidade em formato retangular para receber as peças do jogo. O Jogo possui 28 peças. As peças são em formato retangular, confeccionadas em MDF com dimensões de 2,5cm x 5,0cm x de 0,9cm (comprimento x largura x espessura), contendo pinos táteis em sua superfície para diferenciação tátil. As peças possuem um ressalto central de separação dos valores das peças.', '\r\n\r\n\r\n\r\n\r\n\r\n', 'Dominó Adaptado', 'Oferta', 'product'),
(31, 4, 3, 4, '2023-11-10 05:14:10', 'Linkimals - Pinguim ', 'brinquedo-de-apredizagem', 'Pinguim.png', 'pinguim2.png', 'pinguim3.png', 480, 450, '\r\n\r\n\r\n\r\nO brinquedo musical Fisher-Price Linkimals Cool Beats Penguin é um parceiro de dança super relaxante para bebês com músicas novas, luzes multicoloridas e movimentos de improvisação. Quando as crianças pressionam os botões, o pinguim bate as nadadeiras e balança de um lado para o outro enquanto músicas e frases apresentam o alfabeto, os opostos e muito mais. E quando esse amigo pinguim se encontra com outros amigos do Linkimals, eles se iluminam, conversam, cantam e brincam juntos! (Brinquedos adicionais da Linkimals vendidos separadamente e sujeitos à disponibilidade. )\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\nMarca: Fisher-Price | Modelo: Linkimals Cool Beats - Pinguim | Material: Plástico resistente e seguro para crianças | Dimensões: 20 cm x 15 cm x 30 cm | Idade Recomendada: 6 meses a 3 anos.\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\nVídeo Indisponível.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Pinguim Adaptado', 'Presente', 'product'),
(32, 4, 2, 2, '2023-11-10 05:14:17', 'Triângulo Soma', 'triangulo-soma', 'triangulo.png', 'soma.png', 'Triângulo-soma-1-1450x1450.png', 80, 60, '\r\n\r\nO Jogo Triângulo Soma é um quebra-cabeças matemático, do tipo “triângulo mágico”, acessível para pessoas com deficiência visual. Objetivo --> Posicionar as peças numeradas de 1 a 6 (Soma 09, 10, 11 ou 12) ou de 1 a 9 (Soma 17) de modo que a soma dos lados do triângulo sejam iguais a 09, 10, 11 ou 12 ou 17 (Soma 17).\r\n\r\n', '\r\n\r\nPeso: Não aplicável | Dimensões: Não aplicável |Tipo De Triângulo Soma | Soma 09, 10, 11 ou 12, Soma 17.\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Trilha Adaptado', 'Oferta', 'product'),
(33, 4, 2, 3, '2023-11-10 05:14:23', 'Dice Roller Adaptado', 'dice-roller', 'Dice.jpg', '61PKL4Z5LKL._AC_SX679__resized.jpg', 'dados-soltos_resized.jpg', 180, 150, '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nNosso rolo de dados tem como objetivo promover a independência de pessoas com deficiências físicas ou cognitivas, como paralisia cerebral ou autismo. Basta conectar um interruptor de acessibilidade padrão para facilitar o uso do item. Também pode ser uma ótima ferramenta de ensino para professores de educação especial, terapeutas ocupacionais, físicos e fonoaudiólogos, ou qualquer pessoa com necessidades sensoriais!\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nPeso leve e tamanho compacto, fácil de transportar e armazenar. - Nota: use 2 pilhas AA (não incluídas) | Textura confortável e suave, você se sentirá bem em sua mão | Copo de rolo de dados automático e facilmente portátil, adequado para festas ao ar livre ou entretenimento em bares | Feito de material premium para uso durável e duradouro | Ótima opção para entretenimento em clube, KTV, bar, pub, etc.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nVídeo Indisponível.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Dice Roller', 'Presente', 'product'),
(34, 4, 2, 2, '2023-11-10 05:14:30', 'Cubo Mágico Adaptado', 'cubo-magico-adaptado', 'Cubo-magico-adaptado-para-deficientes-visuais-faces-branca-azul-e-laranja.png', 'cubo.png', 'amarela.png', 120, 80, '\r\nO Cubo Mágico 3x3x3 Blind Cube Touch é um cubo mágico adaptado para pessoas com deficiência visual. O cubo mágico adaptado possui texturas em suas faces, de modo que o deficiente visual consiga identificar as faces tatilmente.\r\n', '\r\nCor do cubo: Preto com Cores em Tiled (Peças de plástico) | Cores das faces: Branca, amarela, azul, verde, vermelha e laranja | Relevos das faces: Lisa/ sem relevo, estrelas, corações, círculos, bolinhas e quadrados | Marca: YJ-Moyu\r\n| Modelo: Blind Cube Touch | Tamanho: 6 cm x 6 cm x 6 cm | Peso: 90g.\r\n\r\n\r\n\r\n', '\r\nVídeo Indisponível.\r\n', 'Cubo Mágico', 'Oferta', 'product'),
(36, 5, 2, 11, '2023-11-10 14:05:50', 'Uno - Original', 'Uno', 'Uno1.jpg', 'Uno2.jpg', 'Uno3.jpg', 35, 20, '\r\nUNO™, o clássico jogo de cartas de combinar cores e números que é fácil de pegar...impossível de largar, agora vem com curingas personalizáveis para maior emoção! Os jogadores revezam na competição para se livrar de todas as cartas, combinando uma carta da mão com a carta atual mostrada no topo do baralho. Cartas de ação especiais proporcionam momentos que mudam o jogo e ajudam a derrotar os oponentes! Use a carta Trocar as mãos para trocar cartas com qualquer outro oponente e use os 3 curingas personalizáveis (e apagáveis) para escrever suas próprias regras! Você encontrará 19 cartas de cada cor (vermelho, verde, azul e amarelo), além de 8 cartas Comprar duas, Inverter e Pular em todas as cores, junto com 4 cartas Curingas, 4 cartas Comprar mais quatro, 1 carta Trocar as mãos e 3 cartas Personalizáveis. Se você não conseguir fazer uma combinação, você deve comprar da pilha central! Não se esqueça de gritar \"UNO\" quando tiver apenas uma carta restante! O jogador que se livrar de todas as cartas em sua mão marca pontos por quaisquer cartas que seus oponentes estiverem segurando. O primeiro jogador a atingir 500 pontos ganha. Get Wild 4 UNO!™ incluI 112 cartas e instruções. Cores e detalhes podem variar.\r\n\r\n\r\n', '\r\nPeso: Não aplicável |\r\nDimensões: Não aplicável |\r\n', '\r\n\r\n\r\n\r\n', 'Uno', 'Oferta', 'product'),
(37, 5, 2, 11, '2023-11-10 14:05:43', 'Barbie - My First Barbie ', 'MyFirstBarbie', 'Barbie1.jpg', 'Barbie2.jpg', 'Barbie3.jpg', 80, 60, '\r\nApresentamos a My First Barbie™, coleção feita para crianças em idade pré-escolar! Esta linha fofa conta com bonecas maiores fáceis de vestir, com corpos macios e articulados. Da amizade à moda, as crianças podem criar inúmeras histórias com estas adoráveis bonecas! Vendidos separadamente, sujeitos a disponibilidade. As bonecas não ficam em pé sozinhas. As cores e as decorações podem variar.\r\n\r\n\r\n', '\r\n\r\nPeso: Não aplicável |\r\nDimensões: Não aplicável |\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', 'Barbie', 'Presente', 'product'),
(38, 5, 2, 11, '2023-11-10 14:05:57', 'Max Steel -  World Tour', 'MaxSteel', 'max3.png', 'max2.png', 'max1.png', 80, 60, '\r\n\r\n\r\n\r\n\r\n\r\n\r\nApresentamos o Max Steel, o herói de ação perfeito para crianças aventureiras! Esta emocionante linha de brinquedos apresenta uma figura de ação articulada, pronta para entrar em ação e enfrentar desafios épicos. Com seu corpo resistente e roupas detalhadas, as crianças podem criar inúmeras aventuras repletas de ação e imaginação com o Max Steel! Vendido separadamente, sujeito a disponibilidade. A figura não fica em pé sozinha. As cores e detalhes do design podem variar.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Peso: Não aplicável |\r\nDimensões: Não aplicável \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'MaxSteel', 'Oferta', 'product'),
(39, 5, 3, 11, '2023-11-10 14:06:03', 'Hot Wheels City Amaya', 'HotWheelsCity', 'Hot1.jpg', 'HOT2.jpg', 'HOT3.jpg', 120, 80, '\r\n\r\nExplore todos os quatro níveis de corrida, acrobacias e narrativas no Hot Wheels™ City Ultimate Garage. Cada nível inspira aventuras de brincadeira, incluindo corrida lado a lado, acrobacias em loop e uma batalha épica com um dragão devorador de carros. O conjunto vem com dois veículos Hot Wheels® e tem estacionamento suficiente para mais de 50 carros de brinquedo em escala 1:64. Ele também se conecta a outros conjuntos para que as crianças possam construir sua cidade Hot Wheels™. Conjuntos adicionais vendidos separadamente. As cores e as decorações podem variar.\r\n\r\n\r\n\r\n', 'Peso: Não aplicável |\r\nDimensões: Não aplicável \r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n', 'HotWheels', 'Presente', 'product'),
(40, 5, 3, 12, '2023-11-10 14:06:15', 'PlayDoh Super Sorvete', 'PlayDohSorvete', 'Playdoh.jpg', 'Playdoh2.jpg', 'Playdoh3.jpg', 120, 75, '\r\nApresentamos o Kit Super Caminhão de Sorvete Play-Doh da Hasbro, um conjunto incrivelmente divertido para as crianças explorarem sua criatividade! Este conjunto mágico oferece horas de diversão com massa de modelar Play-Doh, permitindo que as crianças criem deliciosos sorvetes e sobremesas com efeitos de som realistas.\r\n\r\nO Super Caminhão de Sorvete é um veículo de brinquedo incrivelmente detalhado, equipado com uma máquina de sorvete Play-Doh que emite sons de sorvete sendo preparado, tornando a brincadeira ainda mais emocionante. Com o kit, as crianças podem criar cones de sorvete, milkshakes e muitas outras guloseimas, dando asas à sua imaginação.\r\n\r\nO conjunto inclui diversas cores de massa de modelar Play-Doh, moldes temáticos, acessórios divertidos e até um compartimento para armazenar as sobremesas Play-Doh criadas. O Kit Super Caminhão de Sorvete Play-Doh oferece uma experiência sensorial única, estimulando a criatividade e a diversão enquanto as crianças brincam com cores, formas e texturas. Transforme qualquer dia em uma festa de sorvetes com este emocionante conjunto da Hasbro!\r\n\r\n', 'Peso: Não aplicável |\r\nDimensões: Não aplicável \r\n\r\n', '\r\n\r\n', 'PlayDoh', 'Oferta', 'product'),
(41, 5, 2, 12, '2023-11-10 14:07:28', 'Nerf Fortnite Rifle', 'NerfFortnite', 'Nerf1.jpg', 'Nerf2.jpg', 'Nerf3.jpg', 65, 42, 'Apresentamos o Nerf Fortnite, a combinação perfeita entre ação e diversão para os fãs do popular jogo Fortnite! Este conjunto de blasters Nerf foi projetado para trazer a experiência de batalha épica de Fortnite para o mundo real, permitindo que crianças e adultos mergulhem em emocionantes missões de combate.\r\n\r\nOs blasters Nerf Fortnite são inspirados nas armas do jogo e apresentam detalhes autênticos, cores vibrantes e um design que cativa os corações dos jogadores de Fortnite. Cada blaster Nerf Fortnite é fácil de manusear e oferece uma performance incrível, disparando dardos de espuma de forma precisa e segura.\r\n\r\nOs conjuntos Nerf Fortnite muitas vezes vêm com acessórios personalizados, como miras, dardos decorados e etiquetas temáticas do jogo, permitindo que os fãs personalizem seus blasters para se adequarem ao estilo de jogo de Fortnite.\r\n\r\nCom Nerf Fortnite, as crianças e os entusiastas de Fortnite podem levar as batalhas para o mundo real, explorar estratégias de combate e se divertir com amigos em emocionantes duelos Nerf. Este é o brinquedo perfeito para quem deseja trazer a emoção do Fortnite para o quintal ou o campo de batalha de brincadeira!\r\n\r\n', '\r\nPeso: Não aplicável |\r\nDimensões: Não aplicável \r\n', '\r\n\r\n', 'Nerf', 'Oferta', 'product'),
(42, 5, 3, 12, '2023-11-10 14:09:03', 'Monopoly Junior', 'MonopolyJunior', 'Monopoly1.jpg', 'Monopoly2.jpg', 'Monopoly3.jpg', 60, 45, 'Apresentamos o Monopoly Junior, a versão perfeita do jogo de propriedades clássico para crianças! Este jogo de tabuleiro foi especialmente projetado para crianças em idade pré-adolescente, oferecendo uma introdução emocionante ao mundo dos negócios e da estratégia.\r\n\r\nNo Monopoly Junior, as crianças podem se tornar pequenos magnatas enquanto compram e negociam propriedades, coletam aluguéis e planejam estratégias para se tornarem os jogadores mais ricos. O jogo apresenta um tabuleiro colorido e divertido, com personagens amigáveis e regras simplificadas que tornam o jogo acessível para crianças a partir de 5 anos.\r\n\r\nAs cartas de sorte e cofre adicionam um elemento surpresa à jogabilidade, enquanto os peões adoráveis, como o pinguim e o pato, tornam a experiência ainda mais envolvente para os pequenos jogadores. O Monopoly Junior é uma ótima maneira de ensinar habilidades matemáticas, tomada de decisões e negociação de forma lúdica.\r\n\r\nEste jogo é perfeito para noites de jogos em família, festas e momentos de diversão com amigos. O Monopoly Junior é a porta de entrada para o mundo do Monopoly e pode ser a primeira etapa para futuros mestres imobiliários. Prepare-se para adentrar o mundo dos negócios e diversão com o Monopoly Junior!\r\n\r\n', 'Peso: Não aplicável |\r\nDimensões: Não aplicável \r\n\r\n\r\n', '\r\n\r\n', 'Monopoly', 'Presente', 'product'),
(43, 5, 2, 12, '2023-11-10 14:10:40', 'Beyblade Kit Batalha', 'BeybladeKitbattle', 'Beyblade1.jpg', 'Beyblade2.jpg', 'Beyblade1.jpg', 150, 120, '\r\nApresentamos o Beyblade Burst Surge Velocidade Kit de Batalha Vitória Eletrizante - uma experiência de batalha emocionante que levará a adrenalina ao máximo! Este conjunto de brinquedos traz a empolgante ação Beyblade Burst para a vida real, proporcionando batalhas de alta velocidade e estratégia que mantêm os jogadores à beira de seus assentos.\r\n\r\nO kit inclui uma arena Beystadium que serve como o campo de batalha onde os piões Beyblade Burst colidem e se enfrentam em uma luta feroz. Com dois piões emocionantes e seus respectivos lançadores, as batalhas se tornam eletrizantes e cheias de reviravoltas. Os piões são projetados com características únicas que afetam a dinâmica da batalha, como diferentes perfis de ataque, resistência e defesa.\r\n\r\nAs batalhas Beyblade Burst são tanto sobre a habilidade quanto sobre a estratégia, com jogadores lançando seus piões na arena em busca da vitória. O emocionante aspecto Burst permite que os piões se desfaçam durante a batalha, adicionando uma camada extra de emoção e incerteza.\r\n\r\nEste kit de batalha é perfeito para desafiar amigos, aprimorar habilidades de lançamento e estratégia, e criar momentos empolgantes de competição. Entre na arena, prepare-se para girar e lute pelo título de mestre Beyblade com o Beyblade Burst Surge Velocidade Kit de Batalha Vitória Eletrizante!\r\n\r\n', 'Peso: Não aplicável | Dimensões: Não aplicável\r\n\r\n', '\r\n\r\n', 'Beyblade', 'Oferta', 'product'),
(44, 5, 3, 5, '2023-11-10 14:25:05', 'Lego Minifiguras', 'LegoMinifigures', 'Minifiguras.png', 'Minifiguras2.png', 'Minifiguras3.png', 30, 22, 'Lego Minifiguras são peças de figuras de ação em miniatura da Lego que oferecem uma infinidade de possibilidades de personalização e diversão. Essas minifiguras são uma parte fundamental do universo Lego e podem ser colecionadas, trocadas e usadas em uma ampla variedade de cenários e histórias.\r\n\r\nCada Lego Minifigura é composta por várias partes intercambiáveis, incluindo cabeças, torsos, pernas, acessórios e até mesmo cabelos ou capacetes. Essa versatilidade permite que as crianças (e adultos) criem seus próprios personagens únicos, desde heróis e vilões até personagens de contos de fadas, astronautas, piratas, super-heróis, profissionais, animais e muito mais.\r\n\r\nAs Lego Minifiguras são frequentemente vendidas em séries, e parte da diversão está em abrir as embalagens para descobrir quais personagens estão dentro. Colecionar todas as minifiguras de uma série pode ser um desafio emocionante.\r\n\r\nEssas figuras minúsculas têm uma ampla variedade de usos, desde jogar com conjuntos Lego, como adições a cenários personalizados, decorações temáticas, ou simplesmente como peças colecionáveis. A Lego Minifiguras é uma parte essencial do mundo Lego, proporcionando oportunidades infinitas de criatividade e diversão.\r\n\r\n', '\r\n\r\n', '\r\n\r\n', 'Lego', 'Oferta', 'product'),
(45, 5, 2, 5, '2023-11-10 14:26:34', 'Lego Friends Iglu', 'LegoFriendsIglu', 'Friends1.png', 'Friends2.png', 'Friends3.png', 250, 180, '\r\nLego Friends Aventuras no Iglu é um conjunto de blocos de construção da linha Lego Friends que transporta as crianças para o mundo do Ártico e da aventura. Este emocionante conjunto permite que as crianças construam seu próprio iglu e criem histórias congelantes com as adoráveis personagens Lego Friends.\r\n\r\nO conjunto inclui uma variedade de peças Lego que permitem às crianças construir um iglu autêntico, completo com detalhes realistas, como uma porta, janela e um interior aconchegante. Além disso, o conjunto inclui figuras Lego Friends vestidas com roupas de inverno, um trenó para explorar a paisagem gelada e acessórios temáticos, como uma câmera para capturar momentos especiais.\r\n\r\nAs crianças podem imaginar que estão explorando o Ártico com suas amigas Lego Friends, fazendo descobertas emocionantes, observando a vida selvagem e desfrutando de aventuras congelantes. O conjunto incentiva a criatividade, a resolução de problemas e o jogo de papéis, permitindo que as crianças desenvolvam suas habilidades enquanto se divertem construindo e brincando.\r\n\r\nLego Friends Aventuras no Iglu é uma excelente adição à linha Lego Friends, oferecendo uma experiência única que permite que as crianças explorem o mundo do Ártico e vivenciem emocionantes aventuras no gelo com suas personagens favoritas.\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', 'Lego Friends', 'Presente', 'product'),
(46, 5, 2, 5, '2023-11-10 14:28:12', 'Lego Policial - Treino', 'LegoPoliceTraining', 'Policia1.png', 'Policia2.png', 'Policia3.png', 220, 175, '\r\n\r\nLego Academia Polícia é um emocionante conjunto de blocos de construção da renomada marca Lego, projetado para permitir que as crianças criem seu próprio quartel-general da polícia e embarquem em missões de combate ao crime imaginárias.\r\n\r\nEste conjunto inclui uma variedade de peças Lego que permitem às crianças construir um prédio de academia de polícia realista, completo com uma torre de observação, celas de prisão, escritório de detetive e muito mais. Os detalhes são incrivelmente minuciosos, permitindo que as crianças personalizem o quartel-general da polícia de acordo com suas preferências.\r\n\r\nAlém do edifício, o conjunto Lego Academia Polícia também inclui figuras Lego de policiais, veículos de polícia, como carros e motocicletas, e acessórios como cones de tráfego, placas de \"pare\" e algemas. As crianças podem usar sua imaginação para criar cenários de combate ao crime, perseguir criminosos e resolver casos emocionantes.\r\n\r\nEste conjunto é uma ótima maneira de incentivar a criatividade, o pensamento crítico e o jogo de papéis, enquanto as crianças se divertem construindo, personalizando e brincando com seu próprio mundo de aplicação da lei. O Lego Academia Polícia oferece horas de diversão e aprendizado para aspirantes a policiais e detetives em treinamento.\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n', 'Lego', 'Presente', 'product'),
(47, 5, 3, 8, '2023-11-10 14:38:06', 'POP! Aurora', 'PopAurora', 'Pop1.png', 'Pop2.jpg', 'Pop3.png', 23, 12, 'Funko Pop! Aurora é uma figura colecionável da linha Funko Pop! baseada na personagem da Disney, Princesa Aurora. Princesa Aurora, muitas vezes conhecida como a Bela Adormecida, é uma das princesas clássicas da Disney e é uma das protagonistas do filme \"A Bela Adormecida\" (Sleeping Beauty).\r\n\r\nA figura Funko Pop! Aurora captura a personagem em um estilo estilizado e adorável, com uma cabeça grande e corpo pequeno. Geralmente, as figuras Funko Pop! são detalhadas com precisão e projetadas para se assemelharem aos personagens de filmes, programas de TV, quadrinhos e muito mais.\r\n\r\nA figura Pop! Aurora é uma adição popular para coleções de fãs da Disney e entusiastas da cultura pop. Ela é uma maneira divertida de celebrar a icônica Princesa Aurora e a história clássica da Bela Adormecida. Como muitas outras figuras Funko Pop!, ela está disponível em várias versões e poses, permitindo que os colecionadores escolham a que mais gostam. Se você é fã da Princesa Aurora e da Disney, a figura Funko Pop! Aurora pode ser uma excelente adição à sua coleção.\r\n\r\n', '\r\n\r\n', '\r\n\r\n', 'Funko', 'Presente', 'product'),
(48, 5, 2, 8, '2023-11-10 14:39:34', 'Rewind! Scooby-Doo!', 'RewindScooby', 'Rewind1.png', 'Rewind2.png', 'Rewind3.png', 35, 24, 'Os Funko Pop! Rewind Scooby-Doo são figuras de coleção da famosa série de desenhos animados \"Scooby-Doo\". Esses colecionáveis são parte da linha Funko Pop! Rewind, que apresenta personagens icônicos em um estilo retrô, com detalhes que remetem à sua estreia original.\r\n\r\nAs figuras Funko Pop! Rewind Scooby-Doo apresentam os personagens da turma do Scooby-Doo, incluindo Scooby-Doo, Salsicha, Velma, Daphne e Fred, com um toque nostálgico. Cada figura é projetada em um estilo de desenho animado clássico, com cores brilhantes e uma estética que evoca a sensação original da série.\r\n\r\nEssas figuras são populares entre colecionadores e fãs de Scooby-Doo que desejam celebrar a longa história da série e a nostalgia associada a ela. Além disso, os Funko Pop! Rewind Scooby-Doo são ótimos itens de decoração para qualquer fã apaixonado por esse grupo de detetives amadores e seu cão covarde que solucionam mistérios envolvendo seres sobrenaturais e vilões disfarçados.', '\r\n\r\n', '\r\n\r\n', 'Scooby', 'Oferta', 'product'),
(49, 5, 2, 8, '2023-11-10 14:40:30', 'Bitty Pop! Nightmare ', 'BittyPopNightmare', 'Bitty1.png', 'Bitty2.png', 'Bitty3.png', 55, 28, '\r\nA série \"Bitty Pop! The Nightmare Before Christmas 4-Pack Series 4\" parece ser uma coleção especial de miniaturas Funko Pop! relacionadas ao filme de animação \"O Estranho Mundo de Jack\" (The Nightmare Before Christmas). Essas miniaturas são figuras colecionáveis que representam os personagens icônicos do filme.\r\n\r\nA linha de figuras Bitty Pop! geralmente apresenta versões pequenas e adoráveis dos populares Funko Pop! e pode incluir personagens de várias franquias e séries. No caso da \"The Nightmare Before Christmas 4-Pack Series 4\", é provável que contenha quatro miniaturas de personagens do filme, como Jack Skellington, Sally, Oogie Boogie, Zero, entre outros, dependendo da seleção da série.\r\n\r\nEssas figuras são populares entre colecionadores e fãs do filme \"O Estranho Mundo de Jack\" e são frequentemente usadas para decorar estantes, mesas e áreas temáticas relacionadas à obra de Tim Burton. Se você é um fã da animação e deseja adicionar essas miniaturas à sua coleção, pode procurá-las em lojas de colecionáveis ou online. Certifique-se de verificar as especificações exatas da série 4 antes de fazer uma compra.\r\n', '\r\n\r\n', '\r\n\r\n', 'Bitty', 'Presente', 'product');

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(4, 'Adaptados', 'sim', 'adaptado.png'),
(5, 'Comuns', 'não', 'Comum.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Índices de tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices de tabela `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  ADD PRIMARY KEY (`rel_id`);

--
-- Índices de tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índices de tabela `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Índices de tabela `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Índices de tabela `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Índices de tabela `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Índices de tabela `message_clients`
--
ALTER TABLE `message_clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Índices de tabela `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Índices de tabela `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Índices de tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  MODIFY `rel_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `message_clients`
--
ALTER TABLE `message_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
