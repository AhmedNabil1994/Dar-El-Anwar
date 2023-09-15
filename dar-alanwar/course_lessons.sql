create table course_lessons
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)     not null,
    course_id         bigint       not null,
    name              varchar(191) not null,
    short_description mediumtext   null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint course_lessons_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

