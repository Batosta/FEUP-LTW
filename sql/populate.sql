PRAGMA foreign_keys = on;

-- Table: Account
INSERT INTO Account(accountID, personName, passW, email, username, age, city, job, photo) VALUES (1, 'Marshal Mathers', 'st4qH39l2of.k', 'eminem@gmail.com', 'Eminem', 49, 'New York, USA', 'God','eminem.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, age, city, job, photo) VALUES (2, 'Calvin Broadus', 'stg75VURFVFwY', 'snoop@gmail.com', 'Snoop Dogg', 52, 'New York, USA', 'Rapper', 'snoop.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, age, city, job, photo) VALUES (3, 'Christopher Wallace', 'st5P86rdRbBlg', 'biggie@gmail.com', 'Biggie Smalls', 78, 'Pedrogao Grande, Portugal', 'Teacher', 'biggie.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, age, city, job, photo) VALUES (4, 'Gazzy Garcia', 'stOKQPJmr5c5M', 'lil@gmail.com', 'Lil Pump', 24, 'Paris, France', 'Harvard student', 'lil.jpg');
INSERT INTO Account(accountID, personName, passW, email, username, age, city, job, photo) VALUES (5, 'Joao Ferreira', 'stKlSG2ybmJos', 'samurai@gmail.com', 'Batosta', 20, 'Lisbon,Portugal', 'Fireman', 'samurai.png');

-- Table: Channel
INSERT INTO Channel(channelID, description) VALUES (1, 'Politics');
INSERT INTO Channel(channelID, description) VALUES (2, 'Portugal');
INSERT INTO Channel(channelID, description) VALUES (3, 'Winter');
INSERT INTO Channel(channelID, description) VALUES (4, 'FEUP');
INSERT INTO Channel(channelID, description) VALUES (5, 'Asus');
INSERT INTO Channel(channelID, description) VALUES (6, 'Nature');
INSERT INTO Channel(channelID, description) VALUES (7, 'Economics');
INSERT INTO Channel(channelID, description) VALUES (8, 'Ronaldo');

-- Table: ChannelUsers
INSERT INTO ChannelUsers(accountID, channelID) VALUES (1, 1);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (1, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (1, 6);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (1, 8);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (2, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (2, 3);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (2, 7);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 1);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 3);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 4);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 5);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 6);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 7);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (3, 8);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (4, 5);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (5, 2);
INSERT INTO ChannelUsers(accountID, channelID) VALUES (5, 8);

