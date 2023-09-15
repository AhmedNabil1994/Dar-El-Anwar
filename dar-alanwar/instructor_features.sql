create table instructor_features
(
    id         bigint unsigned auto_increment
        primary key,
    logo       varchar(191) null,
    title      varchar(191) null,
    subtitle   text         null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

