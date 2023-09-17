create table our_histories
(
    id         bigint unsigned auto_increment
        primary key,
    year       varchar(191) null,
    title      varchar(191) null,
    subtitle   varchar(191) null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

