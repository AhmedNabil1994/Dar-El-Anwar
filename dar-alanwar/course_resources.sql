create table course_resources
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)        not null,
    course_id         bigint unsigned null,
    original_filename varchar(191)    null,
    file              varchar(191)    null,
    size              varchar(191)    null,
    created_at        timestamp       null,
    updated_at        timestamp       null,
    constraint course_resources_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

