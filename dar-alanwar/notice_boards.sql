create table notice_boards
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)        not null,
    user_id    bigint unsigned not null,
    course_id  bigint unsigned null,
    topic      text            not null,
    details    text            not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint notice_boards_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

