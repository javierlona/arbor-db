CREATE DATABASE arbor;

USE arbor;

CREATE TABLE member (
  member_id INT(11) NOT NULL AUTO_INCREMENT,
  member_name_first VARCHAR(30) NOT NULL,
  member_name_last VARCHAR(30) NOT NULL,
  member_email VARCHAR(60) NOT NULL,
  member_join DATE,
  member_comments TEXT,
    CONSTRAINT member_id_pk PRIMARY KEY (member_id),
    CONSTRAINT member_email_uk UNIQUE (member_email)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER DATABASE arbor CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO member
  VALUES ('0', 'Jill', 'Smith', 'jillsmith@gmail.com', '2017-12-12', 'Summer is here!');

INSERT INTO member
  VALUES ('0', 'Eve', 'Jackson', 'ejackson@yahoo.com', '2016-11-30', '');

INSERT INTO member
  VALUES ('0', 'Stephanie', 'Landon', 'landon@gmail.com', '2016-10-03', '');

INSERT INTO member
  VALUES ('0', 'Mike', 'Yang', 'mikeyang@gmail.com', '2017-01-05', 'Toastmasters International is a US headquartered nonprofit educational organization that operates clubs worldwide for the purpose of promoting communication, public speaking, and leadership skills.');

INSERT INTO member
  VALUES ('0', 'Pedro', 'Banderas', 'pedrob@hotmail.com', '2015-05-05', '');

INSERT INTO member
  VALUES ('0', 'Rosa', 'Frank', 'frosa@aol.com', '2018-06-05', '');



-- ALTER TABLE [table_name] ADD INDEX [name_fk] ([something]);

CREATE TABLE agendas (
  agenda_id INT(11) NOT NULL AUTO_INCREMENT,
  meeting_date DATE NOT NULL,
  toastmaster VARCHAR(60),
  invocation_pledge VARCHAR(60),
  general_evaluator VARCHAR(60),
  grammarian VARCHAR(60),
  timer VARCHAR(60),
  vote_counter VARCHAR(60),
  ah_counter VARCHAR(60),
  listener VARCHAR(60),
  table_topics_master VARCHAR(60),
  speaker_1 VARCHAR(60),
  evaluator_1 VARCHAR(60),
  agenda_comments TEXT,
    CONSTRAINT agenda_id_pk PRIMARY KEY (agenda_id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO agendas
  VALUES('0', '2018-07-03', 'Mike Yang', 'Pedro Banderas', 'Rosa Frank', 'Eve Jackson', 'Stephanie Landon', 'Jill Smith', 'Mike Yang', 'Pedro Banderas', 'Rosa Frank', 'Eve Jackson', 'Stephanie Landon', 'Woohoo! Great Meeting!');

CREATE TABLE admins (
  admin_id INT(11) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255),
  username VARCHAR(255),
  hashed_password VARCHAR(255),
    CONSTRAINT admins_id_pk PRIMARY KEY (admin_id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO admins
  VALUES('0', 'Live', 'Demo', 'demo@gmail.com', 'demo', '$2y$10$2jfFAsAC7y4bYfMxEZEuRO8vECpUBaTTjhmfCBq03qUd6SYrjrWXu');

ALTER TABLE admins ADD INDEX username_idx (username);
