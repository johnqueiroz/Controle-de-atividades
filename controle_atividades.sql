-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.6.5-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela controle_atividades.atividades
CREATE TABLE IF NOT EXISTS `atividades` (
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `listagem` int(11) NOT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela controle_atividades.atividades: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
INSERT INTO `atividades` (`titulo`, `descricao`, `tipo`, `listagem`, `id`) VALUES
	('teste 1001', 'teste 1001', 1, 0, 34),
	('teste 02', 'teste 02', 1, 1, 35),
	('teste 03', 'teste 03', 3, 0, 36),
	('teste 04', 'teste 04 alsdnkalsasdasdasdasdasdasdasdasd', 4, 1, 37),
	('Ãšltimo teste', 'Ãšltimo teste', 3, 0, 39);
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_atividades.login
CREATE TABLE IF NOT EXISTS `login` (
  `cpf` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela controle_atividades.login: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`cpf`, `nome`, `senha`) VALUES
	(123, 'john', '$2y$10$h7k6C5CBdYdepYjbsLdkDeWAS/8L006fTOzGtZtoFMbZfv9sSxYZ2'),
	(1234, '', ''),
	(123456, 'john', '$2y$10$HPjm9CHgpTWSkbMn.cNloupHiUf8gBKoK94M6f24YBzlkJ7D/vaZG'),
	(741741, 'john', ''),
	(741789, 'John Emerson', ''),
	(123456789, 'Radyja', '$2y$10$lxv8nkVx/JROml3U6PmVxuQVeBiwYx.acvTje6F1tm3BJt8e84A7m'),
	(155697625, 'John Emerson', '$2y$10$MZeBoxwCY4llRR3tGjyfYOD8QkGuPFwKOMobi0y3PGz11VSBDwlma'),
	(1234756789, '', '$2y$10$IPxHFdmpD3ccc.nytPt8p.d5MExYIuxB26NvhGVYUYp5GkrzuFpV2'),
	(1556976259, 'John', '$2y$10$.3Hcde0A6PMDUw.gUuiFS.RhJE7QkZ0D0tZOGIELa71Zcjms4P1cy'),
	(15975312374, 'John Emerson', '$2y$10$QJOa3T/k3wPjY/xaP9UrN.ujSX5IVmLSUt8atPSyRAoHtn3e3vvRG'),
	(23675936589, 'Radyja', '$2y$10$09hJxmiVvDj/mO9er/aYieB3/D.qdsdDAxhzBSBvRB2jCHZSozpum'),
	(64572196485, 'Pedro Queiroz de Medeiros', '$2y$10$VEjxkQBqAIZe/1Ql61QOtOe9MXCVY91qRPAGGOnwPUnJJ0kSoUjq6'),
	(78945612300, 'jubinha', '$2y$10$A.aNSkdhGpMXXT1aC7yo8.2UOkoukx9Sj331ANeZsJ3er/MeqsMoq');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
