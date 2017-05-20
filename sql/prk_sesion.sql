SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `separationdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prk_sesion`
--

CREATE TABLE IF NOT EXISTS `prk_sesion` (
  `u_id` int(11) NOT NULL,
  `sesianame` varchar(255) NOT NULL,
  `ipsesia` varchar(255) NOT NULL,
  `agentuser` varchar(255) NOT NULL,
  `userreferer` varchar(255) NOT NULL,
  `userhost` varchar(255) NOT NULL,
  `usersevername` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `issesja` tinyint(1) NOT NULL DEFAULT '0',
  `czassesja` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;


--
-- Indexes for table `prk_sesion`
--
ALTER TABLE `prk_sesion`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `prk_sesion`
--
ALTER TABLE `prk_sesion`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
