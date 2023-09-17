create table question_options
(
    id                 bigint unsigned auto_increment
        primary key,
    uuid               char(36)                  not null,
    user_id            bigint                    not null,
    question_id        bigint                    not null,
    question_option_id bigint                    null,
    name               varchar(191)              not null,
    is_correct_answer  varchar(191) default 'no' not null comment 'yes, no',
    created_at         timestamp                 null,
    updated_at         timestamp                 null,
    constraint question_options_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

