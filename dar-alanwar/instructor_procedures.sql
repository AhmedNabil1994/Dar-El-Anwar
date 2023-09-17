create table instructor_procedures
(
    id         bigint unsigned auto_increment
        primary key,
    image      varchar(191) null,
    title      varchar(191) null,
    subtitle   longtext     null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

