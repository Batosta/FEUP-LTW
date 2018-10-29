PRAGMA foreign_keys = on;

-- Table: Person
INSERT INTO Person(personID, personName, personAge) VALUES (1, 'Marshal Mathers', 46);
INSERT INTO Person(personID, personName, personAge) VALUES (2, 'Calvin Broadus', 47);
INSERT INTO Person(personID, personName, personAge) VALUES (3, 'Christopher Wallace', 46);
INSERT INTO Person(personID, personName, personAge) VALUES (4, 'Gazzy Garcia', 18);
INSERT INTO Person(personID, personName, personAge) VALUES (5, 'Joao Ferreira', 20);

-- Table: Account
INSERT INTO Account(accountID, personID, passW, email, username) VALUES (1, 1, 'killshot', 'eminem@gmail.com', 'Eminem');
INSERT INTO Account(accountID, personID, passW, email, username) VALUES (2, 2, 'shinitz', 'snoop@gmail.com', 'Snoop Dogg');
INSERT INTO Account(accountID, personID, passW, email, username) VALUES (3, 3, 'suicidalthoughts', 'biggie@gmail.com', 'Biggie Smalls');
INSERT INTO Account(accountID, personID, passW, email, username) VALUES (4, 4, 'guccigang', 'lil@gmail.com', 'Lil Pump');
INSERT INTO Account(accountID, personID, passW, email, username) VALUES (5, 5, 'asheop', 'samurai@gmail.com', 'Jack the Nigga');
INSERT INTO Account(accountID, personID, passW, email, username) VALUES (6, 4, 'guccigang2', 'gucci@gmail.com', 'gucci gang');

-- Table: Post
INSERT INTO Post(postID, accountID, photo, description) VALUES (1, 1, 'trump.jpg', 'worst president');
INSERT INTO Post(postID, accountID, photo, description) VALUES (2, 2, 'trump.jpg', '420 blaze it');
INSERT INTO Post(postID, accountID, photo, description) VALUES (3, 3, 'trump.jpg', 'blacklivesmater');
INSERT INTO Post(postID, accountID, photo, description) VALUES (4, 4, 'trump.jpg', 'gucci gang gucci gang gucci gang!');

-- Table: Comment
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (1, 1, 2, 'meh');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (2, 2, 4, 'fk him up');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (3, 3, 1, 'fk 2pac');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (4, 4, 3, 'gucci gang gucci gang gucci gang!');

PRAGMA foreign_keys = on;