
-- user model.

create table gtf_user (
  id integer primary key auto_increment,
  name varchar(50) unique key,
  password varchar(50),
  role integer
);

insert into gtf_user values(1, 'admin', 'admin', 0);
