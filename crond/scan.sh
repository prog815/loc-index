#!/bin/sh

date

find /var/files -type f | awk '{print substr($0,12)}' | awk '{print "INSERT INTO temp (path) VALUES (\"" $0 "\");"}' > /root/files.sql

mysql -h mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk -e "CREATE TABLE temp ( path varchar(255) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;"
mysql -h mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk < /root/files.sql
mysql -h mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk -e "ALTER TABLE temp ADD FULLTEXT (path); DROP TABLE files; RENAME TABLE temp TO files;"

echo "select count(*) from files;" | mysql -h mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk

date