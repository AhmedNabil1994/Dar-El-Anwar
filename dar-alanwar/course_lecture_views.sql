create table course_lecture_views
(
    id                bigint unsigned auto_increment
        primary key,
    user_id           bigint    not null,
    course_id         bigint    not null,
    course_lecture_id bigint    not null,
    created_at        timestamp null,
    updated_at        timestamp null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

