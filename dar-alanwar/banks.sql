create table banks
(
    id             bigint unsigned auto_increment
        primary key,
    name           varchar(191)      not null,
    account_name   varchar(191)      not null,
    account_number varchar(191)      not null,
    status         tinyint default 1 not null comment '1=active,0=inactive',
    created_at     timestamp         null,
    updated_at     timestamp         null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

