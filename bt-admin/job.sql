create table job (
	id smallint unsigned auto_increment primary key,
	public bool not null,
	title varchar(100) not null,
	description varchar(500) not null,
	poster_ext varchar(5) not null,
	modification timestamp not null,
	creation timestamp not null
) default character set = utf8;
