create database test;

use test;

CREATE TABLE `books` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `year` int(4) NOT NULL
  PRIMARY KEY  (`id`)
);