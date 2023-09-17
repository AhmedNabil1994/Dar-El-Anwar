create table blogs
(
    id               bigint unsigned auto_increment
        primary key,
    uuid             char(36)          not null,
    user_id          bigint            not null,
    title            varchar(191)      not null,
    slug             varchar(191)      not null,
    details          mediumtext        not null,
    image            varchar(191)      null,
    status           tinyint default 0 not null comment '1=published, 0=unpublished',
    blog_category_id bigint unsigned   null,
    created_at       timestamp         null,
    updated_at       timestamp         null,
    constraint blogs_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

