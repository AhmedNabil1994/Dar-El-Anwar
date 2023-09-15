create table assign_homeworks
(
    id          bigint unsigned auto_increment
        primary key,
    student_id  bigint unsigned not null,
    homework_id bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

create index assign_homeworks_homework_id_foreign
    on assign_homeworks (homework_id);

create index assign_homeworks_student_id_foreign
    on assign_homeworks (student_id);

