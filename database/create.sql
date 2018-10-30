drop table if exists Person;
drop table if exists Account;
drop table if exists Post;
drop table if exists Comment;

create table Person(
    personID integer primary key,
    personName text(20) not null,
    personAge integer not null
);

create table Account(
    accountID integer primary key,
    personID integer references Person(personID),
    passW text(30) not null,
    email text(40) not null unique,
    username text(20) not null unique
);

create table Post(
    postID integer primary key,
    accountID integer references Account(accountID),
    photo text(100),
    description text(200)
);

create table Comment(
    commentID integer primary key,
    postID integer references Post(postID),
    accountID integer references Account(accountID),
    commentText text not null
);