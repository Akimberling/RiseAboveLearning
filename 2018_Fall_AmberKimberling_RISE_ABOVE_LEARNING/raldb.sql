SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS raldb DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE raldb;

DROP TABLE IF EXISTS category;
CREATE TABLE IF NOT EXISTS category (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO category (id, `name`) VALUES
(1, 'History'),
(2, 'Physics'),
(3, 'Html');

DROP TABLE IF EXISTS quiz;
CREATE TABLE IF NOT EXISTS quiz (
  id int(11) NOT NULL AUTO_INCREMENT,
  quiztext text,
  quizdate date NOT NULL,
  userId int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY userId REFERENCES user(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO quiz (id, quiztext, quizdate, userId) VALUES
(1, 'WWII', '2017-04-01', 4),
(2, 'Revolutionary War', '2017-04-01', 4),
(3, 'Circular Motion', '2017-04-01', 3),
(4, 'Projectile Motion', '2017-08-09', 3),
(5, 'Html tags', '2017-08-09', 5),
(6, 'Html Structure', '2017-08-09', 5);

DROP TABLE IF EXISTS quiz_category;
CREATE TABLE IF NOT EXISTS quiz_category (
  quizId int(11) NOT NULL,
  categoryId int(11) NOT NULL,
  PRIMARY KEY (quizId,categoryId),
  FOREIGN KEY categoryId REFERENCES category(id),
  FOREIGN KEY quizId REFERENCES quiz(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO quiz_category (quizId, categoryId) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3);

DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS `user` (
  id int(11) NOT NULL AUTO_INCREMENT,
  fname varchar(255) DEFAULT NULL,
  lname varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  permissions int(64) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (id, fname, lname, email, `password`, permissions) VALUES
(1, 'Oralia', 'Ordaz', 'oordaz@gmail.com', '', 0),
(2, 'Jasmine', 'Zemora', 'jzemora@gmail.com', '', 0),
(3, 'Kevin', 'Wood', 'kwood@gmail.com', '', 0),
(4, 'Billy', 'Jenkins', 'bjenkins@gmail.com', '', 0),
(5, 'Hakon', 'Engvig', 'hengvig@gmail.com', '', 0),
(6, 'lily', 'girl', 'lgirl@gmail.com', '$2y$10$Byk.yIj70kt8ein5y16OCO17FvxDz04LqUOw3WNMXZRw6JfzlowcW', 62);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
