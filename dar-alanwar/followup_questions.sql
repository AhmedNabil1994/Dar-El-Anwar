create table followup_questions
(
    id          bigint unsigned auto_increment
        primary key,
    followup_id bigint       null,
    questions   varchar(191) null,
    type        varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

