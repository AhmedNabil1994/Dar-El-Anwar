create table forum_post_comments
(
    id            bigint unsigned auto_increment
        primary key,
    uuid          char(36)          not null,
    forum_post_id bigint unsigned   null,
    user_id       bigint unsigned   null,
    comment       longtext          not null,
    parent_id     bigint unsigned   null,
    status        tinyint default 1 null comment '1=active, 0=disable',
    created_at    timestamp         null,
    updated_at    timestamp         null,
    constraint forum_post_comments_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

