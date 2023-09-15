create table followups
(
    id            bigint unsigned auto_increment
        primary key,
    instructor_id bigint    null,
    class_id      bigint    null,
    subject_id    bigint    null,
    status        tinyint   null comment '0-inactive 1-active',
    type          tinyint   null,
    created_at    timestamp null,
    updated_at    timestamp null,
    class_number  bigint    null,
    time_working  datetime  null,
    observer      bigint    null
)
    collate = utf8mb4_unicode_ci;

