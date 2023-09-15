create table forum_posts
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)          not null,
    user_id           bigint unsigned   null,
    title             text              not null,
    forum_category_id bigint unsigned   null,
    description       longtext          not null,
    status            tinyint default 1 null comment '1=active, 0=disable',
    total_seen        bigint            null,
    created_at        timestamp         null,
    updated_at        timestamp         null,
    constraint forum_posts_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

