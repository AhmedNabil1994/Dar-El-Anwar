create table client_logos
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(191) null,
    logo       varchar(191) null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

