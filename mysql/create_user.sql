CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';
FLUSH PRIVILEGES;

GRANT type_of_permission ON database_name.table_name TO 'username'@'localhost';
REVOKE type_of_permission ON database_name.table_name FROM 'username'@'localhost';
SHOW GRANTS FOR 'username'@'localhost';
DROP USER 'username'@'localhost';