create table faq_questions
(
    id         bigint unsigned auto_increment
        primary key,
    question   text      not null,
    answer     text      null,
    created_at timestamp null,
    updated_at timestamp null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

