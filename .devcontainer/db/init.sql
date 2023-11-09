create table hello_world (
id int not null auto_increment,
name text,
primary key(id)
);

insert into hello_world (name) VALUES ('Hello World!');
