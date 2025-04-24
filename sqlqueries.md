DB::
CREATE DATABASE ron;

TABLE::
CREATE TABLE users(
    uID int NOT NULL AUTO_INCREMENT,
    FullName varchar(30),
    Username varchar(19),
    Email varchar(50),
    Password varchar(16),
    PRIMARY KEY(uID),
    UNIQUE KEY(Username),
    UNIQUE KEY(Email)
);

CHECK PASSWORD:
SELECT * FROM users
where Username='$username' AND Password='$password'; (rows ganni ani ==1 vo vane login  natra hudaina)

TABLE PRODUCTS::
CREATE TABLE Products(
    pID INT NOT NULL AUTO_INCREMENT,
    pImage varchar(255),
    pTitle varchar(50),
    pDescription TEXT,
    pPrice DOUBLE,
    PRIMARY KEY(pID),
    UNIQUE KEY(pTitle)
);

INSERT INTO Products(pImage,pTitle,pDescription,pPrice)
VALUES('/products/doom.jpg','Doom 14','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 24','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 34','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 44','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 54','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 65','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 74','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 84','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 94','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 1','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 2','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 3','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 4','Best Game to be ever made, FPS games',29.99),
('/products/doom.jpg','Doom 5','Best Game to be ever made, FPS games',29.99)
;
VALUES('/products/gta.png','Grand Theft Auto 5','Made by Rockstar Games, Best game, released for 3 Playstations already lol bla bla',59.99);

SELECT * FROM Products;


AFTER EVERY REGISTRATION OR INSERTION:::
SET  @num := 0;
UPDATE users SET uID = @num := (@num+1);
ALTER TABLE `users` AUTO_INCREMENT = 1;

SET  @num := 0;
UPDATE Products SET pID = @num := (@num+1);
ALTER TABLE `Products` AUTO_INCREMENT = 1;

CREATE TABLE Cart(
    cID int,
    cName varchar(50),
    cImage varchar(255),
    cPrice DOUBLE,
    cDescription TEXT,
    cQuantity int,
    cUsername varchar(19)
);

ini_set('session.cookie_lifetime','864000');