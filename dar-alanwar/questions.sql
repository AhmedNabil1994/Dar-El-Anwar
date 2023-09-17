create table questions
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)     not null,
    user_id    bigint       not null,
    exam_id    bigint       not null,
    name       varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    type       varchar(255) null,
    constraint questions_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

