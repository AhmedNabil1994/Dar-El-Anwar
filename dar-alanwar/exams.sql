create table exams
(
    id                 bigint unsigned auto_increment
        primary key,
    uuid               char(36)          not null,
    user_id            bigint            not null,
    course_id          bigint            not null,
    name               varchar(191)      not null,
    short_description  mediumtext        null,
    marks_per_question int     default 0 not null,
    duration           int     default 0 not null,
    type               varchar(50)       null comment 'multiple_choice, true_false',
    status             tinyint default 0 not null comment '0=unpublish, 1=published',
    created_at         timestamp         null,
    updated_at         timestamp         null,
    constraint exams_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

