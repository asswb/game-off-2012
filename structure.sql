-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2012 at 02:50 AM
-- Server version: 5.1.63
-- PHP Version: 5.3.2-1ubuntu4.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ght`
--

-- --------------------------------------------------------

--
-- Table structure for table `issue_table`
--

CREATE TABLE IF NOT EXISTS `issue_table` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('bug','enhancement','pull_request') COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `delta_com` int(11) NOT NULL,
  `delta_cbq` int(11) NOT NULL,
  `chance` int(3) NOT NULL,
  UNIQUE KEY `iid` (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `issue_table`
--

INSERT INTO `issue_table` (`iid`, `name`, `description`, `type`, `time`, `delta_com`, `delta_cbq`, `chance`) VALUES
(1, 'Simple Bug', 'This one isn''t very hard, and not very rewarding.', 'bug', 20, 1, 2, 8),
(2, 'Intermediate Bug', 'This one is harder.', 'bug', 40, 3, 2, 4),
(3, 'Hard Bug', 'This is a tricky one. Better hunker down.', 'bug', 60, 5, 2, 2),
(4, 'Brutal Bug', 'This bug is super hard, oh god no!', 'bug', 80, 7, 2, 1),
(5, 'Can you add this feature?', 'My company would switch if you had this feature!', 'enhancement', 20, 10, -2, 2),
(6, 'Has anyone really been far even as decided to use even go want t', '<pre>git rm -rf *\r\ngit commit -m "Fixed all bugs"\r\ngit push</pre>', 'pull_request', 2, -10, -10, 1),
(7, 'Hey, I found a bug!', 'Attached is a diff.', 'pull_request', 5, 10, -1, 1),
(8, 'Hey, you''re missing this feature!', 'Here''s a patch!', 'pull_request', 5, 8, -2, 2),
(9, 'Code Rebase', 'Rewrite major parts of the core and update to newest specifications.', 'enhancement', 240, 10, -2, 100),
(10, 'Refactor', 'Refactor a segment of the code.', 'enhancement', 60, 0, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lastupdate` int(10) NOT NULL,
  `repo_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `com` int(11) NOT NULL,
  `cbq` double NOT NULL,
  `issue` int(11) NOT NULL,
  `issue_eta` int(10) NOT NULL,
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `session` (`session`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_issue_table`
--

CREATE TABLE IF NOT EXISTS `user_issue_table` (
  `uiid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  UNIQUE KEY `uiid` (`uiid`,`uid`,`iid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_issue_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variable`
--

