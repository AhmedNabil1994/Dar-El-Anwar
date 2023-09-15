create table answers
(
    id                     bigint unsigned auto_increment
        primary key,
    user_id                bigint      not null,
    exam_id                bigint      not null,
    question_id            bigint      not null,
    question_option_id     bigint      not null,
    take_exam_id           bigint      not null,
    multiple_choice_answer mediumtext  null,
    is_correct             varchar(10) not null comment 'yes, no',
    created_at             timestamp   null,
    updated_at             timestamp   null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

