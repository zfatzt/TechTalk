drop database techtalk;
create database techtalk;
use techtalk;

create table kunde(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
benutzername varchar(45) not null,
email varchar(45) not null,
passwort varchar(45) not null);

#Standart Passwort für admin ist Welcome$16
insert into kunde(benutzername, email, passwort) values ('admin', 'admin@admin.ch', '4da7dc70df7bff1525a251f3b3bee056bd905f69'); 





create table chat(
id INT NOT NULL auto_increment primary KEY,
name varchar(100) not null);

insert into chat (name) values ('Bitcoin'),('Dronen'),('Huawei P10');

 create table text(
    id int NOT null PRIMARY KEY auto_increment,
    text varchar(5000) not null);
    

create table chat_text_user(
	chat_id int not null,
    text_id int not null,
    kunde_id int not null,
    time timestamp not null default now(),
    foreign key(chat_id) references chat(id),
    foreign key(text_id) references text(id),
    foreign key(kunde_id) references kunde(id));
    
    
#gibt dem root alle rechte
 GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '1234' WITH GRANT OPTION;
 FLUSH PRIVILEGES;
 
 #gibt laurent alle Rechte.
  GRANT ALL PRIVILEGES ON *.* TO 'Laurenz'@'%' IDENTIFIED BY '1234' WITH GRANT OPTION;
 FLUSH PRIVILEGES;
 

