drop table if exists Account;
drop table if exists Channel;
drop table if exists ChannelUsers;
drop table if exists Post;
drop table if exists LikeUser;
drop table if exists Comment;
drop table if exists SubComment;

-- Table with all the accounts of the users
create table Account(
    accountID integer primary key autoincrement,
    personName text(20) not null,
    passW text(30) not null,
    email text(40) not null unique,
    username text(20) not null unique,
    birthday text(10),
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
    accountID integer references Account(accountID),
    channelID integer references Channel(channelID),
    title text(50) not null,
    photo text(100),
    description text(200) not null,
    points integer not null
);

-- Table that states if the user has already like a post
create table LikeUser(
    accountID integer not null,
    postID integer not null,
    primary key(accountID, postID)
);

-- Table with all the comments of every post
create table Comment(
    commentID integer primary key autoincrement,
    postID integer references Post(postID),
    accountID integer references Account(accountID),
    commentText text not null
);

-- Table with all the subcomments for every comment
create table SubComment(
    subcommentID integer primary key autoincrement,
    commentID integer references Comment(commentID),
    accountID integer references Account(accountID),
    subcommentText text not null
);
