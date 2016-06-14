DROP TABLE users;
CREATE TABLE users(
  id INTEGER PRIMARY KEY,
  firstName VARCHAR(30),
  lastName VARCHAR(30),
  email VARCHAR(50),
  password VARCHAR(40),
  payPal TEXT,
  salt TEXT
);

DROP TABLE bills;
CREATE TABLE bills(
  id INTEGER PRIMARY KEY,
  name VARCHAR(30),
  amount REAL,
  dueDate DATE,
  userId INTEGER,
  authorId INTEGER,
  isPaid INTEGER,
  description TEXT,
  authorPayPal TEXT
);

DROP TABLE notifications;
CREATE TABLE notifications(
  id INTEGER PRIMARY KEY,
  description TEXT,
  postDate DATE,
  receiverId INTEGER,
  type INTEGER
);
