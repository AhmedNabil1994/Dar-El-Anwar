create table take_exams
(
    id                       bigint unsigned auto_increment
        primary key,
    user_id                  bigint        not null,
    exam_id                  bigint        not null,
    number_of_correct_answer int default 0 not null,
    created_at               timestamp     null,
    updated_at               timestamp     null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

