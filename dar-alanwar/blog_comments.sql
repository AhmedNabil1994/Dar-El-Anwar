create table blog_comments
(
    id         bigint unsigned auto_increment
        primary key,
    blog_id    bigint unsigned   null,
    user_id    bigint unsigned   null,
    name       varchar(191)      null,
    email      varchar(191)      null,
    comment    text              null,
    status     tinyint default 1 null comment '1=active, 2=deactivate',
    parent_id  bigint unsigned   null,
    created_at timestamp         null,
    updated_at timestamp         null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

