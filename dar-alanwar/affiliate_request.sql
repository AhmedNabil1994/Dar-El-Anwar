create table affiliate_request
(
    id             bigint unsigned auto_increment
        primary key,
    user_id        bigint unsigned   not null,
    address        varchar(191)      null,
    comments       varchar(191)      null,
    letter         varchar(191)      null,
    affiliate_code varchar(191)      null,
    status         tinyint default 0 not null,
    created_at     timestamp         null,
    updated_at     timestamp         null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

