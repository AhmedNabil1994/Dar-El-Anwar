create table settings
(
    id           bigint unsigned auto_increment
        primary key,
    option_key   varchar(191) not null,
    option_value mediumtext   null,
    created_at   timestamp    null,
    updated_at   timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

