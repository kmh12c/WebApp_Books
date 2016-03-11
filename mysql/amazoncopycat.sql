-- Database: `amazoncopycat`

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `summary` text,
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `checkedout` (
  `user` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `date_out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `reviews` (
  `user` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `content` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(1) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phrase` varchar(200) NOT NULL,
  `joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `wishlist` (
  `user` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `date_out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `checkedout`
  ADD PRIMARY KEY (`user`,`id`);

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user`,`id`,`time`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user`,`id`);