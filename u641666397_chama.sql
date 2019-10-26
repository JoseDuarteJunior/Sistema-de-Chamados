-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13/09/2019 às 01:19
-- Versão do servidor: 10.2.25-MariaDB
-- Versão do PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u641666397_chama`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados1`
--

CREATE TABLE `chamados1` (
  `contador` int(255) NOT NULL,
  `Local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DataHora` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Técnico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servico` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serviexecu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DataHoraAber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DataHoraFim` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `chamados1`
--

INSERT INTO `chamados1` (`contador`, `Local`, `DataHora`, `Técnico`, `Status`, `servico`, `serviexecu`, `DataHoraAber`, `DataHoraFim`) VALUES
(2, 'Miller Indep', '18/02/2018 17:38', 'Tecnico1teste', 'Aberto', 'teste2', '', '', ''),
(3, 'Miller Centro', '18/02/2018 17:38', 'Tecnico1teste', 'Aberto', 'teste3', '', '', ''),
(8, 'Miller Indep', '10/10/2018 14:37', 'Gean novato', 'Aberto', 'nada', '', '', ''),
(5, 'Miller café', '19/02/2018 09:11', 'José', 'Feito', 'Fazer cabo de rede no açougue ', 'Usado 5m de cabo de rede, deixado ponteira por conta sa CSinformatica', '19/02/2018 09:14', '19/02/2018 09:15'),
(6, 'matriz', '19/02/2018 09:28', 'Josué', 'Aberto', 'teste\r\n', '', '', ''),
(7, 'Miller Centro', '20/02/2018 10:48', 'Josué', 'Aberto', 'Teste', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnicos`
--

CREATE TABLE `tecnicos` (
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NomeCompleto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tecnicos`
--

INSERT INTO `tecnicos` (`nome`, `NomeCompleto`, `id`) VALUES
('Lisiane', 'José', 44),
('Tecnico1teste', 'Tecnico1Teste', 36),
('Josué', 'Josué', 43),
('Testetecnico2', 'testetecnico2', 37),
('Gean novato', 'Gean', 42);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `username`, `password`, `role`) VALUES
(28, 'José', 'José', 'jose', 'tecnico'),
(29, 'Josué', 'Josué', 'josu', 'tecnico'),
(22, 'gean', 'gean', 'gean', 'tecnico'),
(23, 'testetecnico2', 'Testetecnico2', 'Testetecnico2', 'tecnico'),
(21, 'Sub-Administrador', 'SubAdminteste', 'SubAdminteste', 'subadim'),
(16, 'gean', 'Testeadmin', 'testeadmin', 'admin');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `chamados1`
--
ALTER TABLE `chamados1`
  ADD PRIMARY KEY (`contador`);

--
-- Índices de tabela `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nome` (`nome`),
  ADD UNIQUE KEY `NomeCompleto` (`NomeCompleto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`username`),
  ADD KEY `nivel` (`role`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `chamados1`
--
ALTER TABLE `chamados1`
  MODIFY `contador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
