create table ranking_levels
(
    id          bigint unsigned auto_increment
        primary key,
    uuid        char(36)     not null,
    name        varchar(191) not null,
    badge_image varchar(191) not null,
    earning     int          not null,
    student     int          not null,
    serial_no   int          not null,
    created_at  timestamp    null,
    updated_at  timestamp    null,
    constraint ranking_levels_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

