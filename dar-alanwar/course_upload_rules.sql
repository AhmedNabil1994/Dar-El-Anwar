create table course_upload_rules
(
    id          bigint unsigned auto_increment
        primary key,
    description mediumtext null,
    created_at  timestamp  null,
    updated_at  timestamp  null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

