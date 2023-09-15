create table student_courses
(
    id         bigint unsigned auto_increment
        primary key,
    course_id  bigint unsigned not null,
    student_id bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

