create table users
(
    id                int unsigned auto_increment
        primary key,
    name              varchar(100)      not null,
    user_name         varchar(100)      not null,
    email             varchar(150)      not null,
    email_verified_at timestamp         null,
    password          varchar(191)      null,
    role              tinyint default 2 not null comment '1=admin, 2=instructor, 3=student',
    phone             varchar(50)       null,
    branch_id         bigint unsigned   null,
    remember_token    varchar(100)      null,
    created_at        timestamp         null,
    updated_at        timestamp         null,
    constraint users_email_unique
        unique (email)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

