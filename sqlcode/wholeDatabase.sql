create database techtalk;

use techtalk;

create table kunde(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
benutzername varchar(45) not null,
email varchar(45) not null,
passwort varchar(45) not null);

create table chat(
id INT NOT NULL auto_increment primary KEY,
name varchar(100) not null,
text varchar(300) not null);

#gibt dem root alle rechte
 GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '1234' WITH GRANT OPTION;
 FLUSH PRIVILEGES;
 
 #gibt laurent alle Rechte.
  GRANT ALL PRIVILEGES ON *.* TO 'Laurenz'@'%' IDENTIFIED BY '1234' WITH GRANT OPTION;
 FLUSH PRIVILEGES;