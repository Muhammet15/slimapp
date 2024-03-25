-- Tabloları sil
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;


-- Posts Tablosu
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`)
);

-- Comments Tablosu
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`postId`) REFERENCES `posts`(`id`)
);
