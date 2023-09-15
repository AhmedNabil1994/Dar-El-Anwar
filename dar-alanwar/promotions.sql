create table promotions
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)          not null,
    name       varchar(191)      not null,
    start_date varchar(191)      null,
    end_date   varchar(191)      null,
    percentage varchar(191)      not null,
    status     tinyint default 1 not null comment '1=active, 0=deactivated',
    user_id    bigint unsigned   null,
    created_at timestamp         null,
    updated_at timestamp         null,
    constraint promotions_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

