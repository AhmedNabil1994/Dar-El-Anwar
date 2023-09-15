create table currencies
(
    id                 bigint unsigned auto_increment
        primary key,
    currency_code      varchar(191)                  not null,
    symbol             varchar(191)                  not null,
    currency_placement varchar(191) default 'before' not null comment 'before, after',
    current_currency   varchar(191) default 'no'     not null comment 'on, off',
    created_at         timestamp                     null,
    updated_at         timestamp                     null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

