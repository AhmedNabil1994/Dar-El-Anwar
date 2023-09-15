create table forum_categories
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)          not null,
    title      varchar(191)      not null,
    subtitle   varchar(191)      not null,
    logo       varchar(191)      null,
    slug       varchar(191)      not null,
    status     tinyint default 1 null comment '1=active, 0=disable',
    created_at timestamp         null,
    updated_at timestamp         null,
    constraint forum_categories_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

