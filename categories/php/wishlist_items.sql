USE userDatabase;

CREATE TABLE wishlist_items (
  ItemID varchar(6) NOT NULL,
  ItemName varchar(50) NOT NULL,
  Price float NOT NULL,
  DateAdded date NOT NULL

  CONSTRAINT wishlist_items_PK PRIMARY KEY (ItemID)
);
