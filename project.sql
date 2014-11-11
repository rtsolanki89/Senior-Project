drop database project;
create database project;
use project;

CREATE TABLE login 
(
ID char(128) NOT NULL PRIMARY KEY,
profession varchar(10) NOT NULL,
username varchar(50) NOT NULL UNIQUE KEY,
email varchar(50) NOT NULL,
password char(128) NOT NULL,
security varchar(100) NOT NULL,
answer char(128) NOT NULL
);

CREATE TABLE user_profile (
  ID char(128) NOT NULL,
  username varchar(50) NOT NULL,
  first_name varchar(20) NOT NULL,
  last_name varchar(20) NOT NULL,
  gender varchar(10) NOT NULL,
  dob date NOT NULL,
  PRIMARY KEY (ID),
  UNIQUE KEY username (username),
  FOREIGN KEY (ID) REFERENCES login (ID)
);

CREATE TABLE education (
  ID char(128) NOT NULL,
  username varchar(50) NOT NULL,
  school varchar(100) NOT NULL,
  city varchar(20) NOT NULL,
  postal_code int(11) DEFAULT NULL,
  state varchar(50) NOT NULL,
  country varchar(20) NOT NULL,
  start_date date NOT NULL,
  end_date date NOT NULL,
  degree varchar(50) NOT NULL,
  major varchar(50) NOT NULL,
  skills varchar(300) DEFAULT NULL,
  KEY ID (ID),
  FOREIGN KEY (ID) REFERENCES login (ID)
);

CREATE TABLE experience (
  ID char(128) NOT NULL,
  username varchar(50) NOT NULL,
  company_name varchar(100) NOT NULL,
  company_link varchar(100) NOT NULL,
  title varchar(100) NOT NULL,
  description varchar(300) DEFAULT NULL,
  city varchar(20) NOT NULL,
  state varchar(50) NOT NULL,
  country varchar(20) NOT NULL,
  postalcode int(11) DEFAULT NULL,
  startdate date NOT NULL,
  enddate date NOT NULL,
  KEY ID (ID),
  FOREIGN KEY (ID) REFERENCES login (ID)
);

CREATE TABLE job_post (
  Job_ID char(128) NOT NULL,
  ID char(128) NOT NULL,
  username varchar(50) NOT NULL,
  job_title varchar(100) NOT NULL,
  company_name varchar(100) NOT NULL,
  company_link varchar(100) NOT NULL,
  city varchar(20) NOT NULL,
  state varchar(50) NOT NULL,
  pay varchar(50) NOT NULL,
  about_job varchar(5000) NOT NULL,
  preferred_skills varchar(5000) NOT NULL,
  experience varchar(5000) NOT NULL,
  education varchar(1000) DEFAULT NULL,
  question1 varchar(100) DEFAULT NULL,
  question2 varchar(100) DEFAULT NULL,
  question3 varchar(100) DEFAULT NULL,
  question4 varchar(100) DEFAULT NULL,
  question5 varchar(100) DEFAULT NULL,
  status varchar(20) NOT NULL,
  PRIMARY KEY (Job_ID),
  KEY ID (ID),
  FOREIGN KEY (ID) REFERENCES login (ID)
);
drop table job_applications;
CREATE TABLE job_applications (
  application_id char(128) NOT NULL,
  Job_ID char(128) NOT NULL,
  ID char(128) NOT NULL,
  answer1 varchar(1000) DEFAULT NULL,
  answer2 varchar(1000) DEFAULT NULL,
  answer3 varchar(1000) DEFAULT NULL,
  answer4 varchar(1000) DEFAULT NULL,
  answer5 varchar(1000) DEFAULT NULL,
  application_status varchar(10) NOT NULL,
  PRIMARY KEY (application_id),
  KEY Job_ID (Job_ID),
  KEY ID (ID),
  FOREIGN KEY (Job_ID) REFERENCES job_post (Job_ID),
  FOREIGN KEY (ID) REFERENCES user_profile (ID)
);

CREATE TABLE profile_picture (
  ID char(128) NOT NULL,
  name varchar(200) DEFAULT NULL,
  KEY ID (ID),
  FOREIGN KEY (ID) REFERENCES login (ID)
);

CREATE TABLE resume (
  ID char(128) NOT NULL,
  resume_name varchar(100) DEFAULT NULL,
  name varchar(50) DEFAULT NULL,
  KEY ID (ID),
  FOREIGN KEY (ID) REFERENCES login (ID)
);