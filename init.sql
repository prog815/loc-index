CREATE TABLE `files` (
  `path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `files` ADD FULLTEXT KEY `path` (`path`);
COMMIT;