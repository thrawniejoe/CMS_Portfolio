DROP DATABASE IF EXISTS portfolio_Website;
CREATE DATABASE portfolio_Website;

USE portfolio_Website;

GO

create table users (
  id int not null AUTO_INCREMENT,
  firstName varchar(100),
  lastName varchar(100),
  username varchar(100),
  email varchar(100),
  phone varchar(20),
  picture varchar(100),
  password varchar(255),
  PRIMARY KEY (id)
);

create table projects (
  id int NOT NULL AUTO_INCREMENT,
  projectName varchar(100),
  description varchar(255),
  github_Link varchar(100),
  sampleSite_Link varchar(100),
  PRIMARY KEY (id)
);

create table projectPictures (
  id INT NOT NULL AUTO_INCREMENT,
  project_id int NOT NULL,
  image_file varchar(100),
  PRIMARY KEY (id),
  FOREIGN KEY (project_id) REFERENCES projects(id)
);

create table SiteInformation (
  id INT NOT NULL AUTO_INCREMENT,
  HomePage_Header varchar(255),
  HomePage_Username varchar(255),
  HomePage_Paragraph_1 varchar(255),
  HomePage_Paragraph_2 varchar(255),
  PRIMARY KEY (id)
);

create table skills(
  id INT NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  skill_name varchar(100),
  description varchar(100),
  skill_picture varchar(100),
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
