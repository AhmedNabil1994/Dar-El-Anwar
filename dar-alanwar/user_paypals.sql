create table user_paypals
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint       not null,
    email      varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

