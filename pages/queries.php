<?php

    include_once('classes.php');

    $ins1 = 'create table series(
				id int not null auto_increment primary key,
				seriesname varchar (32) not null) default charset="utf8"';
                
    $ins2 = 'create table genre(
				id int not null auto_increment primary key,
				genrename varchar (32) not null) default charset="utf8"';
                
    $ins3 = 'create table authors(
				id int not null auto_increment primary key,
				name varchar (32) not null,
                secondname varchar (32),
                surname varchar (32) not null,
                country varchar (32)) default charset="utf8"';
                
    $ins4 = 'create table books(
				id int not null auto_increment primary key,
				bookname varchar (128) not null,
				authorid int,
				foreign key (authorid) references authors (id),
                seriesid int,
				foreign key (seriesid) references series (id),
                genreid int,
				foreign key (genreid) references genre (id),
				year int,
                numbinseries int,
                status varchar (24),
                dopinfo varchar (1024) ) default charset="utf8"';
                
    $ins5 = 'create table statuses(
				id int not null auto_increment primary key,
				status varchar (32) not null) default charset="utf8"';



                
                
    $pdo = Tools::Connect('localhost','root','123456','examsh');
    $pdo->query($ins5);

?>