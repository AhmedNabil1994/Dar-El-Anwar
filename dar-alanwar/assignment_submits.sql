create table assignment_submits
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)        not null,
    user_id           bigint unsigned null,
    course_id         bigint unsigned null,
    assignment_id     bigint unsigned null,
    marks             double(8, 2)    null,
    notes             mediumtext      null,
    file              varchar(191)    null,
    original_filename varchar(191)    null,
    size              varchar(191)    null,
    created_at        timestamp       null,
    updated_at        timestamp       null,
    constraint assignment_submits_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

