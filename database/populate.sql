PRAGMA foreign_keys = on;

-- Table: Person
INSERT INTO Person(personID, personName, personAge) VALUES (1, 'Marshal Mathers', 46);
INSERT INTO Person(personID, personName, personAge) VALUES (2, 'Calvin Broadus', 47);
INSERT INTO Person(personID, personName, personAge) VALUES (3, 'Christopher Wallace', 46);
INSERT INTO Person(personID, personName, personAge) VALUES (4, 'Gazzy Garcia', 18);
INSERT INTO Person(personID, personName, personAge) VALUES (5, 'Joao Ferreira', 20);

-- Table: Account
INSERT INTO Account(accountID, personID, passW, email, username, photo) VALUES (1, 1, 'killshot', 'eminem@gmail.com', 'Eminem', 'trump.jpg');
INSERT INTO Account(accountID, personID, passW, email, username, photo) VALUES (2, 2, 'shinitz', 'snoop@gmail.com', 'Snoop Dogg', 'test.jpg');
INSERT INTO Account(accountID, personID, passW, email, username, photo) VALUES (3, 3, 'suicidalthoughts', 'biggie@gmail.com', 'Biggie Smalls', 'trump.jpg');
INSERT INTO Account(accountID, personID, passW, email, username, photo) VALUES (4, 4, 'guccigang', 'lil@gmail.com', 'Lil Pump', 'test.jpg');
INSERT INTO Account(accountID, personID, passW, email, username, photo) VALUES (5, 5, 'asheop', 'samurai@gmail.com', 'Jack the Nigga', 'trump.jpg');
INSERT INTO Account(accountID, personID, passW, email, username, photo) VALUES (6, 4, 'guccigang2', 'gucci@gmail.com', 'gucci gang', 'test.jpg');

-- likes
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

-- Table: SubComment
INSERT INTO SubComment(subcommentID, commentID, accountID, sucommentText) VALUES (1, 1, 1, 'subcomment 1');
INSERT INTO SubComment(subcommentID, commentID, accountID, sucommentText) VALUES (2, 2, 2, 'subcomment 2');
INSERT INTO SubComment(subcommentID, commentID, accountID, sucommentText) VALUES (3, 3, 3, 'subcomment 3');
INSERT INTO SubComment(subcommentID, commentID, accountID, sucommentText) VALUES (4, 4, 4, 'subcomment 4');


PRAGMA foreign_keys = on;