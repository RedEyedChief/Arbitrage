CREATE TABLE `orders` (
  `idOrder` INT NOT NULL,
  `Profile_idProfile` INT NULL,
  `Product_idProduct` INT NULL,
  `Quantity` INT NULL,
  `Price` INT NULL,
  `Date` DATETIME NULL,
  PRIMARY KEY (`idOrder`));