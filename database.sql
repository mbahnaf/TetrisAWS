USE tetris;
CREATE TABLE UserTable (
  Username varchar(50) UNIQUE,
  FirstName varchar(50),
  LastName varchar(50),
  Password varchar(50),
  Display varchar(50)
);
CREATE TABLE ScoresTable (
  Username varchar(50),
  Score int
);
