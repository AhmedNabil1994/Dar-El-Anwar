create table menus
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(191)    not null,
    slug       varchar(191)    null,
    url        bigint unsigned null,
    type       tinyint         null comment '1=static, 2=dynamic',
    status     tinyint         null comment '1=active, 2=deactivated',
    created_at timestamp       null,
    updated_at timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

