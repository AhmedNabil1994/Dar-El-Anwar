create table reviews
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned not null,
    course_id  bigint unsigned not null,
    rating     int             null,
    comment    mediumtext      null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

