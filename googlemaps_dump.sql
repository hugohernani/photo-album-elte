-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2011. Feb 19. 08:48
-- Szerver verzió: 5.0.67
-- PHP Verzió: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Adatbázis: `ade`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `googlemaps`
--

CREATE TABLE IF NOT EXISTS `googlemaps` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) collate utf8_hungarian_ci NOT NULL,
  `address` varchar(80) collate utf8_hungarian_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) collate utf8_hungarian_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=14 ;

--
-- Tábla adatok: `googlemaps`
--

INSERT INTO `googlemaps` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Magyar Nemzeti Galéria', '1014 Budapest, Dísz tér', 47.499355, 19.035463, 'museum'),
(2, 'Ferencvárosi Helytörténeti Gyûjtemény', '1093 Budapest, Pipa utca', 47.487026, 19.059061, 'museum'),
(3, 'Dreher Sörmúzeum - Söripari Emléktár', '1106 Budapest, Jászberényi út', 47.492004, 19.143812, 'museum'),
(4, 'Országos Pedagógiai Könyvtár és Múzeum', '1089 Budapest, Könyves Kálmán körút', 47.477791, 19.100203, 'museum'),
(5, 'Országos Széchenyi Könyvtár', '1014 Budapest, Budavári Palota F. épület', 47.499401, 19.036900, 'museum'),
(6, 'Országos Mûszaki Múzeum', '1117 Budapest, Kaposvár utca', 47.468445, 19.051764, 'museum'),
(7, 'Eötvös Loránd Tudományuniversity épülete', '1088 Budapest, Múzeum körút', 47.494404, 19.061884, 'university'),
(10, 'Szépmûvészeti Múzeum', '1146 Budapest, Dózsa György út 41', 47.515953, 19.076900, 'museum'),
(11, 'ELTE IK', '1119 Budapest Pázmány Péter sétány 1/c', 47.471977, 19.062635, 'university');
