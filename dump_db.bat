sqlite3 C:/laragon/www/sifa/database/database.sqlite .dump > database/dump/dump.sql
sqlite3 C:/laragon/www/sifa/database/database.sqlite .schema > database/dump/schema.sql
grep -vx -f database/dump/schema.sql database/dump/dump.sql > database/dump/data.sql
grep -vE '^(INSERT INTO migrations)^' database/dump/data.sql > database/dump/data2.sql