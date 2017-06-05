DROP DATABASE IF EXISTS portfolio_Website;
CREATE DATABASE portfolio_Website;

USE portfolio_Website;

create table users (
  id int not null AUTO_INCREMENT,
  firstName varchar(100),
  lastName varchar(100),
  username varchar(100),
  email varchar(100),
  phone varchar(20),
  picture varchar(100),
  password varchar(255),
  accountType varchar(25),
  mainSite_Account int,
  PRIMARY KEY (id)
);

create table projects (
  id int NOT NULL AUTO_INCREMENT,
  projectName varchar(100),
  description text,
  github_Link varchar(100),
  sampleSite_Link varchar(100),
  display_picture varchar(100),
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
  HomePage_Paragraph_1 text,
  HomePage_Paragraph_2 text,
  ResumeFile varchar(55),
  PRIMARY KEY (id)
);

create table skills(
  id INT NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  skill_name varchar(100),
  description text,
  skill_picture varchar(100),
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

create table projectSkillList (
  id INT NOT NULL AUTO_INCREMENT,
  projectID INT NOT NULL,
  skill_id INT NOT NULL,
  PRIMARY KEY (ID)
);

create table resume (
id INT NOT NULL AUTO_INCREMENT,
resume varchar(50),
PRIMARY KEY (id)
);



INSERT INTO `SiteInformation` (`id`, `HomePage_Header`, `HomePage_Username`, `HomePage_Paragraph_1`, `HomePage_Paragraph_2`, `ResumeFile`) VALUES
(1, 'Web Developer | Software Developer | Database Developer', 'Joe Velasquez', 'Hi, my name is Joe, I am a software developer and technology enthusiast from Lincoln NE who enjoys writing software and building websites. Here you will find information about the skills I possess as well as past and current projects im working on.', 'If your a business who is looking for a dedicated developer or systems administrator then, please feel free to contact me.', '../resume/JoeVResume.pdf');