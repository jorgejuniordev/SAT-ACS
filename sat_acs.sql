-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Set-2017 às 16:46
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat_acs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendar_visitas`
--

CREATE TABLE `agendar_visitas` (
  `id` int(11) NOT NULL,
  `data_ultima_visita` date DEFAULT NULL,
  `data_nova_visita` date DEFAULT NULL,
  `cod_familia` varchar(255) DEFAULT NULL,
  `cod_domicilio` varchar(255) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `outras_informacoes` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disponibilidade`
--

CREATE TABLE `disponibilidade` (
  `id` int(11) NOT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disponibilidade`
--

INSERT INTO `disponibilidade` (`id`, `cidade`, `uf`) VALUES
(1, 'Várzea Nova', 'BA'),
(2, 'Jacobina', 'BA'),
(10, 'Mirangaba', 'BA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `domicilio`
--

CREATE TABLE `domicilio` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `cod_domicilio` varchar(255) DEFAULT NULL,
  `cod_familia` varchar(255) DEFAULT NULL,
  `individuos` varchar(255) DEFAULT NULL,
  `ddd` varchar(4) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `domicilio`
--

INSERT INTO `domicilio` (`id`, `id_user`, `cod_domicilio`, `cod_familia`, `individuos`, `ddd`, `telefone`, `cidade`, `uf`, `rua`, `bairro`, `numero`) VALUES
(1, 1, '1', '1', NULL, '74', '999999999', 'Várzea Nova', 'BA', 'Rua do Posto', 'Centro', '70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `familia` varchar(255) DEFAULT NULL,
  `data_ultima_visita` date DEFAULT NULL,
  `cod_familia` varchar(255) DEFAULT NULL,
  `cod_domicilio` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `familias`
--

INSERT INTO `familias` (`id`, `familia`, `data_ultima_visita`, `cod_familia`, `cod_domicilio`) VALUES
(1, 'souza', '2017-09-04', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lembretes`
--

CREATE TABLE `lembretes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `familia_visitada` varchar(255) DEFAULT NULL,
  `pessoa_visitada` varchar(255) DEFAULT NULL,
  `data_ultima_visita` date DEFAULT NULL,
  `pessoa_gestante` set('sim','não') DEFAULT NULL,
  `ddp` date DEFAULT NULL,
  `criancas_pesadas` varchar(255) DEFAULT NULL,
  `outras_informacoes` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lembretes`
--

INSERT INTO `lembretes` (`id`, `id_usuario`, `familia_visitada`, `pessoa_visitada`, `data_ultima_visita`, `pessoa_gestante`, `ddp`, `criancas_pesadas`, `outras_informacoes`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nome_completo` varchar(50) DEFAULT NULL,
  `nome_social` varchar(50) DEFAULT NULL,
  `cod_familia` varchar(255) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `raca_cor` int(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cartao_sus` varchar(20) DEFAULT NULL,
  `nis` varchar(13) DEFAULT NULL,
  `rg` varchar(13) DEFAULT NULL,
  `cpf` varchar(13) DEFAULT NULL,
  `nome_mae` varchar(255) DEFAULT NULL,
  `nacionalidade` int(11) DEFAULT NULL,
  `pais_nascimento` varchar(255) DEFAULT NULL,
  `ddd` varchar(5) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `ocupacao` varchar(255) DEFAULT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `responsavel_cartaosus` int(20) DEFAULT NULL,
  `responsavel_datanascimento` date DEFAULT NULL,
  `data_ultima_visita` date DEFAULT NULL,
  `relacao_parentesco` varchar(255) DEFAULT NULL,
  `frequenta_creche` int(11) DEFAULT NULL,
  `curso_frequentado` int(11) DEFAULT NULL,
  `situacao_trabalho` int(11) DEFAULT NULL,
  `crianca_localiza` int(11) DEFAULT NULL,
  `frequenta_cuidador` int(11) DEFAULT NULL,
  `frequenta_grupo` int(11) DEFAULT NULL,
  `plano_saude_privado` int(11) DEFAULT NULL,
  `membro_comunidade` int(11) DEFAULT NULL,
  `comunidade_nome` varchar(255) DEFAULT NULL,
  `orientacao_sexual` int(11) DEFAULT NULL,
  `orientacao_tipo` int(11) DEFAULT NULL,
  `pessoa_deficiente` int(11) DEFAULT NULL,
  `deficiència_tipo` int(11) DEFAULT NULL,
  `saida_cadastro` int(11) DEFAULT '2',
  `pessoa_gestante` int(11) DEFAULT NULL,
  `maternidade_referencia` varchar(255) DEFAULT NULL,
  `considera_peso` int(11) DEFAULT NULL,
  `pessoa_fumante` int(11) DEFAULT NULL,
  `pessoa_alcool` int(11) DEFAULT NULL,
  `pessoa_drogas` int(11) DEFAULT NULL,
  `pessoa_hipertensao` int(11) DEFAULT NULL,
  `pessoa_diabetes` int(11) DEFAULT NULL,
  `pessoa_avc` int(11) DEFAULT NULL,
  `pessoa_infarto` int(11) DEFAULT NULL,
  `pessoa_cardiaca` int(11) DEFAULT NULL,
  `cardiaca_doenca` int(11) DEFAULT NULL,
  `pessoa_rins` int(11) DEFAULT NULL,
  `rins_doenca` int(11) DEFAULT NULL,
  `pessoa_pulmao` int(11) DEFAULT NULL,
  `pulmao_doenca` int(11) DEFAULT NULL,
  `pessoa_hanseniase` int(11) DEFAULT NULL,
  `pessoa_tuberculose` int(11) DEFAULT NULL,
  `pessoa_cancer` int(11) DEFAULT NULL,
  `pessoa_internacao` int(11) DEFAULT NULL,
  `internacao_causa` varchar(255) DEFAULT NULL,
  `pessoa_mental` int(11) DEFAULT NULL,
  `pessoa_acamada` int(11) DEFAULT NULL,
  `pessoa_domiciliado` int(11) DEFAULT NULL,
  `pessoa_plantas` int(11) DEFAULT NULL,
  `plantas_nome` varchar(255) DEFAULT NULL,
  `pessoa_praticas` varchar(255) DEFAULT NULL,
  `pessoa_condicao1` varchar(255) DEFAULT NULL,
  `pessoa_condicao2` varchar(255) DEFAULT NULL,
  `pessoa_condicao3` varchar(255) DEFAULT NULL,
  `situacao_rua` int(11) DEFAULT NULL,
  `rua_tempo` int(11) DEFAULT NULL,
  `recebe_beneficio` int(11) DEFAULT NULL,
  `referencia_familiar` int(11) DEFAULT NULL,
  `alimentacao_dia` int(11) DEFAULT NULL,
  `alimentacao_origem` int(11) DEFAULT NULL,
  `acompanhamento_instituicao` int(11) DEFAULT NULL,
  `instituicao_nome` varchar(255) DEFAULT NULL,
  `visita_frequencia` int(11) DEFAULT NULL,
  `visita_grauparentesco` varchar(255) DEFAULT NULL,
  `acesso_higiene` varchar(11) DEFAULT NULL,
  `higiene_acessos` int(11) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `id_user`, `nome_completo`, `nome_social`, `cod_familia`, `sexo`, `raca_cor`, `data_nascimento`, `cartao_sus`, `nis`, `rg`, `cpf`, `nome_mae`, `nacionalidade`, `pais_nascimento`, `ddd`, `telefone`, `cidade`, `uf`, `email`, `ocupacao`, `responsavel`, `responsavel_cartaosus`, `responsavel_datanascimento`, `data_ultima_visita`, `relacao_parentesco`, `frequenta_creche`, `curso_frequentado`, `situacao_trabalho`, `crianca_localiza`, `frequenta_cuidador`, `frequenta_grupo`, `plano_saude_privado`, `membro_comunidade`, `comunidade_nome`, `orientacao_sexual`, `orientacao_tipo`, `pessoa_deficiente`, `deficiència_tipo`, `saida_cadastro`, `pessoa_gestante`, `maternidade_referencia`, `considera_peso`, `pessoa_fumante`, `pessoa_alcool`, `pessoa_drogas`, `pessoa_hipertensao`, `pessoa_diabetes`, `pessoa_avc`, `pessoa_infarto`, `pessoa_cardiaca`, `cardiaca_doenca`, `pessoa_rins`, `rins_doenca`, `pessoa_pulmao`, `pulmao_doenca`, `pessoa_hanseniase`, `pessoa_tuberculose`, `pessoa_cancer`, `pessoa_internacao`, `internacao_causa`, `pessoa_mental`, `pessoa_acamada`, `pessoa_domiciliado`, `pessoa_plantas`, `plantas_nome`, `pessoa_praticas`, `pessoa_condicao1`, `pessoa_condicao2`, `pessoa_condicao3`, `situacao_rua`, `rua_tempo`, `recebe_beneficio`, `referencia_familiar`, `alimentacao_dia`, `alimentacao_origem`, `acompanhamento_instituicao`, `instituicao_nome`, `visita_frequencia`, `visita_grauparentesco`, `acesso_higiene`, `higiene_acessos`, `data_cadastro`) VALUES
(10, 1, 'sfsdfsdf', 'sdfsdfsd', NULL, 0, 0, '1111-11-11', NULL, '', NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-10 22:17:13'),
(2, 1, '999999999999', NULL, NULL, NULL, NULL, '0101-05-09', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(3, 1, '1', '2', '275760-03-31', 1, 4, '0000-00-00', '', '3333333', '2', '3333333333333', '333', 33333333, '33', '33333', '33333333333', '1', '444444444444444', '444444444444444', '275760-04-04', NULL, NULL, NULL, '0000-00-00', '4444444444444444444', 1, 14, 8, 5, 1, 1, 1, 1, '4444444444444444444', 0, 4, 1, 4, 0, 0, '488888888888888888', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, '8888888888888888888', 1, 1, 1, 1, '8888888888888888', '1', '999999999999999', '99999999999999', '9999999998888888888', 0, 4, 0, 1, 1, 1, 1, '54545445', 0, '544545', '1', 2, '0000-00-00 00:00:00'),
(4, 1, 'jorge de souza lima junior', 'jorginha', '1', 0, 1, '1996-10-01', '9999999999', '9999999999999', NULL, NULL, '99999999999999999999', 1, 'Pocotó99999999999999999999', '999', '99999999999', '999999999999999', '99', '99999999999999999999@999999999', '99999999999999999999', 1, 2147483647, '0999-06-09', NULL, '1', 1, 14, 8, 5, 1, 1, 1, 1, '99999999999999999999', 1, 7, 1, 0, 2, 1, '99999999999999999999', 2, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 2, 1, 3, 1, 1, 1, 1, '99999999999999999999', 1, 1, 1, 1, '99999999999999999999', '1', '99999999999999999999', '99999999999999999999', '99999999999999999999', 1, 4, 1, 1, 2, 3, 1, '99999999999999999999', 1, '99999999999999999999', '1', 0, '2017-09-03 00:00:00'),
(5, 1, 'asdasdasd', '', NULL, 0, 1, '1990-01-01', '', 'asd', NULL, NULL, '', 0, '', '', '', 'asdasdasd', 'as', '', '', 0, 0, '0000-00-00', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, 0, NULL, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, '', 0, '', '0', 0, '0000-00-00 00:00:00'),
(6, 1, 'nomedaposadasdjsa', '45454545', NULL, 0, 0, '0044-04-04', '544545', '555555555555', NULL, NULL, '555555555', 0, '45545454', '544', '45454554', '545445', '54', '54545445@455445', '544545', 1, 0, '0000-00-00', NULL, '0', 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, 0, NULL, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '0', '', '', '', 1, 0, 0, 0, 0, 0, 0, '', 0, '', '0', 1, '0000-00-00 00:00:00'),
(8, 1, '11111111', NULL, NULL, NULL, NULL, '1990-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-10 21:57:13'),
(9, 1, '123', '123', NULL, 0, 0, '0123-03-12', NULL, '', NULL, NULL, '', 0, '', '', '', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-10 22:05:40'),
(11, 1, 'asdsad', 'sadsa', NULL, 0, 0, '0222-02-22', '1', '', NULL, NULL, '', 0, '', '', '', '222', '22', '', '', NULL, NULL, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-10 22:18:31'),
(12, 1, 'nome nome de nome de nome', '9999999999', NULL, 0, 0, '2015-09-24', '123132123123', '21121212', NULL, NULL, 'asdasd asd asd', 0, 'asdasd', '', '', '454', '45', '', '', 0, 0, '0000-00-00', NULL, '', 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, 0, 2, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, '', 0, '', '', 0, '2017-09-11 01:49:45'),
(13, 1, 'jose', 'henrique', NULL, 1, 3, '1888-02-02', '5555555555555', '5555555555555', NULL, NULL, '5555555555555', 0, '5555555555555', '555', '55555555555', '5555555555555', '55', '5555555555555@5555555555555', '5555555555555', 1, 2147483647, '0066-06-06', NULL, '5', 1, 13, 0, 0, 0, 0, 0, 0, '5555555555555', 0, 0, 0, 0, 2, 0, '5555555555555', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5555555555555', 0, 0, 0, 0, '5555555555555', '0', '5555555555555', '5555555555555', '5555555555555', 1, 0, 0, 0, 0, 0, 0, '', 0, '', '', 0, '2017-09-11 02:30:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `tipo_de_conta` set('acs','supervisor','admin') DEFAULT 'acs',
  `status` set('ativa','inativa','bloqueada') DEFAULT 'inativa',
  `sexo` set('Masculino','Feminino','Indefinido') NOT NULL DEFAULT 'Indefinido',
  `cpf` varchar(13) DEFAULT NULL,
  `cartao_sus` varchar(17) DEFAULT NULL,
  `ddd` varchar(4) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(100) NOT NULL,
  `ip_cadastro` varchar(15) DEFAULT NULL,
  `ip_ultimologin` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `tipo_de_conta`, `status`, `sexo`, `cpf`, `cartao_sus`, `ddd`, `telefone`, `cidade`, `uf`, `data_nascimento`, `email`, `senha`, `data_cadastro`, `foto`, `ip_cadastro`, `ip_ultimologin`) VALUES
(1, 'jorge', 'junior', 'admin', 'ativa', 'Masculino', '04956730560', '123456789123456', '074', '988618728', 'Várzea Nova', 'BA', '1996-10-01', 'guildahard@hotmail.com', 'f5e9cfed522312302b639abe412a7320', '2017-09-04 23:06:32', '', NULL, '127.0.0.1'),
(2, 'jorge2', 'junior2', 'supervisor', 'inativa', 'Indefinido', '12345678999', '4444444444444', '074', '9886155555', 'Jacobina', 'BA', '1996-10-01', 'guildahard2@hotmail.com', 'f5e9cfed522312302b639abe412a7320', '2017-09-04 23:05:53', '', NULL, '127.0.0.1'),
(3, 'joao', 'jozÃ©', 'acs', 'inativa', '', '12345675544', NULL, NULL, NULL, NULL, NULL, NULL, 'qwe123qwe456@dff', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:32:12', '', NULL, NULL),
(4, 'qwe123', 'qwe123', 'supervisor', 'inativa', '', '12341566456', NULL, NULL, NULL, NULL, NULL, NULL, 'qwe123@qwe123', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:05:53', '', NULL, NULL),
(5, 'joão', 'marcos', 'supervisor', 'bloqueada', '', '11114454544', NULL, NULL, NULL, 'Várzea Nova', 'Ba', NULL, 'josemarcos@gmail.com', 'f5e9cfed522312302b639abe412a7320', '2017-09-04 23:05:53', '', NULL, NULL),
(6, 'qwe123', 'qwe123', 'supervisor', 'inativa', '', '12321323212', NULL, NULL, NULL, NULL, NULL, NULL, 'qwe123@qwe123', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:05:53', '', NULL, NULL),
(7, 'qwe1232123', 'qwe12313', 'supervisor', 'inativa', '', '15545445454', NULL, NULL, NULL, NULL, NULL, NULL, 'qwe123@2132', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:05:53', '', NULL, NULL),
(8, 'qwe123', 'qwe123', 'supervisor', 'inativa', '', '45445455445', NULL, NULL, NULL, NULL, NULL, NULL, '45445455445@45445455445', 'a0a9486f35cb5b335a2a55bac2c61165', '2017-09-04 23:05:53', '', NULL, NULL),
(9, 'qwe12112', 'qwe5', 'supervisor', 'inativa', '', '11111111111', NULL, NULL, NULL, NULL, NULL, NULL, 'qwe123@qwe123', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:05:53', '', NULL, NULL),
(10, 'qwe123', 'qwe123', 'supervisor', 'ativa', '', '22222222222', NULL, NULL, NULL, NULL, NULL, NULL, 'qwe1232@qwe123', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:05:53', '', NULL, NULL),
(11, 'qwe123', 'qwe123', 'supervisor', 'ativa', '', '55555555555', NULL, NULL, NULL, 'Várzea Nova', 'Ba', NULL, 'qwe123@qwe123', '200820e3227815ed1756a6b531e7e0d2', '2017-09-04 23:05:53', '', NULL, NULL),
(12, 'qqqqqqqq', '5555555', 'supervisor', 'inativa', '', '54444433333', NULL, NULL, NULL, NULL, NULL, NULL, '54444433333@54444433333', '0c8680b5e716cc39ab05b99825e4481e', '2017-09-04 23:05:53', '', NULL, NULL),
(13, 'qwe123', 'qwe123', 'supervisor', 'inativa', '', '15515151155', NULL, NULL, NULL, NULL, NULL, NULL, '15515151155@15515151155', 'a38c49e98daa5ce3fe60012a4891845a', '2017-09-04 23:05:53', '', NULL, NULL),
(14, 'qwe123', 'qwe123', 'supervisor', 'inativa', '', '11122222222', NULL, NULL, NULL, NULL, NULL, NULL, '11122222222@11122222222', '64e5951ad8f08c6d5bd7b29a726b8eee', '2017-09-04 23:05:53', '', NULL, NULL),
(15, 'qqqqqq', 'qqqqqqqqqqqqqqq', 'supervisor', 'inativa', '', '54455464554', NULL, NULL, NULL, NULL, NULL, NULL, '54455464554@54455464554', '3f157a6400f3cc32ed0fb4de060600a3', '2017-09-04 23:05:53', '', NULL, NULL),
(16, 'qwe4wqe45', 'qwe4554', 'supervisor', 'inativa', '', '45454545455', NULL, NULL, NULL, NULL, NULL, NULL, '45454545455@45454545455', '65f7db421b51d5eb4f7d15cd6d40f44c', '2017-09-04 23:05:53', '', NULL, NULL),
(17, 'test', 'test', 'supervisor', 'inativa', '', '12332112312', NULL, NULL, NULL, NULL, NULL, NULL, '12332112312@12332112312', '6f8afeeca99bf2f2e8afce0e7d4865f3', '2017-09-04 23:05:53', '', NULL, NULL),
(18, 'asd', 'asd', 'supervisor', 'inativa', '', '12312312312', NULL, NULL, NULL, NULL, NULL, NULL, '12312312312@12312312312', 'e6db1baa29d3df1eb307ff6a12c778da', '2017-09-04 23:05:53', '', NULL, NULL),
(19, 'jorge', 'junior2017', 'supervisor', 'ativa', '', '13234554545', NULL, NULL, '', 'Várzea Nova', 'ba', '2017-10-10', '13234554545@13234554545', 'b8aa5f88331597c210d3f3530d07a340', '2017-09-04 23:05:53', '', NULL, NULL),
(20, 'test', 'test', 'supervisor', 'bloqueada', '', '04232323222', NULL, NULL, NULL, NULL, NULL, NULL, '04232323222@04232323222', '21b9c3a38563e00eb739f1b0aa1336c5', '2017-09-04 23:05:53', '', NULL, NULL),
(21, '123123323231321312', '123123323231321312', 'supervisor', 'inativa', '', '12312332323', NULL, NULL, NULL, NULL, NULL, NULL, '123123323231321312@12312332323', '5b913beb7af7c6a320250f2d88d0245c', '2017-09-04 23:05:53', '', NULL, '127.0.0.1'),
(22, '123122312158554', '123122312158554', 'supervisor', 'inativa', '', '12312231215', NULL, NULL, NULL, NULL, NULL, NULL, '123122312158554@12312231215855', '649e68e47bc68509af1c47d4b7055024', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(23, '15112323456456456', '15112323456456456', 'supervisor', 'inativa', '', '15112323456', NULL, NULL, NULL, NULL, NULL, NULL, '15112323456456456@151123234564', '5e44dcfd588d21ec038795d64cabd1cc', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(24, '746666666666666666666', '746666666666666666666', 'supervisor', 'ativa', '', '74666666666', NULL, NULL, NULL, NULL, NULL, NULL, '746666666666666666666@74666666', 'fa578ec0f26c5d116769cf4eb33c5bf8', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(25, 'nova', 'conta', 'supervisor', 'inativa', 'Indefinido', '15544554454', NULL, NULL, NULL, NULL, NULL, NULL, '15544554454@15544554454', '2d391e65d91c23f069d2bc8cbdff5ed0', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(26, 'test', '123', 'supervisor', 'inativa', 'Feminino', '12344545454', NULL, NULL, NULL, 'Várzea Nova', 'BA', NULL, '12344545454@12344545454', 'cac97b3dfc3291063425bfc526053e8e', '2017-09-04 23:05:53', '', '127.0.0.1', NULL),
(27, 'aaaaaaaaaaaa', '884454458844544588445445', 'supervisor', 'inativa', 'Indefinido', '88445445884', NULL, NULL, NULL, NULL, NULL, NULL, '884454458844544588445445@88445', '13bb911411161a21bb929419dd63f200', '2017-09-04 23:05:53', '', '127.0.0.1', NULL),
(28, '1115435445464', '1115435445464', 'supervisor', 'inativa', 'Indefinido', '11154354454', NULL, NULL, NULL, NULL, NULL, NULL, '1115435445464@1115435445464', 'd3e3e8c4eb48a60be7e8adf1c22b0e56', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(29, 'asdsadsa', 'asdasdas', 'supervisor', 'inativa', 'Indefinido', '89898565656', NULL, NULL, NULL, NULL, NULL, NULL, '89898565656@89898565656', '41ed901ba31f96b574f23eae93e551e7', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(30, 'josé', 'maria', 'supervisor', 'inativa', 'Masculino', '24564554454', '9999999999999', '074', '988618728', 'Rio de Janeiro', 'RJ', '1990-10-01', '24564554454@24564554454', '287678f13aea4bdd1f1149349df5ff98', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(31, '456456456456456456456456', '456456456456456456456456', 'supervisor', 'inativa', 'Masculino', '45645645645', '456456456456456', '456', '4564564564', 'Jacobina', 'BA', '1990-10-01', '456456456456456456456456@45645', '4b8c273ea17ebe923adb34f12b855add', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(32, 'maria', 'joseph', 'supervisor', 'inativa', 'Feminino', '12331152454', '123311524541233', '074', '9545412331', 'Mirangaba', 'BA', '1999-11-01', '12331152454@12331152454', 'a54b90cbcecae2826c37eda6fe9fcc5b', '2017-09-04 23:05:53', '', '127.0.0.1', '127.0.0.1'),
(33, '696666666666666666', '696666666666666666', 'supervisor', 'inativa', 'Indefinido', '69666666666', NULL, NULL, NULL, NULL, NULL, NULL, '696666666666666666@69666666666', 'c15e2c14dcebe2f1f9f208cf34a88f4d', '2017-09-04 17:21:45', '', '127.0.0.1', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendar_visitas`
--
ALTER TABLE `agendar_visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_ultima_visita` (`data_ultima_visita`),
  ADD KEY `cod_familia` (`cod_familia`),
  ADD KEY `cod_domicilio` (`cod_domicilio`),
  ADD KEY `cidade` (`cidade`),
  ADD KEY `uf` (`uf`);

--
-- Indexes for table `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_familia` (`cod_familia`);

--
-- Indexes for table `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_domicilio` (`cod_domicilio`);

--
-- Indexes for table `lembretes`
--
ALTER TABLE `lembretes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa_visitada` (`pessoa_visitada`),
  ADD KEY `familia_visitada` (`familia_visitada`),
  ADD KEY `data_ultima_visita` (`data_ultima_visita`),
  ADD KEY `pessoa_gestante` (`pessoa_gestante`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_familia` (`cod_familia`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendar_visitas`
--
ALTER TABLE `agendar_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disponibilidade`
--
ALTER TABLE `disponibilidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lembretes`
--
ALTER TABLE `lembretes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
