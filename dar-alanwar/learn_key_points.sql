create table learn_key_points
(
    id         bigint unsigned auto_increment
        primary key,
    course_id  bigint unsigned null,
    name       text            not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

