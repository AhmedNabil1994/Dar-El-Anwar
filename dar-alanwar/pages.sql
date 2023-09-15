create table pages
(
    id               bigint unsigned auto_increment
        primary key,
    uuid             char(36)     not null,
    en_title         text         null,
    en_description   longtext     null,
    slug             varchar(191) null,
    meta_description longtext     null,
    meta_keywords    longtext     null,
    created_at       timestamp    null,
    updated_at       timestamp    null,
    constraint pages_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

