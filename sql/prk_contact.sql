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
-- Struktura tabeli dla tabeli `prk_contact`
--

CREATE TABLE IF NOT EXISTS `prk_contact` (
  `u_id` int(11) NOT NULL,
  `mesage` text NOT NULL,
  `datatime` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `ipuser` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `prk_contact`
--

INSERT INTO `prk_contact` (`u_id`, `mesage`, `datatime`, `email`, `ipuser`) VALUES
(1, 'To tabela kontakt ', '2015-10-01 00:00:00', 'ber34@o2.pl', '127.0.0.1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `prk_contact`
--
ALTER TABLE `prk_contact`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `prk_contact`
--
ALTER TABLE `prk_contact`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
