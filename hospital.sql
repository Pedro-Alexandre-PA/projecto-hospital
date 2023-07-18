-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2023 às 14:44
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hospital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especialidade` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doctor`
--

INSERT INTO `doctor` (`id`, `nome`, `especialidade`, `email`, `morada`, `telefone`, `foto`) VALUES
(1, 'Miguel Ferras', 'Cirugião', 'miguel@gmail.com', 'Viana-Vila', '951863357', '1.jpg'),
(2, 'Miguel Jonas', 'Cardiaco', 'miguel@gmail.com', 'Viana-Vila', '963258741', '1.jpg'),
(3, 'Katia Martins', 'Cirugião', 'miguel@gmail.com', 'Viana-Vila', '951863357', '1.jpg'),
(4, 'Paloma Miguel', 'Cirugião', 'miguel@gmail.com', 'Viana-Vila', '951863357', '1.jpg'),
(5, 'paulo', 'Cirugião', 'miguel@gmail.com', 'Viana-Vila', '951863357', '1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `familiar`
--

CREATE TABLE `familiar` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `ficha` int(11) NOT NULL,
  `morada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `familiar`
--

INSERT INTO `familiar` (`id`, `nome`, `id_paciente`, `nome_paciente`, `telefone`, `ficha`, `morada`) VALUES
(2, 'Manuel Borge', 2, 'Sergio Mungo', '943456567', 0, 'Viana - Bela Vista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `data_nascimento` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `bi` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `causa_admisao` varchar(100) NOT NULL,
  `estado_admisao` varchar(100) NOT NULL,
  `alergias` varchar(100) NOT NULL,
  `antecedentes` varchar(100) NOT NULL,
  `datain` varchar(100) NOT NULL,
  `data_admicao` varchar(100) NOT NULL,
  `data_inter` varchar(100) NOT NULL,
  `sala` varchar(100) NOT NULL,
  `nome_doctor` varchar(100) NOT NULL,
  `id_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `idade`, `sexo`, `peso`, `altura`, `data_nascimento`, `telefone`, `bi`, `provincia`, `municipio`, `bairro`, `rua`, `causa_admisao`, `estado_admisao`, `alergias`, `antecedentes`, `datain`, `data_admicao`, `data_inter`, `sala`, `nome_doctor`, `id_doctor`) VALUES
(2, 'Sergio Mungo', 30, 'masculino', 60, 1.6, '2000-02-08', 943456567, 'LA283637LA45', 'Luanda', 'Viana', 'Bele Vista', 'Rua 2', 'Acidente', 'Administrador', 'Nenhuma', 'Nenhuma', '2023-05-11', '2023-05-10', '2023-05-10', '100', 'Katia Martins', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `doenca` varchar(100) NOT NULL,
  `data_internacao` varchar(100) NOT NULL,
  `nome_doctor` varchar(100) NOT NULL,
  `idade` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `datain` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `id_paciente`, `nome_paciente`, `doenca`, `data_internacao`, `nome_doctor`, `idade`, `provincia`, `municipio`, `bairro`, `rua`, `texto`, `datain`) VALUES
(3, 2, 'Sergio Mungo', 'Nenhuma', '2023-05-10', 'Katia Martins', '30', 'Luanda', 'Viana', 'Bele Vista', 'Rua 2', '<p>ufgawfhiahfheaaofhohfpewoff</p>', '2023-05-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `chave` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `chave`, `foto`) VALUES
(1, 'Paulo', 'c4ca4238a0b923820dcc509a6f75849b', 'Administrador', 'dbada7adef760b2e5c6f61b9cc53f79e.png'),
(3, 'Pedro Alexandre', 'c4ca4238a0b923820dcc509a6f75849b', 'Administrador', '1.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Índices para tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `familiar`
--
ALTER TABLE `familiar`
  ADD CONSTRAINT `familiar_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id`);

--
-- Limitadores para a tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD CONSTRAINT `relatorio_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
