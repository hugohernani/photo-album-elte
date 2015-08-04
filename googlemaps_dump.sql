-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- L�trehoz�s ideje: 2011. Feb 19. 08:48
-- Szerver verzi�: 5.0.67
-- PHP Verzi�: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Adatb�zis: `ade`
--

-- --------------------------------------------------------

--
-- T�bla szerkezet: `googlemaps`
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
-- T�bla adatok: `googlemaps`
--

INSERT INTO `googlemaps` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Magyar Nemzeti Gal�ria', '1014 Budapest, D�sz t�r', 47.499355, 19.035463, 'museum'),
(2, 'Ferencv�rosi Helyt�rt�neti Gy�jtem�ny', '1093 Budapest, Pipa utca', 47.487026, 19.059061, 'museum'),
(3, 'Dreher S�rm�zeum - S�ripari Eml�kt�r', '1106 Budapest, J�szber�nyi �t', 47.492004, 19.143812, 'museum'),
(4, 'Orsz�gos Pedag�giai K�nyvt�r �s M�zeum', '1089 Budapest, K�nyves K�lm�n k�r�t', 47.477791, 19.100203, 'museum'),
(5, 'Orsz�gos Sz�chenyi K�nyvt�r', '1014 Budapest, Budav�ri Palota F. �p�let', 47.499401, 19.036900, 'museum'),
(6, 'Orsz�gos M�szaki M�zeum', '1117 Budapest, Kaposv�r utca', 47.468445, 19.051764, 'museum'),
(7, 'E�tv�s Lor�nd Tudom�nyuniversity �p�lete', '1088 Budapest, M�zeum k�r�t', 47.494404, 19.061884, 'university'),
(10, 'Sz�pm�v�szeti M�zeum', '1146 Budapest, D�zsa Gy�rgy �t 41', 47.515953, 19.076900, 'museum'),
(11, 'ELTE IK', '1119 Budapest P�zm�ny P�ter s�t�ny 1/c', 47.471977, 19.062635, 'university');
