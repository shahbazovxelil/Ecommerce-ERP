-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 30 2022 г., 19:56
-- Версия сервера: 5.7.36
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ecommerce`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authority`
--

DROP TABLE IF EXISTS `authority`;
CREATE TABLE IF NOT EXISTS `authority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `base_level` varchar(255) DEFAULT NULL,
  `1c_base` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `g_status` int(1) NOT NULL DEFAULT '0',
  `sts` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authority`
--

INSERT INTO `authority` (`id`, `company_type`, `status`, `base_level`, `1c_base`, `fullname`, `login`, `position_type`, `g_status`, `sts`) VALUES
(2, 'Agroland', 'Quraşdırılıb', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Vəliyev Elvin', 'Vəliyev Elvin', 'Xüsusi', 1, 0),
(3, 'Agroland', 'Quraşdırılıb', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Mehriban', 'Mehriban', 'Xüsusi', 1, 0),
(4, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Osmasnova Leyla Fərəc', 'Osmanova Leyla', 'Kadrlar üzrə mütəxəssis', 1, 0),
(5, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Əlzadə Ləman Famil', 'Ləman Əlizadə', 'Kadrlar idarəsinin rəisi', 1, 0),
(6, 'Binə Agro', NULL, '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '', 'Əşrəfov Röyal Zaməddin', 'Əşrəfov Röyal', 'Kadrlar üzrə mütəxəssis', 1, 0),
(7, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Abdullayev Elşən Beytulla', 'Maliyyə Müdürü', 'Maliyyə Direktoru', 1, 0),
(8, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Tarverdiyeva Yetər Niftulla', 'Muhasib(KASSİR)', 'Kassir', 1, 0),
(9, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Rəhimova Xatirə Ramiz', 'Rəhimova Xatirə', 'Mühasib', 1, 0),
(10, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Babayev Ülvi Məmmədəli', 'Ülvi', 'Baş Mühasib', 1, 0),
(11, 'Binə Agro', 'Sazlamalar edilir', '[\"M\\u00fc\\u0259ssis\\u0259 m\\u0259lumatlar\\u0131\",\"Debitor\",\"Kreditor\"]', '8.3.', 'Əşrəfov Röyal Zaməddin', 'Əşrəfov Röyal', 'Kadrlar üzrə mütəxəssis', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `authority_company`
--

DROP TABLE IF EXISTS `authority_company`;
CREATE TABLE IF NOT EXISTS `authority_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authority_company`
--

INSERT INTO `authority_company` (`id`, `name`) VALUES
(1, 'İMC 2'),
(2, 'BMP Mərkəz'),
(3, 'BMP Babək'),
(4, 'Medilux'),
(5, 'Agroland'),
(6, 'Binə Agro'),
(7, 'Binə Agro Treydinq'),
(8, 'RBA'),
(9, 'Crown Co-R'),
(10, 'Agroway'),
(11, 'Toxumçuluq-tingçilik'),
(12, 'Sara Group'),
(13, 'Vetart'),
(14, 'Sara Logistika'),
(15, 'Premium'),
(16, 'Elektroterm'),
(17, 'Məişət Malları'),
(18, 'Qaraj'),
(19, 'Qaraj -1'),
(20, 'Qaraj Ə.Rəcəbli'),
(21, 'Jek'),
(22, 'Yeni Yasamal qey-yaş'),
(23, 'BSM'),
(24, 'Nizami Mall'),
(25, 'Şəhər Ticarət Mərkəzi'),
(26, 'TransitStoreAz'),
(27, 'Sabina Beauty VİP'),
(28, 'Sabina Beauty Life'),
(29, 'Nanə'),
(30, 'Ədalət'),
(31, 'Yanar Dönər'),
(32, 'Azlegalsolutions'),
(33, 'Tornado'),
(34, 'GSS'),
(35, 'Etalon'),
(36, 'Azphone'),
(37, 'Konnekt'),
(38, 'Gülüstan Tekstil'),
(39, 'Hotel'),
(40, 'Heyvandarlıq'),
(41, 'Honey Bee'),
(42, 'Agro Lead'),
(43, 'Sara Lizing'),
(44, 'GFC MMC'),
(45, 'Biogold MMC'),
(46, 'Agro Bitki Klinikası'),
(47, 'Sahara Hall');

-- --------------------------------------------------------

--
-- Структура таблицы `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banks`
--

INSERT INTO `banks` (`id`, `name`) VALUES
(1, 'Azərbaycan Beynəlxalq Bankı'),
(2, 'ACCESSBANK'),
(3, 'AFB Bank'),
(4, 'Azərbaycan Sənaye Bankı'),
(5, 'Azər-Türk Bank'),
(6, 'Bank Avrasiya'),
(7, 'Bank BTB'),
(8, 'Bank of Baku'),
(9, 'Bank Respublika'),
(10, 'Premium Bank'),
(11, 'BANK VTB  (Azərbaycan)'),
(12, 'Expressbank'),
(13, 'GünayBank'),
(14, 'Kapital Bank'),
(15, ' Melli İran Bankı Bakı filialı'),
(16, 'Muğanbank'),
(17, 'Naxçıvanbank'),
(18, 'Yelo Bank'),
(19, 'Pakistan Milli Bankının Bakı filialı'),
(20, 'Paşa Bank'),
(21, 'Rabitəbank'),
(22, 'TURANBANK'),
(23, 'UNİBANK'),
(24, 'XALQ Bankı'),
(25, 'Yapı Kredi Bank Azərbaycan'),
(26, 'Ziraat Bank Azərbaycan');

-- --------------------------------------------------------

--
-- Структура таблицы `bank_branches`
--

DROP TABLE IF EXISTS `bank_branches`;
CREATE TABLE IF NOT EXISTS `bank_branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `bank_branch_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bank_branches`
--

INSERT INTO `bank_branches` (`id`, `bank_id`, `bank_branch_name`) VALUES
(18, 1, 'Gəncə şəhəri, Nizami rayonu, Heydər Əliyev prospekti, 696 '),
(19, 1, 'Bakı şəhəri, Nərimanov rayonu, Akademik Həsən Əliyev  küçəsi, 94'),
(20, 1, 'Yevlax şəhəri, Heydər Əliyev prospekti, 27'),
(21, 1, 'Lənkəran şəhəri, Ş.Axundov küçəsi, 16'),
(22, 1, 'Şamaxı şəhəri, Heydər Əliyev küçəsi, 51'),
(23, 1, 'Zaqatala şəhəri, F.Əmirov küçəsi, 14'),
(24, 1, 'Mingəçevir şəhəri, Vaqif  küçəsi,1'),
(25, 1, 'Bakı şəhəri, İnşaatçılar prospekti, 533-cü məhəllə, ev 14'),
(26, 1, 'Bakı şəhəri, Sabunçu rayonu, Bakıxanov qəsəbəsi, S.Mehmandarov küçəsi, 26'),
(27, 1, 'Goyçay şəhəri,  H.Əliyev prospekti, 38'),
(28, 1, 'İmişli şəhəri, 20 Yanvar  küçəsi, 17'),
(29, 1, 'Cəlilabad şəhəri, Azərbaycan küçəsi, 103'),
(30, 1, 'Masallı şəhəri, Heydər Əliyev prospekti, 34'),
(31, 1, 'Bakı şəhəri, Binəqədi rayonu,S.S.Axundov küçəsi, 42      '),
(32, 1, 'Qazax şəhəri, Heydər Əliyev prospekti, 75   '),
(33, 1, 'Naxçıvan şəhəri, Heydər Əliyev prospekti, 31   '),
(34, 1, 'Ağdaş şəhəri,  H.Əliyev prosp., 190'),
(35, 1, 'Şəki  şəhəri,  Heydər Əliyev küçəsi, 61A'),
(36, 1, 'Bakı şəhəri, Xətai rayonu, Babək prospekti, 1145-ci məhəllə'),
(37, 1, 'Saatlı şəhəri, Heydər Əliyev prospekti, 178 '),
(38, 1, 'Şabran şəhəri, H.Əliyev  küçəsi, 101'),
(39, 1, 'Kürdəmir şəhəri, H.Əliyev  küçəsi, 14'),
(40, 1, 'Quba şəhəri, H.Əliyev prospekti, 219A      '),
(41, 1, 'Bakı şəhəri, Nəsimi rayonu, 28 May küçəsi, 21A'),
(42, 1, 'Sumqayıt şəhəri, S.Vurğun küçəsi, 112,/14'),
(43, 1, 'Bakı şəhəri, Xətai rayonu, Nobel prospekti, 23      '),
(44, 1, 'Bakı şəhəri, İzmir küçəsi, 1033'),
(45, 1, 'Xaçmaz şəhəri, N.Nərimanov prospekti, 50A'),
(46, 1, 'Bakı şəhəri, Səbail rayonu, Neftçi Qurban Abbasov küçəsi, 29'),
(47, 1, 'Bakı şəhəri, Məhəmməd Hadi küçəsi, 2324 məhəllə'),
(48, 1, 'Şəmkir şəhəri, S.Vurğun küçəsi, 131'),
(49, 1, 'Şirvan şəhəri, M.Rəsulzadə küçəsi,11'),
(50, 1, 'Bakı şəh., Əmircan qəsəbəsi, İ.Məmmədov küç, 3'),
(51, 1, 'Bakı şəhəri, S.Rəhimov küçəsi, 138'),
(52, 1, 'Bakı şəhəri, Tağıyev küçəsi,3'),
(53, 1, 'Bakı şəhəri, Nəsimi rayonu, 210-cu məhəllə, Lev Tolstoy küçəsi, 191'),
(54, 1, 'Bakı şəhəri, Nəsimi rayonu, Məmmədcəfər Cəfərov küçəsi, 28'),
(55, 1, 'Abşeron rayonu, M,Ə,Rəsulzadı küçəsi, 3'),
(56, 1, 'Bakı şəhəri, Xəzər rayonu, Mərdəkan qəsəbəsi, Yesenin küçəsi, 8A'),
(57, 1, 'Bərdə şəhəri, Üzeyir Hacıbəyov küçəsi   '),
(58, 1, 'İsmayıllı şəhəri, M.F.Axundov küçəsi '),
(59, 1, 'Qax şəhəri, Heydər Əliyev prospekti, 52d'),
(60, 1, 'Ucar şəhəri, Oğuz küçəsi, 44  '),
(61, 1, 'Ağstafa şəhəri, Heydər Əliyev küçəsi, 47B'),
(62, 1, 'Tovuz şəhəri, Sabir küçəsi, 13'),
(63, 1, 'Goranboy şəhəri, Heydər Əliyev küçəsi, 21'),
(64, 1, 'Salyan şəhəri, Heydər Əliyev küçəsi, 105'),
(65, 1, 'Bakı şəhəri, Yasamal rayonu, A,M,Şərifzadə küçəsi, 217/73'),
(66, 1, 'Ağcabədi şəhəri, Üzeyir Hacıbəyli prospekti, 185 A'),
(67, 1, 'Ağsu şəhəri, Ü.Hacıbəyov küçəsi, 29A     '),
(68, 1, 'Qəbələ şəhəri, İ.B.Qutqaşınlı küçəsi, 58'),
(69, 1, 'Zərdab şəhəri, Azərbaycan küçəsi, 56 '),
(70, 1, 'Bakı şəhəri, Pirallahı rayonu, S. Murtuzəliyev küçəsi           '),
(71, 1, 'Oquz şəhəri, Heydər Əliyev  küçəsi'),
(72, 1, 'Tərtər şəhəri, Elman Hüseynov küçəsi, 19'),
(73, 1, 'Göygöl şəhəri, Heydər Əliyev küçəsi, 54'),
(74, 1, 'Samux rayonu, Nəbiağalı qəsəbəsi, Mehdi Hüseynzadə küçəsi'),
(75, 1, 'Gədəbəy şəhəri, Heydər Əliyev prospekti, 2a  '),
(76, 1, 'Daşkəsan şəhəri, Heydər Əliyev prospekti, 36'),
(77, 1, 'Sabirabad rayonu, Asan xidmət'),
(89, 2, 'Bakı şəhəri, Xətai rayonu, Babək prospekti, 76c'),
(90, 2, 'Sumqayıt şəhəri,  9-cu mkr., Ş.Bədəlbəyli küçəsi, 50A'),
(91, 2, 'Bakı şəhəri, Qaradağ ray., Lökbatan  qəs., N.Nərimanov küçəsi, 2 “C”'),
(92, 2, 'Bakı şəhəri, Nəsimi rayonu, Alı Mustafayev küçəsi, 1c '),
(93, 2, 'Gəncə şəhəri, Nizami rayonu, Abbas Abbaszadə küçəsi, 13-15-17 '),
(94, 2, 'Şəki şəhəri, Mirzə Fətəli Axundov küçəsi,8'),
(95, 2, 'Lənkəran şəhəri, H.Aslanov xiyabanı'),
(96, 2, 'Bakı şəhəri, Nəsimi rayonu, 990-cu məhəllə, Azadlıq prospekti, 97'),
(97, 2, 'Bakı şəhəri, Səbail rayon, Rəsul Rza küçəsi, ev 15, mənzil 1 və ¾'),
(98, 2, 'Xaçmaz şəhəri, Nəriman Nərimanov küçəsi, 215'),
(99, 2, 'Bakı şəhəri, Nəsimi rayonu, Nizami küçəsi, 100B'),
(100, 2, 'Bakı şəhəri, Sabunçu rayonu, Bakıxanov qəsəbəsi, M.Fətəliyev küç. 70'),
(101, 2, 'Qazax şəhəri, Heydər Əliyev prospekti'),
(102, 2, 'Mingəçevir şəhəri, Ü.Hacıbəyov küçəsi, 98A'),
(103, 2, 'Xırdalan şəhəri, Qalubiyyə küçəsi, 13A'),
(104, 2, 'Bakı şəhəri, Əzizbəyov rayonu, Yesenin küçəsi, 2 “a”'),
(105, 2, 'Zaqatala şəhəri, F.Əmirov küçəsi, bina 21/9'),
(106, 2, 'Cəlilabad şəhəri, Heydər Əliyev prospektindəki qeyri-yaşayış binası'),
(107, 2, 'Salyan şəhəri, Y.Qasımov küçəsi, 2'),
(108, 2, 'Bakı şəhəri, Nərimanov rayonu, Təbriz küçəsi, 94'),
(109, 2, 'Göyçay şəhəri, Heydər Əliyev prospekti, 96 '),
(110, 2, 'Bərdə şəhəri, İsmət Qayıbov küçəsi, 8 a'),
(111, 2, 'Bakı şəhəri, Binəqədi rayonu, Şövkət Məmmədova  küçəsi, 91 '),
(112, 2, 'Bakı şəhəri, Səbail rayonu Badamdar qəsəbəsi, 1-ci yaşayış massivi , ev 220'),
(113, 2, 'İsmayıllı şəhəri, H.Əliyev prospekti, 100 '),
(114, 2, 'Sabirabad şəhəri, Heydər Əliyev prospekti, 35'),
(115, 2, 'Bakı şəhəri, Xətai rayonu, Məhəmməd Hadi küçəsi, 2945-ci məhəllə'),
(116, 2, 'Şəmkir şəhəri, Həzi Aslanov küçəsi, N 24'),
(117, 3, 'Bakı şəhəri, Yasamal rayonu, İnşaatçılar prospekti 42'),
(118, 3, 'Bakı şəh., Əzizbəyov rayonu, Mərdəkan qəsəbəsi, S. Yesenin küçəsi yerləşən Nizami adına park'),
(119, 3, 'Qəbələ şəhəri, İ.Qutqaşınlı küçəsi, 137'),
(120, 3, 'Bakı şəhəri, Nəsimi rayonu, Nizamii küçəsi, 111   '),
(121, 3, 'Gəncə şəhəri, Atatürk prospekti, 242'),
(122, 3, 'Sumqayıt şəhəri, 5-ci mikrorayon, N.Nərimanov  küçəsi, 53A '),
(123, 3, 'Bakı şəhəri, Nərimanov rayonu, 866-cı məhəllə, Həsənoğlu küçəsi, 13F'),
(124, 3, 'Bakı şəhəri, Nəsimi ray.,  M.Qaşqay küç., 36 '),
(125, 3, 'Bakı şəhəri, Yasamal rayonu, İsmayılbəy Qutqaşınlı küçəsi, 112 '),
(126, 3, 'Bakı şəhəri, Nəsimi rayonu. Hüseyn Seyizadə küçəsi, 35'),
(127, 4, 'İmişli rayonu, Sabir Fətəliyev küçəsi,45'),
(128, 4, 'Bakı şəhəri, Nərimanov ray, Ziya Bünyadov  prospekti, 350A'),
(129, 4, 'Gəncə şəhəri, Nizami rayonu,Atatürk prospekti, 251, b 4  '),
(130, 4, 'Bakı şəhəri, Səbail rayonu, Neftçilər prospekti, Dənizkənarı bulvar, Park Bulvar Ticarət Mərkəzi'),
(131, 4, 'Sumqayıt şəhəri,Heydər Əliyev prospekti, 301Q '),
(132, 4, 'Bakı şəhəri, Nizami rayonu, Heydər Əliyev prospekti, 2023-cü məhəllə, 92A'),
(133, 5, 'Bakı şəhəri, Səbail rayonu, Neftçilər prospekti, ev 67'),
(134, 5, 'Gəncə şəhəri, M.A.Abbaszadə küçəsi,35'),
(135, 5, 'Naxçıvan şəhəri, Istiqlal  küçəsi, bina 10 A  '),
(136, 5, 'Bakı şəhəri, Səbail rayonu, Nizami küçəsi, 96      '),
(137, 5, 'Bakı şəhəri, Yasamal rayonu, İsmayıl bəy Qutqaşınlı küçəsi, 89'),
(138, 5, 'Şirvan şəhəri, M. Rəsulzadə küçəsi,33'),
(139, 5, 'Bakı şəhəri, Nəsimi rayonu, Asif Məhərrəmov küçəsi, 99'),
(140, 5, 'Bakı şəhəri, Xətai rayonu, Fəzail Bayramov küçəsi, 6'),
(141, 5, 'Bakı şəhəri, Üzeyir Hacıbəyli küçəsi, 16'),
(142, 5, 'Bakı şəhəri, Yasamal rayonu, H.Zardabi prospekti, 3166 məhəllə'),
(143, 6, 'Sumqayıt şəhəri,1-ci məhəllə, 2 saylı ev '),
(144, 6, 'Bakı şəhəri, Səbail rayonu, Xaqani küçəsi, ev 47, mənzil 10 və 12 '),
(145, 7, 'Bakı şəhəri, Nəsimi rayonu, Bakıxanov küçəsi, Azadlıq prospekti 128P'),
(146, 7, 'Gəncə şəhəri, Nizami rayonu, M. Atatürk prospekti, 234'),
(147, 7, 'Bakı şəhəri, Nəsimi rayonu,Səməd Vurğun küçəsi, 174   '),
(148, 7, 'Bakı şəhəri, Yasamal ray, Əbdülrəhim Haqverdiyev küçəsi, 577-ci məhəllə '),
(149, 7, 'Bakı şəhəri, Nəsimi rayonu, Cavadxan küçəsi, 3005-ci məhəllə, ev 11'),
(150, 7, 'Bakı şəhəri, Yasamal ray, M.M. Əbilov küçəsi, ev 59'),
(151, 7, 'Bakı şəhəri, Məhəmməd Hadi küçəsi, 65 '),
(152, 7, 'Sumqayıt şəhəri, 3-cü məhəllə, Azadlıq küçəsi 7, 6/21'),
(153, 7, 'Bakı şəhəri, Nərimanov rayonu, Həsənoğlu küçəsi, bina 12, blok \"C\"'),
(154, 7, 'Bakı şəhəri, Nəsimi rayonu, 28 May küçəsi, 20'),
(155, 7, 'Bakı şəhəri, Nəsimi rayonu, Lev Tolstoy küçəsi, binə 191'),
(156, 8, 'Bakı şəhəri, Səbail rayonu,Mikayıl Useynov prospekti, 63, giriş 2, 1-ci mərtəbə, qapı 2'),
(157, 8, 'Bakı şəhəri, Nizami rayonu, Rüstəmov küçəsi, 25/63'),
(158, 8, 'Bakı şəhəri, Səbail rayonu, Azərbaycan prospekti, 3'),
(159, 8, 'Bakı şəhəri, Nəsimi rayonu, A.Məhərrəmov küçəsi, 3005-ci məhəllə, 26b'),
(160, 8, 'Sumqayıt şəhəri, Z.Hacıyev küçəsi, 20A'),
(161, 8, 'Şəki şəhəri, M.Rəsulzadə küçəsi, bina 149B'),
(162, 8, 'Bakı şəhəri, Sabunçu rayonu, Bakıxanov qəsəbəsi, Gənclər küçəsi, 4081-ci məhəllə'),
(163, 8, 'Bakı şəhəri, Yasamal rayonu, Nazim Hikmət küçəsi, 32c'),
(164, 8, 'Lənkəran şəhəri, H.Aslanov xiyabanı, 1'),
(165, 8, 'Bakı şəhəri, Sarayev küçəsi, məhəllə 2322'),
(166, 8, 'Xaçmaz şəhəri, Heydər Əliyev küçəsi, 30'),
(167, 8, 'Bakı şəhəri, Xəzər rayonu, Bakı-Mərdəkan yolunun cənub hissəsi '),
(168, 8, 'Abşeron rayonu, Xırdalan şəhəri, H.Əliyev prospekti, 39 '),
(169, 8, 'Bakı şəhəri, Xətai rayonu, M.Hadi küçəsi,152C '),
(170, 8, 'Şirvan şəhəri, M.Rəsulzadə küçəsi, 33'),
(171, 8, 'Bakı şəhəri, Nəsimi rayonu, Puşkin  küçəsi, 12/14 '),
(172, 8, 'Gəncə şəhəri, Kəpəz rayonu, Nəriman Nərimanov prospekti, 42C '),
(173, 8, 'Bakı şəhəri, Yasamal rayonu, Abbas Mirzə Şərifzadə küçəsi, 560B'),
(174, 8, 'Bakı şəhəri, Nərimanov rayonu, Ağa Neymatulla küçəsi, 76H'),
(186, 9, 'Yevlax şəhəri, Heydər Əliyev prospekti, 12'),
(187, 9, 'Bakı şəhəri, Yasamal rayonu,Cəfər Cabbarlı küçəsi ilə Zivərbəy Əhmədbəyov küçələri arası, 610-cu məhəllə '),
(188, 9, 'Bakı şəhəri, Neftçilər prospekti, 67'),
(189, 9, 'Gəncə şəhəri, Heydər Əliyev prospekti, 94  '),
(190, 9, 'Quba şəhəri, H.Əliyev prospekti, 56 a'),
(191, 9, 'Bakı şəhəri, 717-ci məhəllə, 28 May küçəsi, 21A    '),
(192, 9, 'Bakı şəhəri, Xətai rayonu, məhəllə 2324, Məhəmməd Hadi küçəsi ev 39'),
(193, 9, 'Bakı ş., Azadlıq prospekti, ev 149'),
(194, 9, 'Lənkəran şəhəri, A.Axundov küçəsi, 19'),
(195, 9, 'Sumqayıt şəhəri, 45-ci məhəllə, N.Nərimanov küçəsi, 1'),
(196, 9, 'Şirvan şəhəri, 20 Yanvar küçəsi, 26 “A”'),
(197, 9, 'Bakı şəhəri, Bakıxanov qəsəbəsi, Gənclik küçəsi, 126'),
(198, 9, 'Bərdə şəhəri, Nizami küçəsi, 102a'),
(199, 9, 'Bakı şəhəri, Qara Qarayev prospekti, 61 “c”'),
(200, 9, 'Mingəçevir şəhəri, H.Əliyev prospekti, 58 A'),
(201, 9, 'Masallı şəhəri, M.Talışxanov küçəsi, 111'),
(202, 9, 'Cəlilabad şəhəri, Heydər Əliyev prospekti, 161b'),
(203, 9, 'Xaçmaz şəhəri, N.Nərimanov küçəsi, 49'),
(204, 9, 'Zaqatala şəhəri, F.Əmirov küçəsi, 4 '),
(205, 9, 'Qax şəhəri, İmam Mustafayev küçəsi, 3 '),
(206, 9, 'Sabirabad şəhəri, H.Əliyev küçəsi, 58 A'),
(207, 9, 'Tovuz şəhəri, Sabir küçəsi, 9 '),
(208, 9, 'Bakı şəhəri, Yasamal rayonu, A.M.Şərifzadə küçəsi, 75A'),
(209, 9, 'Bakı şəhəri, Nəsimi rayonu, Hüseynbala Əliyev küçəsi, 24'),
(210, 9, 'Abşeron rayonu, Xırdalan şəhəri, Mehdi Hüseynzadə küçəsi, ev 1'),
(211, 9, 'Şəki şəhəri, Məmməd Əmin Rasulzadə prospekti'),
(212, 9, 'Naxçıvan şəhəri, Heydər Əliyev prospekri, ev 37-3'),
(213, 10, 'Bakı şəhəri, Səbail rayonu, Nizami küçəsi, 86'),
(214, 10, 'Gəncə şəhəri, Şəmkir şossesi, Gəncə Beynəlxalq Hava Limanı'),
(215, 10, 'Bakı şəhəri, akademik Həsən Əliyev  küçəsi 4, mənzil 186'),
(216, 10, 'Bakı şəhəri, H.Əliyev Beynəlxalq Hava limanı, T2 Şimal terminalında'),
(217, 10, 'Lənkəran şəhəri Füzuli küçəsi, Lənkəran Beynəlxalq Hava Limanı'),
(218, 11, 'Bakı şəhəri, Nəsimi rayonu, Cavadxan küçəsi 30a '),
(219, 11, 'Bakı şəhəri, Nərimanov rayonu, Mustafa Kamal Atatürk prospekti, 2'),
(220, 11, 'Bakı şəhəri, Yasamal rayonu, Hüseyn Cavid prospekti, 32'),
(221, 11, 'Bakı şəhəri, Nizami rayonu, Qara Qarayev prospekti, 53'),
(222, 12, 'Bakı şəhəri, Xətai rayonu, M. Hadi küçəsi, 31 s'),
(223, 12, 'Bakı şəhəri, Qaradağ rayonu, Lökbatan qəsəbəsinin cənub-şərqi, Bakı-Salyan-Lökbatan dairəvi  yol qərbindəki “Binə ticarət Mərkəzi”'),
(224, 12, 'Sumqayıt şəhəri,30-cu məhəllə, Sülh küçəsi ilə Nərimanov küçələrinin kəsişməsində, 6/10 və 7/27 nömrəli binaların 1-ci mərtəbə'),
(225, 12, 'Gəncə şəhəri, Atatürk prospekti, 2-ci dalan, 1 və H.Cavid küçəsi, 2'),
(226, 12, 'Mingəçevir şəhəri, H.Əliyev prospekti,  47/2'),
(227, 12, 'Şirvan şəhəri, Heydər Əliyev prospekti'),
(228, 12, 'Xaçmaz şəhəri, Heydər Əliyev küçəsi'),
(229, 12, 'Qusar şəhəri, Xamətov küçəsi'),
(230, 12, 'Bakı şəhəri, Yasamal rayonu, Həsən bəy Zərdabi prospekti, 3166-cı məhəllə    '),
(231, 12, 'Bakı şəhəri, Vidadi küçəsi, ev 189, mənzil 27 (Bülbül prospekti, 29)'),
(232, 12, 'Bakı şəhəri, Nizami rayonu, R.Rüstəmov küçəsi, 34B'),
(233, 12, 'Bakı şəhəri, Xətai rayonu, Xocalı prospekti, 55'),
(234, 12, 'Bakı şəhəri , Yasamal rayonu, F.Ağayev küçəsi, 5 '),
(235, 12, 'Bərdə şəhəri, Heydər Əliyev prospekti, 88A'),
(246, 13, 'Bakı şəhəri, Nəsimi rayonu, Mirzəağa Əliyev küçəsi, ev 210'),
(247, 13, 'Bakı şəhəri, Nərimanov rayonu, Yusif Vəzir Çəmənzəminli küçəsi, 14 '),
(248, 13, 'Bakı şəhəri, Xətai rayonu, 1212-ci məhəllə, Nobel prospekti, 15'),
(249, 13, 'Bakı şəhəri, Yasamal rayonu, 518-ci məhəllə, Hüseyn Cavid prospekti, bina 17  mənzil 1 və 15 nömrəli bina mənzil 21, 22 '),
(250, 13, 'Bakı şəhəri, Səbail rayonu, Üseyir Hacıbəyov küçəsi, 34/36'),
(251, 13, ' Bakı şəhəri, Yasamal rayonu, Murtuza Muxtarov küçəsi, 179'),
(252, 13, 'Abşeron rayonu, Xırdalan şəhəri, Heydər Əliyev prospekti, 39B'),
(253, 13, 'Sumqayıt şəhəri, 17-ci məhəllə, 11/38, 5'),
(254, 13, 'Bakı şəhəri, Nizami rayonu, Q.Qarayev prospekti, 18'),
(255, 13, 'Bakı şəhəri, Qaradağ rayonu, Lökbatan qəsəbəsinin cənub-şərqi, Bakı-Salyan-Lökbatan dairəvi yolayrıcının qərbi, \"Binə\" Ticarət mərkəzinin 3-cü sırasının qarşəsəndakı 122 saylı ticarət obyektində'),
(256, 14, 'Bakı şəhəri, Nəsimi rayonu, Bülbül prospekti, 60'),
(257, 14, 'Bakı şəhəri, Yasamal rayonu, Landau küçəsi, bina 6'),
(258, 14, 'Bakı şəhəri, Yasamal rayonu,  C.Cabbarlı küçəsi, 5A'),
(259, 14, 'Bakı şəhəri, Zərifə Əliyeva küçəsi, 63'),
(260, 14, 'Bakı şəhəri, Səbail rayonu, B.Sərdarov küçəsi, 14'),
(261, 14, 'Bakı şəhəri,  Xətai rayonu, S. Orucov küçəsi, 12'),
(262, 14, 'Bakı şəhəri, X.Məmmədov küç, 13 '),
(263, 14, 'Bakı şəhəri, Nərimanov rayonu, Əhməd Rəcəbli küçəzi, 9'),
(264, 14, 'Bakı şəhəri, Xətai rayonu, Sarayevo küçəsi, 7Q'),
(265, 14, 'Bakı şəhəri, İ.Qasımov küçəsi, 4'),
(266, 14, 'Bakı şəhəri, Nəsimi rayonu, Füzuli küçəsi, 71'),
(267, 14, 'Bakı şəhəri, B.Nuriyev küç., 10 a'),
(268, 14, 'Bakı şəhəri, Qara Qarayev prospekti, 29'),
(269, 14, 'Bakı şəhəri, Nəsimi rayonu, Asif Məhərrəmov küçəsi, 174'),
(270, 14, 'Bakı şəhəri,  Binəqədi rayonu, 8-ci mikrorayon, İbrahimpaşa Dadaşov  küç., 3158/3156  '),
(271, 14, 'Bakı şəhəri, Xəzər rayonu, Şüvəlan qəsəbəsi, A.İldırım küçəsi, 16'),
(272, 14, 'Bakı şəhəri, Həsən Əliyev küçəsi, 889-cu məhəllə, 82'),
(273, 14, 'Bakı şəhəri, Əmircan qəsəbəsi, Vladimir Balandin küçəsi, 44'),
(274, 14, 'Bakı şəhəri, Bakıxanov qəs., Ə.Ağayev küç.,41'),
(275, 14, 'Bakı şəhəri, Sabunçu rayonu, Bakıxanov qəsəbəsi, Sakit Qocayev küçəsi, 13A, 13B, 13C '),
(276, 14, 'Bakı şəhəri, Lökbatan qəs., 28 may küç.'),
(277, 14, 'Naxçıvan Muxtar Respublikası, Naxçivan şəhəri, İstiqlal küçəsi, 85'),
(278, 14, 'Naxçıvan Muxtar Respublikası, Ordubad şəhəri, Mənsur Ağa küçəsi, 6'),
(279, 14, 'Naxçıvan Muxtar Respublikası, Culfa şəhəri, Heydər Əliyev prospekti, 43'),
(280, 14, 'Naxçıvan Muxtar Respublikası, Şərur şəhər, Heydər Əliyev prospekti, 44/A'),
(281, 14, 'Naxçıvan Muxtar Respublikası, Şahbuz şəhəri, Heydər Əliyev prospekti, 15'),
(282, 14, 'Naxçıvan Muxtar Respublikası, Sədərək rayonu, Heydərabad qəsəbəsi'),
(283, 14, 'Naxçıvan Muxtar Respublikası, Babək rayonu, Babək qəsəbəsi, Heydər Əliyev prospekti, 26'),
(284, 14, 'Abşeron rayonu, Xırdalan şəhəri,  Qəzənfər Musabəyov küçəsi, bina 22  '),
(285, 14, 'Xızı şəhəri, Heydər Əliyev prospekti, 245'),
(286, 14, 'Sumqayıt şəhəri, C.Cabbarlı küç.,1'),
(287, 14, 'Sumqayıt şəhəri, 17-ci məhəllə, Heydər Əliyev prospekti, b, 11/38, sahə 7'),
(288, 14, 'Gəncə şəhəri, Cavadxan küçəsi, 24'),
(289, 14, 'Gəncə şəhəri, Kəpəz rayonu, Nəriman  Nərimanov  prospekti, 24 B'),
(290, 14, 'Mingəcevir şəhəri, M.Ə.Rəsulzadə küçəsi, ev 1A'),
(291, 14, 'Qazax şəhəri, Heydər Əliyev küçəsi, 65A '),
(292, 14, 'Bərdə şəhəri, M.Rəsulzadə küç., 11'),
(293, 14, 'Lənkəran şəhəri, M. Nəsirli küçəsi, 3'),
(294, 14, 'Zaqatala şəhəri, Heydər Əliyev prospekti, 169'),
(295, 14, 'Beyləqan şəhəri, Q.Əsədov küç, 46'),
(296, 14, 'Şirvan şəhəri, M.Rəsulzadə 1 '),
(297, 14, 'Salyan şəhəri, Heydər Əliyev küçəsi, 90'),
(298, 14, 'Sabirabad şəhəri, Heydər Əliyev prospekti, 33'),
(299, 14, 'Tərtər şəhəri, E. Hüseynov küçəsi, 9'),
(300, 14, 'Zərdab şəhəri, Heydər Əliyev prospekti, 17'),
(301, 14, 'Şəmkir şəhəri, 20 Yanvar küçəsi, 2'),
(302, 14, 'Qusar şəhəri, Heydər Əliyev prospekti, 127'),
(303, 14, 'Qəbələ şəhəri, İ.Qutqaşenli küç., 50'),
(304, 14, 'Goranboy şəhəri, Heydər Əliyev prospekti, 9'),
(305, 14, 'Biləsuvar şəhəri, Heydər Əliyev prospekti, 42'),
(306, 15, 'Bakı şəhəri');

-- --------------------------------------------------------

--
-- Структура таблицы `company_name`
--

DROP TABLE IF EXISTS `company_name`;
CREATE TABLE IF NOT EXISTS `company_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company_name`
--

INSERT INTO `company_name` (`id`, `name`) VALUES
(1, 'Caspian Busines Hotel MMC'),
(2, 'Yanar Dönər Filial № 1'),
(3, 'Yanar Dönər Filial № 2'),
(4, 'Sahara Event Hall'),
(5, 'Ədalət Restoranı'),
(6, 'Elektroterm MMC'),
(7, 'Bakı Satış Mərkəzi MMC'),
(8, 'Nizami Mall MMC'),
(9, 'City Centre MMC'),
(10, 'Tranzit Store MMC'),
(11, 'Agro Land Az QSC'),
(12, 'Bine Agro QSC'),
(13, 'Sara Qrup QSC'),
(14, 'Vetart MMC'),
(15, 'Premium Service MMC'),
(16, 'Binə Agro Trade MMC'),
(17, 'Kraun Ko R MMC'),
(18, 'Honey Bee MMC'),
(19, 'Qoyunçuluq MMC'),
(20, 'Connect QSC'),
(21, 'Baku Medical Plaza MMC (Mərkəz filialı) '),
(22, 'Baku Medical Plaza  MMC (Babək filialı)'),
(23, 'Baku Medical Plaza  MMC (Mediluxa filialı)'),
(24, 'İnetarnational Medical Centre - 2 MMC'),
(25, 'Sara Logistika MMC'),
(26, 'Azərbaycam Məişət Malları QSC'),
(27, 'Tornado-Ş MMC'),
(28, 'Azphone MMC'),
(29, 'Mənzil İS MMC'),
(30, 'Sabina Beauty gözəllik salonu Filial №1'),
(31, 'Sabina Beauty gözəllik salonu Filial №2'),
(32, 'Global Security Services MMC'),
(33, 'Qarabağ Restoran (Cəbrayıl)'),
(34, 'Agro Lead MMC'),
(35, 'Agro Way MMC'),
(36, 'Kapital Group MMC'),
(37, 'İnşaat Servis 2002 MTK'),
(38, 'Azlegals MMC'),
(39, 'Etalon MMC'),
(40, 'Şəhər Ticarət Mərkəzi MMC'),
(41, 'Toxumçuluq - tingçilik MMC'),
(44, 'Binə Aqro Trade Moskva '),
(45, 'Bio Gold Tarım MMC');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`) VALUES
(1, 'AZN ₼'),
(2, 'Rubl ₽'),
(3, 'USD $'),
(4, 'Pound sterling £'),
(5, 'Euro €'),
(6, 'TRY ₺'),
(7, 'YEN ¥'),
(8, 'CHF CHF'),
(9, 'Lari ₾'),
(10, 'IRR ﷼'),
(11, 'TMT T'),
(12, 'KZT лв');

-- --------------------------------------------------------

--
-- Структура таблицы `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `document_type` varchar(255) NOT NULL,
  `document_important` varchar(255) NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `see_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmation_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `confirmation_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_confirmation_name` varchar(255) DEFAULT NULL,
  `last_confirmation_status` int(1) NOT NULL DEFAULT '0',
  `confirmation_cancel_note` varchar(255) DEFAULT NULL,
  `notes` text,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document`
--

INSERT INTO `document` (`id`, `document_name`, `user_id`, `document_type`, `document_important`, `document_file`, `company_name`, `author_id`, `see_status`, `created_time`, `confirmation_id`, `confirmation_time`, `last_confirmation_name`, `last_confirmation_status`, `confirmation_cancel_note`, `notes`, `status`) VALUES
(63, 'Tranzit Store Az MMC 27.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_28_05_00_19_34.xlsx', 'Tranzit Store MMC', 66, '[[\"66\"],[\"28.05.2022\"]]', '2022-05-27 20:19:34', '[[],[],[],[]]', NULL, NULL, 0, NULL, NULL, 0),
(64, 'Azlegal Solutions MMC 27.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_28_05_00_20_11.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"28.05.2022\"]]', '2022-05-27 20:20:11', '[[],[],[],[]]', NULL, NULL, 0, NULL, NULL, 0),
(65, 'Etalon Security MMC 27.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_28_05_00_20_43.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"28.05.2022\"]]', '2022-05-27 20:20:43', '[[],[],[],[]]', NULL, NULL, 0, NULL, NULL, 0),
(66, 'Azlegal Solutions MMC-28.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_30_05_09_08_06.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"30.05.2022\"]]', '2022-05-30 05:08:06', '[[],[],[],[]]', NULL, NULL, 0, NULL, NULL, 0),
(67, 'Tranzit Store Az MMC-28.05.2022', 'Zakir Şükürov', 'Hesabat', 'Əhəmiyyətli', 'documents/2022_30_05_09_08_40.xlsx', 'Tranzit Store MMC', 66, '[[\"38\", \"66\"], [\"30.05.2022\", \"30.05.2022\"]]', '2022-05-30 05:08:40', '[[\"38\"], [\"30.05.2022\"], [\"0\"], [\"hesabat dəgigləşsin\"]]', '2022-05-30 14:13:36', NULL, 2, 'hesabat dəgigləşsin', NULL, 0),
(68, 'Etalon Security MMC-28.05.2022', 'Zakir Şükürov', 'Hesabat', 'Əhəmiyyətli', 'documents/2022_30_05_09_09_11.xlsx', 'Etalon MMC', 66, '[[\"38\", \"66\"], [\"30.05.2022\", \"30.05.2022\"]]', '2022-05-30 05:09:11', '[[\"38\"], [\"30.05.2022\"], [\"1\"], [\"\"]]', '2022-05-30 14:08:21', NULL, 2, '', NULL, 0),
(71, 'Tranzit Store Az MMC-30.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_31_05_00_00_11.xlsx', 'Tranzit Store MMC', 66, '[[\"66\"],[\"31.05.2022\"]]', '2022-05-30 20:00:11', '[[\"66\"],[\"31.05.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(72, 'Azlegal Solutions MMC-30.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_31_05_00_00_39.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"31.05.2022\"]]', '2022-05-30 20:00:39', '[[\"66\"],[\"31.05.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(73, 'Etalon Security MMC-30.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_31_05_00_01_07.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"31.05.2022\"]]', '2022-05-30 20:01:07', '[[\"66\"],[\"31.05.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(74, 'Tranzit Store Az MMC-günlük ödəmə planı 31.05.2022', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_31_05_00_01_48.xlsx', 'Tranzit Store MMC', 66, '[[\"66\"],[\"31.05.2022\"]]', '2022-05-30 20:01:48', '[[\"66\"],[\"31.05.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(76, 'Azlegal Solutions MMC-31.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_01_06_01_13_12.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"01.06.2022\"]]', '2022-05-31 21:13:12', '[[\"66\"],[\"01.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(77, 'Tranzit Store Az MMC-31.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_01_06_01_13_42.xlsx', 'Tranzit Store MMC', 66, '[[\"66\"],[\"01.06.2022\"]]', '2022-05-31 21:13:42', '[[\"66\"],[\"01.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(78, 'Etalon Security MMC-31.05.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_01_06_01_14_10.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"01.06.2022\"]]', '2022-05-31 21:14:10', '[[\"66\"],[\"01.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(105, 'Azlegal Solutions MMC-06.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_07_06_00_15_59.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"07.06.2022\"]]', '2022-06-06 20:15:59', '[[\"66\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(104, 'Banka ödəniş', 'Ərşad Şərifov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_04_06_11_47_06.xlsx', 'Elektroterm MMC', 43, '[[\"36\", \"38\", \"43\"], [\"04.06.2022\", \"04.06.2022\", \"04.06.2022\"]]', '2022-06-04 07:47:06', '[[\"36\", \"38\", \"43\"], [\"04.06.2022\", \"04.06.2022\", \"04.06.2022\"], [\"1\", \"1\", \"1\"], [\"Vəliyev Nahid-ə aid elektron qaiməni təqdim edəsiniz, Zaman express MMC -dən nə üçün istifadə olunur?\", \"\"]]', '2022-06-04 08:16:33', NULL, 2, 'Vəliyev Nahid-ə aid elektron qaiməni təqdim edəsiniz, Zaman express MMC -dən nə üçün istifadə olunur?', NULL, 0),
(103, 'NƏQDİ -KASSA ', 'Zakir Şükürov', 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_04_06_10_58_07.xlsx', 'Honey Bee MMC', 52, '[[\"38\", \"36\", \"52\"], [\"04.06.2022\", \"04.06.2022\", \"04.06.2022\"]]', '2022-06-04 06:58:07', '[[\"38\", \"36\", \"52\"], [\"04.06.2022\", \"04.06.2022\", \"04.06.2022\"], [\"1\", \"1\", \"1\"], [\"\", \"10000 AZN nağd kassadan verilsin, digəri Banka qoyulacaq 10000\"]]', '2022-06-04 07:30:58', NULL, 2, '', NULL, 0),
(102, 'Tranzit Store Az MMC-03.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_04_06_00_26_47.xlsx', 'Tranzit Store MMC', 66, '[[\"38\", \"66\"], [\"15.06.2022\", \"04.06.2022\"]]', '2022-06-03 20:26:47', '[[\"66\"],[\"04.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(101, 'Etalon Security MMC-03.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_04_06_00_26_22.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"04.06.2022\"]]', '2022-06-03 20:26:22', '[[\"66\"],[\"04.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(100, 'Azlegal Solutions MMC-03.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_04_06_00_25_55.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"04.06.2022\"]]', '2022-06-03 20:25:55', '[[\"66\"],[\"04.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(89, 'Azlegal Solutions MMC-02.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_03_06_00_19_35.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"03.06.2022\"]]', '2022-06-02 20:19:35', '[[\"66\"],[\"03.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(90, 'Etalon Security MMC-02.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_03_06_00_20_02.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"03.06.2022\"]]', '2022-06-02 20:20:02', '[[\"66\"],[\"03.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(91, 'Tranzit Store Az MMC-02.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_03_06_00_20_30.xlsx', 'Tranzit Store MMC', 66, '[[\"66\"],[\"03.06.2022\"]]', '2022-06-02 20:20:30', '[[\"66\"],[\"03.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(106, 'Etalon Security MMC-06.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_07_06_00_16_28.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"07.06.2022\"]]', '2022-06-06 20:16:28', '[[\"66\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(107, 'Tranzit Store Az MMC-06.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_07_06_00_16_54.xlsx', 'Tranzit Store MMC', 66, '[[\"38\", \"66\"], [\"15.06.2022\", \"07.06.2022\"]]', '2022-06-06 20:16:54', '[[\"66\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(108, 'Günlük ödəmə planı Tranzit Store Az MMC', 'Zakir Şükürov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_07_06_00_17_20.xlsx', 'Tranzit Store MMC', 66, '[[\"38\", \"36\", \"66\"], [\"07.06.2022\", \"07.06.2022\", \"07.06.2022\"]]', '2022-06-06 20:17:20', '[[\"38\", \"66\"], [\"07.06.2022\", \"07.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-07 07:15:47', NULL, 2, '', NULL, 0),
(109, 'MƏXARİC ', 'Zakir Şükürov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_07_06_09_27_33.xlsx', 'Binə Agro Trade MMC', 40, '[[\"38\", \"36\", \"40\"], [\"07.06.2022\", \"07.06.2022\", \"07.06.2022\"]]', '2022-06-07 05:27:33', '[[\"38\", \"40\"], [\"07.06.2022\", \"07.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-07 07:13:07', NULL, 2, '', NULL, 0),
(110, 'HÖP VASİTƏSİLƏ KÖÇÜRMƏ', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_07_06_10_09_29.xlsx', 'Toxumçuluq - tingçilik MMC', 52, '[[\"52\"],[\"07.06.2022\"]]', '2022-06-07 06:09:29', '[[\"52\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(111, 'məxaric', NULL, 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_07_06_11_13_34.xlsx', 'Binə Agro Trade MMC', 40, '[[\"36\", \"40\"], [\"07.06.2022\", \"07.06.2022\"]]', '2022-06-07 07:13:34', '[[\"40\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(112, 'BORC MÜQAVİLƏSİ', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_07_06_11_51_26.xlsx', 'Toxumçuluq - tingçilik MMC', 52, '[[\"52\"],[\"07.06.2022\"]]', '2022-06-07 07:51:26', '[[\"52\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(113, 'hesabat 05', NULL, 'Hesabat', 'Çox əhəmiyyətli', 'documents/2022_07_06_12_18_45.xlsx', 'Mənzil İS MMC', 65, '[[\"36\", \"65\"], [\"07.06.2022\", \"07.06.2022\"]]', '2022-06-07 08:18:45', '[[\"65\"],[\"07.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(114, 'ezamiyyə xərci', 'Ərşad Şərifov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_07_06_15_06_17.xlsx', 'Binə Agro Trade MMC', 40, '[[\"36\", \"40\"], [\"07.06.2022\", \"07.06.2022\"]]', '2022-06-07 11:06:17', '[[\"36\", \"40\"], [\"07.06.2022\", \"07.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-07 14:02:02', NULL, 2, '', NULL, 0),
(115, 'məxaric', 'Ərşad Şərifov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_07_06_16_07_55.xlsx', 'Binə Agro Trade MMC', 40, '[[\"36\", \"40\"], [\"07.06.2022\", \"07.06.2022\"]]', '2022-06-07 12:07:55', '[[\"36\", \"40\"], [\"07.06.2022\", \"07.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-07 14:01:32', NULL, 2, '', NULL, 0),
(116, 'KASSA MƏXARİC ', 'Zakir Şükürov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_08_06_09_59_25.xlsx', 'Binə Agro Trade MMC', 40, '[[\"38\", \"40\"], [\"11.06.2022\", \"08.06.2022\"]]', '2022-06-08 05:59:25', '[[\"38\", \"40\"], [\"11.06.2022\", \"08.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-11 09:37:03', NULL, 2, '', NULL, 0),
(117, 'Əmək haqqı son haqq hesab ', 'Zakir Şükürov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_08_06_10_12_33.xlsx', 'Binə Agro Trade MMC', 40, '[[\"38\", \"40\"], [\"11.06.2022\", \"08.06.2022\"]]', '2022-06-08 06:12:33', '[[\"38\", \"40\"], [\"11.06.2022\", \"08.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-11 09:35:39', NULL, 2, '', NULL, 0),
(118, 'yanacaq pulu', 'Zakir Şükürov', 'Ödəniş', 'Əhəmiyyətli', 'documents/2022_08_06_10_23_19.xlsx', 'Binə Agro Trade MMC', 40, '[[\"38\", \"40\"], [\"11.06.2022\", \"08.06.2022\"]]', '2022-06-08 06:23:19', '[[\"38\", \"40\"], [\"11.06.2022\", \"08.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-11 09:34:40', NULL, 2, '', NULL, 0),
(119, 'Ödəniş tapşırığı', 'Zakir Şükürov', 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_08_06_14_00_33.xlsx', 'Elektroterm MMC', 43, '[[\"38\", \"43\"], [\"11.06.2022\", \"08.06.2022\"]]', '2022-06-08 10:00:33', '[[\"38\", \"43\"], [\"11.06.2022\", \"08.06.2022\"], [\"1\", \"1\"], [\"\"]]', '2022-06-11 09:34:02', NULL, 2, '', NULL, 0),
(120, 'ezamiyye düzeliş', 'Ərşad Şərifov', 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_08_06_15_19_21.xlsx', 'Binə Agro Trade MMC', 40, '[[\"36\", \"38\", \"40\"], [\"13.06.2022\", \"11.06.2022\", \"08.06.2022\"]]', '2022-06-08 11:19:21', '[[\"36\", \"38\", \"40\"], [\"13.06.2022\", \"11.06.2022\", \"08.06.2022\"], [\"1\", \"1\", \"1\"], [\"\", \"\"]]', '2022-06-13 08:23:54', NULL, 2, '', NULL, 0),
(121, 'KÖÇÜRMƏ', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_16_06_14_53_47.xlsx', 'Toxumçuluq - tingçilik MMC', 52, '[[\"52\"],[\"16.06.2022\"]]', '2022-06-16 10:53:47', '[[\"52\"],[\"16.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(122, 'LOGİSTİKA ŞİRKƏTLƏRİNE BORC', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_17_06_11_02_16.xlsx', 'Binə Agro Trade MMC', 40, '[[\"40\"],[\"17.06.2022\"]]', '2022-06-17 07:02:16', '[[\"40\"],[\"17.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(123, 'ödəniş ', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_18_06_10_53_17.xlsx', 'Binə Agro Trade MMC', 40, '[[\"40\"],[\"18.06.2022\"]]', '2022-06-18 06:53:17', '[[\"40\"],[\"18.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(124, 'KİSƏ ÖDƏNİŞİ', NULL, 'Ödəniş', 'Çox əhəmiyyətli', 'documents/2022_20_06_10_03_17.xlsx', 'Toxumçuluq - tingçilik MMC', 52, '[[\"52\"],[\"20.06.2022\"]]', '2022-06-20 06:03:17', '[[\"52\"],[\"20.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(154, 'Odenish', NULL, 'Digər', 'Əhəmiyyətli', 'documents/2022_24_06_17_09_29.xlsx', 'Bio Gold Tarım MMC', 71, '[[\"71\"],[\"24.06.2022\"]]', '2022-06-24 13:09:29', '[[\"71\"],[\"24.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(156, 'Yanacaq xərci', NULL, 'Maliyyə sənədi', 'Əhəmiyyətli', 'documents/2022_25_06_13_24_54.xlsx', 'Binə Agro Trade MMC', 40, '[[\"40\"],[\"25.06.2022\"]]', '2022-06-25 09:24:54', '[[\"40\"],[\"25.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(161, 'Azlegal Solutions MMC-27.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_28_06_09_19_36.xlsx', 'Azlegals MMC', 66, '[[\"66\"],[\"28.06.2022\"]]', '2022-06-28 05:19:36', '[[\"66\"],[\"28.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(162, 'Etalon Security MMC-27.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_28_06_09_20_15.xlsx', 'Etalon MMC', 66, '[[\"66\"],[\"28.06.2022\"]]', '2022-06-28 05:20:15', '[[\"66\"],[\"28.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(163, 'Tranzit Store Az MMC-27.06.2022', NULL, 'Hesabat', 'Əhəmiyyətli', 'documents/2022_28_06_09_20_52.xlsx', 'Tranzit Store MMC', 66, '[[\"66\"],[\"28.06.2022\"]]', '2022-06-28 05:20:52', '[[\"66\"],[\"28.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0),
(164, 'MOSKVA -BAKİ bilet pulu ', NULL, 'Maliyyə sənədi', 'Çox əhəmiyyətli', 'documents/2022_28_06_12_06_12.xlsx', 'Binə Agro Trade MMC', 40, '[[\"40\"],[\"28.06.2022\"]]', '2022-06-28 08:06:12', '[[\"40\"],[\"28.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `document_type_data`
--

DROP TABLE IF EXISTS `document_type_data`;
CREATE TABLE IF NOT EXISTS `document_type_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_type_data`
--

INSERT INTO `document_type_data` (`id`, `name`) VALUES
(1, 'Maliyyə sənədi'),
(2, 'Hesabat'),
(3, 'Digər');

-- --------------------------------------------------------

--
-- Структура таблицы `extra_documents`
--

DROP TABLE IF EXISTS `extra_documents`;
CREATE TABLE IF NOT EXISTS `extra_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `extra_documents`
--

INSERT INTO `extra_documents` (`id`, `c_date`, `note`, `author_id`, `doc_id`, `file_url`) VALUES
(8, '2022-06-02 11:31:24', 'ersad bey', 43, 79, 'documents/extra_documents/2022_02_06_15_31_24.xlsx'),
(9, '2022-06-02 12:13:07', 'flan yere duzeltdim', 40, 82, 'documents/extra_documents/2022_02_06_16_13_07.xlsx'),
(10, '2022-06-02 12:27:42', 'flan deyishiik eledim', 39, 82, 'documents/extra_documents/2022_02_06_16_27_42.xlsx'),
(11, '2022-06-02 12:41:24', 'flan deyishiklik', 51, 84, 'documents/extra_documents/2022_02_06_16_41_24.xlsx'),
(12, '2022-06-02 13:21:47', 'duzelish edilen', 55, 85, 'documents/extra_documents/2022_02_06_17_21_47.xlsx'),
(13, '2022-06-02 13:30:23', 'flan', 54, 86, 'documents/extra_documents/2022_02_06_17_30_23.xlsx'),
(14, '2022-06-02 13:45:57', 'нутш ыутув иг', 52, 87, 'documents/extra_documents/2022_02_06_17_45_57.xlsx'),
(15, '2022-06-03 06:44:48', '3 setrde deyishiklik eledim', 47, 92, 'documents/extra_documents/2022_03_06_10_44_48.xlsx'),
(16, '2022-06-03 07:23:27', '3 setrde duzelish etdim', 88, 93, 'documents/extra_documents/2022_03_06_11_23_27.docx'),
(17, '2022-06-03 08:05:30', 'flan yeri senedde deyishdim', 57, 94, 'documents/extra_documents/2022_03_06_12_05_30.xlsx'),
(18, '2022-06-03 08:27:55', 'flan yere deyishdim', 63, 95, 'documents/extra_documents/2022_03_06_12_27_55.xlsx'),
(19, '2022-06-03 10:42:56', 'flan yerde deyoshoklik eledim yeni sened budur', 76, 96, 'documents/extra_documents/2022_03_06_14_42_56.xlsx'),
(20, '2022-06-03 12:06:40', 'flan yerde duzelish etdim', 72, 97, 'documents/extra_documents/2022_03_06_16_06_40.xlsx'),
(21, '2022-06-03 13:01:59', 'sizin senedde flan yeri deyishdim', 41, 98, 'documents/extra_documents/2022_03_06_17_01_58.docx'),
(22, '2022-06-04 07:06:31', 'NƏQDİ VƏSAİT', 52, 103, 'documents/extra_documents/2022_04_06_11_06_31.xlsx'),
(23, '2022-06-04 07:06:33', 'NƏQDİ VƏSAİT', 52, 103, 'documents/extra_documents/2022_04_06_11_06_33.xlsx'),
(24, '2022-06-04 07:06:36', 'NƏQDİ VƏSAİT', 52, 103, 'documents/extra_documents/2022_04_06_11_06_36.xlsx'),
(25, '2022-06-04 07:06:36', 'NƏQDİ VƏSAİT', 52, 103, 'documents/extra_documents/2022_04_06_11_06_36.xlsx'),
(26, '2022-06-07 07:28:32', 'KÖÇÜRMƏ', 52, 110, 'documents/extra_documents/2022_07_06_11_28_32.xlsx'),
(27, '2022-06-07 07:51:43', '', 52, 112, 'documents/extra_documents/2022_07_06_11_51_43.xlsx'),
(28, '2022-06-07 07:52:03', '', 52, 112, 'documents/extra_documents/2022_07_06_11_52_03.xlsx'),
(29, '2022-06-16 10:54:49', '', 52, 121, 'documents/extra_documents/2022_16_06_14_54_49.xlsx'),
(30, '2022-06-20 06:04:52', 'KİSE ÖDENİŞİ', 52, 124, 'documents/extra_documents/2022_20_06_10_04_52.xlsx'),
(31, '2022-06-25 09:54:42', 'düzəliş', 40, 156, 'documents/extra_documents/2022_25_06_13_54_42.xlsx');

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cancel_notes` text NOT NULL,
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `payment_document`
--

DROP TABLE IF EXISTS `payment_document`;
CREATE TABLE IF NOT EXISTS `payment_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `unit_measure` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_branch` varchar(250) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `note` text,
  `author_id` int(11) DEFAULT NULL,
  `see_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmation_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `confirmation_time` timestamp NULL DEFAULT NULL,
  `last_confirmation_name` varchar(255) DEFAULT NULL,
  `last_confirmation_status` int(1) NOT NULL DEFAULT '0',
  `confirmation_cancel_note` varchar(255) DEFAULT NULL,
  `notes` text,
  `status` int(1) DEFAULT NULL,
  `completion_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=236 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment_document`
--

INSERT INTO `payment_document` (`id`, `appointment`, `user_id`, `unit_measure`, `quantity`, `price`, `currency`, `total_amount`, `payment_type`, `bank_name`, `bank_branch`, `company_name`, `note`, `author_id`, `see_status`, `created_time`, `confirmation_id`, `confirmation_time`, `last_confirmation_name`, `last_confirmation_status`, `confirmation_cancel_note`, `notes`, `status`, `completion_date`) VALUES
(223, 'vcbvccv', NULL, 'kq', '1', '1', 'Rubl ₽', '1 Rubl ₽', 'Bank', '2', 'Sumqayıt şəhəri,  9-cu mkr., Ş.Bədəlbəyli küçəsi, 50A', 'Yanar Dönər Filial № 1', 'cxvxcv', 6, '[[\"6\"],[\"30.06.2022\"]]', '2022-06-30 19:33:27', '[[\"6\"],[\"30.06.2022\"],[\"1\"],[]]', NULL, NULL, 0, NULL, NULL, 1, NULL),
(226, 'xcxc', NULL, 'kq', '1', '3', 'Rubl ₽', '3 Rubl ₽', 'Kassa', '2', 'Sumqayıt şəhəri,  9-cu mkr., Ş.Bədəlbəyli küçəsi, 50A', '', 'xcvxvxcv', 6, '[[],[]]', '2022-06-30 19:42:34', '[[],[],[\"2\"],[]]', NULL, NULL, 0, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
CREATE TABLE IF NOT EXISTS `payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Kassa'),
(2, 'Bank'),
(3, 'ƏDV'),
(4, 'Əvəzləşmə');

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Holdingin Baş Maliyyə Auditoru'),
(2, 'Holdingin Maliyyə Direktoru'),
(3, 'Holdingin Maliyyə Direktorunun köməkçisi'),
(4, 'Holdingin Baş Kassiri'),
(5, 'Baş Mühasib'),
(6, 'Mühasib'),
(7, 'Maliyyə direktoru'),
(8, 'Direktor');

-- --------------------------------------------------------

--
-- Структура таблицы `type_authority_data`
--

DROP TABLE IF EXISTS `type_authority_data`;
CREATE TABLE IF NOT EXISTS `type_authority_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_authority_data`
--

INSERT INTO `type_authority_data` (`id`, `name`) VALUES
(1, 'Direktor'),
(2, 'Maliyyə Direktoru'),
(3, 'Baş Mühasib'),
(4, 'Mühasib'),
(5, 'Kadrlar idarəsinin rəisi'),
(6, 'Kadrlar üzrə mütəxəssis'),
(7, 'Baş Anbardar'),
(8, 'Anbardar'),
(9, 'Kassir'),
(10, 'Təchizatçı'),
(11, 'Satış üzrə direktor'),
(12, 'Satış üzrə mütəxəssis'),
(13, 'Xüsusi');

-- --------------------------------------------------------

--
-- Структура таблицы `unit_measure`
--

DROP TABLE IF EXISTS `unit_measure`;
CREATE TABLE IF NOT EXISTS `unit_measure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `unit_measure`
--

INSERT INTO `unit_measure` (`id`, `name`) VALUES
(1, 'qr'),
(2, 'kq'),
(3, 'ton'),
(4, 'mq'),
(5, 'metr'),
(6, 'sm'),
(7, 'mm'),
(8, 'ədəd'),
(9, 'dənə'),
(10, 'm²'),
(11, 'm³'),
(12, 'litr'),
(13, 'qutu'),
(14, 'bağlama'),
(15, 'doz'),
(16, 'cüt');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) DEFAULT NULL,
  `u_surname` varchar(50) DEFAULT NULL,
  `u_father_name` varchar(51) DEFAULT NULL,
  `u_corp_email` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `u_company` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `u_password` varchar(50) NOT NULL,
  `u_profile_img` varchar(255) DEFAULT NULL,
  `u_position` varchar(100) DEFAULT NULL,
  `u_status` int(1) NOT NULL DEFAULT '1',
  `is_admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_surname`, `u_father_name`, `u_corp_email`, `email`, `u_company`, `u_password`, `u_profile_img`, `u_position`, `u_status`, `is_admin`) VALUES
(6, 'Admin', 'Admin', 'Admin', 'admin@gmail.com', NULL, 'Caspian Busines Hotel MMC,Yanar Dönər Filial № 1,Yanar Dönər Filial № 2,Sahara Event Hall,Ədalət Restoranı,Elektroterm MMC,Bakı Satış Mərkəzi MMC,Nizami Mall MMC,City Centre MMC,Tranzit Store MMC,Agro Land Az QSC,Bine Agro QSC,Sara Qrup QSC,Vetart MMC,Premium Service MMC,Binə Agro Trade MMC,Kraun Ko R MMC,Honey Bee MMC,Qoyunçuluq MMC,Connect QSC,Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı),İnetarnational Medical Centre - 2 MMC,Sara Logistika MMC,Azərbaycam Məişət Malları QSC,Tornado-Ş MMC,Azphone MMC,Mənzil İS MMC,Sabina Beauty gözəllik salonu Filial №1,Sabina Beauty gözəllik salonu Filial №2,Global Security Services MMC,Qarabağ Restoran (Cəbrayıl),Agro Lead MMC,Agro Way MMC,Kapital Group MMC,İnşaat Servis 2002 MTK,Azlegals MMC,Etalon MMC,Şəhər Ticarət Mərkəzi MMC,Toxumçuluq - tingçilik MMC,Binə Aqro Trade Moskva,Bio Gold Tarım MMC', '2fe0907b3fe56019378bfda510f62c44', 'uploads/2022_23_05_16_29_14.png', 'Admin', 1, 1),
(36, 'Ərşad', 'Şərifov', ' Vüsal', 'arshad.sharifov@tornado.az', NULL, 'Caspian Busines Hotel MMC,Yanar Dönər Filial № 1,Yanar Dönər Filial № 2,Sahara Event Hall,Ədalət Restoranı,Elektroterm MMC,Bakı Satış Mərkəzi MMC,Nizami Mall MMC,City Centre MMC,Tranzit Store MMC,Agro Land Az QSC,Bine Agro QSC,Sara Qrup QSC,Vetart MMC,Premium Service MMC,Binə Agro Trade MMC,Kraun Ko R MMC,Honey Bee MMC,Qoyunçuluq MMC,Connect QSC,Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı),İnetarnational Medical Centre - 2 MMC,Sara Logistika MMC,Azərbaycam Məişət Malları QSC,Tornado-Ş MMC,Azphone MMC,Mənzil İS MMC,Sabina Beauty gözəllik salonu Filial №1,Sabina Beauty gözəllik salonu Filial №2,Global Security Services MMC,Qarabağ Restoran (Cəbrayıl),Agro Lead MMC,Agro Way MMC,Kapital Group MMC,İnşaat Servis 2002 MTK,Azlegals MMC,Etalon MMC,Şəhər Ticarət Mərkəzi MMC,Toxumçuluq - tingçilik MMC,Binə Aqro Trade Moskva,Bio Gold Tarım MMC', '589f233ad3cd6cf85ee55edb2ce248b6', 'uploads/2022_23_05_16_27_35.png', 'Holdingin Baş Maliyyə Auditoru', 1, 0),
(37, 'Zamiq', 'Cahangirli', 'Nazim', 'zamiq.cahangirli@saraqrup.com', NULL, 'Caspian Busines Hotel MMC,Yanar Dönər Filial № 1,Yanar Dönər Filial № 2,Sahara Event Hall,Ədalət Restoranı,Elektroterm MMC,Bakı Satış Mərkəzi MMC,Nizami Mall MMC,City Centre MMC,Tranzit Store MMC,Agro Land Az QSC,Bine Agro QSC,Sara Qrup QSC,Vetart MMC,Premium Service MMC,Binə Agro Trade MMC,Kraun Ko R MMC,Honey Bee MMC,Qoyunçuluq MMC,Connect QSC,Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı),İnetarnational Medical Centre - 2 MMC,Sara Logistika MMC,Azərbaycam Məişət Malları QSC,Tornado-Ş MMC,Azphone MMC,Mənzil İS MMC,Sabina Beauty gözəllik salonu Filial №1,Sabina Beauty gözəllik salonu Filial №2,Global Security Services MMC,Qarabağ Restoran (Cəbrayıl),Agro Lead MMC,Agro Way MMC,Kapital Group MMC,İnşaat Servis 2002 MTK,Azlegals MMC,Etalon MMC,Şəhər Ticarət Mərkəzi MMC,Toxumçuluq - tingçilik MMC,Binə Aqro Trade Moskva,Bio Gold Tarım MMC', '6b091de13f64395535df835d3d5878aa', 'uploads/2022_23_05_16_29_14.png', 'Holdingin Maliyyə Direktoru', 1, 0),
(38, 'Zakir', 'Şükürov', 'Sahib', 'shukurov.zakir@saraqrup.com', NULL, 'Caspian Busines Hotel MMC,Yanar Dönər Filial № 1,Yanar Dönər Filial № 2,Sahara Event Hall,Ədalət Restoranı,Elektroterm MMC,Bakı Satış Mərkəzi MMC,Nizami Mall MMC,City Centre MMC,Tranzit Store MMC,Agro Land Az QSC,Bine Agro QSC,Sara Qrup QSC,Vetart MMC,Premium Service MMC,Binə Agro Trade MMC,Kraun Ko R MMC,Honey Bee MMC,Qoyunçuluq MMC,Connect QSC,Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı),İnetarnational Medical Centre - 2 MMC,Sara Logistika MMC,Azərbaycam Məişət Malları QSC,Tornado-Ş MMC,Azphone MMC,Mənzil İS MMC,Sabina Beauty gözəllik salonu Filial №1,Sabina Beauty gözəllik salonu Filial №2,Global Security Services MMC,Qarabağ Restoran (Cəbrayıl),Agro Lead MMC,Agro Way MMC,Kapital Group MMC,İnşaat Servis 2002 MTK,Azlegals MMC,Etalon MMC,Şəhər Ticarət Mərkəzi MMC,Toxumçuluq - tingçilik MMC,Binə Aqro Trade Moskva,Bio Gold Tarım MMC', '2a07a60b8477cd401bfad8c1682daa35', 'uploads/2022_23_05_16_29_56.png', 'Holdingin Maliyyə Direktorunun köməkçisi', 1, 0),
(52, 'Arzu', 'Binnnətova', 'Vəli', 'a.binnetova@saraqrup.com', NULL, 'Honey Bee MMC,Toxumçuluq - tingçilik MMC', 'c49867085ae75747b2d327675d2d8879', 'uploads/2022_23_05_17_06_34.png', 'Mühasib', 1, 0),
(39, 'Zahid', 'Əmirov', 'Vahid', 'zahidamirov76@gmail.com', NULL, 'Caspian Busines Hotel MMC,Yanar Dönər Filial № 1,Yanar Dönər Filial № 2,Sahara Event Hall,Ədalət Restoranı,Elektroterm MMC,Bakı Satış Mərkəzi MMC,Nizami Mall MMC,City Centre MMC,Tranzit Store MMC,Agro Land Az QSC,Bine Agro QSC,Sara Qrup QSC,Vetart MMC,Premium Service MMC,Binə Agro Trade MMC,Kraun Ko R MMC,Honey Bee MMC,Qoyunçuluq MMC,Connect QSC,Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı),İnetarnational Medical Centre - 2 MMC,Sara Logistika MMC,Azərbaycam Məişət Malları QSC,Tornado-Ş MMC,Azphone MMC,Mənzil İS MMC,Sabina Beauty gözəllik salonu Filial №1,Sabina Beauty gözəllik salonu Filial №2,Global Security Services MMC,Qarabağ Restoran (Cəbrayıl),Agro Lead MMC,Agro Way MMC,Kapital Group MMC,İnşaat Servis 2002 MTK,Azlegals MMC,Etalon MMC,Şəhər Ticarət Mərkəzi MMC,Toxumçuluq - tingçilik MMC,Binə Aqro Trade Moskva,Bio Gold Tarım MMC', '37db131ce50eecc62f6cc1410a2584d6', 'uploads/2022_23_05_16_31_26.png', 'Holdingin Baş Kassiri', 1, 0),
(40, 'Tamara', 'Rəsulova', 'Məmməd', 'tamara.rasulova80@gmail.com', NULL, 'Binə Agro Trade MMC', '18177d6f86f232f415dc789aafd997a4', 'uploads/2022_23_05_16_32_54.png', 'Baş Mühasib', 1, 0),
(41, 'Elvin', 'Vəliyev', 'Akif', 'valiyev.elvin@agroland.az', NULL, 'Agro Land Az QSC', '1a5d927cd4feed570412d82aa2009438', 'uploads/2022_23_05_16_35_25.png', 'Baş Mühasib', 1, 0),
(42, 'Elşən', 'Abdullayev', 'Beytulla', 'bineagro357@gmail.com', NULL, 'Bine Agro QSC', 'faf76761944ce5732a0290ea69a4a3f2', 'uploads/2022_23_05_16_36_37.png', 'Baş Mühasib', 1, 0),
(43, 'Rəfiqə', 'Baxşəliyeva', 'Əli', 'rafiqa.bakhshaliyeva@elektroterm.az', NULL, 'Elektroterm MMC', '9ea88b83bd6b18dab4e59004520a4656', 'uploads/2022_23_05_16_37_50.png', 'Baş Mühasib', 1, 0),
(45, 'Aysel', 'Əliyeva', 'Elxan', 'aysaliewa@gmail.com', NULL, 'Caspian Busines Hotel MMC,Yanar Dönər Filial № 1,Yanar Dönər Filial № 2,Sahara Event Hall,Qarabağ Restoran (Cəbrayıl)', '714afc5e0b99094eb28066ec0ada807c', 'uploads/2022_23_05_16_41_09.png', 'Mühasib', 1, 0),
(46, 'Ülvi', 'Babayev', 'Məmmədəli', 'ulvibabayev797@gmail.com', NULL, 'Bine Agro QSC', '2259a99a3042dfcb30c2e32df83013fe', 'uploads/2022_23_05_16_42_29.png', 'Mühasib', 1, 0),
(47, 'Namiq', 'Quliyev', 'Nuhullah', 'nqquliyev1968@gmail.com', NULL, 'Ədalət Restoranı', 'f8ad7675da895343f3965153059a3557', 'uploads/2022_23_05_16_43_39.png', 'Baş Mühasib', 1, 0),
(48, 'Aqil', 'Əsədov', 'Məhəbbət', 'aqilfateh1989@mail.ru', NULL, 'Nizami Mall MMC,Şəhər Ticarət Mərkəzi MMC', '51fd84e4f924b239710565165da809e7', 'uploads/2022_23_05_16_46_51.png', 'Baş Mühasib', 1, 0),
(49, 'Fatma', 'Uğurliyeva', 'Uğur', 'fatma.ugurliyeva@saraqrup.com', NULL, 'Sara Qrup QSC,Vetart MMC,Bio Gold Tarım MMC', '94ad7853aff4634f012d0165b35ce560', 'uploads/2022_23_05_16_51_06.png', 'Baş Mühasib', 1, 0),
(50, 'Həmidə', 'Cavadova', 'Ədalət', 'cavadova.hamida@saraqrup.com', NULL, 'Sara Qrup QSC,Vetart MMC', '9a5c787088ec5d1bbce7c03dc58094b1', 'uploads/2022_23_05_16_52_49.png', 'Baş Mühasib', 1, 0),
(51, 'Minayə', 'Qasımova', 'Qabil', 'qasimova.minaye@saraqrup.com', NULL, 'Sara Qrup QSC,Vetart MMC', 'a2b1ff59b7f42da67f62134ad5e51296', 'uploads/2022_23_05_16_54_18.png', 'Mühasib', 1, 0),
(53, 'Xuraman', 'Əliyeva', 'Siyasət', 'xuramanaliyeva@kraunkor.az', NULL, 'Kraun Ko R MMC,Agro Way MMC', '67a81ea60d0c5d704879aa99b236a4f7', 'uploads/2022_23_05_17_09_23.png', 'Maliyyə direktoru', 1, 0),
(54, 'Yeganə', 'Əliyeva', 'Kamil', 'aliyeva.yegana@kraunkor.az', NULL, 'Kraun Ko R MMC,Agro Lead MMC', 'ad0d42a53d300b3d9e0ecc58948a8868', 'uploads/2022_23_05_17_10_43.png', 'Baş Mühasib', 1, 0),
(55, 'Aysun', 'Məmmədova', 'Məhərrəm', 'aysun.mammadova@saraqrup.com', NULL, 'Sabina Beauty gözəllik salonu Filial №1,Sabina Beauty gözəllik salonu Filial №2', 'd26feeda74e988025d985ceb5eee152d', 'uploads/2022_23_05_17_12_27.png', 'Mühasib', 1, 0),
(56, 'Yusif', 'Yusifli', 'Cəlal', 'y.yusif013@gmail.com', NULL, 'Bakı Satış Mərkəzi MMC', 'f3a8d22dfd3f53815665c31d608dbcdf', 'uploads/2022_23_05_17_13_55.png', 'Baş Mühasib', 1, 0),
(57, 'Elvin ', 'Pənahov ', 'Fərzalı', 'penahov.elvin@bmp.az', NULL, 'İnetarnational Medical Centre - 2 MMC', 'a81648c73e9326b4eccac54799868665', 'uploads/2022_23_05_17_23_13.png', 'Baş Mühasib', 1, 0),
(58, 'Pərviz ', 'Şükürov ', 'Məhəmməd', 'parvizsukurov@bmp.az', NULL, 'Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı)', 'ca61e1ed2e46c13830686de4e75ad8d3', 'uploads/2022_23_05_17_24_01.png', 'Direktor', 1, 0),
(59, 'Pərviz ', 'Şükürov ', 'Məhəmməd', 'parvizsukurov@bmp.az', NULL, 'Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı)', 'f720ac0737452b3627d24772827da259', 'uploads/2022_23_05_17_24_44.png', 'Direktor', 1, 0),
(60, 'Baba ', 'Qurbanov ', 'Vaqif', 'baba.gurbanov@bmp.az', NULL, 'Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı),Baku Medical Plaza MMC (Mediluxa filialı),İnetarnational Medical Centre - 2 MMC', '2193beb5d9a52b72855a98750b037857', 'uploads/2022_23_05_17_26_16.png', 'Maliyyə direktoru', 1, 0),
(61, 'Nərmin ', 'Nağıyeva ', 'Rüfət', 'nagiyeva.narmin@bmp.az', NULL, 'Baku Medical Plaza MMC (Mediluxa filialı)', 'ef5d337fd6feba32bfcff769273e8da3', 'uploads/2022_23_05_17_27_30.png', 'Baş Mühasib', 1, 0),
(62, 'Nigar ', 'Qasımova ', 'Zirəddin', 'gasimova.nigar@bmp.az', NULL, 'Baku Medical Plaza MMC (Mərkəz filialı)', 'd19804dbd3350450901b59faeb089845', 'uploads/2022_23_05_17_28_34.png', 'Mühasib', 1, 0),
(63, 'Rahidə ', 'Həsənova ', 'Əmiraslan', 'rahidehesenova@bmp.az', NULL, 'Baku Medical Plaza MMC (Mərkəz filialı),Baku Medical Plaza MMC (Babək filialı)', 'eb421b36bf32638d42a28ff6ae5b9399', 'uploads/2022_23_05_17_29_31.png', 'Baş Mühasib', 1, 0),
(64, 'Xanımzər ', 'İsmayılova ', 'Rəşad', 'xanimzer.ismailova@tornado.az', NULL, 'Tornado-Ş MMC', '58b9a3346c5dd64172358d933a572105', 'uploads/2022_23_05_17_30_23.png', 'Mühasib', 1, 0),
(65, 'Aynurə ', 'Xudiyeva ', 'Zakir', 'aynureabbasova9@gmail.com', NULL, 'Mənzil İS MMC,Kapital Group MMC,İnşaat Servis 2002 MTK', 'dabc3d76061946841b114fe4d06e03a0', 'uploads/2022_23_05_17_32_09.png', 'Baş Mühasib', 1, 0),
(66, 'Vüsal ', 'İsmayılbəyli ', 'İsmayıl', 'tranzitstore.az@gmail.com', NULL, 'Tranzit Store MMC,Azlegals MMC,Etalon MMC', '548913a7fc7ff3627bd2ac4d3538ae4f', 'uploads/2022_23_05_17_33_26.png', 'Baş Mühasib', 1, 0),
(67, 'Anar ', 'Musabəyov ', 'Yusif', 'tranzitstore.az@gmail.com', NULL, 'Sara Logistika MMC', '3ca1d6fd95fc4b05c4a390e371f0b8cf', 'uploads/2022_23_05_17_35_30.png', 'Baş Mühasib', 1, 0),
(68, 'Gülnarə ', 'Şiryayeva ', 'Elxan', 'masullaaaf@gmail.com', NULL, 'Sara Logistika MMC', 'f7b42d6d8d451daa7603ecaf147e00aa', 'uploads/2022_23_05_17_35_13.png', 'Maliyyə direktoru', 1, 0),
(69, 'Tənzifə ', 'Sayadova ', 'Şıxbala', 'sayadova.tanzifa@mail.ru', NULL, 'Azərbaycam Məişət Malları QSC', 'cdefd933e58e15abac099b3687871756', 'uploads/2022_23_05_17_36_28.png', 'Baş Mühasib', 1, 0),
(70, 'Şəhla ', 'Muxtarova ', 'Sədulla ', 'shehla.mukhtarova@gssbaku.az', NULL, 'Global Security Services MMC', '865a97ea00f04b16bd17e3316fd72787', 'uploads/2022_23_05_17_37_16.png', 'Baş Mühasib', 1, 0),
(71, 'Könül ', 'Əmirova ', 'Siyavuş', 'amirovakonul44@gmail.com ', NULL, 'Azphone MMC,Bio Gold Tarım MMC', 'a5a8c8788fd0a0ba8764a72777dadcb3', 'uploads/2022_23_05_17_38_22.png', 'Baş Mühasib', 1, 0),
(72, 'İlqar ', 'Rəhimov ', 'Tofiq', 'it.rahimov@connect.az', NULL, 'Connect QSC', '3cb13799be145fb5ae3a404d4827be58', 'uploads/2022_23_05_17_39_12.png', 'Baş Mühasib', 1, 0),
(76, 'Samir ', 'Nərimanov ', 'Xanbala', 'samir.narimanov@gmail.com', NULL, 'Agro Land Az QSC,Bine Agro QSC,Premium Service MMC,Binə Aqro Trade Moskva', '38807a7183faea93d6f4aa48808cd923', 'uploads/2022_24_05_15_36_56.png', 'Maliyyə direktoru', 1, 0),
(88, 'Tural ', 'Məmmədov ', 'Yasin', 'mattural@hotmail.com', NULL, 'Nizami Mall MMC,Şəhər Ticarət Mərkəzi MMC', '51fd84e4f924b239710565165da809e7', 'uploads/2022_22_06_11_09_23.png', 'Baş Mühasib', 1, 0),
(95, 'Nağı', 'Nağıyev', 'Vəli', 'naghiyevnaghi@gmail.com', NULL, 'Caspian Busines Hotel MMC', 'a86f5185f26e12b91e7c2160699d7d92', 'uploads/2022_29_06_13_12_39.png', 'Direktor', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
