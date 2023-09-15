create table roles
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(191) not null,
    guard_name varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

