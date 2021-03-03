-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 03, 2021 at 10:14 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `like_dislike`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(100) COLLATE latin1_bin NOT NULL,
  `author` varchar(60) COLLATE latin1_bin NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `author`, `topic_id`) VALUES
(1, 'Hey man i don\'t agree', 'Sanskar Patni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(600) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `heading` varchar(40) NOT NULL,
  `author` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `heading`, `author`) VALUES
(2, 'This is the second piece of text klcnej l m fl fld mdkjvjekvm vmfnkmv m dk nejld m eknj efd,mkjjnle mjnkemv ,nlk mm kn nm ekjfdmlknjvk m ke n nejkd meneokekl m klejmeik nojvmnknblvhn dkn buipn ekn hb n hb bjlbuj nhguvb nhjvhk;jn jlhb hvb k;hib jk hp h kj lh n hjb fnd jkfd jvhe jvlehv d vvh vjlbjf vjlfd vdfljbv kmcke cj nmer ckje ck je cn ejaks dcmends ckneosk cm ekc lajckl m aej clsjkk amdc kj scm ekl dvnej svjher kvk rj sdjcedksl hvjsdvhe vekjv  vv vkjvk jv vejvkevejv vjkvff vek svjkesd vejf vjef fvj fkdvkerev fkv kesldvjeslv je dsvlefjv vk ', 'the way of living', 'MS Dhoni'),
(13, 'well dude', 'Hey maan', 'kavya Patni'),
(15, 'heyyya mannn\r\n', 'NO way', 'Sanskar Patni'),
(19, 'So, you want to start a blog huh? Great idea!\r\n\r\nBut…how the heck do you get started? There’s so much info out there on the web, and everyone’s telling you to do different things. Who do you listen to? Where’s the starting point?\r\n\r\nDamnit, maybe you should just forget it – it’s too confusing!\r\n\r\nWell, hold up. I used to be a blogging newbie too. I had the same problems. I started my blog (BloggingBasics101.com) way back in 2006, and I knew less than nothing about blogging. In fact, it was only the week before I’d learned what a blog was.\r\n\r\nNow I know a ton about them, and my blog’s doing pre', 'How To Start a Blog – Beginner’s Guide f', 'Sanskar Patni'),
(20, 'dsmfakl', 'dmfaklm', 'roman sdkms');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

DROP TABLE IF EXISTS `rating_info`;
CREATE TABLE IF NOT EXISTS `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL,
  UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
(1, 1, 'like'),
(1, 2, 'like'),
(1, 3, 'dislike'),
(1, 4, 'like'),
(1, 8, 'like'),
(1, 13, 'like'),
(1, 14, 'like'),
(1, 15, 'like'),
(1, 16, 'like'),
(1, 17, 'like'),
(1, 19, 'dislike'),
(2, 1, 'like'),
(2, 2, 'dislike'),
(2, 3, 'like'),
(2, 4, 'dislike'),
(2, 9, 'dislike'),
(2, 10, 'like'),
(2, 11, 'dislike'),
(2, 12, 'dislike'),
(2, 13, 'like'),
(2, 14, 'like'),
(3, 1, 'like'),
(3, 2, 'dislike'),
(3, 3, 'dislike'),
(3, 4, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `topic_id`, `user_id`) VALUES
(42, 0, 'heyya', 'Sanskar Patni', '2020-08-04 13:02:43', 15, 1),
(43, 0, 'yes man', 'dsv vdfv', '2020-08-04 13:06:14', 15, 4),
(44, 0, 'right', 'dsv vdfv', '2020-08-04 13:06:58', 15, 4),
(45, 0, 'you are wrong', 'Sanskar Patni', '2020-08-04 13:07:36', 15, 1),
(46, 0, 'wayyy to go', 'Sanskar Patni', '2020-08-04 13:10:05', 15, 1),
(48, 0, 'heyya guys', 'dsv vdfv', '2020-08-04 13:13:05', 18, 4),
(49, 0, 'dcsc', 'dsv vdfv', '2020-08-04 13:18:29', 18, 4),
(50, 0, 'no maannn', 'dsv vdfv', '2020-08-04 19:25:24', 15, 4),
(51, 0, 'wooo', 'dsv vdfv', '2020-08-04 19:25:54', 3, 4),
(52, 0, 'nope mann', 'Sanskar Patni', '2020-08-04 19:57:40', 18, 1),
(53, 0, 'heyyyaaaaa', 'Sanskar Patni', '2020-08-04 19:58:55', 2, 1),
(54, 0, 'no way mannn damn', 'Sanskar Patni', '2020-08-04 19:59:06', 2, 1),
(55, 0, 'obiufydtsaeesrdt', 'Sanskar Patni', '2020-08-05 08:49:00', 19, 1),
(56, 0, 'trgrhh', 'Sanskar Patni', '2020-08-05 12:27:56', 19, 1),
(57, 0, 'really bro\r\n', 'roman sdkms', '2021-03-02 14:39:15', 15, 10),
(58, 0, 'no way this is good', 'roman sdkms', '2021-03-02 14:39:27', 15, 10),
(59, 0, 'ro mat\r\n', 'roman sdkms', '2021-03-02 14:39:41', 13, 10),
(60, 0, 'lol zero', 'roman sdkms', '2021-03-02 14:40:00', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `admin`) VALUES
(1, 'Sanskar', 'Patni', 'sans', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'kavya', 'Patni', 'kav', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'ecf', 'fvfrv', 'sans1', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(4, 'dsv', 'vdfv', 'san', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(5, 'f', 'f', 'ff', '8fa14cdd754f91cc6554c9e71929cce7', 0),
(6, 'fwef', 'fff', 'ffr', '4c96cf4148db55fb6f55db3f3a3349fa', 0),
(7, 'gt', 'gtgt', 'tggt', '8c53e014c65b940b08a44cdc4437305c', 0),
(8, 'ssx', 'xsxsx', 'xsxxs', '3b097916e7422fa8968f40cf27ebe0de', 0),
(9, 'sxw,l', ',edcl  e', 'dec', 'db426af4e6cd0b13c26acdeb378c459c', 1),
(10, 'roman', 'sdkms', 'abcd', '81dc9bdb52d04dc20036dbd8313ed055', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
