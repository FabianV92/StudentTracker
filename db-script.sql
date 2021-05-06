-- Example database I used for testing.

--
-- Creating webstudent user with admin rights
--
CREATE USER 'webstudent'@'localhost' IDENTIFIED BY 'webstudent';
GRANT ALL PRIVILEGES ON * . * TO 'webstudent'@'localhost';


CREATE DATABASE  `web_student_tracker`;
USE `web_student_tracker`;

--
-- Creating table student
--
CREATE TABLE `student` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`first_name` varchar(45) DEFAULT NULL,
`last_name` varchar(45) DEFAULT NULL,
`email` varchar(45) DEFAULT NULL UNIQUE,
PRIMARY KEY (`id`)
);

--
-- Dumping data for table student
--
INSERT INTO `student` VALUES
(1,'Mary','Public','mary@live.com'),
(2,'John','Doe','john@dese.com'),
(3,'Ajay','Rao','ajay@hotmail.com'),
(4,'Bill','Neely','bill@web.com'),
(5,'Maxwell','Dixon','max@web.com');