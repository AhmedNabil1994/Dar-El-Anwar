create table products
(
    id           bigint unsigned auto_increment
        primary key,
    uuid         char(36)                   not null,
    user_id      bigint                     not null,
    name         varchar(191)               not null,
    details      mediumtext                 not null,
    book_summery mediumtext                 null,
    price        decimal(8, 2) default 0.00 not null,
    image        varchar(191)               null,
    summery_file varchar(191)               null,
    main_file    varchar(191)               null,
    type         varchar(191)               not null comment 'ebook, hard_copy',
    slug         varchar(191)               not null,
    status       tinyint       default 0    not null comment '1=approved, 0=unapproved',
    created_at   timestamp                  null,
    updated_at   timestamp                  null,
    constraint products_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

