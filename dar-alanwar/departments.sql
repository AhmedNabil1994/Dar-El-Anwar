create table departments
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)                 not null,
    name       varchar(191)             not null,
    image      varchar(191)             null,
    is_feature varchar(10) default 'no' not null comment 'yes, no',
    slug       varchar(191)             not null,
    status     tinyint     default 1    not null comment '1=active, 0=inactive',
    created_at timestamp                null,
    updated_at timestamp                null,
    constraint categories_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

