drop table if exists Person;
drop table if exists Account;
drop table if exists Post;
drop table if exists Comment;
drop table if exists SubComment;

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

create table Post(
    postID integer primary key autoincrement,
    accountID integer references Account(accountID),
    photo text(100),
    description text(200)
);

create table Comment(
    commentID integer primary key autoincrement,
    postID integer references Post(postID),
    accountID integer references Account(accountID),
    commentText text not null
);

create table SubComment(
    subcommentID integer primary key autoincrement,
    commentID integer references Comment(commentID),
    accountID integer references Account(accountID),
    sucommentText text not null
);