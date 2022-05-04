find /var/files -type f | awk '{print substr($0,12)}' | awk '{print "INSERT INTO temp (path) VALUES (\"" $0 "\");"}' > /var/prog/files.sql
mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk < /var/prog/create_temp.sql
mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk < /var/prog/files.sql
mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} loc-poisk < /var/prog/replace.sql