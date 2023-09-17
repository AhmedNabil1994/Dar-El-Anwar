create table subscriptions
(
    id            bigint unsigned auto_increment
        primary key,
    student_id    bigint unsigned null,
    course_id     bigint unsigned null,
    start_date    date            null,
    end_date      date            null,
    created_at    timestamp       null,
    updated_at    timestamp       null,
    subject_id    bigint          null,
    name          varchar(255)    null,
    value         bigint(255)     null,
    department_id bigint(255)     null
)
    collate = utf8mb4_unicode_ci;

