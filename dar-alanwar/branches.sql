create table branches
(
    id         int unsigned auto_increment
        primary key,
    name       varchar(191)         not null,
    address    varchar(191)         not null,
    image      varchar(191)         not null,
    status     tinyint(1) default 1 not null,
    created_at timestamp            null,
    updated_at timestamp            null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

