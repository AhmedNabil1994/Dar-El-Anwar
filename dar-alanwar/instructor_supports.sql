create table instructor_supports
(
    id          bigint unsigned auto_increment
        primary key,
    logo        varchar(191) not null,
    title       varchar(191) not null,
    subtitle    varchar(191) not null,
    button_name varchar(191) null,
    button_link varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

