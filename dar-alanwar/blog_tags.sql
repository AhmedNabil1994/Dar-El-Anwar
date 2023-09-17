create table blog_tags
(
    id         bigint unsigned auto_increment
        primary key,
    blog_id    bigint unsigned null,
    tag_id     bigint unsigned null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

