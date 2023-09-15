create table admins
(
    id         int unsigned auto_increment
        primary key,
    name       varchar(80)       not null,
    email      varchar(150)      not null,
    username   varchar(60)       not null,
    phone      varchar(20)       not null,
    role       tinyint default 2 not null comment '1=admin, 2=instructor, 3=student',
    password   varchar(191)      not null,
    hidden     tinyint default 1 not null,
    image      varchar(191)      null,
    created_at timestamp         null,
    updated_at timestamp         null,
    status     int               null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

