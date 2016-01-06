-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 13-Jun-2014 às 16:48
-- Versão do servidor: 5.6.11
-- versão do PHP: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `estoque`
--
CREATE DATABASE IF NOT EXISTS `estoque` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `estoque`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `categoria_id`) VALUES
(1, 'Impressoras', 0),
(2, 'Cartuchos', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_produto`
--

CREATE TABLE IF NOT EXISTS `categoria_produto` (
  `produto_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`produto_id`,`categoria_id`) COMMENT 'teste',
  KEY `produto_id` (`produto_id`,`categoria_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle`
--

CREATE TABLE IF NOT EXISTS `controle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `funcionario_nif` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`,`funcionario_nif`),
  KEY `nif` (`funcionario_nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `nif` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `cargo` varchar(155) NOT NULL,
  `rg` varchar(155) NOT NULL,
  `cpf` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  PRIMARY KEY (`nif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`nif`, `nome`, `cargo`, `rg`, `cpf`, `email`) VALUES
(1, 'Carina Vicente de Paula', 'F Continuada - Helio', '', '313.644.188-51', ''),
(2, 'Beatriz Lopes da Silva', 'F Continuada - Helio', '', '408.408.650-48', ''),
(3, 'Luana Petronilia Valeriana da Silva', 'SECRETARIA   - Andrea', '', '410.991.398-56', ''),
(4, 'RITA DE CASSIA MOREIRA BELLEI', 'Assistente de Servi‡os Técnico', '12.760.956-0', '046.601.828-27', 'ritabellei@gmail.com'),
(3839, 'FRANCISCO ALVES DE PAULO', 'Instrutor de Formação Profissional II', '8.841.974/SP', '755.257.208-68', 'franciscoalves14@gmail.com'),
(4947, 'VALDIR COSTA', 'Instrutor de Formação Profissional III', '6.371.103/SP', '536.295.908-53', 'valdir54@yahoo.com.br'),
(5189, 'CLAUDIO MURARI', 'Supervisor de Formação Profissional', '8.461.649-0/SP', '760.471.728-49', 'c-murari@uol.com.br'),
(5215, 'JOSAFA GOMES DA SILVA', 'TECNICO DE ENSINO                  ', '8.689.379-8/SP', '641.162.208-68', 'josafa.gomes@gmail.com'),
(5477, 'JOSE LUIZ COIMBRA DA COSTA', 'Auxiliar Tecnico de Oficina', '9.020.427/SP', '899.134.938-20', ''),
(6334, 'WALTER JOSE SERAFIM DOS SANTOS', 'Oficial de Manuten‡Æo', '21.367.224/SP', '995.111.428-87', ''),
(6818, 'ISIDORO EDISON LIMA BARTOLO', 'Instrutor de Praticas Prof Ativ Avan‡adas', '9658916', '016.023.718-14', 'bartolosp@hotmail.com'),
(7223, 'EDVAR APARECIDO BONATO', 'Instrutor de Formação Profissional III', '8.035.454-3/SP', '906.341.958-91', 'sttmecanica115@sp.senai.br'),
(9369, 'JOSE PEDRO DA SILVA', 'Auxiliar de Servi‡os e Conserva‡Æo ', '53.642.249-7', '030.563.228-04', ''),
(9574, 'MARIO SERGIO ALONSO', 'ORIENTADOR DE PRATICA PROF              ', '9.083.305-3/SP', '768.418.128-91', 'masealonso@hotmail.com'),
(9633, 'ANTONIO PEREIRA HAYASHIDA VIANA', 'Spervisor Técnico de Laboratorio', '12.298.529-1/SP', '089.735.148-73', 'vtoninho@ibest.com.br'),
(9687, 'ALVINO ALVES DOS SANTOS', 'ORIENTADOR DE PRATICA PROF', '14.088.911/SP', '042.261.798-97', 'fcontinuada115@sp.senai.br'),
(9716, 'JORGE LUIS SILVA ALVES', 'Orientador de Pratica Profissional', '17.144.937-X', '076.464.158-12', 'jrgalves@uol.com.br'),
(9782, 'JOSE ARNALDO DO N.PESSOA', 'Instrutor de Formação Profissional III', '9.757.915/SP', '041.312.348-07', 'arnaldopessoa@ig.com.br'),
(70394, 'MARIA LUIZA HERNANDES', 'Instrutor de Formação Profissional III', '6.264.512-2/SP', '143.446.008-86', 'luizahernandes@uol.com.br'),
(70429, 'GABRIEL MARTINEZ DE MARTINEZ', 'TECNICO DE ENSINO                  ', '8.673.424-6', '022.187.068-73', 'gabrielmartinez@terra.com.br'),
(70666, 'MARCILIO MANZAN', 'Coordenador de Atividades T‚cnicas', '14.075.090/SP', '100.642.928-00', 'marcilio@sp.senai.sp'),
(71103, 'MARGARIDA GARCIA AGUADO', 'Assistente de Servi‡os Administrativos', '6.982.116/SP', '843.251.948-00', 'comitequalidade115@sp.senai.br'),
(71530, 'MARCIA HELENA FARIA YAMAZAKI', 'Assistente de Servi‡os Administrativos', '8.966.613-6/SP', '791.499.528-20', 'myamazak@terra.com.br'),
(71584, 'CLAUDIO JOSE DADO', 'Instrutor de Formação Profissional III', '11.239.099/SP', '843.348.198-34', 'cldado@ig.com.br'),
(71748, 'MARIA JOSE PREBILL GIANNOTTI', 'Assistente de Servi‡os Administrativos', '12.399.934/SP', '042.040.568-22', 'zezeprebill@yahoo.com.br'),
(72189, 'HELIO NUNES COELHO', 'Coordenador de Atividade T‚cnicas', '17.864.401-8', '065.989.498-07', 'helio-coelho1@hotmail.com'),
(72240, 'ANGELO IANNUZZI', 'Instrutor de Formação Profissional III', '12.574.391/SP', '011.277.458-08', 'angeloiannuzzi@gmail.com'),
(72336, 'ADMILSON COSTA PEREIRA', 'Instrutor de Formação Profissional III', '10.670.345-5/SP', '920.054.038-49', 'admilson.pereira@ig.com.br'),
(72698, 'IZAEL DA SILVA CAMPOS', 'Instrutor de Formação Profissional III', '18.485.218/SP', '079.314.038-27', 'izaelcamonc@gmail.com'),
(73174, 'CARLOS EDU. FLAMARION G DA SILVA', 'Técnico de Ensino', '23.803.576-1/SP', '062.495.948-17', 'ceflamarion@uol.com.br'),
(73373, 'ORLANDO FERMINO', 'Instrutor de Formação Profissional III', '10.424.520-7/SP', '014.190.268-01', ''),
(73695, 'SAMIRA ANTUNES FERREIRA DA SILVA', 'BIBLIOTECARIO                      ', '18.823.933-9/SP', '111.572.008-26', 'samiraantunes@hotmail.com'),
(73884, 'MARCOS ANTONIO SALDANHA', 'Instrutor de Formação Profissional III', '15.561.675/SP', '053.600.158-88', 'marcossenai@ig.com.br'),
(73907, 'MARIO SERGIO FERNANDES', 'TECNICO DE ENSINO                  ', '6.484.085/SP', '563.112.308-87', 'mariosfbross@gmail.com'),
(74048, 'ROSEMEIRE APARECIDA DE LIMA', 'Assistente de Servi‡os Administrativos', '18.178.366-6', '134.639.318-42', 'rosimeirelima27@gmail.com'),
(74105, 'SERGIO MAURICIO DA SILVA', 'Oficial de manuten‡Æo', '27.775.294-2/SP', '560.515.906-25', 'samiraantunes@hotmail.com'),
(74164, 'PEDRO TEODORO DE FARIA', 'Diretor de Unid de Forma‡ Profissional', '26.742.589-2', '168.894.178-95', 'pfaria@sp.senai.br'),
(74297, 'JOSE AGILSON ROCHA', 'Auxiliar de  Manuten‡Æo', '21.517.353-3/SP', '086.344.848-82', ''),
(74359, 'LUIS PAULO ZABIN', 'Coordenador de Atividades Pedag¢gicas', '12.375.111/SP', '038.645.578-36', 'zabin@sp.senai.br'),
(74387, 'WADSON DE ALMEIDA SOUSA', 'Instrutor de Formação Profissional III', '17.612.375-1/SP', '081.906.898-51', 'wadsonsousa@hotmail.com'),
(74430, 'AMARILDO DONIZETI FERREIRA', 'BIBLIOTECARIO                      ', '21.464.410-8', '129.377.128-78', 'adonizetif2@terra.com.br'),
(74462, 'ODAIR DE OLIVEIRA', 'Instrutor de Formação Profissional III', '14.366.586/SP', '088.377.768-10', 'meioambiente115@sp.senai.br'),
(74580, 'GILBERTO JOAQUIM DA SILVA', 'Instrutor de Formação Profissional III', '18.193.665/SP', '093.045.008-69', 'gilberto-js@ig.com.br'),
(74849, 'HILARIO SOUZA ROCHA', 'Auxiliar Tecnico de Oficina', '17.813.067/SP', '136.827.188-00', 'hilario.souza14@gmail.com'),
(75032, 'LEVI KLIMUK', 'Instrutor de Formação Profissional I', '20.659.378/SP', '089.296.018-39', 'klimuk@ig.com.br'),
(75587, 'MONICA SANTANA M DE OLIVEIRA', 'AGENTE DE TREINAMENTO              ', '27.325.841-2/SP', '177.503.278-78', 'moliveira@sp.senai.br'),
(75846, 'PAULO DA CRUZ CARDIM', 'TECNICO DE ENSINO                  ', '4.226.694/BA', '418.296.975-87', 'pcardim@yahoo.com.br'),
(75853, 'µTILA ANDREATTI OLIVI', 'TECNICO DE ENSINO                  ', '17.696.238-4/SP', '105.390.368-54', 'prof.atila@ig.com.br'),
(76496, 'REGINALDO DOS SANTOS ZORMEGNAN', 'TECNICO DE ENSINO                  ', '20.916.638/SP', '128.107.278-80', 'engregis@hotmail.com'),
(76551, 'JOSE PARRADO JUNIOR', 'Assistente de Servi‡os Administrativos', '8.064.185-4/SP', '915.048.728-00', 'zacaparrado@ig.com.br'),
(76689, 'MILTON EDUARDO CORREIA ARAUJO', 'Instrutor de Formação Profissional III', '17.612.528-4/SP', '099.988.668-12', 'miltoneduardo@ig.com.br'),
(76756, 'VIVIANE SANTIAGO L DA COSTA', 'ORIENTADOR EDUCACIONAL             ', '18.704.587-2/SP', '172.375.628-86', 'vslcosta@terra.com.br'),
(76770, 'FABIANO CAIO JOS', 'Instrutor de Formação Profissional II', '24.522.469-5/SP', '152.452.868-40', 'fabiano.jose@uol.com.br'),
(76771, 'JOS GUILHERMINO ALVES NETO', 'Instrutor de Formação Profissional III', '11.452.871-8/SP', '049.611.668-04', 'joseguilhermino@ig.com.br'),
(76813, 'ITAMAR DE ARAUJO GYOMBER', 'TECNICO DE ENSINO                  ', '17.416.613-8', '093.136.458-23', 'gyomber@uol.com.br'),
(76825, 'ANDREA FRANCO RIZZO FRANZOI', 'Coordenador de Administração Escolar', '29.985.861-3', '267.508.038-14', 'andreafrancorizzo@ig.com.br'),
(76962, 'MONICA DE JESUS COSTA MELO', 'Assistente de Servi‡os Administrativos', '45.116.216-X/SP', '227.496.748-24', 'monicacosta1985@hotmail.com'),
(77103, 'JOSE BARBOSA DA SILVA FILHO', 'Instrutor de Formação Profissional III', '12.765.012-X/SP', '103.216.808-04', 'jose.barbosa@uol.com.br'),
(77105, 'WANDERLEI HENRIQUES', 'Auxiliar de  Manuten‡Æo', '16.865.914-1/SP', '044.338.858-00', ''),
(77127, 'ROSARIA CLERICI', 'Professor CT', '12.785.905-6', '149.121.748-07', 'rosariacler@hotmail.com'),
(77201, 'RUI SOARES DIAS', 'Técnico de Ensino', '15.922.354-4', '051.407.408-69', 'rui.soares@yahoo.com.br'),
(77227, 'EDUARDO FRANCISCO FERREIRA', 'Coordenador de Atividades Pedag¢gicas', '22.911.480-5', '203.932.608-10', 'eferreira@sp.senai.br'),
(77284, 'ALESSANDRO JOSE DA SILVA', 'TECNICO DE ENSINO                  ', '21.506.344-2/SP', '125.194.948-75', 'ajs.moreira@ig.com.br'),
(77433, 'CRISTIANO CARDOSO', 'TECNICO DE ENSINO                  ', '25.647.655-X/SP', '274.469.678-11', 'cristiano.cardoso1@gmail.com'),
(77463, 'KEELEM CRYSTYNA DUARTE M SILVEIRA', 'ORIENTADOR EDUCACIONAL             ', '3616595/GO', '936.284.121-53', 'keelemc@gmail.com'),
(77551, 'TIAGO GUERREIRO FERREIRA', 'Coordenador  de Relacion com a Industria', '25.475.444-2', '218.781.228-60', 'guerreiro.tiago@hotmail.com'),
(77570, 'GEORGE GERALDO DE OLIVEIRA SILVA', 'Instrutor de Formação Profissional II', '29.882.422-X', '295.171.838-10', 'georgesilva81@gmail.com'),
(77673, 'DAVI CARDOZO DUARTE JUNIOR', 'Instrutor de Formação Profissional III', '28.744.769-8/SP', '272.977.798-90', 'davi_cardozo@hotmail.com'),
(77679, 'AROALDO TELES', 'TECNICO DE ENSINO                  ', '18.904.167/SP', '087.406.208-08', 'odlaora@ig.com.br'),
(77752, 'JOSE RICARDO MENDES DOS SANTOS', 'Coordenador de Atividades T‚cnicas', '29.912.815-5/SP', '332.680.208-01', 'rikarmendes@gmail.com'),
(77845, 'DARCIO DE ALMEIDA AMARAL', 'TECNICO DE ENSINO                  ', '5.255.581/SP', '813.375.588-34', 'darcioamaral@gmail.com'),
(77888, 'ITAMAR LIMA DA SILVA', 'Auxiliar de  Manuten‡Æo', '40.206.598-0/SP', '352.077.128-45', ''),
(78009, 'JOSE ANTONIO DA SILVA', 'Auxiliar de Servi‡os e Conserva‡Æo ', '54.730.134-0/SP', '899.439.968-20', ''),
(78024, 'DIOGO MIGUEL PARRA', 'Orientador de Praticas Profissionais', '18050611', '069.801.268-22', 'diogo.parra@sp.senai.br'),
(78029, 'SIDNEI APARECIDO PEREIRA CHUVES', 'Instrutor de Formação Profissional III', '17.184.996/SP', '125.790.428-06', 'andradechuves@ig.com.br'),
(78031, 'LUIS CARLOS SANCHES', 'Instrutor de Formação Profissional III', '22.691.759-9/SP', '779.626.139-04', 'luissanches26@terra.com.br'),
(1001565, 'DOUGLAS DAVID', 'Instrutor de Formação Profissional III', '24.188.392-1/SP', '143.576.148-05', 'douglasitaliano@gmail.com'),
(1002697, 'JOSUE FARAH', 'Instrutor de Formação Profissional III', '22.823.568-6/SP', '171.081.638-45', 'jo.farah@hotmail.com'),
(1004645, 'LUIS UMBELINO DOS SANTOS', 'TECNICO DE ENSINO                  ', '25.934.618-4/SP', '181.207.278-35', 'umbelino.estudos@bol.com.br'),
(1004712, 'BRUNO RAPHAEL MACIEL', 'Instrutor de Formação Profissional III', '42.566.605-0/SP', '228.788.528-50', ''),
(1006139, 'ALEXANDRE DE CASSIO CAETANO', 'TECNICO DE ENSINO                  ', '17.391.093-2/SP', '143.607.168-26', 'xando.c@ig.com.br'),
(1007141, 'OLIVER GUERINO DA SILVA', 'TECNICO DE ENSINO                  ', '33.537.448-7/SP', '213.610.328-80', 'oliverguerino@hotmail.com'),
(1007165, 'DAVID DE  OLIVEIRA', 'TCNICO DE ENSINO', '27.241.566-2/SP', '180.094.228-19', 'dvdolv2002@yahoo.com.br'),
(1007611, 'MARCUS VINICIUS DOS R VENDITTI', 'TECNICO DE ENSINO                  ', '23.695.564-0/SP', '174.820.268-51', 'marcusvenditti@hotmail.com'),
(1007624, 'LAURA CAMILO SANTOS CRUZ', 'Professor de Ensino Superior', '10.710.004-6', '916.364.858-04', 'lauracruz@terra.com.br'),
(1008391, 'CICERO SUNAS ALVES CAMPOS', 'Instrutor de Formação Profissional III', '20.066.402-5/SP', '158.002.488-26', 'sunascampos@gmailo.com'),
(1008410, 'JOÇO NILSON DAMASCENO LOIOLA', 'Instrutor de Formação Profissional III', '17.342.049-7/SP', '080.079.538-50', 'joao.nilson@terra.com.br'),
(1008416, 'ATALMIRANDA ALVES CASTANHA', 'Instrutor de Formação Profissional III', '14.205.320-X/SP', '038.723.538-88', 'atalmiranda@gmail.com.br'),
(1008432, 'ADRIANO LEANDRO DE ALMEIDA JUNIOR', 'TECNICO DE ENSINO                  ', '14.621.726/SP', '042.535.648-52', 'adrianolaj@yahoo.com.br'),
(1008452, 'CLAITON APARECIDO F DE JESUS', 'Instrutor de Formação Profissional III', '28.970.629-4/SP', '277.885.678-17', 'cafj@bol.com.br'),
(1011442, 'WILDNER KERN VELASQUES', 'Assistente de Servi‡os Administrativos', '16.849.281-7/SP', '808.386.857-49', 'wildnerkv@yahoo.com.br'),
(1011852, 'ALEXSANDER DA SILVA H RODRIGUES', 'Instrutor de Formação Profissional III', '44.981.926-7/SP', '372.540.618-90', ''),
(1011950, 'ROBERTO RODRIGUES VIANA', 'Instrutor de Formação Profissional III', '30.585.967-5/SP', '212.552.528-39', 'dimitri131313@ig.com.br'),
(1011991, 'ALEXANDRE VIEIRA', 'Instrutor de Formação Profissional III', '44.686.683-0/SP', '356.260.138-73', 'alexandre.v@outlook.com'),
(1011993, 'JOFRE BEZERRA FELIX', 'Instrutor de Formação Profissional III', '45.372.646-X/SP', '356.203.228-58', 'jofrefelix@hotmail.com'),
(1012432, 'MELODY BARRETO DA SILVA', 'Assistente de Servi‡os Administrativos', '35.322.606-3/SP', '341.495.838-46', 'melody.mbs22@gmail.com'),
(1012709, 'MANUEL PATRICIO DA SILVA BISNETO', 'Especialista em STT - Fabrica‡Æo Mecƒnica', '18.085.163-9', '107.018.128-50', 'manuelbisneto@hotmail.com'),
(1013548, 'MAURICIO BONABITACOLA DE ALMEIDA', 'TECNICO DE ENSINO                  ', '23.071.350-6/SP', '163.271.998-36', 'bonalmeida@ig.com.br'),
(1013601, 'MARCOS DE ARAUJO CESARETTI', 'TECNICO DE ENSINO                  ', '20.485.637-1/SP', '166.901.058-90', 'mcesaretti@gmail.com'),
(1013768, 'HERBERT GUIMARÇES BORGES RIBEIRO', 'Técnico de Ensino', '37.150.991-9/SP', '509.640.725-91', 'herbert_sistem@yahoo.com.br'),
(1015110, 'DOUGLAS MANESCO DE LIMA', 'Técnico de Laborat¢rio', '40.822.326-1', '363.795.168-16', 'dougmanesco@hotmail.com'),
(1015675, 'PASCOAL JOSE FERREIRA FILHO', 'Orientador de Atividade Esportiva', '28.437.034-4/SP', '176.251.868-65', 'professorpascoale.edf@gmail.com,'),
(1015678, 'JULIANA  CREPALDI', 'Orientador de Atividade Esportiva', '34.135.127-1/SP', '313.794.718-93', 'juliana_crepaldi@hotmail.com'),
(1015779, 'SANDRA APARECIDA DA SILVA CARMO', 'Assistente de Servi‡os Administrativos', '29.946.731-4', '213.098.268-97', 'sandra.ap_carmo@hotmail.com'),
(1015832, 'JOSE ARNALDO CALAZANS DE SOUZA', 'Sup de Serv de Manut e Conserva‡Æo', '14.084.448-X', '030.726.948-50', 'jcalazans@ig.com.br'),
(1017556, 'LINEU CORREA DIAS', 'Instrutor de Formação Profissional III', '12.271.625-5', '045.699.308-83', 'lineucorreadias@uol.com.br '),
(1018045, 'LOUREN€O PEREIRA JUNIOR', 'Instrutor de Formação Profissional III', '16.460.293-8', '117.887.838-40', 'anasigui@ig.com.br'),
(1018066, 'CARLOS HARLEY FERNANDES LEÇO', 'Instrutor de Formação Profissional III', '38.517.861-X', '228.193.188-94', 'carlos harley@gmail.com'),
(1018841, 'UBIRAJARA TADEU SILVA DA CRUZ', 'Instrutor de Formação Profissional III', '12.779.218-1', '010.488.698-65', 'ubirajaratadeu@gmail.com'),
(1019433, 'OSVALDO OTAVIO DA SILVA', 'Instrutor de Formação Profissional III', '16.755.228-4', '022.372.488-26', 'osvaldo.o@ig.com.br'),
(1020194, 'DANIEL FEVEREIRO VALDEBENITO', 'Instrutor de Formação Profissional III', '35.239.449-3/SP', '220.449.288-41', 'heretique@bol.com.br'),
(1021647, 'GUILHERME RODRIGUES DE CARVALHO', 'Designer', '43.520.443-9', '327.775.698-00', 'guinaw@gmail.com'),
(1022236, 'ANA CLAUDIA GIANNOTTI', 'ESTAGIµRIOS CIEE Orienta‡Æo Escolar- Viviane', '', '352.985.698-38', ''),
(1022269, 'MARIA APARECIDA FELIX DA SILVA', 'Assistente de Servi‡os Administrativos', '45.124.719-X', '225.803.848-04', 'cida.fellix@hotmail.com'),
(1022319, 'PAULO SERGIO FRATTA JUNIOR', 'Instrutor de Formação Profissional III', '26.572.477-6', '260.691.368-02', 'frattajunior@ig.com.br'),
(1022695, 'LUIZ CARLOS BARBOSA LEITE', 'Instrutor de Formação Profissional III', '19.391.090-1', '104.687.958-80', 'luizao.acm@bol.com.br'),
(1022701, 'JUCELINO PINHEIRO DE ANDRADE DA SILVA', 'Instrutor de Formação Profissional III', '29.241.697-0', '291.115.378-25', 'jucelinodigital@ig.com.br'),
(1022707, 'JOSE ZARNAUSKAS FILHO', 'Instrutor de Formação Profissional III', '3.817.438-8', '693.455.208-30', 'jzaz-04@yahoo.com.br'),
(1022713, 'LEILA ARAUJO CAETANO', 'Instrutor de Formação Profissional III', '16.205.219-4', '099.458.058-43', 'adtreina@yahoo.com.br'),
(1023639, 'FERNANDO CANDIDO  DE OLIVEIRA', 'Instrutor de Formação Profissional III', '44.345.165-5', '228.586.848-04', 'fernandocandido@outlook.com'),
(1024354, 'PATRICIA MARIA DA SILVA MAGI', 'Instrutor de Formação Profissional III', '27.493.889-3', '264.617.358-01', 'magipatricia@gmail.com'),
(1024590, 'MILTON TOFETTI  MOURA', 'Instrutor de Formação Profissional III', '8.111.188-5', '013.630.288-20', 'milton.tofetti@hotmail.com'),
(1025693, 'LEONARDO FELIX GAJARDO', 'Assistente de Servi‡os Técnicos', '37.635.867-1', '436.063.238-08', 'leonardo@gajardo.com.br'),
(1025699, 'WILLIAM ADRIANO MARTINS', 'Assistente de Servi‡os Técnicos', '49.127.354-X', '398.460.988-47', 'williamxsp@gmail.com'),
(1025700, 'THIAGO VILLAMAGNA MACHADO', 'Assistente de Servi‡os Tecnicos', '49.530.994-1', '417.329.118-35', 'tvillamagna@gmail.com'),
(1025780, 'PAULO KAZUO INOUE', 'Assistente de Servi‡os Técnicos', '36.319.612-2', '319.444.638-01', 'paulo.0729@gmail.com'),
(1026272, 'JAMES FERREIRA DA SILVA', 'Assistente de Servi‡os Técnicos', '48.088.672-6', '379.038.088-18', 'jamesferreira575@gmail.com'),
(1027729, 'SANDRA REGINA DE CAMPOS SILVA', 'Assistente de Servi‡os Administrativos', '10.892.466-X', '118.981.368-82', 'sandrareginadecampossilva@gmail.com'),
(1029826, 'Fernanda Clara de Souza', 'ESTAGIµRIOS CIEE Marketing  -   Monica Santana', '', '429.315.758-10', ''),
(1030013, 'Eduardo Vitor da Silva Inocˆncio', 'Instr Form Profissional II  -    Helio', '', '403.861.948-66', ''),
(1030085, 'Jose Carlos Gon‡alves', 'Instr Form Profissional II  -  Helio/Marcilio', '', '059.490.288-64', ''),
(1030105, 'Lucas Amancio dos Santos', 'Instr Form Profissional II  -    Helio', '', '396.227.088-46', ''),
(1030111, 'Lucas Neves Soares', 'Instr Form Profissional II  -  Helio/Marcilio', '', '413.798.248-18', ''),
(1030167, 'RICARDO ALVES LEMOS', 'Instrutor de Formação Profissional III', '44.273.602-2', '347.341.378-03', 'lemos@klg.com.br'),
(1030171, 'Alvaro Mendes Hortiz', 'Inst Form Profissional  II   -   Helio', '', '318.670.988-14', ''),
(1030173, 'FELIPPE PEREIRA DE OLIVEIRA DIAS', 'Instrutor de Formação Profissional III', '34.903.619-6', '322.534.478-89', 'felippedias@gmail.com'),
(1030174, 'Anelton Fausto Ribeiro', 'Instr Form Profissional II  -    Helio', '', '223.311.858-83', ''),
(1030178, 'DANILO SANTANA E SILVA', 'Instrutor de Formação profissional II', '46.022.705-1', '393.397.148-90', 'daniloss@live.com'),
(1030200, 'Jose Ribamar GuimarÆes Rocha', 'Instr Form Profissional II  -    Helio', '', '212.312.063-49', ''),
(1030325, 'CARLA MARANGONI DE BONA', 'Instrutor de Formação Profissional III', '4.545.461-2', '050.733.469-80', 'carladebona@gmail.com'),
(1030330, 'MARCELO AMERICO DA SILVA', 'Instrutor de Formação Profissional II', '22.043.380-X', '173.455.268-95', 'dasilvatst33@yahoo.com.br'),
(1030342, 'JOELMA  MATOS FARIAS', 'Instrutor de Formação Profissional III', '44.214.897-5', '328.315.818-50', 'joelma_farias17@hotmail.com'),
(1030387, 'Antonio Carlos Santos', 'Instr Form Profissional III  -   Helio', '', '153.696.738-61', ''),
(1030429, 'Ivete Maria de Souza Jacobsen', 'Instr Form Profissional III  -   Helio', '', '987.629.318-49', ''),
(1030457, 'Neri Eduardo Dutra Moreira', 'Instr Form Profissional II  -    Helio', '', '231.279.880-87', ''),
(1030476, 'Umberto Sinico', 'Instr Form Profissional II  -    Helio', '', '001.216.958-75', ''),
(1030480, 'Elisa Rosana Leme', 'Instr Form Profissional III  -   Helio', '', '188.522.668-36', ''),
(1030511, 'William Fanhanes', 'Instr Form Profissional III  -   Helio', '', '277.978.678-79', ''),
(1030570, 'Gilson Jose dos Santos', 'Instr Form Profissional II  -    Helio', '', '178.280.088-30', ''),
(1030581, 'Luiz Fernando Pereira Alves dos Santos', 'Instr Form Profissional II  -    Helio', '', '091.872.768-52', ''),
(1030601, 'Geraldo Perpetuo de Lima', 'Instr Form Profissional II  -    Helio', '', '873.364.728-34', ''),
(1030954, 'Jose dos Santos Reis', 'Instr Form Profissional II  -    Helio', '', '565.143.525-53', ''),
(1031133, 'Alexandre Requena Patoleia', 'Inst Form Profissional  II   -   Helio', '', '217.939.118-86', ''),
(1031421, 'Carlos Alexandre Soares Miyati', 'Instr Form Profissional III  -   Tiago', '', '269.592.148-90', ''),
(1031428, 'Valdir Harutunian', 'Instr Form Profissional III  -   Tiago', '', '009.111.848-48', ''),
(1031570, 'Antonio de Oliveira Filho', 'Instr Form Profissional II  -    Helio', '', '054.278.398-36', ''),
(1031821, 'Antonio de Oliveira Dias', 'Instr Form Profissional II  -    Helio', '', '140.053.418-61', ''),
(1032128, 'ANA CECILIA GUIMARAES MUNHOZ', 'Instrutor de Formação Profissional III', '4.275.813-0', '021.716.998-84', 'anaceciliamunhozmartins@gmail.com'),
(1032521, 'Sidney Regis Rodrigues', 'Instr Form Profissional III  -   Tiago', '', '136.167.538-13', ''),
(1032659, 'Thiago do Espirito Santo Garcia', 'Instr Form Profissional II  -    Helio', '', '338.936.398-02', ''),
(1032756, 'Carlos Costa Pino Pino', 'Instr Form Profissional II  -    Marcilio', '', '332.696.608-39', ''),
(1033471, 'Vivian Cristina Pereira dos Santos', 'ESTAGIµRIOS CIEE Recepcionista - Andrea', '', '433.027.758-14', ''),
(1033819, 'MANOEL DE SOUZA MENDES', 'Auxiliar de Manuten‡Æo', '34.419.797-9', '343.264.438-80', 'manoelsouzamendes@hotmail.com'),
(1034196, 'RAFAEL GUSTAVO DOS SANTOS ', 'Instrutor de Formação Profissional III', '28.616.738-4', '306.663.368-30', 'rafaelgsantos@hotmail.com'),
(1034284, 'Efraim Silva Duarte', 'Instr Form Profissional II  -    Helio', '', '398.572.058-44', ''),
(1034324, 'MIGUEL JOSE DA SILVA NETO', 'Instrutor de Formação Profissional III', '23.172.425-1', '183.036.458-89', 'miguel.jsneto@yahoo.com.br'),
(1034486, 'Wilson Oliveira da Silveira', 'Instr Form Profissional II  -   Tiago', '', '012.098.838-05', ''),
(1034713, 'Claudio Sapucaia da Silva Junior', 'Instr Form Profissional II  -    Helio', '', '398.762.698-44', ''),
(1034739, 'Nelson Fernandes Junior', 'Instr Form Profissional II  -    Helio', '', '064.292.488-01', ''),
(1034885, 'Karina dos Santos Pereira', 'ESTAGIµRIOS CIEE Biblioteca - Samira', '', '', ''),
(1034969, 'Erotides Brazolin', 'Instr Form Profissional III  -   Tiago', '', '060.629.068-07', ''),
(1034971, 'Bruno Cortez de Almeida Saramelo', 'Instr Form Profissional II  -    Helio', '', '228.071.938-03', ''),
(1035256, 'LUIZ FERNANDO PEREIRA A DOS SANTOS', 'Instrutor de Formação Profissional II', '15.128.742-9', '091.872.768-52', ''),
(1035282, 'Hercules Candido de Oliveira', 'Instr Form Profissional III  -   Tiago', '', '012.482.748-90', ''),
(1035286, 'Donato Galdino dos Santos Neto', 'Instr Form Profissional II  -    Helio', '', '341.016.628-94', ''),
(1035341, 'MARIA JOSE  DA SILVA DIAS ', 'Instrutor de Formação Profissional II', '10.844.531-8', '023.242.838-75', 'mazedias@hotmail.com'),
(1035963, 'Jose Angelo Magri', 'Instr Form Profissional II  -    Helio', '', '671.552.868-34', ''),
(1035974, 'Levi Gon‡alves da Costa', 'Instr Form Profissional II  -    Helio', '', '338.315.338-06', ''),
(1036217, 'Carla Cardoso de Lima', 'Instr Form Profissional II  -    Helio', '', '113.231.218-38', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_controle`
--

CREATE TABLE IF NOT EXISTS `produto_controle` (
  `produto_id` int(11) NOT NULL,
  `controle_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`produto_id`,`controle_id`),
  KEY `produto_id` (`produto_id`,`controle_id`),
  KEY `controle_id` (`controle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_produto`
--

CREATE TABLE IF NOT EXISTS `produto_produto` (
  `produtopai_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  KEY `produtopai_id` (`produtopai_id`,`produto_id`),
  KEY `produto_id` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(155) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `senha` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nome`, `senha`) VALUES
(1, 'parrado', 'Parrado', 'c10a8dd409abefe7b229d209d443f8da');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD CONSTRAINT `categoria_produto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `categoria_produto_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `controle_ibfk_2` FOREIGN KEY (`funcionario_nif`) REFERENCES `funcionario` (`nif`);

--
-- Limitadores para a tabela `produto_controle`
--
ALTER TABLE `produto_controle`
  ADD CONSTRAINT `produto_controle_ibfk_1` FOREIGN KEY (`controle_id`) REFERENCES `controle` (`id`),
  ADD CONSTRAINT `produto_controle_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto_produto`
--
ALTER TABLE `produto_produto`
  ADD CONSTRAINT `produto_produto_ibfk_1` FOREIGN KEY (`produtopai_id`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `produto_produto_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
