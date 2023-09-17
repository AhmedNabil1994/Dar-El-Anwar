create table followup_responses
(
    id          bigint unsigned auto_increment
        primary key,
    question_id bigint    null,
    response    longtext  null,
    created_at  timestamp null,
    updated_at  timestamp null
)
    collate = utf8mb4_unicode_ci;

