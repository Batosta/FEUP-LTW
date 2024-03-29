drop table if exists Account;
drop table if exists Channel;
drop table if exists ChannelUsers;
drop table if exists Post;
drop table if exists Vote;
drop table if exists Comment;

-- Table with all the accounts of the users
create table Account(
    accountID integer primary key autoincrement,
    personName text(20) not null,
    passW text(30) not null,
    email text(40) not null unique,
    username text(20) not null unique,
    age integer,
    city text(20),
    job text(30),
    photo text(100)
);

-- Table with all the channels that exist
create table Channel(
    channelID integer primary key autoincrement,
    description text(50)
);

-- Table that corresponds every user to every channel he subscribes
create table ChannelUsers(
    accountID integer,
    channelID integer,
    primary key (channelID, accountID)
);

-- Table with every post made by every user in every channel
create table Post(
    postID integer primary key autoincrement,
    accountID integer not null references Account(accountID),
    channelID integer not null references Channel(channelID),
    title text(50) not null,
    photo text(100),
    description text(200) not null,
    points integer not null,
    epoch integer not null
);

-- Table that has the votes of the users in each post
create table Vote(
    accountID integer not null,
    postID integer not null,
    value integer not null,
    primary key(accountID, postID)
);

-- Table with all the comments of every post
create table Comment(
    commentID integer primary key autoincrement,
    postID integer not null references Post(postID),
    accountID integer not null references Account(accountID),
    commentText text not null
);