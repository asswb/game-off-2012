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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `issue_table`
--

INSERT INTO `issue_table` (`iid`, `name`, `description`, `type`, `time`, `delta_com`, `delta_cbq`, `chance`) VALUES
(1, 'Simple Syntax Error', 'If you\'re happy and you know it, syntax error! I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(2, 'Simple Compilation Error', 'Typos can be a nusiance. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(3, 'Simple Run Time Error', 'Ouch! My program didn\'t like that! I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(4, 'Simple Logic Error', 'Why isn\'t this section doing what it\'s supposed to be doing? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(5, 'Simple Latent Error', 'I was not expecting this result. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(6, 'Simple Division by Zero Error', 'What do you mean you can\'t divide by zero? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(7, 'Simple Overflow Bug', '1 + 1 = 0. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(8, 'Simple Precision Error', '0.9999999999 != 1. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(9, 'Simple Infinite Loop', 'Why won\'t this program terminate? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(10, 'Simple Recursion Error', 'Recursion: See Recursion. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(11, 'Simple Off By One Error', 'Leave it to a computer to be unable to count. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(12, 'Simple Null Pointer Error', 'This pointer is not pointing to anything. It should be, but it isn\'t. Why isn\'t it? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(13, 'Simple Uninitialized Variable Error', 'What the hell is `i_like_to_move_it_move_it`, and why isn\'t it defined? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(14, 'Simple Type Error', 'What do you mean I can\'t divide strings by a number? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(15, 'Simple Segfault', 'Who the hell is trying to push the binary into kernel space? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(16, 'Simple Memory Leak', 'Memory is not a black hole. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(17, 'Simple Buffer Overflow', 'You shall not pass! I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(18, 'Simple Stack Overflow', 'Pushing but not popping. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(19, 'Simple Deadlock', 'Why do mute philosophers need to eat with two forks anyway? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(20, 'Simple Race Condition', 'Remove seatbelt, then leave the car. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(21, 'Simple Incorrect API usage', 'api.exceptIncomingTransmission() I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(22, 'Simple Incorrect Protocol Implementation', 'Do I *need* HTML to make XML? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(23, 'Simple Incorrect Hardware Handling', 'Why does this function play the imperial march on my floppy drive? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(24, 'Simple Performance Issue', 'This process may take anywhere from 0.01 to 9000 seconds. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(25, 'Simple Random Disk Access Issue', 'Why does this library use twelve thousand individual files? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(26, 'Simple Unpropagated Updates', 'Why subtract when you can just add a negative number? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(27, 'Simple Comments Illegible', '//Has anyone really been far even as decided to use even go want to do look more like? I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(28, 'Simple Documentation Issue', 'Moths do not belong in the relay. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(29, 'Simple Hard Coded', 'This needs to be dynamic. I have a drag and drop GUI application for this.', 'bug', 1, 1, 1, 1),
(30, 'Simple Business Request', 'Quite a few companies would love to see this happen. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(31, 'Simple Personal Request', 'Not many people will benefit from this, but it is rather good idea. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(32, 'Simple API', 'If we can build an API, we can allow folks to connect to it. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(33, 'Simple User Interface', 'People like to click buttons. Let\'s add those! I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(34, 'Simple Command Line Interface', 'Let\'s make our system script-able! I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(35, 'Simple Daemon', 'Our system needs to run all the time! I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(36, 'Simple Database', 'Our information needs to be persistent. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(37, 'Simple Threading', 'Our system needs to take advantage of multi-core processors. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(38, 'Simple Documentation', 'RTFM? WABFM. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(39, 'Simple Hardware Integration', 'We need to add a dongle. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(40, 'Simple Automated Tests', 'I\'m tired of testing. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(41, 'Simple Makefile', 'When you have eight cores, it\'s nice to have the `-j` flag. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(42, 'Simple Deploy Scripts', 'We need to have a public instance. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(43, 'Simple Backup Scripts', 'Keeping stuff stored in /dev/null isn\'t going to work anymore. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(44, 'Simple Internal Logic', 'Logic will get you from A to B. Imagination will take you everywhere. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(45, 'Simple Third Party Library', 'Why reinvent the wheel? I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(46, 'Simple Website', 'We need a design that POPS! Maybe even comic sans! I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(47, 'Simple Forums', 'Calling all trolls. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(48, 'Simple IRC Channel', 'Old enough to keep the technically challenged out. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(49, 'Simple Phone App', 'I need to access this from my phone. Now. I have a drag and drop GUI application for this.', 'enhancement', 1, 1, 1, 1),
(50, 'Simple Patch', 'Someone attached a patch on the issue tracker! I have a drag and drop GUI application for this.', 'pull_request', 1, 1, 1, 1),
(51, 'Simple Feature', 'Someone wrote some code and posted it! I have a drag and drop GUI application for this.', 'pull_request', 1, 1, 1, 1),
(52, 'Simple Bugfix', 'Someone figured out the problem to a bug and shows how to fix it! I have a drag and drop GUI application for this.', 'pull_request', 1, 1, 1, 1),
(53, 'Simple Performance Boost', 'Someone was able to make your system faster! I have a drag and drop GUI application for this.', 'pull_request', 1, 1, 1, 1);

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
  `repo_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
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

