create table transactions
(
    id         bigint unsigned auto_increment
        primary key,
    hash       varchar(191)                 not null,
    user_id    bigint                       not null,
    type       tinyint                      null,
    amount     decimal(12, 3) default 0.000 not null,
    narration  varchar(191)                 null,
    reference  varchar(191)                 null,
    status     tinyint        default 1     not null,
    created_at timestamp                    null,
    updated_at timestamp                    null,
    constraint transactions_hash_unique
        unique (hash)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

