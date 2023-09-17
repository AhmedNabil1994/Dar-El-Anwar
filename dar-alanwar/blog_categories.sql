create table blog_categories
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)          not null,
    name       varchar(191)      not null,
    slug       varchar(191)      not null,
    status     tinyint default 0 not null comment '1=active, 0=deactivated',
    created_at timestamp         null,
    updated_at timestamp         null,
    constraint blog_categories_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

