create table assignments
(
    id            bigint unsigned auto_increment
        primary key,
    student_id    varchar(250)                 null,
    subject_id    bigint unsigned              not null,
    name          varchar(191)                 null,
    department_id varchar(250)                 null,
    marks         longtext collate utf8mb4_bin null
        check (json_valid(`marks`)),
    instructor_id varchar(191)                 null,
    status        tinyint default 1            null comment '1=active, 2=deactivated',
    created_at    timestamp                    null,
    updated_at    timestamp                    null,
    constraint assignments_uuid_unique
        unique (student_id)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

