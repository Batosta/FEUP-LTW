PRAGMA foreign_keys = on;

-- Table: Account
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (1, 'Marshal Mathers', 'st4qH39l2of.k', 'eminem@gmail.com', 'Eminem', '10-10-1997', 'New York, USA', 'McDonalds employee','eminem.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (2, 'Calvin Broadus', 'stg75VURFVFwY', 'snoop@gmail.com', 'Snoop Dogg', '10-05-1997', 'New York, USA', 'Weed dealer', 'snoop.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (3, 'Christopher Wallace', 'st5P86rdRbBlg', 'biggie@gmail.com', 'Biggie Smalls','11-06-1997', 'Pedrogao Grande, Portugal', 'Dead', 'biggie.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (4, 'Gazzy Garcia', 'stOKQPJmr5c5M', 'lil@gmail.com', 'Lil Pump', '10-10-2001', 'Paris, France', 'Harvard student', 'lil.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, birthday, city, job, photo) VALUES (5, 'Joao Ferreira', 'stKlSG2ybmJos', 'samurai@gmail.com', 'Jack the Nigga', '11-03-1996', 'Lisbon,Portugal', 'Job1', 'samurai.jpg');

-- Table: Channel
INSERT INTO Channel(channelID, description) VALUES (1, 'President Trump');
INSERT INTO Channel(channelID, description) VALUES (2, 'Retarded');
INSERT INTO Channel(channelID, description) VALUES (3, 'highpeopledoingthings');

-- Table: ChannelUsers
INSERT INTO ChannelUsers(accountID, channelID) VALUES (1, 1);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (1, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (2, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (2, 3);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 1);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 3);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (5, 1);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (5, 3);

-- Table: Post
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points) VALUES (1, 1, 1, 'Trump', 'trump.jpg', 'worst president',0);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points) VALUES (2, 2, 1, 'President...', 'trump.jpg', '420 blaze it',0);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points) VALUES (3, 3, 1, 'Ni***', 'trump.jpg', 'blacklivesmater',0);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points) VALUES (4, 4, 2, 'Gucci Gang', 'trump.jpg', 'gucci gang gucci gang gucci gang!',0);

-- Table: Comment
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (1, 1, 2, 'meh');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (2, 2, 4, 'fk him up');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (3, 3, 1, 'fk 2pac');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (4, 4, 3, 'gucci gang gucci gang gucci gang!');

-- Table: SubComment
INSERT INTO SubComment(subcommentID, commentID, accountID, subcommentText) VALUES (1, 1, 1, 'subcomment 1');
INSERT INTO SubComment(subcommentID, commentID, accountID, subcommentText) VALUES (2, 2, 2, 'subcomment 2');
INSERT INTO SubComment(subcommentID, commentID, accountID, subcommentText) VALUES (3, 3, 3, 'subcomment 3');
INSERT INTO SubComment(subcommentID, commentID, accountID, subcommentText) VALUES (4, 4, 4, 'subcomment 4');

PRAGMA foreign_keys = on;
