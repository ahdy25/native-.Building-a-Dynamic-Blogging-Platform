
-- drop database blog;

create database if not exists blog;
use blog;
create table if not exists users(
id int auto_increment primary key,
first_name varchar(255) not null,
last_name varchar(255) not null,
email varchar(255) not null unique,
password varchar(45)not null,
phone varchar(15) unique,
created_at timestamp default current_timestamp(),
updated_at timestamp default current_timestamp()
);

create table if not exists posts(
id int primary key auto_increment,
title varchar(255) not null,
content text(255) not null,
image varchar(255),
 created_at timestamp default current_timestamp(),
 updated_at timestamp default current_timestamp(),
user_id int ,
constraint fk_user_id_users
foreign key(user_id)
references users(id)
on delete cascade
on update cascade
);

create table if not exists comments(
id int primary key auto_increment,
comment text not null,
created_at timestamp default current_timestamp(),
updated_at timestamp default current_timestamp(),
post_id int,
user_id int,
constraint fk_post_id_posts
foreign key (post_id)
references posts(id)
on delete cascade
on update cascade,
constraint fk_user_id_comments_users
foreign key (user_id) references users(id)
on delete cascade
on update cascade
);

alter table users add column is_banned tinyint(1) default 0;
alter table users add role enum('subscriber','admin') default 'subscriber' after phone;
desc users;

alter table users add column image varchar(255);


  create table if not exists likes (
      id int auto_increment primary key,
      user_id int,
      post_id int,
      love enum ('yes','no'),
	created_at timestamp default current_timestamp,
     constraint fk_user_id_likes_users foreign key (user_id) references users(id) on delete cascade on update cascade,
      constraint fk_post_id_likes_posts foreign key (post_id) references posts(id) on delete cascade on update cascade,
      unique key unique_like (user_id, post_id) 
  );