CREATE TABLE Customer
(
  Cust_Id INT NOT NULL AUTO_INCREMENT,
  Cust_Name VARCHAR(35) NOT NULL,
  Cust_Email VARCHAR(35) NOT NULL,
  Cust_role INT NOT NULL,
  PRIMARY KEY (Cust_Id)
);

CREATE TABLE Product
(
  Prod_Id INT NOT NULL AUTO_INCREMENT,
  Prod_Name VARCHAR(35) NOT NULL,
  Prod_price INT NOT NULL,
  Prod_spec VARCHAR(50) NOT NULL,
  Prod_spec1 VARCHAR(50) NOT NULL,
  Prod_spec2 VARCHAR(50) NOT NULL,
  PRIMARY KEY (Prod_Id)
);

CREATE TABLE Offering
(
  Offering_Id INT NOT NULL AUTO_INCREMENT,
  Vendor_Id INT NOT NULL,
  Qty_stock INT NOT NULL,
  Prod_Id INT NOT NULL,
  Cust_Id INT NOT NULL,
  PRIMARY KEY (Offering_Id),
  FOREIGN KEY (Prod_Id) REFERENCES Product(Prod_Id),
  FOREIGN KEY (Cust_Id) REFERENCES Customer(Cust_Id),
  UNIQUE (Vendor_Id)
);

CREATE TABLE Cart_Details
(
  Cart_Id INT NOT NULL AUTO_INCREMENT,
  Cart INT NOT NULL,
  Order_date INT NOT NULL,
  Del_date INT NOT NULL,
  Pay_Method VARCHAR(15) NOT NULL,
  Pay INT NOT NULL,
  Cust_Id INT NOT NULL,
  PRIMARY KEY (Cart_Id),
  FOREIGN KEY (Cust_Id) REFERENCES Customer(Cust_Id)
);

CREATE TABLE Customer_Details
(
  Cust_Contact INT NOT NULL,
  Cust_address1 VARCHAR(30) NOT NULL,
  Cust_address2 VARCHAR(30) NOT NULL,
  Cust_address3 VARCHAR(30) NOT NULL,
  Cust_Country VARCHAR(15) NOT NULL,
  Cust_postcode INT NOT NULL,
  Cust_Id INT NOT NULL,
  FOREIGN KEY (Cust_Id) REFERENCES Customer(Cust_Id)
);

CREATE TABLE Cart_Contents
(
  Qty INT NOT NULL,
  Comment VARCHAR(75) NOT NULL,
  Offering_Id INT NOT NULL,
  Cart_Id INT NOT NULL,
  FOREIGN KEY (Offering_Id) REFERENCES Offering(Offering_Id),
  FOREIGN KEY (Cart_Id) REFERENCES Cart_Details(Cart_Id)
);
COMMIT;