create table homeworks
(
    id           bigint unsigned auto_increment
        primary key,
    name         varchar(191) not null,
    student_id   int          not null,
    student_name varchar(191) not null,
    depart_id    int          not null,
    material     varchar(191) not null,
    teacher_name varchar(191) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

