CREATE TABLE Books (
    ID int NOT NULL AUTO_INCREMENT,
    Title varchar(255),
    Updated date,
    Author varchar(255),
    PRIMARY KEY (ID)
);

CREATE TABLE Users (
    ID int NOT NULL AUTO_INCREMENT,
    Username varchar(255),
    Hashed_password varchar(255),
    PRIMARY KEY (ID) 
);

CREATE TABLE Favorites (
    User_ID int,
    Book_ID int,
    CONSTRAINT PK_Favorite PRIMARY KEY (User_ID, Book_ID),
    FOREIGN KEY (User_ID) REFERENCES Users(ID),
    FOREIGN KEY (Book_ID) REFERENCES Books(ID)
);

COMMIT;
