create database vote;
use vote;
show tables;
CREATE TABLE users
(
id int auto_increment,
username varchar(255),
email varchar(255),
password varchar(255),
primary key(id)
);
select * from users;
