PRAGMA foreign_keys = on;

-- Table: Account
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (1, 'Marshal Mathers', 'st4qH39l2of.k', 'eminem@gmail.com', 'Eminem', '10-10-1997', 'New York, USA', 'McDonalds employee','eminem.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (2, 'Calvin Broadus', 'stg75VURFVFwY', 'snoop@gmail.com', 'Snoop Dogg', '10-05-1997', 'New York, USA', 'Weed dealer', 'snoop.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (3, 'Christopher Wallace', 'st5P86rdRbBlg', 'biggie@gmail.com', 'Biggie Smalls','11-06-1997', 'Pedrogao Grande, Portugal', 'Dead', 'biggie.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (4, 'Gazzy Garcia', 'stOKQPJmr5c5M', 'lil@gmail.com', 'Lil Pump', '10-10-2001', 'Paris, France', 'Harvard student', 'lil.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (5, 'Joao Ferreira', 'stKlSG2ybmJos', 'samurai@gmail.com', 'Jack the Nigga', '11-03-1996', 'Lisbon,Portugal', 'Job1', 'samurai.jpg');
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
