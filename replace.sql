ALTER TABLE `temp` ADD FULLTEXT KEY `path` (`path`);
DROP TABLE files;
RENAME TABLE temp TO files;