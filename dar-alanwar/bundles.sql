create table bundles
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)        not null,
    user_id    bigint unsigned null,
    name       varchar(191)    not null,
    slug       varchar(191)    not null,
    image      varchar(191)    null,
    overview   longtext        null,
    price      varchar(191)    null,
    status     tinyint         null comment '1=active,0=disable',
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint bundles_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