-- Table: Post
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (1, 1, 1, 'Socrates', 'socrates.jpg', 'Pow', 0, 1483228800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (2, 2, 1, 'Trump', 'trump.jpg', 'BUILD A WALL', 1, 1545150940);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (3, 3, 1, 'Macron', 'macron.jpg', 'France president', 2, 1535150940);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (4, 4, 2, 'Porto', 'porto.jpg', 'Melhores do mundo <3', 1, 1532150840);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (5, 5, 2, 'Vila Real', 'vilareal.jpg', 'Uma das sete maravilhas de Portugal', -1, 1483223700);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (6, 1, 2, 'Marcelo', 'marcelo.jpg', 'Mais um mergulho', 2, 1425668800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (7, 2, 3, 'Snow', 'snow.jpg', 'Look at this', 2, 1486228800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (8, 3, 3, 'Arctic', 'arctic.jpg', 'Preserve this please', 1, 1545150940);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (9, 4, 3, 'Snowing', 'snowing.jpg', 'This is perfect', -2, 1465668800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (10, 5, 3, 'Finland', 'finland.png', 'Finland flag', 0, 1535150930);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (11, 1, 4, 'Faculdade de Engenharia da Universidade do Porto', 'feup.jpg', 'ENGENHARIAAAA', 1, 1539150840);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (12, 2, 4, 'Ae', 'ae.jpg', 'Finos a 0.50 mpts', 1, 1483357700);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (13, 3, 5, 'Asus', 'asus.jpg', 'Asus computer', 1, 1485601800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (14, 4, 6, 'Tree', 'tree.jpg', 'Green', 1, 1443228800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (15, 5, 6, 'Waterfall', 'waterfall.jpg', 'Love it', 0, 1544450940);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (16, 1, 6, 'Ocean', 'ocean.jpg', 'A imensidão', 1, 1535144440);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (17, 2, 6, 'Bear', 'bear.jpg', 'Purrrrfect', 1, 1533350840);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (18, 3, 7, 'Graphic', 'graphic.png', 'OMG', 1, 1483222200);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (19, 4, 8, 'Cristiano Ronaldo', 'ronaldo.jpg', 'SIIIIIIIIIIIIMMMMMMMMM', -1, 1285668800);
INSERT INTO Post(postID, accountID, channelID, title, photo, description, points, epoch) VALUES (20, 5, 8, 'CR7', 'cr7.jpg', 'GOAT - Greatest Of All Time', 0, 1185468800);

-- Table: Vote
INSERT INTO Vote(accountID, postID, value) VALUES (1,1,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,2,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,3,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,4,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,5,0);
INSERT INTO Vote(accountID, postID, value) VALUES (1,6,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,7,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,8,1);
INSERT INTO Vote(accountID, postID, value) VALUES (1,9,0);
INSERT INTO Vote(accountID, postID, value) VALUES (1,10,0);
INSERT INTO Vote(accountID, postID, value) VALUES (2,11,1);
INSERT INTO Vote(accountID, postID, value) VALUES (2,12,1);
INSERT INTO Vote(accountID, postID, value) VALUES (2,13,1);
INSERT INTO Vote(accountID, postID, value) VALUES (2,14,1);
INSERT INTO Vote(accountID, postID, value) VALUES (3,15,0);
INSERT INTO Vote(accountID, postID, value) VALUES (3,16,1);
INSERT INTO Vote(accountID, postID, value) VALUES (3,17,1);
INSERT INTO Vote(accountID, postID, value) VALUES (3,18,1);
INSERT INTO Vote(accountID, postID, value) VALUES (4,19,0);
INSERT INTO Vote(accountID, postID, value) VALUES (4,20,0);
INSERT INTO Vote(accountID, postID, value) VALUES (4,3,1);
INSERT INTO Vote(accountID, postID, value) VALUES (5,3,1);
INSERT INTO Vote(accountID, postID, value) VALUES (7,6,1);
INSERT INTO Vote(accountID, postID, value) VALUES (7,7,1);
INSERT INTO Vote(accountID, postID, value) VALUES (7,9,0);
INSERT INTO Vote(accountID, postID, value) VALUES (7,20,1);
INSERT INTO Vote(accountID, postID, value) VALUES (8,15,1);
INSERT INTO Vote(accountID, postID, value) VALUES (8,10,1);
INSERT INTO Vote(accountID, postID, value) VALUES (8,1,0);
INSERT INTO Vote(accountID, postID, value) VALUES (8,3,0);


-- Table: Comment posts(20) accounts5
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (1, 1, 1, 'Mesmo');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (2, 2, 2, 'Oh yeah');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (3, 3, 3, 'Tens toda a razao');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (4, 4, 4, 'Sinceramente');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (5, 5, 5, 'Nem tu sabes');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (6, 6, 2, 'Pois');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (7, 7, 3, 'Assim sim');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (8, 8, 5, 'Lindo');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (9, 9, 2, 'Nem queria');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (10, 10, 3, 'AHAHAHHAH');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (11, 13, 2, 'ehehehehehhe');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (12, 15, 3, 'ihiihiihihi');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (13, 20, 5, 'jajajajajjaj');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (14, 18, 1, 'sabessssssss');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (15, 1, 1, 'Parabens');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (16, 3, 4, 'Nem queria');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (17, 12, 4, 'AH POIS É');
INSERT INTO Comment(commentID, postID, accountID, commentText) VALUES (18, 5, 3, 'Pow');

PRAGMA foreign_keys = on;