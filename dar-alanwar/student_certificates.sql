create table student_certificates
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)     not null,
    user_id    bigint       not null,
    course_id  bigint       not null,
    path       varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint student_certificates_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

