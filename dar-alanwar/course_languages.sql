create table course_languages
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)     not null,
    name       varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint course_languages_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

