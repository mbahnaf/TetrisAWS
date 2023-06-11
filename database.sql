USE tetris;

CREATE TABLE IF NOT EXISTS Users (
  Username varchar(50) UNIQUE,
  FirstName varchar(50),
  LastName varchar(50),
  Password varchar(50),
  Display varchar(50)
);

CREATE TABLE IF NOT EXISTS Scores (
  Username varchar(50),
  Score int
);
