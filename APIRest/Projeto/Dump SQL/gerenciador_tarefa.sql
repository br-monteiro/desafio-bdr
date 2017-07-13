-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2017 at 03:52 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerenciador_tarefa`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL COMMENT 'Identificação do Status',
  `color` varchar(45) DEFAULT NULL COMMENT 'Cor de diferenciação',
  `icon` varchar(45) DEFAULT NULL COMMENT 'Ícone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de status das tarefas';

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nome`, `color`, `icon`) VALUES
(1, 'Novo', 'teal', 'loyalty'),
(2, 'Atenção', 'lime', 'new_releases'),
(3, 'Atrasado', 'yellow', 'warning'),
(4, 'Whatever', 'purple', 'grade'),
(5, 'Cancelado', 'red', 'not_interested');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL COMMENT 'Título da tarefa',
  `description` varchar(60) DEFAULT NULL COMMENT 'Descrição da Tarefa',
  `priority` int(1) NOT NULL COMMENT 'Prioridade',
  `created_at` int(15) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de tarefas';

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `created_at`, `users_id`, `status_id`) VALUES
(2, 'Reunião Hoje', 'Lembra da reunião com a equipe de desenvolvimento', 1, 1499926694, 1, 1),
(5, 'Confirmar Evento', 'Confirmar prensença no evento ShowMeTheCode 2017', 3, 1499964258, 1, 2),
(6, 'Compras', 'Ir ao mercado e comprar Leite, Pão e Ovos', 2, 1499967716, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL COMMENT 'Nome do Usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de usuário';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nome`) VALUES
(1, 'Heitor Monteiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_users_idx` (`users_id`),
  ADD KEY `fk_tasks_status1_idx` (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tasks_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
