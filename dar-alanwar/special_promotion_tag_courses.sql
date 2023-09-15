create table special_promotion_tag_courses
(
    id                       bigint unsigned auto_increment
        primary key,
    special_promotion_tag_id bigint unsigned not null,
    course_id                bigint unsigned not null,
    created_at               timestamp       null,
    updated_at               timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

