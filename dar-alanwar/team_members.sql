create table team_members
(
    id          bigint unsigned auto_increment
        primary key,
    image       varchar(191) null,
    name        varchar(191) null,
    designation varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

