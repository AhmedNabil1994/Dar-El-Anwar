create table special_promotion_tags
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)     not null,
    name       varchar(191) not null,
    color      varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint special_promotion_tags_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

