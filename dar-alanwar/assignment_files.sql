create table assignment_files
(
    id            bigint unsigned auto_increment
        primary key,
    assignment_id bigint unsigned null,
    file          varchar(191)    null,
    created_at    timestamp       null,
    updated_at    timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

