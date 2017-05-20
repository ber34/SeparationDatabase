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
-- Struktura tabeli dla tabeli `prk_chat`
--

CREATE TABLE IF NOT EXISTS `prk_chat` (
  `id_chat` int(11) NOT NULL,
  `ip_chat` varchar(60) NOT NULL,
  `text_chat` text NOT NULL,
  `name_chat` varchar(60) NOT NULL,
  `data_chat` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `prk_chat`
--

INSERT INTO `prk_chat` (`id_chat`, `ip_chat`, `text_chat`, `name_chat`, `data_chat`) VALUES
(89, 'IPV6 ::1', 'Adaś ber', 'bbbbb', '2017-05-20 11:28:57');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `prk_chat`
--
ALTER TABLE `prk_chat`
  ADD PRIMARY KEY (`id_chat`), ADD KEY `id_chat` (`id_chat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `prk_chat`
--
ALTER TABLE `prk_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
