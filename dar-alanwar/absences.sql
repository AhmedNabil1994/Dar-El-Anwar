create table absences
(
    id         bigint unsigned auto_increment
        primary key,
    date       date         null,
    department varchar(191) null,
    class      varchar(191) null,
    teacher    varchar(191) null,
    student    varchar(191) null,
    is_absent  tinyint(1)   null,
    created_at timestamp    null,
    updated_at timestamp    null,
    subject_id varchar(250) null
)
    collate = utf8mb4_unicode_ci;

