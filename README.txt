CREATE DATABASE <database_name>;
SHOW DATABASES;
CONNECT <database_name>;
CREATE TABLE <table_name_in_plural> ();
INSERT INTO <table_name_in_plural>
(columns) VALUES
(values);



# Utility Commands
\! cls
mysqldump -u root -p --databases <database_name> > "G:\dev\IT30B\backups"

mysqldump -u root -p --databases library_db > "G:\xampp\htdocs\IT30B\backups\%date:~-4,4%%date:~4,2%%date:~7,2%_%time:~0,2%%time:~3,2%%time:~6,2%_library_db.sql"

ALTER TABLE students
ADD COLUMN student_created_at timestamp NOT NULL DEFAULT current_timestamp();
